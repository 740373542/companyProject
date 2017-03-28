<?php
  require \view("adm_inc__header");
?>

<div v-cloak id="v_member_course_process_list">

  <div class="example ivu-row">
    <div class="example-demo ivu-col ivu-col-span-17">
      <div class="example-case">
          <a name="top"><h1>学习进度</h1></a><br/>

          <div class="ivu-table-header">
            <table width="100%">
              <thead >
                <tr>
                  <th style="width:50%;">
                        <i-input icon="android-search" placeholder="请输入员工姓名" style="width:100%;" :value.sync="key" ></i-input>
                  </th>

                  <th style="width:50%;">
                    
                  </th>
                </tr>
              </thead>
            </table>
          </div>

          <br>

          <i-table border :content="self" :columns="columns" :data="ls"></i-table>

          
          

          <div class="ivu-table-tip" v-if="loading">
            <table cellspacing="0" cellpadding="0" border="0">
              <tbody>
                <tr >
                  <td >
                    <i-col class="demo-spin-col" span="50">
                        <Spin fix>
                            <div class="loader">
                                <svg class="circular" viewBox="25 25 50 50">
                                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10" v-pre></circle>
                                </svg>
                            </div>
                        </Spin>
                    </i-col>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div  v-if=" ls == '' && !loading" style="text-align:center"><h3>暂无筛选结果</h3></div>

          <br/>

          <Page :total="count"  @on-change="chengePage" :page-size="length"></Page>
      </div>
    </div>
  </div>

  
</div>

<script type="text/javascript">
  $$.vue({
    el:"#v_member_course_process_list",

    data:function(){
      return {
        self: this,

        ls:[],

        loading:1,

        page:1,
        length:10,
        count:0,
        key:'',

        empty:'',
        url:'/adm_member/aj_member_course_process_ls?',

        columns:[
       

          {title:'姓名',key:'member_name',width:180,
            render(row, column, index){
              return `
                 <Icon type="person"></Icon> <strong>${row.member_name}</strong>
               `
            },
          },

          {title:'进度',key:'process',align:'center',
            render:function(row, column, index){
              return `
                 <div>${row.course_name}</div>
                 <Progress :percent=${row.process}></Progress>

              `
            }
          },

        ],

      }
    },

    _init:function(){
      var self = this 
        setTimeout(function(){
          self.loading = false
          self.resetUrl()
        })
        
    },

    methods:{
      resetUrl:function(){
        var self = this 
        self.url = '/adm_member/aj_member_course_process_ls?'
        self.url = self.url + '&page='+self.page + '&length='+self.length + '&key=' +self.key
        self.loadData()
      },

      loadData:function(){
        var self = this 
        self.loading = true
        self.ls = []
        var page = self.page
        var length = self.length
        $$.ajax({
          url:self.url,
          succ:function(data){
            self.setState({
              loading:false,
              ls:data.ls,
              page:data.page,
              length:data.length,
              count:data.count,
            })

          },
          fail:function(msg){
            alert(msg)
          },
        })

      },

      chengePage:function(page){
        var self = this
        self.page = page
        self.resetUrl()
      },
    },
    

    watch:{
      key:function(){
        var self = this 
        self.page = 1
        self.resetUrl()
      },
    },

  })
</script>


<!-- <template>
    <Progress :percent="45" status="active"></Progress>
    <Progress :percent="65" status="wrong"></Progress>
    <Progress :percent="100"></Progress>
    <Progress :percent="25" hide-info></Progress>
</template> -->
<!-- 
  // columns7: [
  //     {
  //         title: '姓名',
  //         key: 'name',
  //         render (row, column, index) {
  //             return `<Icon type="person"></Icon> <strong>${row.name}</strong>`;
  //         }
  //     },
  //     {
  //         title: '年龄',
  //         key: 'age'
  //     },
  //     {
  //         title: '地址',
  //         key: 'address'
  //     },
  //     {
  //         title: '操作',
  //         key: 'action',
  //         width: 150,
  //         align: 'center',
  //         render (row, column, index) {
  //             return `<i-button type="primary" size="small" @click="show(${index})">查看</i-button> <i-button type="error" size="small" @click="remove(${index})">删除</i-button>`;
  //         }
  //     }
  // ],

methods: {
show (index) {
  this.$Modal.info({
      title: '用户信息',
      content: `姓名：${this.data6[index].name}<br>年龄：${this.data6[index].age}<br>地址：${this.data6[index].address}`
  })
},
remove (index) {
  this.data6.splice(index, 1);
}
} -->
