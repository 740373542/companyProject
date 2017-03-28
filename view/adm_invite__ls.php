<?php
include \view('adm_inc__header');
include \view('vue_comm_table');
include \view('vue_page');
?>

<Icon type="ios-personadd"></Icon>


<!-- 邀请模板 -->
<template id="v_p__invite_list">
    <div style="text-align:center">
      <i-button type="primary" v-if="v.type==0"  @click="selectType(v,1,idx)" icon="ios-checkmark">批准</i-button>

      <i-button type="primary" v-if="v.type==1"  @click="selectRole(v.id)" size="small">分组</i-button>

      <i-button type="error" v-if="v.type==1"  @click="selectType(v,0,idx)" size="small">移除</i-button>


      <i-button type="success"v-if="v.type==2" icon="ios-personadd">管理员</i-button>

    </div>
</template>


<script type="text/javascript">
$$.part('v_p__invite_list', $('#v_p__invite_list').html())


$$.comp('v_user__invite_list', $$.vCopy(__v__common_table(),{
  el: '#__v__common_table',

  _setup: function(){
    this.manage_ = 'v_p__invite_list'
  },

  methods: {
    selectType: function(user,type,idx){
        var self = this
        $$.ajax({
          method:'post',
          url:'/adm_invite/aj_settype',
          data:{
            id:user.id,
            type:type,
          },
          succ:function(data){
            self.ls[idx].type = type
            self.setState({
              ls: self.ls,
            })
            self.Notice(type)
          }
        })

    },

    selectRole:function(member_id){
      // alert(member_id)
      $('#Id_Right_Drawer_Content').html('加载中')

          $$.event.pub('OPEN_DRAWER',{width:600})
          $.get('/adm_member/assign_role?member_id='+member_id,function(res){
            $('#Id_Right_Drawer_Content').html(res)
          })
    },


     Notice:function(type){
        if(type == 1){
          this.$Message.success('员工已被批准');
        }

        if(type == 0){
          this.$Message.error('员工已被拒绝');
        }
     }, 
  },

}))
</script>

  <div v-cloak  id="v_adm_invite__ls" style="background:#FFF;width:100%;height:100%">

      <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-17">
          <div class="example-case">
              <a name="top"><h1>员工审核</h1></a><br/>
                <div>
  
                  <div class="ivu-table-header">
                    <table>
                      <thead>
                        <tr>
                          <th style="width:50%;">
                                <i-input icon="android-search" placeholder="请输入员工昵称" style="width:100%;" :value.sync="search" ></i-input>
                          </th>
                          <th style="width:50%;">
                            
                          </th>
                        </tr>
                      </thead>
                    </table>
                  </div>

                  <br />
                  
                  <v_user__invite_list 
                  v-bind:func_loaded_="func_loaded"
                  v-bind:url_="url"
                  col_config_="user"
                  img_="person"
                  img_text_="real_name"
                  >
                  </v_user__invite_list>
                  
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
        <!--v-component-->
          <div class="example-split" style="left:71%"></div>
          <div class="example-demo ivu-col ivu-col-span-7 ivu-col-split-right">
            <div class="example-case">
                <h1>提示</h1>
                <br/>
                <br/>

                <Card dis-hover>
                    <p slot="title">功能简介  </p>
                    <p><b>真实姓名：</b>员工帐号注册时所填的真实姓名；</p>

                    <p><b>邮箱：</b>员工帐号注册时所填的邮箱信息；</p>
                    <p><b>手机：</b>员工帐号注册时所填的手机号码（员工帐号登陆用户名）；</p>
                    <p><b>批准/拒绝：</b>批准按钮可以把申请加入公司的员工帐号变为公司成员，拒绝按钮可以把公司现有员工移除出公司；</p>
                    <br/>
    <!-- ① ② ③ ④ ⑤ ⑥ ⑦ ⑧ ⑨ ⑩ -->

                     <p style="font-size:14px;color:#e96900;"><Icon type="alert-circled" size="16"></Icon>
                        功能注意事项:
                     </p>
                     <br/>
                      <p><span style="font-size:16px">①: </span>搜索输入框要输入员工昵称的关键字或者准确的员工昵称</p>
                      <p><span style="font-size:16px">②: </span>如果操作列现实管理员按钮表示当前一行信息为管理员信息，无法操作批准和拒绝</p>
                      <p><span style="font-size:16px">③: </span>如果当前操作列按钮显示为批准，表示该员工未通过审核，点击批准可以使其通过审核加入公司；如果当前操作列按钮显示为拒绝，表示为当前员工是公司已有员工，点击拒绝可以将所选员工移除出公司</p>

                </Card>
            </div>
          </div>
      </div>


  </div>


  <script>
    var url = '/adm_invite/aj_ls?'
  	$$.vue({
  		el:'#v_adm_invite__ls',
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
