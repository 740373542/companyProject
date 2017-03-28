<?php
include \view('inc_home_header');
include \view('vue_company_join');
// print_r($_SESSION['edu_user']);
?>

<script type="text/javascript">
var callBridgeStart = function(){}
</script>



<div v-choak id="v_main" style="background: white;">

<div style="padding-top:0;">
    
  <style type="text/css">
  e-title h2{
    padding-bottom: 15px;
  }


  .svg-icon {
      /*background: url(/__assets__/sprite.css.svg) 78.86134% 0px no-repeat;*/
      width: 98px;
      height: 98px;
      bottom: -2px;
      position: relative;
      float: right;
      background-size:120%;
      background-position: bottom right;
      background-attachment: fixed;
  }

  </style>

    <div style="margin-top:5px;">

      <div style="display: flex;flex-direction: column;align-items: center;height: 100%">
  <div data-ripple-color="#189ED6" data-ripple-class="" class="ripple"  onclick="javascript: call_native('open_win',{url:'/bschool/career', title: '按岗位查找', }); void(0);" style="display: flex;flex-direction: column;width: 130px;height: 160px;justify-content: space-between;margin-top: 40px">
    <div style="display: flex;justify-content: center;align-items: center;
    background-image:linear-gradient(-180deg, #57c4fd 0%, #2c91fb 100%); width: 130px;height: 130px;border-radius: 100%">
    <div style="width: 70px;height: 70px;display: flex;justify-content: center;align-items: center;">
      <img src="/svg/angangwei.svg" style="width: 100%">
    </div>
      


    </div>
    <div style="display: flex;justify-content: center;align-items: center;color: #2c91fb;font-size: 16px;">按岗位查找</div>
  </div>



  <div data-ripple-color="#189ED6" class="ripple" onclick="javascript: call_native('open_win',{url:'/bschool/skill_sort', title: '按技能查找', }); void(0);" style="display: flex;flex-direction: column;width: 130px;height: 160px;justify-content: space-between;margin-top: 40px;">
    <div style="display: flex;justify-content: center;align-items: center;
    background-image:linear-gradient(-180deg, #facd62 0%, #f29f33 100%);width: 130px;height: 130px;border-radius: 100%">
      <div style="width: 70px;height: 70px;display: flex;justify-content: center;align-items: center;">
        <img src="/svg/anjineng.svg" style="width: 100%">
      </div>
    </div>
    <div style="display: flex;justify-content: center;align-items: center;color: #F29F33;font-size: 16px;">按技能查找</div>
  </div>


  <div data-ripple-color="#189ED6" class="ripple" onclick="javascript: call_native('open_win',{url:'/cate/industry', title: '按行业查找', }); void(0);" style="display: flex;flex-direction: column;width: 130px;height: 160px;justify-content: space-between;margin-top: 40px;">
    <div style="display: flex;justify-content: center;align-items: center;
    background-image:linear-gradient(-180deg, #abee35 0%, #73d918 100%);width: 130px;height: 130px;border-radius: 100%">
      <div style="width: 65px;height: 65px;display: flex;justify-content: center;align-items: center;">
        <img src="/svg/anhangye.svg" style="width: 100%">
      </div>
    </div>
    <div style="display: flex;justify-content: center;align-items: center;color: #73D918;font-size: 16px;">按行业查找</div>
  </div>



</div>
    </div>







  <div style="clear:both;height:40px;"></div>

</div>



<?php
include \view('inc_home_footer');
?>