<div id="v_update_module">
	<h1><?=$__nav?>模块</h1>
	<br/>

	 <Row>
      <i-col span="16">
      	<span style="font-size:14px;">模块名称:</span>
      	<i-input :value.sync="title" placeholder="请输入模块名称" style="width:80%"></i-input>
      </i-col>
  	</Row>

  	<br/>

  	<Row v-if="company_name == ''">
      <i-col span="16">
      	<span style="font-size:14px;">公司名称:</span>
      	<i-select :model.sync="company_name" style="width:284px">
            <i-option  v-for="item in companys" :value="item.name" @click="selectCompany(item.id)">{{ item.name }}</i-option>
        </i-select>
      </i-col>
  	</Row>

    <Row v-if="company_name != ''">
      <i-col span="16">
        <span style="font-size:14px;">公司名称:</span>
        <i-input :value.sync="company_name" placeholder="请输入模块名称" style="width:80%" disabled></i-input>
      </i-col>
    </Row>

    <br/>

    <Row>
      <i-col span="16">
        <span style="font-size:14px;">查看附加信息:</span>
        <Switch size="large" @on-change="selectOption">
            <span slot="open" >ON</span>
            <span slot="close" >OFF</span>
        </Switch>
      </i-col>
    </Row>

    <br/>

    <div class="example ivu-row" v-if="pomition">
      <div class="example-demo ivu-col ivu-col-span-20">
        <div class="example-case">

       <Row>
        <i-col span="24">
          <div style="border-bottom:1px solid #CDCDCD;width:100%;padding-bottom:10px;text-align:right">
            <i-button type="info" @click="addContent" icon="android-add-circle">添加信息</i-button>
          </div>
        </i-col>
      </Row>

        <br/>

        <div class="ivu-table-header">
          <table width="100%">
            <thead>
              <tr v-for="(idx,v) in extra" style="margin-top:5px">
                <th style="width:18%;text-align:center">
                      <Tag type="border"  color="green">{{idx}}</Tag>
                </th>
                <th style="width:2%;text-align:left">
                    <Icon type="ios-redo"></Icon>
                </th>
                <th style="width:60%;text-align:left">
                    <i-input :value.sync="v" style="width:80%;margin-left:15px"></i-input>

                <th style="width:10%;text-align:left">
                    <i-button  shape="circle" icon="close" size="small" @click="deleteTag(idx)"></i-button>
                </th>
              </tr>

            </thead>
          </table>
        </div>

        <br/>

        <div class="ivu-table-header" v-if="state == 'on'">
          <table width="100%">
            <thead>
              <tr>
                <th style="width:90%;text-align:center">
                    <i-input :value.sync="tag" style="width:20%;"></i-input>
                    <Icon type="ios-redo" style="margin-left:15px"></Icon>
                    <i-input :value.sync="content" style="width:58%;margin-left:15px"></i-input>
                </th>

                <th style="width:10%;text-align:right">
                    <i-button type="info" @click="confirm" icon="ios-checkmark">确定</i-button>
                </th>
         
              </tr>
            </thead>
          </table>
        </div>

        

         
        </div>
      </div>
    </div>

    <Row>
      <i-col span="16">
        <i-button type="info" size="large" @click="saveData">保存</i-button>
      </i-col>
  </Row>

</div>

<script type="text/javascript">
	$$.vue({
		el:"#v_update_module",
		data:function(){
			return {
        model:'',
        companys:<?=$__companys?>,
        pomition:false,
        title:'<?=$__title?>',
        company_name:'<?=$__company_name?>',
        extra:'<?=$__extra?>',
        content:'',
        tag:'',
        state:'off',
        company_id:'<?=$__company_id?>',
        module_id:'<?=$__module_id?>'
			}
		},

    _init:function(){
      var self = this 
      if(self.extra != ''){
        self.extra = $$.str2js(self.extra)
      }else{
        self.extra = {}
      }
    },

    methods:{
      selectOption:function(state){
        var self = this 
        self.pomition = state
      },

      addContent:function(){
        this.state = 'on'
      },

      confirm:function(){
        var self = this 
        var data = self.extra 
        data[self.tag] = self.content
        this.setState({
          extra:data,
        })
      },

      selectCompany:function(id){
        var self = this 
        self.company_id = id
      },

      deleteTag:function(idx){
        var self = this 
        var data = self.extra 
        delete data[idx]
        self.setState({
          extra:data,
        })
      },

      saveData:function(){
        var self = this 
        var title = self.title
        var company_id = self.company_id
        var extra = $$.js2str(self.extra)
        var module_id = self.module_id

        $$.ajax({
          url:'/adm_company_module/save_module',
          data:{
            title:title,
            company_id:company_id,
            extra:extra,
            module_id:module_id,
          },
          succ:function(data){
            $$.event.pub('CLOSE_DRAWER')
            $$.event.pub('SAVE_CUSS')
          },

          fail:function(msg){
            alert(msg)
          }
        })
      }

    },
	})
</script>