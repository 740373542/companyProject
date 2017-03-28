<?php
include \view('inc_home_simple_header');
?>



<div v-choak id="v_main">


  <div style="padding-top:4px;">


      <a onclick="call_native('event',{event_name:'OPEN_MODAL'});"  class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#63BD77;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-68 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              签到
          </p>
        </div>
      </a>

      <a onclick="call_native('openwin_with_nav',{nav_url_:'/news/aj_nav_ls',title:'通知'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#4AC0C1;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-62 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              通知
          </p>
        </div>
      </a>

      <a onclick="call_native('open_win',{url:'/test/',title:'auto'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#FB6B5B;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-1 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              过关
          </p>
        </div>
      </a>

      <a onclick="call_native('open_win',{url:'/ask/',title:'auto'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#FFC332;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-79 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              知道
          </p>
        </div>
      </a>

      <a onclick="call_native('event',{event_name:'GO_NAV',tab:'corp'});call_native('event',{event_name:'GOBACK_WINDOW'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#A1B508;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-100 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              企业大学
          </p>
        </div>
      </a>

      <a onclick="call_native('openwin_with_nav',{nav_url_:'/test/aj_nav_ls',title:'测评'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#D8A243;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-81 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              测评
          </p>
        </div>
      </a>

      <a onclick="call_native('event',{event_name:'PICK_IMAGE',tab:'corp'});"  class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#FEB700;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-3 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              分享
          </p>
        </div>
      </a>



      <a href="javascript:void(0);" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-49 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              读书会
          </p>
        </div>
      </a>



      <a href="javascript:void(0);" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-49 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              学习计划
          </p>
        </div>
      </a>



      <a href="javascript:void(0);" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-49 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              能力测评
          </p>
        </div>
      </a>



      <a href="javascript:void(0);" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-49 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              内部分享
          </p>
        </div>
      </a>



      <a href="javascript:void(0);" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-49 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              金币兑换
          </p>
        </div>
      </a>


      <a href="javascript:void(0);" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-49 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              互动社区
          </p>
        </div>
      </a>


      <a href="javascript:void(0);" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-49 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              常见问题
          </p>
        </div>
      </a>


      <a href="javascript:void(0);" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-49 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              店铺业绩
          </p>
        </div>
      </a>


      <a href="javascript:void(0);" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-49 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              红黑榜
          </p>
        </div>
      </a>


      <a href="javascript:void(0);" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-49 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              店长宝典
          </p>
        </div>
      </a>


      <a href="javascript:void(0);" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-49 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              陈列指导
          </p>
        </div>
      </a>





  </div>


</div>




<?php
// include \view('inc_home_footer');
?>