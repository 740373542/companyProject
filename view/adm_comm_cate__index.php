<?php
include \view('adm_inc__header');
include \view('vue_comm_table');
include \view('vue_page');
?>

<template id="v_p__comm_cate">
    <i-button type="error" @click="delete_item(v.id)">删除</i-button>
</template>

<script type="text/javascript">
$$.part('v_p__comm_cate', $('#v_p__comm_cate').html())
$$.comp('v_comm_cate__ls', $$.vCopy(__v__common_table(),{
  el: '#__v__common_table',
  EVENT:['SAVE_NAME_SUCC'],
  _setup: function(){
    this.manage_ = 'v_p__comm_cate'
  },
  methods: {
    delete_item:function(){

    },
  },
}))
</script>

  <div id="v_adm_comm_cate__ls" >
          
    <div class="example ivu-row">
      <div class="example-demo ivu-col ivu-col-span-24">
        <div class="example-case">


          <h1>项目列表</h1>
          <br/>
          <div class="ivu-table-header">
            <table width="100%">
              <thead>
                <tr>

                  <th style="width:50%;text-align:left">

                    <i-input icon="android-search" placeholder="请输入项目名称" style="width:50%;" :value.sync="search" ></i-input>

                    <i-select :model.sync="select_company" placeholder="选择公司名称" style="width:200px">
                        <i-option v-for="item in companys" :value="item.name" @click="selectCompany(item.id)" >{{ item.name }}</i-option>
                    </i-select>
                  </th>

                  <th style="width:50%;text-align:right">
                    <i-button type="primary" @click="add()">添加板块</i-button>
                  </th>

                </tr>
              </thead>
            </table>
          </div>


          <div class="box" >
            <div class="box-header">
              <div class="box-tools" style="
              margin-right:1300px;margin-top:5px">
              </div>
            </div>
            <div v-if="loading"><i class="fa zfa-refresh fa-spin"></i>Loading....</div>
            <div class="box-body table-responsive no-padding">
              <v_comm_cate__ls 
                v-bind:func_loaded_="func_loaded"
                v-bind:url_="url"
                col_config_="bankuai"
              >
              </v_comm_cate__ls>
            </div>
          </div>
          <br />

          <v_page 
            v-bind:count_="count"
            v-bind:length_="length"
            v-bind:page_="page"
            v-bind:func_pagechanged_="func_pagechanged"
          >
          </v_page>

        </div>
      </div>
    </div>
  </div>
  <script>
  
    var url = "/adm_comm_cate/get_comm_cate_list?type=<?=$__type?>"
    $$.vue({
      el:'#v_adm_comm_cate__ls',

      data:function(){
        return {
          url:null,
          loading:false,
          page:1,
          count:0,
          length:10,
          search: '',
          select_company:'',
          companys:[],
          company_id:'',
        }
      },

      _init: function() {
        this.resetUrl()
        this.loadCompany()
      },

      methods: {

        selectCompany:function(id){
          var self = this 
          self.company_id = id
        },

        // 添加模块
        add:function(){
          $('#Id_Right_Drawer_Content').html('加载中')
          $$.event.pub('OPEN_DRAWER',{width:500})
          $.get('/adm_comm_cate/add?type=<?=$__type?>',function(res){
            $('#Id_Right_Drawer_Content').html(res)
          })
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


        resetUrl: function(){
          this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search+'&company_id='+this.company_id
        },

        func_loaded: function(data){
          this.count = data.count
        },

        func_pagechanged: function(idx){
          this.page = idx
          this.resetUrl()
        },
      },

      watch: {
        search: function(val){
          this.page = 1
          this.resetUrl()
        },
        company_id:function(val){
          this.page = 1
          this.resetUrl()
        },
      }
    })
  </script>

<?php
include \view('adm_inc__footer');
