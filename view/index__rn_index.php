<?php
include \view('inc_rn_header');
include \view('vue_company_join');
?>



<div v-choak id="v_main">

  <vue_company_join></vue_company_join>


  

  <style type="text/css">
  .homepage-contentbox-cur {
    display: flex;
    flex-direction: row;
    width: 100%;
    margin: 5px 0px;
    height: 150px;
    position: relative;
  }
  .homepage-content-cur{
    position: relative;
  }
  .homepage-content1 {
    font-size: 16px;
    flex: 4;
    padding-bottom: 10px;
  }
  .homepage-content2 {
    display: flex;
    justify-content: center;
    flex: 6;
  }
  img.mod-icon {
    width:40px;
  }
  .evd-notice {
    position:absolute;
    background:#FF0000;
    top:8px;
    right:8px;
    border-radius:50%;
    width:15px;
    height:15px;
  }
  </style>


<script type="text/javascript">
  <?php
  if(!$__o_company){
  ?>

  var checkNeedLogin = function(){
    return true
  }

  <?php
  }else{
  ?>

  var checkNeedLogin = function(){
    return false
  }

  <?php
  }
  ?>

  var _call_native = function(type,msg){
    if(checkNeedLogin()){
      // call_native('event',{
      //   event_name: 'ALERT',
      //   str: '请先登录您的帐号',
      // })
      call_native('event',{
        event_name: 'NEED_LOGIN',
      })
    }else{
      call_native(type,msg)
    }
  }
</script>


    
    <div class="homepage-contentbox-cur" style="height:44px;">

      <div data-ripple-color="#AE6237" class="homepage-content-cur ripple" style="background:#FF893C;margin-right:0px;height:44px;"  onclick="javascript: call_native('video',{url:'/course/detail?id=2', title: '课程', }); void(0);">
        <div class="homepage-content1">测试课程</div>
      </div>
    </div>

      <div data-ripple-color="#AE6237" class="homepage-content-cur ripple" style="background:#FF893C;margin-right:0px;height:44px;"  onclick="javascript: call_native('video',{url:'http://zqnb.legendh5.com/h5/a7e228fd-9ec7-1768-8c86-c228f3de5984.html', title: '企业宣传', }); void(0);">
        <div class="homepage-content1">企业宣传</div>
      </div>
      
    </div>




<div class="homepage-content" style="padding-top:0;">
    
    <div class="homepage-contentbox-cur">

      <div data-ripple-color="#008894" class="homepage-content-cur ripple" style="background:#00c8d9;" onclick="javascript: _call_native('open_win',{url:'/task/',title:'企业大学'}); void(0);">
        <!-- <div class="evd-notice"></div> -->
        <div class="homepage-content1">企业大学</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/ceping.svg">
        </div>
      </div>

      <div data-ripple-color="#AE3249" class="homepage-content-cur ripple" style="background:#ff4a6c;margin-right:0" onclick="javascript: call_native('open_win',{url:'/cate/',title:'商学院-查找课程'}); void(0);">
        <div class="homepage-content1">商学院</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/shangxueyuan.svg">
        </div>
      </div>

    </div>
  

    <div class="homepage-contentbox-cur">

      <div onclick="_call_native('open_win',{url:'http://yfny.h5-legend.com/h5/yfny.html?t=1481948135839',title:'企业文化'});" data-ripple-color="#A97F00" class="homepage-content-cur ripple" style="background:#FFBD00">
        <div class="homepage-content1">企业文化</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/luntan.svg">
        </div>
      </div>

      <div data-ripple-color="#7300A8" class="homepage-content-cur ripple" style="background:#a900f7;"
        onclick="_call_native('open_win',{url:'https://wj.qq.com/s/988862/fd0f',title:'调查问卷'});"
      >
        <div class="homepage-content1">问卷调查</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/tongzhi.svg">
        </div>
      </div>


      <div data-ripple-color="#1755AA" class="homepage-content-cur ripple" style="background:#237efa;margin-right:0px;"
         onclick="_call_native('event',{event_name:'OPEN_MODAL'});"
      >
        <div class="homepage-content1">签到</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/qiandao.svg">
        </div>
      </div>

    </div>
    
    <div class="homepage-contentbox-cur" style="height:44px;">

      <div onclick="javascript:alert('联系管理员开通');" data-ripple-color="#AE6237" class="homepage-content-cur ripple" style="background:#FF893C;margin-right:0px;height:44px;">
        <div class="homepage-content1">更多</div>
      </div>
    </div>

  </div>



  </div>



</div>















    </div>

  </div>




  <div style="clear:both;height:0px;"></div>

</div>

<script type="text/javascript">

  $$.vue({
    el:'#v_main',
  })



  window.call_from_native = window.call_from_native || {}
  // window.call_from_native['LOGIN_SUCCESS'] = function(msgstr, msg) {
  //   // alert('LOGIN_SUCCESS')
  //   window.location.reload()
  // }

  // window.call_from_native['LOGOUT_SUCCESS'] = function(msgstr, msg) {
  //   // alert('LOGOUT_SUCCESS')
  //   window.location.reload()
  // }

</script>



<?php
include \view('inc_home_footer');
?>