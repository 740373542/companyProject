<?php
include \view('inc_home_header');
include \view('vue_video_list');

// print_r($_SESSION['edu_user']);

?>

<div v-choak id="v_main">
  
  <div class="slide" id="slide2" style="margin-top:0px;height:170px;background:#FFF;" onclick="javascript:call('/test/video');void(0);">
      <ul>
          <li>
                <div style="text-align:center;height:100%;width:100%;background:#F3F3F3;background-image:url(/uploads/video/home_1_1.jpg);background-repeat:no-repeat;background-position:center;background-size: cover;">
                </div>
          </li>
          
          <li>
                <div style="text-align:center;height:100%;width:100%;background:#F3F3F3;background-image:url(/uploads/video/home_1_1.jpg);background-repeat:no-repeat;background-position:center;background-size: cover;">
                </div>
          </li>
      </ul>
      <div class="dot">
          <span></span>
          <span></span>
      </div>
  </div>




<script type="text/javascript">
var uploadPic = function(){
  var formData = new FormData();
  formData.append('key', 'series');
  formData.append('rename', true);
  formData.append('file', $('#file')[0].files[0]);
  // alert(formData)
  $.ajax({
    url: '/upload/ajax',
    type: 'POST',
    cache: false,
    data: formData,
    processData: false,
    contentType: false
  }).done(function(res) {
    $('#id_series_course_pic').val(res)
    $('#avatar_holder').css('background-image','url('+res+')')
  }).fail(function(res) {
    alert('上传失败，请选择小图，png,jpg,jpeg格式')
    console.dir('fail')
    console.dir(res)
  });
}
</script>



<div class="weui_grids bgwhite" style="padding-top:4px;">
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

      <!-- <a onclick="call_native('openwin_with_nav',{nav_url_:'/news/ls',title:'通知'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->
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

      <a onclick="call_native('openwin_with_nav',{nav_url_:'/plan/aj_nav_ls',title:'学习计划'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
      <!-- <a onclick="call_native('open_win',{url:'/test/timeline',title:'过关'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#FB6B5B;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-1 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              学习计划
          </p>
        </div>
      </a>


      <!-- <a onclick="call_native('open_win',{url:'/ask/',title:'auto'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->
      <a onclick="call_native('openwin_with_nav',{nav_url_:'/pass/aj_nav_ls',title:'过关'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#FFC332;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-81 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              过关
          </p>
        </div>
      </a>

      <!-- <a onclick="call_native('openwin_with_nav',{nav_url_:'/bschool/aj_nav_ls',title:'商学院'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->
      <a onclick="call_native('event',{event_name:'GO_NAV',tab:'bschool'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#D8A243;width:40px;height:40px;margin:0 auto 5px auto;">
              <!-- <span class="icon icon-81 home-icon" style=""></span> -->
              <span class="icon icon-81 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              商学院
          </p>
        </div>
      </a>


      <a onclick="call_native('event',{event_name:'GO_NAV',tab:'corp'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
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

      <!-- <a onclick="call_native('event',{event_name:'PICK_IMAGE',tab:'corp'});"  class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->
      <a onclick="call_native('open_win',{url:'/ask/',title:'auto',event_key:'ask_list',});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#FEB700;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-79 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              问答
          </p>
        </div>
      </a>
<!-- 
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
 -->
      <a onclick="call_native('open_win',{url:'/index/more',title:'auto'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-93 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              更多
          </p>
        </div>
      </a>

  </div>




  <div class="weui_cells_title">课程推荐</div>

  <div class="bgwhite" style="padding-top:4px;">


    <div class="s-p">

      <div class="s-box" style="height:16rem;">
        <div class="s-img-top" style="padding-top: 43%;background-image:url(http://photocdn.sohu.com/20110510/Img307175268.jpg);"></div>
          <div class="s-masker"> 
            <div class="s-title"> 提高员工执行力 
              <br> 
              <span class="s-time"><?=date('Y-m-d')?></span> 
            </div>
        </div> 
      </div>


      <div class="m-box" style="margin-top:1.2rem;">
        <div class="m-img" style="background-image:url(http://7xr193.com1.z0.glb.clouddn.com/4.jpg);"></div>
          <div class="m-masker"> 
            <div class="m-title"> 洗颜新潮流！人气洁面皂排行榜 <br> <span class="m-time">2016-03-18</span> 
          </div>
        </div> 
      </div>

    </div>

  </div>













<!-- 

  <div class="weui_cells_title">专家推荐</div>

    <div class="bgwhite" style="padding-top:4px;">


      <ul class="flex-container space-around">
        <li class="flex-item stouchable">销售</li>
        <li class="flex-item stouchable">销售</li>
        <li class="flex-item stouchable">客服</li>
        <li class="flex-item stouchable">生产/营运</li>
        <li class="flex-item stouchable">行政/后勤</li>
        <li class="flex-item stouchable">高级管理</li>
      </ul>



    </div>



    <div class="bgwhite" style="padding-top:4px;">


      <ul class="flex-container space-around">
        <li class="flex-item flex-item-2 stouchable">

        <div class="s-box" style="height:10rem;">
          <div class="s-img" style="padding-bottom: 10rem;background-image:url(http://7xr193.com1.z0.glb.clouddn.com/4.jpg);"></div>
            <div class="s-masker"> 
              <div class="s-title"> 洗颜新潮流！人气洁面皂排行榜 <br> <span class="m-time">2016-03-18</span> 
            </div>
          </div> 
        </div>

        </li>
        <li class="flex-item flex-item-2 stouchable">销售</li>
        <li class="flex-item flex-item-2 stouchable">客服</li>
        <li class="flex-item flex-item-2 stouchable">生产/营运</li>
        <li class="flex-item flex-item-2 stouchable">行政/后勤</li>
        <li class="flex-item flex-item-2 stouchable">高级管理</li>
      </ul>

    </div>

  </div>


 -->







  <!-- <div class="weui_cells_title">通知</div> -->
<!-- 
<a onclick="javascript:call_native('event',{event_name:'GOBACK_WINDOW',title:'title...'});void(0);">
  <div class="weui_cells_title">推荐</div>
</a>
 -->
  <!-- <div class="weui_cells_title">推荐</div> -->

<!-- 
  <div class="weui_panel_bd weui_cells">
    <div style="padding: 0 5px 0 7px;">
      <?php // include \view('inc_news_list') ;?>
    </div>

  </div>

 -->


<!-- 
  <div class="weui_panel_bd weui_cells">

    <v_video_list url="/vds/aj_list2?" length="5" autoload="false"></v_video_list>

  </div>

 -->






<!-- 

<a onclick="javascript:call_native('event',{event_name:'GOBACK_WINDOW',title:'title...'});void(0);">
  <div class="weui_cells_title">推荐</div>
</a>


 -->





<!-- 

  <div id="panel_product_list" class="weui_cells weui_cells_access m-lr-5" style="padding-bottom:0px;">



    <a onclick="javascript:call_native('open_win',{url:'/index/index',title:'title...'});void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/002.jpg" alt="">
        </div>
        <div class="product-title">
          看这个视频
        </div>
        <div class="product-length">
          12:09
        </div>
    </a>


    <a onclick="javascript:call_native('open_win',{url:'/test/video',title:'title...'});void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/003.jpg" alt="">
        </div>
        <div class="product-title">
          看这个视频2
          看这个视频2
          看这个视频2
        </div>
        <div class="product-length">
          12:09
        </div>
    </a>



    <a onclick="javascript:call_native('open_win',{url:'/index/index',title:'title...'});void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/004.jpg" alt="">
        </div>
        <div class="product-title">
          看这个视频3
        </div>
    </a>



    <a onclick="javascript:call('/test/video');void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/001.jpg" alt="">
        </div>
        <div class="product-title">
          AAA
        </div>
    </a>





    <a onclick="javascript:call_native('open_win',{url:'/index/index',title:'title...'});void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/002.jpg" alt="">
        </div>
        <div class="product-title">
          看这个视频
        </div>
        <div class="product-length">
          12:09
        </div>
    </a>


    <a onclick="javascript:call_native('open_win',{url:'/test/video',title:'title...'});void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/003.jpg" alt="">
        </div>
        <div class="product-title">
          看这个视频2
          看这个视频2
          看这个视频2
        </div>
        <div class="product-length">
          12:09
        </div>
    </a>



    <a onclick="javascript:call_native('open_win',{url:'/index/index',title:'title...'});void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/004.jpg" alt="">
        </div>
        <div class="product-title">
          看这个视频3
        </div>
    </a>



    <a onclick="javascript:call('/test/video');void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/001.jpg" alt="">
        </div>
        <div class="product-title">
          AAA
        </div>
    </a>





    <a onclick="javascript:call_native('open_win',{url:'/index/index',title:'title...'});void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/002.jpg" alt="">
        </div>
        <div class="product-title">
          看这个视频
        </div>
        <div class="product-length">
          12:09
        </div>
    </a>


    <a onclick="javascript:call_native('open_win',{url:'/test/video',title:'title...'});void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/003.jpg" alt="">
        </div>
        <div class="product-title">
          看这个视频2
          看这个视频2
          看这个视频2
        </div>
        <div class="product-length">
          12:09
        </div>
    </a>



    <a onclick="javascript:call_native('open_win',{url:'/index/index',title:'title...'});void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/004.jpg" alt="">
        </div>
        <div class="product-title">
          看这个视频3
        </div>
    </a>



    <a onclick="javascript:call('/test/video');void(0);" class="product-grid-2 weui_grid-2 b-line js_grid" data-id="button">
        <div class="product-3">
            <img src="/yingsheng/001.jpg" alt="">
        </div>
        <div class="product-title">
          AAA
        </div>
    </a>












  </div>


 -->














<!-- 
      <div class="weui_panel weui_panel_access">
           
            <div class="weui_panel_bd">
                    
            </div>
            

        <div class="dropload-down">
          <div class="dropload-load f15">
            <span class="weui-loading"></span>正在加载中...
          </div>
        </div>

      </div>
 -->






<!-- 
  <v_video img_="/yingsheng/001.jpg"></v_video>
  <v_video img_="/yingsheng/002.jpg"></v_video>
  <v_video img_="/yingsheng/003.jpg"></v_video>
  <v_video img_="/yingsheng/004.jpg"></v_video>
 -->
</div>

<script type="text/javascript">

$$.vue({
  el:'#v_main',
})

$(function(){

  $('#slide2').swipeSlide({
    autoSwipe:true,//自动切换默认是
    speed:3000,//速度默认4000
    continuousScroll:true,//默认否
    transitionType:'cubic-bezier(0.22, 0.69, 0.72, 0.88)',
    //过渡动画linear/ease/ease-in/ease-out/ease-in-out/cubic-bezier
    lazyLoad:true,//懒加载默认否
    firstCallback : function(i,sum,me){
      me.find('.dot').children().first().addClass('cur');
    },
    callback : function(i,sum,me){
      me.find('.dot').children().eq(i).addClass('cur').siblings().removeClass('cur');
    }
  });

}); 
</script>





<?php
include \view('inc_home_footer');
?>