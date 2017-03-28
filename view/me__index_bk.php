<?php
include \view('inc_home_header');

// print_r($_SESSION);

?>

<div style="width:100%;height:19rem;position:relative;background:#45B5FE;text-align:center;">
  <div class="s-avatar" style="width:10rem;height:10rem;border-radius: 50%;position:absolute;left:50%;top:50%;transform: translate(-50%, -50%);">
  </div>
</div>

<div v-choak id="v_main">

  <div id="panel_login" class="panel_15_55">


    <div class="weui_cells weui_cells_form" style="margin-top: 0;">
        <div class="weui_cell weui_cell">
            <div class="weui_cell_hd"><label for="" class="weui_label">手机号码</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="input_phone_login" v-model="phone" class="weui_input" placeholder="" readonly value="<?=$_SESSION['edu_user']['phone']?>" />
            </div>
        </div>
        <div class="weui_cell weui_cell">
            <div class="weui_cell_hd"><label for="" class="weui_label">昵称</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="input_name" v-model="name" class="weui_input" placeholder="请输入昵称" value="<?=$_SESSION['edu_user']['name']?>">
            </div>
        </div>
        <div class="weui_cell weui_cell">
            <div class="weui_cell_hd"><label for="" class="weui_label">姓名</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="input_real_name" v-model="real_name" class="weui_input" placeholder="请输入姓名" value="<?=$_SESSION['edu_user']['real_name']?>">
            </div>
        </div>

<?php
if(!empty($_SESSION['edu_user']['company_id'])){
?>

        <div class="weui_cell weui_cell">
            <div class="weui_cell_hd"><label for="" class="weui_label">企业</div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="input_password_login" v-model="corp_str" class="weui_input" type="text" readonly="true" >
            </div>
        </div>
    
<?php
}
?>

    </div>

  



    <div v-if="should_save" class="weui_btn_area">
        <a class="weui_btn weui_btn_primary" @click="saveProfile">修改</a>
    </div>
      











<?php
if(empty($_SESSION['edu_user']['company_id'])){
?>
    <div class="weui_cells weui_cells_form" style="margin-top:20px;">


        <div class="weui_cell weui_cell">
            <div class="weui_cell_hd"><label for="" class="weui_label">加入企业</div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="input_password_login" class="weui_input" type="text" v-bind:change="changeCorpStr" @click="corp_str=''" v-model="corp_str" v-bind:placeholder="corp_str">
            </div>
        </div>
  
 <!-- v-model="corp_str" v-bind:placeholder="corp_str" -->
        


    </div>


      <div v-if="show_corp_str_submit" class="weui_btn_area" style="margin-top:10px;">
          <a class="weui_btn weui_btn_primary" @click="joinCompany">申请加入</a>
      </div>
  

<?php
}
?>











    <div class="weui_btn_area" style="margin-top:10px;">
        <a class="weui_btn weui_btn_warn" href="javascript:logout();">退出</a>
    </div>
      






  </div>



<!-- 


    <div class="weui_cells weui_cells_form">

      <div class="weui_btn_area">
          <a class="weui_btn weui_btn_primary" @click="doCorpRegist">创建企业</a>
      </div>
  
    </div>

 -->






</div>

<script type="text/javascript">
var _show_corp_str = false
<?php
if(empty($_SESSION['edu_user']['company_id'])){
?>
  _show_corp_str = true
<?php
}
?>

var _corp_str = '请输入企业邀请码';
<?php
if( !empty($_SESSION['edu_user']['company_id']) && $this->di['UserService']->notJoined() ){
  $oCompany =$this->di['CompanyService']->getByCurrentUser();
?>
  _corp_str = "(审核中)<?=$oCompany->data['name']?>";
<?php
}
?>


$$.vue({
  el: '#v_main',
  data: function(){
    return {
      name: '<?=$_SESSION['edu_user']['name']?>',
      real_name: '<?=$_SESSION['edu_user']['real_name']?>',
      corp_str: _corp_str,
      should_save: false,
      show_corp_str: _show_corp_str,
      show_corp_str_submit: false,
    }
  },

  methods: {

    doCorpRegist: function(){
      call_native('open_nav',{
        url: '/corp/regist',
        title: '企业注册',
        user:'ok',
      })
    },


    joinCompany: function(){

      $$.ajax({
        url: '/user/aj_join',
        data: {
          join_str: this.corp_str,
        },
        succ: function(data){
          alert('成功申请，请等待管理员审核通过')
          call_native('event',{
            event_name: 'JOIN_APPLY_SUCCESS',
            user:'ok',
          })
          window.location.reload();

        },
        fail: function(msg,code){
          alert('登录失败 '+$$.js2str(msg))
        },

      })

    },

    saveProfile: function(){
      var self = this
      
      $$.ajax({
        url: '/user/aj_saveprofile',
        data: {
          name: this.name,
          real_name: this.real_name,
        },
        succ: function(data){
          alert('修改成功')
          self.should_save = false
        },
        fail: function(msg,code){
          alert('登录失败 '+$$.js2str(msg))
        },

      })

    },

    changeCorpStr: function(str){
      console.log(str)
    },

  },

  watch: {
    name: function(){
      this.should_save = true
    },
    real_name: function(){
      this.should_save = true
    },
    corp_str: function(){
      this.show_corp_str_submit = true
    },
  },

})

</script>

<script type="text/javascript">
  var logout = function(){
      $$.ajax({
        url: '/user/aj_logout',
        data: {
          phone: this.phone,
          password: this.password,
        },
        succ: function(data){
          call_native('event',{
            event_name: 'LOGOUT_SUCCESS',
          })
        },
        fail: function(msg,code){
          alert($$.js2str(msg))
        },

      })

  }
</script>





<?php
include \view('inc_home_footer');
?>