<?php
require_once \view('adm_inc__header');
require_once \view('vue_ask');
require_once \view('vue_page');
?>

    <div v-cloak  id="v_adm_ask__ls" style="background:#FFF;width:100%;height:100%">
      <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-18">
          <div class="example-case">
              <a name="top"><h1>问答管理</h1></a><br/>
                <div>
  
                  <div class="ivu-table-header">
                    <table>
                      <thead>
                        <tr>
                          <th style="width:50%;">
                                <i-input icon="android-search" placeholder="请输入员工id" style="width:100%;" :value.sync="search" ></i-input>
                          </th>
                          <th style="width:50%;">
                            
                          </th>
                        </tr>
                      </thead>
                    </table>
                  </div>

                  <br />
                  
                  <v_user__ask_list 
                    v-bind:func_loaded_="func_loaded"
                    v-bind:url_="url"
                    col_config_="asks"
                  >
                  </v_user__ask_list>
                  
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
        <div class="example-split" style="left:75%"></div>
        <div class="example-demo ivu-col ivu-col-span-6 ivu-col-split-right">
          <div class="example-case">
              <h1>功能简介</h1>
          </div>
        </div>
      </div>
    </div>


  <script>
    var url = '/adm_comment/aj_ask_ls?'
  	$$.vue({
  		el:'#v_adm_ask__ls',
  		data:function(){
  			return {
          url:null,
          loading:false,

          page:1,
          count:0,
  				length:10,
          // 问答的类型是 3 
          type:'<?=$__type?>',
          search: '',
  			}
  		},

      _init: function() {
        this.resetUrl()
      },

      methods: {

        resetUrl: function(){
          this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search+'&type='+this.type
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

<?php
include \view('adm_inc__footer');
