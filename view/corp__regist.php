<?php
include \view('inc_home_header');
// print_r($_SESSION['edu_user']);
?>


<div>
    <div v-cloak- id="v_nav" class="weui_tab" style="">
      <div v-if="!complete" style="padding-top:0px;">


        <div class="panel_15_55">
          <div class="weui_cells weui_cells_form">

              <div class="weui_cell weui_cell">
                  <div class="weui_cell_hd"><label for="" class="weui_label">企业名称</label></div>
                  <div class="weui_cell_bd weui_cell_primary">
                      <input id="input_phone_login" v-model="company_name" class="weui_input" placeholder="请输入企业名称">
                  </div>
              </div>

              <div class="weui_cell weui_cell">
                  <div class="weui_cell_hd"><label for="" class="weui_label">负责人</label></div>
                  <div class="weui_cell_bd weui_cell_primary">
                      <input id="input_phone_login" v-model="company_manager" class="weui_input" placeholder="<?=$_SESSION['edu_user']['real_name']?>" value="<?=$_SESSION['edu_user']['real_name']?>" >
                  </div>
              </div>

              <div class="weui_cell weui_cell">
                  <div class="weui_cell_hd"><label for="" class="weui_label">手机号码</label></div>
                  <div class="weui_cell_bd weui_cell_primary">
                      <input id="input_phone_login" v-model="manager_phone" class="weui_input" placeholder="<?=$_SESSION['edu_user']['phone']?>" value="<?=$_SESSION['edu_user']['phone']?>" >
                  </div>
              </div>

              <div class="weui_cell weui_cell">
                  <div class="weui_cell_hd"><label for="" class="weui_label">密码</div>
                  <div class="weui_cell_bd weui_cell_primary">
                      <input id="input_password_login" v-model="password" class="weui_input" type="password" placeholder="请输入密码">
                  </div>
              </div>

              <div class="weui_cell weui_cell">
                  <div class="weui_cell_hd"><label for="" class="weui_label">确认密码</div>
                  <div class="weui_cell_bd weui_cell_primary">
                      <input id="input_password_login" v-model="password2" class="weui_input" type="password" placeholder="请再次输入密码">
                  </div>
              </div>

          </div>

          <div class="weui_btn_area">
              <a @click="doRegist" class="weui_btn weui_btn_primary" href="javascript:void(0);">企业注册</a>
          </div>
        </div>
         <!-- bg-orange -->


      </div>




      <div v-if="complete" style="padding-top:0px;">
        
        <div id="v_main" class="weui_msg">
            <div class="weui_icon_area"><i class="weui_icon_msg weui_icon_info"></i></div>

              <div class="weui_text_area">
                  <h2 class="weui_msg_title">注册完成，部分功能审核通过后开通</h2>
              </div>

            </div>

        </div>




    </div>

</div>


<script type="text/javascript">


///////////////////  panel-me
$$.data.user = $$.data.user || {}


//////////////////////////////////////////////////////////////////
<?php
$tab = 'login';
if(!empty($_GET['tab'])){$tab = $_GET['tab'];}
?>
var v_nav = $$.vue({
  el: '#v_nav',
  data: {
    complete: false,
  },
  EVENT: ['CHANGE_TAB'],
  watch: {
    'selected': function(val){
      // alert(val)
      $$.event.pub('CHANGE_TAB',val)
    }
  },
  methods: {
    hd_CHANGE_TAB: function(tab){
      // alert(tab+'2')
    },

    doRegist:function() {
      var self = this
      $$.ajax({
        url: '/corp/aj_regist',
        data: {
          company_name: this.company_name,
          company_manager: this.company_manager,
          manager_phone: this.manager_phone,
          password: this.password,
        },
        succ: function(data){
          // call_native('event',{
          //   event_name: 'LOGIN_SUCCESS',
          //   user:'ok',
          // })
          self.complete = true
          alert('申请成功，我们的工作人员会联系您')
          // alert('注册完成，请等待审核')
        },
        fail: function(msg,code){
          alert($$.js2str(msg))
        },

      })
    },

  }
});

</script>


<?php
include \view('inc_home_footer');
?>