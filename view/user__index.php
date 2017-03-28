<?php
include \view('inc_home_header');
// print_r($_SESSION['edu_user']);

?>


<div>
    <div v-cloak- id="v_nav" class="weui_tab" style="">
      <div class="weui_navbar" >
        <div id="tab_login" v-bind:class="selected=='login'?'tab_on':null" @click="selected='login'" class="weui_navbar_item" style="">
          登录
        </div>
        <div id="tab_login" v-bind:class="selected=='regist'?'tab_on':null" class="weui_navbar_item " @click="selected='regist'" style="">
          注册
        </div>
      </div>

      <div style="padding-top:60px;">


        <div v-if="selected=='login'" id="panel_login" class="panel_15_55">
          <div class="weui_cells weui_cells_form">
              <div class="weui_cell weui_cell">
                  <div class="weui_cell_hd"><label for="" class="weui_label">手机号码</label></div>
                  <div class="weui_cell_bd weui_cell_primary">
                      <input id="input_phone_login" v-model="phone" class="weui_input" placeholder="请输入手机号">
                  </div>
              </div>
              <div class="weui_cell weui_cell">
                  <div class="weui_cell_hd"><label for="" class="weui_label">密码</div>
                  <div class="weui_cell_bd weui_cell_primary">
                      <input id="input_password_login" v-model="password" class="weui_input" type="password" placeholder="请输入密码">
                  </div>
              </div>
          </div>

          <div class="weui_btn_area">
              <a @click="doLogin" class="weui_btn weui_btn_primary" href="javascript:void(0);">登录</a>
          </div>
        </div>
        


        <div v-if="selected=='regist'" id="panel_login" class="panel_15_55">
          <div class="weui_cells weui_cells_form">
              <div class="weui_cell weui_cell">
                  <div class="weui_cell_hd"><label for="" class="weui_label">手机号码</label></div>
                  <div class="weui_cell_bd weui_cell_primary">
                      <input id="input_phone_login" v-model="phone" class="weui_input" placeholder="请输入手机号">
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
              <a @click="doRegist" class="weui_btn weui_btn_primary" href="javascript:void(0);">注册</a>
          </div>
<!-- 
          <div class="weui_btn_area">
              <a @click="doCorpRegist" class="weui_btn weui_btn_primary  bg-orange" href="javascript:void(0);">企业注册</a>
          </div>
 -->
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
    selected: '<?=$tab?>',
    phone: '',
    password: '',
    is_corp: 0,
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

    doLogin:function() {
      if(!this.phone){
        alert('请输入手机号码')
        return 
      }

      if(!this.password){
        alert('请输入密码')
        return 
      }
      
      $$.ajax({
        url: '/user/aj_login',
        data: {
          phone: this.phone,
          password: this.password,
        },
        succ: function(data){
          // alert('登录成功')
          call_native('event',{
            event_name: 'LOGIN_SUCCESS',
            user:'ok',
          })
        },
        fail: function(msg,code){
          alert('登录失败 '+$$.js2str(msg))
        },

      })
    },

    doRegist:function() {

      if(!this.phone){
        alert('请输入手机号码')
        return 
      }

      if(!this.password){
        alert('请输入密码')
        return 
      }

      if(this.password2 != this.password){
        alert('两次输入的密码不一致')
        return 
      }

      $$.ajax({
        url: '/user/aj_regist',
        data: {
          phone: this.phone,
          password: this.password,
        },
        succ: function(data){
          call_native('event',{
            event_name: 'LOGIN_SUCCESS',
            user:'ok',
          })
        },
        fail: function(msg,code){
          alert($$.js2str(msg))
        },

      })
    },

    doCorpRegist: function(){
      call_native('open_nav',{
        url: '/corp/regist',
        title: '企业注册',
        user:'ok',
      })
    },


  }
});

window.setTimeout(function(){
  // call_native('event',{
  //   event_name: 'LOGIN_SUCCESS',
  //   a:'a',
  // })
},2000)

</script>



<!-- 

<div class="weui_msg">
    <div class="weui_icon_area"><i class="weui_icon_msg weui_icon_warn"></i></div>
    <div class="weui_text_area">
    </div>
    <div class="weui_opr_area">
        <p class="weui_btn_area">
            <a onclick="javascript:call('/user/staff_login');" class="weui_btn weui_btn_primary">我是员工</a>
        </p>
    </div>
</div>


<div class="weui_msg">
    <div class="weui_icon_area"><i class="weui_icon_msg weui_icon_info"></i></div>
    <div class="weui_text_area">
    </div>
    <div class="weui_opr_area">
        <p class="weui_btn_area">
            <a onclick="javascript:call('/user/corp_login');" class="weui_btn weui_btn_primary">我是企业</a>
        </p>
    </div>
</div>

 -->

<?php
include \view('inc_home_footer');
?>