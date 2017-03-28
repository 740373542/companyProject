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

  <!-- 
  <div class="slide" id="slide2" style="margin-top:0px;height:170px;background:#FFF;" onclick="javascript: call_native('open_nav',{url: '/test/video', title: '播放视频', }); void(0);"> 
  -->
<!-- 
  <div class="slide" id="slide2" style="margin-top:0px;height:170px;background:#FFF;" onclick="javascript: call_native('open_nav',{url: '/test/video', title: '播放视频', }); void(0);">
   -->
  












<div class="homepage-content">
    
    <div class="homepage-contentbox-cur">
      <div class="homepage-content-cur" style="background:#237efa">
        <div class="homepage-content1">签到</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/qiandao.svg">
        </div>
      </div>
      <div class="homepage-content-cur" style="background:#7c68eb">
        <div class="homepage-content1">学习计划</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/xuexijihua.svg">
        </div>
      </div>
      <div class="homepage-content-cur" style="background:#a900f7;margin-right:0px;">
        <div class="homepage-content1">通知</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/tongzhi.svg">
        </div>
      </div>
    </div>
    
    <div class="homepage-contentbox-cur">
      <div class="homepage-content-cur" style="background:#ff4a6c">
        <div class="homepage-content1">商学院</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/shangxueyuan.svg">
        </div>
      </div>
      <div class="homepage-content-cur" style="background:#00c8d9;margin-right:0">
        <div class="homepage-content1">测评</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/ceping.svg">
        </div>
      </div>
      </div>
  
      <div class="homepage-contentbox-cur">
      <div class="homepage-content-cur" style="background:#47de00">
        <div class="homepage-content1">论坛</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/luntan.svg">
        </div>
      </div>
      <div class="homepage-content-cur" style="background:#FFBD00">
        <div class="homepage-content1">问答</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/wenda.svg">
        </div>
      </div>
      <div class="homepage-content-cur" style="background:#FF893C;margin-right:0px;">
        <div class="homepage-content1">更多</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/gengduo.svg">
        </div>
      </div>
    </div>
  </div>
  <div class="homepage-content">
    <div class="homepage-contentbox-cur" >
      <div class="homepage-content-cur" style="background:#1388FF">
        <div class="homepage-content1">企业文化</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/qiyewenhua.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#1388FF">
        <div class="homepage-content1">知识库</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/zhishiku.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#1388FF;margin-right:0px;">
        <div class="homepage-content1">问卷调查</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/wenjuandiaocha.svg">
        </div>
      </div>
    </div>
  
      <div class="homepage-contentbox-cur" >
      <div class="homepage-content-cur" style="background:#00E51B">
        <div class="homepage-content1">员工培训</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/yuangongpeixun.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#00E51B">
        <div class="homepage-content1">入职培训</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/ruzhipeixun.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#00E51B;margin-right:0px;">
        <div class="homepage-content1">目标管理</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/mubiaoguanli.svg">
        </div>
      </div>
    </div>
<!--这里插滚动图-->
      <div class="homepage-contentbox-cur" >
      <div class="homepage-content-cur" style="background:#FF9D00">
        <div class="homepage-content1">考核评比</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/kaohepingbi.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#FF9D00">
        <div class="homepage-content1">流程优化</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/liuchengyouhua.svg">
        </div>
      </div>
      <div class="homepage-content-cur2" style="background:#FF9D00;margin-right:0px;">
        <div class="homepage-content1">未定</div>
        <div class="homepage-content2">
          <img class="homepage-content-img1" src="/svg/%E9%80%9A%E7%9F%A5.svg">
        </div>
      </div>
    </div>
    
    
    
  </div>












































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
</script>



<?php
include \view('inc_home_footer');
?>