 <script type="text/javascript">
 	var _vue_loadData = function(){
 		return {
 			el:'',
 			props:['event_key_','should_reload_','url_','extra_data_','input_date','input_info'],
 			props_watch:['should_reload_','url_'],
 			data: function(){
 				return {
 					ls: [],
 					loading: false,
 					role_name:'',
 					button_loading:false,
          id_current:'',
 				}
 			},

 			_init: function(){
 				var self = this
 				self.loadData()
 			},

 			_change: function(){
 				var self = this
 				self.loadData()
 			},

 			methods: {
 				loadData: function(){
		      var self = this
		      self.loading = true
		      self.ls = []
		      $$
		        .then(
		        	$$.wait({
		            url: self.url_,
		            succ: function(data, cont){
		              self.ls = data.ls
                  // alert($$.js2str(self.ls))
		              cont(null)
		            },
		          })
		        )
		          
		        .then(function(cont){
		          self.loading = false
		        })
	   		},


 				clickItem:function(event,item){
 					var self = this
 					$$.event.pub(event,{
 						item:item,
 					})
 					self.selected = item.id
 				},



 				clickOff:function(event){
 					var self = this
 					$$.event.pub(event)
 					self.selected = null
 				},



 				clickInput: function(event){
 					var self = this
 					var detail ={}
 					detail[self.input_date] = $('#'+self.input_date).val()
 					detail[self.input_info] = $('#'+self.input_info).val()
 					$$.event.pub(event,{
 						item:detail,
 					})
 				},


 				saveData: function(url){
					var self = this
					self.button_loading = true
					$$
						.then(
							$$.wait({
								method:'get',
								url:url,
								succ: function(data,cont){
                  self.role_name = ''
									cont(null)
								},
								fail: function(msg){
									alert(msg)
									self.button_loading = false
                  self.role_name = ''
								},
							})
						)
						.then(function(cont){
							self.should_reload_ = $$.getTime()
							self.button_loading = false
							self.Notice()

						})
				},

				Notice:function(){
					this.$Notice.config({
				    	top: 60,
				    	duration:1,
					});
	      	this.$Notice.success({
	      			title:'操作成功!',
	      	});
				}

 			},
 		}
 	}
 </script>

 <template id="v_company_role_list">
  <div class="ivu-table-header">
    <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">

      <thead>
        <tr>
          <th style="width:50%;">
              <i-input  placeholder="名称" size="large"  :value.sync="role_name" ></i-input>
          </th>

          <th style="width:50%;">
            <div >
              <i-button type="primary" :loading="button_loading" icon="plus-round"
              style="font-size:16px;font-weight:bold;box-shadow:0 0 7px #999;"

              @click="saveData('/adm_company_role/create_role?title='+role_name)">
                  <span v-if="!button_loading">添加部门或角色</span>
                  <span v-else>执行中</span>
              </i-button>
            </div>
          </th>
        </tr>
      </thead>
    </table>
  </div>
  <br/>

   <div class="ivu-article">
    <article>
      <div class="ivu-table-wrapper">
        <div class="ivu-table ivu-table-border">
          <div class="ivu-table-header">
            <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
              <thead>
                <tr >
                  <th style="width:40%;">
                    <div class="ivu-table-cell">部门或角色名称</div>
                  </th style="width:60%;">
                  <th>
                    <div class="ivu-table-cell">操作</div>
                  </th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="ivu-table-body">
              <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
                <tbody>
                  <tr class="ivu-table-row" v-for="(idx,v) in ls">
                    <td style="width:40%;">
                      <div class="ivu-table-cell">{{v.title}}</div>
                    </td>
                    <td class="ivu-table-column-center" style="width:60%;">
                      <div >
                        <i-button v-bind:id="v.id+'role'" type="primary" icon="ios-checkmark" @click="selectCompanyRole(v)">选择</i-button>
                        <i-button type="error" icon="ios-close" @click="deleteRole(v)">删除</i-button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            
            <div class="ivu-table-tip" v-if="loading">
              <table cellspacing="0" cellpadding="0" border="0">
                <tbody>
                  <tr >
                    <td >
                      <i-col class="demo-spin-col" span="50">
                          <Spin fix>
                              <div class="loader">
                                  <svg class="circular" viewBox="25 25 50 50">
                                      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10" v-pre>
                                  </svg>
                              </div>
                          </Spin>
                      </i-col>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>


            <div class="ivu-table-tip" v-if="ls == '' && !loading">
              <table cellspacing="0" cellpadding="0" border="0">
                <tbody>
                  <tr>
                    <td>暂无筛选结果</td></tr>
                </tbody>
              </table>
            </div>


          </div>
        </div>
      <article>
    </div>
 </template>


 <script>
 	$$.comp('v_company_role_list',$$.vCopy( _vue_loadData() ,{
 		el:'#v_company_role_list',
 		methods:{
 			selectCompanyRole:function(v){
        var self = this
        $('#'+self.id_current+'role').removeAttr('disabled')
        self.id_current = v.id
        $('#'+v.id+'role').attr('disabled','true')
 				$$.event.pub('SELECT_COMPANY_ROLE',{
 					data:v,
 				});
 			},

      deleteRole: function(v){
          var self = this
          self.button_loading = true
          $$
            .then(
              $$.wait({
                method:'get',
                url:'/adm_company_role/remove_role',
                data:{
                  id:v.id
                },
                succ: function(data,cont){
                  self.role_name = ''
                  $$.event.pub('DELETE_COMPANY_ROLE',{
                    data:v,
                  });
                  cont(null)
                },
                fail: function(msg){
                  alert(msg)
                  self.button_loading = false
                  self.role_name = ''
                },
              })
            )
            .then(function(cont){
              self.should_reload_ = $$.getTime()
              self.button_loading = false
              self.Notice()
            })
      },
 		}
 	}))
 </script>



 <style>
 	.add_option_button{
 		background:#33CC66;
 		padding:5px 20px;
 		border-radius:5px;
 		color:#FFF;
 		margin-left:30px;
 		cursor:pointer;
 	}

 	.del_option_button{
 		background:#FF3333;
 		padding:5px 20px;
 		border-radius:5px;
 		color:#FFF;
 		margin-left:10px;
 		cursor:pointer;
 	}
 </style>
