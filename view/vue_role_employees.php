<?php
include \view('vue_loadData');
?>
<template id="v_member_list">
    <h1>{{role_name}}</h1>
    <br />



    <i-button icon="close-circled" v-if="ls_data !='' " style='margin: 2px 4px 5px 0' type="primary"  v-for=" (idx,v) in ls_data" @click="removeMemberRole(v.id)">{{v.real_name}}
    </i-button>

    

    <div class="ivu-table-tip" v-if="ls_data == '' && role_id !='' && !loading">
      <table cellspacing="0" cellpadding="0" border="0">
        <tbody>
          <tr>
            <td style="font-size:16px;text-align:left">无筛选结果，请搜索添加</td></tr>
        </tbody>
      </table>
    </div>

    <br/>

    <i-input  v-if="role_id" placeholder="请输入员工名称" icon="search" size="large" style="width:90%;" :value.sync="key" @on-click="searchMember" @on-enter="searchMember">
    </i-input>
    <br>
    <br>

    <i-button icon="plus-circled" style='margin: 2px 4px 2px 0' type="warning"  v-for=" (idx,v) in un_member" @click="addMemberRole(v.id)">{{v.real_name}}
    </i-button>


</template>

 <script>
 	$$.comp('v_member_list',$$.vCopy( _vue_loadData() ,{
 		el:'#v_member_list',
 		EVENT:['SELECT_COMPANY_ROLE','DELETE_COMPANY_ROLE'],
 		data: function(){
 				return {
 					ls_data: [],
 					loading: false,
          selected: null,
 					key:null,
 					search_result:[],
					role_id:'',
          member_ids:null,
          un_member:[],
          role_name:'请选择部门'
 				}
 			},


 		methods:{


      searchMember:function(){
        var self = this
        $$.ajax({ 
          url:'/adm_company_role/search_member', 
          data:{
            name:self.key,
          },
          succ:function(data){
            self.un_member = data.ls
          },
          fail:function(msg){
            alert(msg)
          },
        })
      },

      freshData:function() {
        var self = this
        $$.ajax({
          url:'/adm_company_role/role_members',
          data:{
            role_id:self.role_id,
          },
          succ:function(data){
            self.ls_data = data.ls
            console.dir('#####'+self.ls_data)
          }
        })
      },

 			hd_SELECT_COMPANY_ROLE:function(v){
 				var self = this
 				self.role_id = v.data.id
        self.role_name = v.data.title
 				self.should_reload_ = $$.getTime();
        self.loading = true
        $$.ajax({
          url:'/adm_company_role/role_members',
          data:{
            role_id:self.role_id,
          },
          succ:function(data){
            self.ls_data = data.ls
            self.loading = false
          }
        })
 			},

      hd_DELETE_COMPANY_ROLE:function(v){
        var self = this
        self.should_reload_ = $$.getTime();
        self.loading = true
        self.setState({
          role_id:'',
          ls_data: '',            
          role_name: '请选择部门',            
        });
        self.loading = false
      },



 			addMemberRole:function(member_id,idx){
 				var self = this
        $$
          .then(
            $$.wait({
                method:'get',
                url:'/adm_company_role/set_member_role',
                data:{
                  member_id:member_id,
                  role_id:self.role_id,
                },
                succ: function(data,cont){
                  cont(null)
                },
                fail:function(msg,cont){
                  alert(msg)
                  cont(null)
                },
              })
            )
          .then(function(cont){
              self.freshData()
          })
 			},

 			removeMemberRole:function(member_id,idx){
        // alert('00')
 				var self = this
 				$$.ajax({	
 					url:'/adm_company_role/remove_member_role',
 					data:{
 						member_id:member_id,
 						role_id:self.role_id,
 					},
 					succ:function(data){
            delete self.ls_data[member_id+'']
            self.setState({
              ls_data : self.ls_data
            })
 					},
 				})
 			},

      show:function(member_id){
        var self = this
        if(self.member_ids[member_id+''] == member_id){
          return true
        }
        return false
      },


 		},

 	}))
 </script>


<style type="text/css">
  .member_list_td_on{
    background: #33CC66;
    color: #FFF;
  }

/*  .member_list_td_off{
    background: #FF3333;
    color: #FFF;
  }*/
</style>