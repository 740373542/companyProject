<?php
include \view('inc_home_header');
include \view('vue_company_join');
// print_r($_SESSION['edu_user']);
?>

<script type="text/javascript">
var callBridgeStart = function(){}
</script>



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


<div class="homepage-content" style="padding-top:0;">
    
    <div class="homepage-contentbox-cur">
      <div class="homepage-content-cur" style="background:#237efa">
        <div class="evd-notice"></div>
        <div class="homepage-content1">签到</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/qiandao.svg">
        </div>
      </div>
      <div class="homepage-content-cur" style="background:#7c68eb">
        <div class="homepage-content1">学习计划</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/xuexijihua.svg">
        </div>
      </div>
      <div class="homepage-content-cur" style="background:#a900f7;margin-right:0px;">
        <div class="homepage-content1">通知</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/tongzhi.svg">
        </div>
      </div>
    </div>
    
    <div class="homepage-contentbox-cur">
      <div class="homepage-content-cur" style="background:#ff4a6c">
        <div class="evd-notice"></div>
        <div class="homepage-content1">商学院</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/shangxueyuan.svg">
        </div>
      </div>
      <div class="homepage-content-cur" style="background:#00c8d9;margin-right:0">
        <div class="evd-notice"></div>
        <div class="homepage-content1">测评</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/ceping.svg">
        </div>
      </div>
      </div>
  
      <div class="homepage-contentbox-cur">
      <div class="homepage-content-cur" style="background:#47de00">
        <div class="homepage-content1">论坛</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/luntan.svg">
        </div>
      </div>
      <div class="homepage-content-cur" style="background:#FFBD00">
        <div class="evd-notice"></div>
        <div class="homepage-content1">问答</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/luntan.svg">
        </div>
      </div>
      <div class="homepage-content-cur" style="background:#FF893C;margin-right:0px;">
        <div class="homepage-content1">更多</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/gengduo.svg">
        </div>
      </div>
    </div>
  </div>
  <div class="homepage-content">
    <div class="homepage-contentbox-cur" >
      <div class="homepage-content-cur" style="background:#1388FF">
        <div class="homepage-content1">企业文化</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/qiyewenhua.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#1388FF">
        <div class="homepage-content1">知识库</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/zhishiku.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#1388FF;margin-right:0px;">
        <div class="homepage-content1">问卷调查</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/luntan.svg">
        </div>
      </div>
    </div>
  
      <div class="homepage-contentbox-cur" >
      <div class="homepage-content-cur" style="background:#00E51B">
        <div class="homepage-content1">员工培训</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/yuangongpeixun.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#00E51B">
        <div class="homepage-content1">入职培训</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/ruzhipeixun.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#00E51B;margin-right:0px;">
        <div class="homepage-content1">目标管理</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/gengduo.svg">
        </div>
      </div>
    </div>
<!--这里插滚动图-->
      <div class="homepage-contentbox-cur" >
      <div class="homepage-content-cur" style="background:#FF9D00">
        <div class="homepage-content1">考核评比</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/gengduo.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#FF9D00">
        <div class="homepage-content1">流程优化</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/gengduo.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#FF9D00;margin-right:0px;">
        <div class="homepage-content1">未定</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1 mod-icon" src="/svg/%E9%80%9A%E7%9F%A5.svg">
        </div>
      </div>
    </div>
    
    
    
  </div>

</div>









  <!-- 
  <div class="slide" id="slide2" style="margin-top:0px;height:170px;background:#FFF;" onclick="javascript: call_native('open_nav',{url: '/test/video', title: '播放视频', }); void(0);"> 
  -->
<!-- 
  <div class="slide" id="slide2" style="margin-top:0px;height:170px;background:#FFF;" onclick="javascript: call_native('open_nav',{url: '/test/video', title: '播放视频', }); void(0);">
   -->
  <div class="slide" id="slide2" style="margin-top:0px;height:170px;background:#FFF;">

      <ul>

        <?php
        $courses = \model\course::finds('where id>0 order by id asc');
        foreach ($courses as $course) {
        ?>

          <li onclick="javascript: call_native('video',{url:'/course/detail?id=<?=$course['id']?>', title: '<?=$course['name']?>', }); void(0);">
                <div style="text-align:center;height:100%;width:100%;background:#F3F3F3;background-image:url(<?=$course['pic']?>);background-repeat:no-repeat;background-position:center;background-size: cover;">
                </div>
          </li>

          <?php
          }
          ?>

          <li>
                <div style="text-align:center;height:100%;width:100%;background:#F3F3F3;background-image:url(/uploads/video/home_1_1.jpg);background-repeat:no-repeat;background-position:center;background-size: cover;">
                </div>
          </li>
      </ul>
      <div class="dot">
          <span></span>
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


      <a onclick="call_native('open_win',{url:'http://yfny.h5-legend.com/h5/yfny.html?t=1481948135839',title:'企业文化'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#4AC0C1;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-62 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              企业文化
          </p>
        </div>
      </a>



      <a onclick="call_native('open_win',{url:'https://wj.qq.com/s/988862/fd0f',title:'调查问卷'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#4AC0C1;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-62 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              调查问卷
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

      <a onclick="call_native('open_win',{url:'/task/',title:'学习计划'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
<!-- 
      <a onclick="call_native('openwin_with_nav',{nav_url_:'/plan/aj_nav_ls',title:'学习计划'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
       -->
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
              测评
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
              论坛
          </p>
        </div>
      </a>

      <!-- <a onclick="call_native('event',{event_name:'PICK_IMAGE',tab:'corp'});"  class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->
      <a onclick="call_native('open_win',{url:'/ask/',title:'问答',event_key:'ask_list',});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
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




      <!-- <a onclick="call_native('open_win',{url:'/index/more',title:'auto'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->

      <a onclick="javascript:alert('联系管理员开通');"  class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
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

    <div style="margin-top:0px;">

      <e-row>
        <e-col>

          <e-card data-ripple-color="#189ED6" data-ripple-class="" class="ripple"  onclick="javascript: call_native('open_win',{url:'/ask', title: '问答', }); void(0);">
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/zsk.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>企业知识库</h2>
                      <p>让员工跟随企业共同成长</p>
                  </e-title>
              </e-item>
          </e-card>

          <e-card data-ripple-color="#189ED6" class="ripple" onclick="javascript: call_native('open_win',{url:'/bbs/corp_ls?id=34', title: '员工培训', }); void(0);">
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/ygpx.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>员工培训</h2>
                      <p>提升员工能力，满足企业发展需要</p>
                  </e-title>
              </e-item>
          </e-card>

          <e-card data-ripple-color="#189ED6" class="ripple" onclick="javascript: call_native('open_win',{url:'/bbs/corp_ls?id=35', title: '入职培训', }); void(0);">
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/rzpx.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>入职培训</h2>
                      <p>加快新员工了解、融入企业</p>
                  </e-title>
              </e-item>
          </e-card>

          <e-card data-ripple-color="#189ED6" class="ripple" onclick="javascript: call_native('open_win',{url:'/target/', title: '目标管理', }); void(0);">
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/mbgl.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>目标管理</h2>
                      <p>给每个团队和个人设置目标，实时跟进每个目标的完成情况</p>
                  </e-title>
              </e-item>
          </e-card>


          <e-card data-ripple-color="#189ED6" class="ripple" onclick="javascript: call_native('open_win',{url:'/staff/?_pagemark=<?=$__pagemark?>&_event=SELECT_MEMBER&type=radio', title: '目标管理', }); void(0);">
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/khpb.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>考核评比</h2>
                      <p>根据员工表现和任务完成情况合理奖励，激发员工参与感</p>
                  </e-title>
              </e-item>
          </e-card>



          <e-card>
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/lcyh.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>流程优化</h2>
                      <p>简化办公流程</p>
                  </e-title>
              </e-item>
          </e-card>

                
        </e-col>
      </e-row>
    </div>






    </div>

  </div>











  <div style="clear:both;height:40px;"></div>

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


<script type="text/javascript">
window.call_from_native = window.call_from_native || {}
window.call_from_native['SELECT_MEMBER'] = function(msgstr, msg) {
  alert(msgstr)
  var msg = $$.str2js(msgstr)
}

function documentHeight() {
    return Math.max(
        document.documentElement.clientHeight,
        document.body.scrollHeight,
        document.documentElement.scrollHeight,
        document.body.offsetHeight,
        document.documentElement.offsetHeight
    );
}


function documentHeight() {
    return Math.max(
        document.documentElement.clientHeight,
        document.body.scrollHeight,
        document.documentElement.scrollHeight,
        document.body.offsetHeight,
        document.documentElement.offsetHeight
    );
}

// window.setInterval(getNewSize,1000)

var __last_window_height = 0

var checkDocumentHeight = function(){

  var newheight = documentHeight()
  // alert(newheight)
  if(!__last_window_height || __last_window_height !== newheight){

    var args = {
      mtd: 'attr_height',
      msg: {
        height: newheight,
      }
    }

    // alert($$.js2str(args))
    WebViewBridge.send(JSON.stringify(args));
  }
}

window.setInterval(function(){

  var newheight = documentHeight()
  // alert(newheight)
  if(!__last_window_height || __last_window_height !== newheight){

    var args = {
      mtd: 'attr_height',
      msg: {
        height: newheight,
      }
    }

    // alert($$.js2str(args))
    WebViewBridge.send(JSON.stringify(args));
  }
},100)

</script>



<?php
include \view('inc_home_footer');
?>