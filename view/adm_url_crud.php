<?php
include \view('adm_inc__header');
include \view('vue_comm_table');
include \view('vue_page');
?>
<!-- 引入Vue -->
<script src="//v1.vuejs.org/js/vue.min.js"></script>
<!-- 引入样式 -->
<link rel="stylesheet" href="//unpkg.com/iview/dist/styles/iview.css">
<!-- 引入组件库 -->
<script src="//unpkg.com/iview/dist/iview.min.js"></script>
<!-- 邀请模板 -->
<template id="v_p__url_list">
    <i-button type="info" @click="modify(v.id)">修改</i-button>
    <i-button type="error" @click="remove(v.id)">删除</i-button>
</template>


<script type="text/javascript">


$$.part('v_p__url_list', $('#v_p__url_list').html())


$$.comp('v_url__operation_lh', $$.vCopy(__v__common_table(),{
  el: '#__v__common_table',
  EVENT: ['ADD_URL_SUCC'],
  _setup: function(){
    this.manage_ = 'v_p__url_list'
  },

  methods: {
    hd_ADD_URL_SUCC: function(){
      this.loadData()
    },
    remove: function(id){
        var self = this
        $$.ajax({
          url:'/adm_url_crud/aj_deleteurl?id='+id,
          succ:function(data){
            // self.ls[idx].type = type
            // self.setState({
            //   ls: self.ls,
            // })
          self.loadData()
          }
        })

    },
    modify: function(id){
          $('#Id_Right_Drawer_Content').html('加载中')

          $$.event.pub('OPEN_DRAWER',{width:600})
          $.get('/adm_url_crud/check?id='+id,function(res){
            $('#Id_Right_Drawer_Content').html(res)
          })
    },
  },

}))
</script>






  <div v-cloak  id="v_adm_url__ls" style="background:#FFF;width:100%;height:100%">
      <div class="box" >
        <div class="box-header">
          <h3 class="box-title" style="font-size:25px;font-weight:bold;color:#000000">xxx
          </h3>
          <div class="box-tools pull-right">
            <div class="has-feedback">
              <input type="text" class="form-control input-sm" placeholder="" v-model="search">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
          </div>
            <span class="del_option_button" @click="save()">添加</span>
          <div class="box-tools" style="
          margin-right:1300px;margin-top:5px">
          </div>
        </div>
        <div v-if="loading"><i class="fa zfa-refresh fa-spin"></i>Loading....</div>
        <div class="box-body table-responsive no-padding">
            <v_url__operation_lh 
              v-bind:func_loaded_="func_loaded"
              v-bind:url_="url"
              col_config_="url_ls"
            >
            </v_url__operation_lh>
        </div>
      </div>
  		<div style="position:relative;left:38%;top:5%">
        <v_page 
          v-bind:count_="count"
          v-bind:length_="length"
          v-bind:page_="page"
          v-bind:func_pagechanged_="func_pagechanged"
        >
        </v_page>
  	  </div>
  </div>
  <script>
    var url = '/adm_url_crud/ls?'
  	$$.vue({
  		el:'#v_adm_url__ls',
  		data:function(){
  			return {
          url:null,
          loading:false,

          page:1,
          count:0,
  				length:10,

          search: '',
  			}
  		},

      _init: function() {
        this.resetUrl()
      },

      methods: {
        save: function(){
          var self = this
           $('#Id_Right_Drawer_Content').html('加载中')

            $$.event.pub('OPEN_DRAWER',{width:600})
            $.get('/adm_url_crud/check',function(res){
              $('#Id_Right_Drawer_Content').html(res)
            })  
        },

        resetUrl: function(){
          this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search
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
      }

  	})
  </script>


  <style type="text/css">
    .add_option_button{
      background:#33CC66;
      padding:5px 20px;
      border-radius:5px;
      color:#FFF;
      /*margin-left:30px;*/
      cursor:pointer;
    }

    .del_option_button{
      background:#FF3333;
      padding:5px 20px;
      border-radius:5px;
      color:#FFF;
      /*margin-left:10px;*/
      cursor:pointer;
    }
  </style>

<?php
include \view('adm_inc__footer');
