
<div v-cloak id="v_add_comm_cate">


     选择公司:
    <i-select :model.sync="select_company" placeholder="选择公司名称" style="width:350px">
        <i-option v-for="item in companys" :value="item.name" @click="selectCompany(item.id)" >{{ item.name }}</i-option>
    </i-select>
    <br/>
    <br/>
    标题名称:
      <i-input style="width:350px" :value.sync="title" placeholder="请输入标题名称"></i-input>

      <br/>
      <br/>
      <i-button type="primary" @click="save()" >提交</i-button>
</div>





<script type="text/javascript">
      // alert($$.js2str(this.items))

var v_add_comm_cate = $$.vue({
    el: '#v_add_comm_cate',
    data: function(){
        return {
            select_company:'',
            companys:[],
            company_id:'',
            title:'',
        }
    },

    _init: function (){
      this.loadCompany()
    },

    methods: {
      selectCompany:function(id){
        var self = this 
        self.company_id = id
      },

      loadCompany:function(){
        var self = this
        $$.ajax({
          url:'/adm_company/aj_compnay_ls',
          data:{
            length:10000,
          },
          succ:function(data){
            self.companys = data.ls
          },

        })
      },
      // 添加
      save:function(){
        var self = this
        $$.ajax({
          url:'/adm_comm_cate/save_comm_cate',
          data:{
            title:self.title,
            company_id:self.company_id,
            type:'<?=$__type?>',
          },
          succ:function(data){
            $$.event.pub("CLOSE_DRAWER")
          },

        })
      },
    },

})
</script>





