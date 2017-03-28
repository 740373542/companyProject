<?php
include \view('vue_loadData');
?>

<template id="v_role_perssion">
  <h1>{{task_name}}</h1>

  <br/>

  <div class="ivu-table-header" style="margin-top:2px">
    <table style="width:100%">
      <thead>
        <tr>
          <th style="width:40%;">
                <i-input icon="android-search" placeholder="请输入部门名称" style="width:100%;" :value.sync="key" ></i-input>
          </th>
          <th style="width:60%;">
            
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
                <tr>
                  <th style="width:30%" v-if="task_id != null">
                    <div class="ivu-table-cell">

                          <!-- <Checkbox :checked.sync="single"></Checkbox> -->
                          分配
                    </div>
                  </th>

                  <th class="ivu-table-column-center" style="width:70%">
                    <div class="ivu-table-cell">部门名称</div></th>
               
                </tr>
              </thead>
            </table>
          </div>
          <div class="ivu-table-body">
            <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">

           

              <tbody class="ivu-table-tbody">
                <tr class="ivu-table-row" v-for="(idx,v) in search_result" >
                  <td  v-if="task_id != null" style="width:30%" @click="(user_ids[v.id] != v.id)?addRolePermission(v.id):removeRolePermission(v.id)">
                    <div class="ivu-table-cell" >
                        <Checkbox :checked.sync="showRemove(v.id)"></Checkbox>
                    </div>
                  </td>

                  <td class="ivu-table-column-center" v-bind:class="showRemove(v.id)? 'demo-table-info-cell-name' : '' " style="width:70%"
                   >
                    <div class="ivu-table-cell">{{v.title}}</div>
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
    </article>
  </div>

  <div class="ivu-table-cell">
  
</div>

</template>



 <script>
 	$$.comp('v_role_perssion',$$.vCopy( _vue_loadData() ,{
 		el:'#v_role_perssion',
 		EVENT:['SELECT_TASK_TYPE','DEL_TASK_SUCC','ADD_TASK_SUCC'],
 		data: function(){
 				return {
 					ls_data: [],
 					loading: false,
 					key: null,
 					search_result: [],
					task_id: null,
          user_ids: null,
          task_name: '公司部门',
 				}
 			},


 		methods:{

      hd_ADD_TASK_SUCC:function(){
        var self = this
        self.setState({
          task_id:null,
          task_name:'公司部门',
        })
      },

      hd_DEL_TASK_SUCC:function(){
        var self = this 
        self.user_ids = null
        self.task_id = null
      },

 			hd_SELECT_TASK_TYPE:function(v){
 				var self = this
 				self.task_id = v.data.id
        self.task_name = v.data.title
        self.loadData()

        $$.ajax({
          url:'/adm_company_task_permission/get_role_permission',
          data:{
            task_id:self.task_id,
          },
          succ:function(data){
            self.user_ids = data.ls
          }
        })
 			},


      // 判断所选的任务，部门是否拥有权限
      showAdd:function(role_id){
        var self = this
        if(self.user_ids && !self.user_ids[role_id+'']){
          return true;
        }
        return false;
      },

      showRemove:function(role_id){
        var self = this
        if(self.user_ids && self.user_ids[role_id+'']){
          return true;
        }
        return false;
      },


 			addRolePermission:function(role_id){
 				var self = this
 				$$.ajax({	
 					url:'/adm_company_task_permission/add_role_permission', 
 					data:{
 						task_id:self.task_id,
 						role_id:role_id,
 					},
 					succ:function(data){
            self.user_ids[role_id+''] = role_id 
            self.setState({
              user_ids : self.user_ids
            })
          }
 				})
 			},

 			removeRolePermission:function(role_id){

 				var self = this
 				$$.ajax({	
 					url:'/adm_company_task_permission/remove_role_permission',
 					data:{
            task_id:self.task_id,
            role_id:role_id,
 					},
 					succ:function(data){
            delete self.user_ids[role_id+'']
            self.setState({
              user_ids : self.user_ids
            })
 					}
 				})
 			},



    		search: function(){
    				var self = this
    				var count = 0
    				self.search_result = []
    				var _key = self.key
    				if(!_key) _key = ''
          if(_key=='  ') _key = ''
    				var _data = self.ls_data
    				for(var i in _data){
    					var v = _data[i]
    					var _text = ''
    					if(v.name) _text = v.name
    					if(v.title) _text = v.title
    					if(v.creat_at) _text = v.creat_at
    					var py =''
    					py = v.py+""+_text
    					if(py.indexOf(_key)>=0){
    						self.search_result.push({
    							title: _text,
    							id:v.id,
    						})
    						count ++
    					}
    				}
    		},


 		},

 	}))
 </script>

 <style type="text/css">
  .member_list_td_on{
    background: #33CC66;
    color: #FFF;
  }


  .ivu-table .demo-table-info-cell-name {
        background-color: #2db7f5;
        color: #fff;
  }
</style>



