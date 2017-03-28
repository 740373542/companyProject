<?php
require_once \view('adm_inc__header');
require_once \view('vue_task');
require_once \view('vue_role_permission');
include \view('vue_page');
?>


<div v-cloak  id="v_task" style="width:100%;background:#FFF;float:right;">

<div class="example ivu-row">
  <div class="example-demo ivu-col ivu-col-span-12">
    <div class="example-case">
        <a name="#top"><h1>任务列表</h1></a>

        <br/>

          <div>

            <div class="ivu-table-header">
              <table style="width:100%">
                <thead>
                  <tr>
                    <th style="width:40%;">
                          <i-input icon="android-search" placeholder="请输入任务名称" style="width:100%;" :value.sync="search" ></i-input>
                    </th>
                    <th style="width:60%;text-align:right;">
                     <!--  <i-button type="success" size="default" icon="ios-plus-outline"  >添加任务</i-button> -->

                      <i-button type="success" :loading="button_loading" icon="plus-round"
                      style="font-size:16px;font-weight:bold;"

                      @click="add_task">添加任务
                       </i-button>

                    </th>
                  </tr>
                </thead>
              </table>
            </div>


            <br />

            <v__tast_list 
              v-bind:func_loaded_="func_loaded"
              v-bind:url_="url"
              col_config_="task"
              img_="android-clipboard"
              img_text_="title"
              buttons_ = "[]"
              v-bind:th_width_="['140','200']"
            >
            </v__tast_list>

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

  <div class="example-split" style="-left:75%"></div>

  <div class="example-demo ivu-col ivu-col-span-12 ivu-col-split-right">
    <div class="example-case">
        <v_role_perssion 
        v-bind:url_="'/adm_company_role/ls'"
        v-bind:should_reload_="should_reload"
        />
    </div>
  </div>
    
</div>
	
</div>




<script>
  var url = '/adm_task/aj_ls?'
	$$.vue({
		el:'#v_task',
    EVENT: ['ADD_TASK_SUCC','SELECT_TASK_TYPE'],

		data:function(){
			return {
        task_name:'',

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
      hd_ADD_TASK_SUCC:function(){
        var self = this 
        self.page = 1
        self.resetUrl()
      },


      hd_SELECT_TASK_TYPE:function(data){
        this.task_name = data.data.title
      },


      add_task: function() {
          $('#Id_Right_Drawer_Content').html('加载中')

          $$.event.pub('OPEN_DRAWER',{width:800})
          $.get('/adm_task/add',function(res){
            $('#Id_Right_Drawer_Content').html(res)
          })
      },


      resetUrl: function(){
        this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search
      },

      func_loaded: function(data){
        this.count = data.count
        window.location.href = "#top"
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


<?php
include \view('adm_inc__footer');