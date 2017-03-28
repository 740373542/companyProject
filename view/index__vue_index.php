<?php
$__autoheight = true;
include \view('inc_vue_header');
?>

<script src="/public/v_aaa_bundle.js"></script>
<?php include \view('inc_vue_header_js'); ?>

<?php
include \view('vue_company_join');
include \view('vue_autoload_list');
?>

  
  <style type="text/css">

      e-title h2{
        /*padding-bottom: 15px;*/
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


    .home-icon-div {
      border-radius: 50%;
    }
    .index_cate_icon_font {
      font-size: 22px;
      color: #FFF;
      padding-top: 2px;
      /*background: #FF0000;*/
      line-height: 22px;
      color:#999;
    }

    .zc-grids{
      display: flex; 
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: flex-start;
    }
    .zc-grids div{
      width:24%;
      height: 100px;
      display: inline-block;
      display: flex;
      flex-direction: column;
      text-align: center;
      justify-content: center;
      align-items: center;
    }
    .weui_grid_label {
      margin:0;padding: 10px 0 0 0;
    }
  </style>



    <style type="text/css">
      
            .skill-contentbox{
                margin:0px 0.5% ;
                position: relative;
                display: flex;
                /*border-radius:5px;*/
                width:48%;
                /*height:74px;*/
                overflow: hidden;
            }

            .skill-content-text{
              color:#FFF;
              font-size: 14px;
              /*margin: 10px 0 0 10px;*/
              margin: 0px;
              width:100%;
            }
            .skill-contentbox .skill-content-img img {
              width:80px;
              position: absolute;
              float: right;
              right:0;
              top:0;
              padding-right: 10px;
              padding-top: 10px;
            }
    </style>






<div id="v_main" v-cloak style="background:#-FF0000;">
  

  <div style="background:#F0F0F0;">
    <div class="" style="background:#FFF;">
      <vue_company_join></vue_company_join>
    </div>

    <?php
    $companyId = $this->di['CompanyService']->getCurrentId();
    $cates = $this->di['V2ModuleService']->getByCompanyId($companyId);
    // print_r($cates);
    ?>


    <div class="zc-grids bgwhite" style="padding-top:4px;background:#FFF;margin-top:4px;">

  

      <div onclick="ajaxSignIn();call_native('event',{event_name:'OPEN_MODAL'});">
          <div class="home-icon-div" style="background:#F6EFD3;width:54px;height:54px;">
            <img src="/icons/1_signin.png" style="width:46px;">
          </div>
          <p class="weui_grid_label">
              签到
          </p>
      </div>


<!-- 
      <div onclick="call_native('openwin_with_nav',{nav_url_:'/nav/course_task_pub',nav_data_:[{txt:'必备课程',url:'/task/pub?tag=必备课程'},{txt:'辅助课程',url:'/task/pub?from=辅助课程'},{txt:'岗位课程',url:'/task/pub?from=岗位课程'}],title:'商学院'});">
          <div class="home-icon-div" style="background:#FB6B5B;width:46px;height:46px;">
            <div class="index_cate_icon_font">课</div>
          </div>
          <p class="weui_grid_label">
              商学院
          </p>
      </div>


      <div onclick="call_native('openwin_with_nav',{nav_url_:'/nav/course_task_self',nav_data_:[{txt:'必备课程',url:'/task/self?tag=必备课程'},{txt:'岗位课程',url:'/task/self?from=岗位课程'}],title:'企业课堂'});">
          <div class="home-icon-div" style="background:#FB6B5B;width:46px;height:46px;">
            <div class="index_cate_icon_font">课</div>
          </div>
          <p class="weui_grid_label">
              企业课堂
          </p>
      </div>
 -->

      <?php
      if( $this->di['UserService']->getCompanyId() ){
      ?>

      <div onclick="call_native('openwin_with_nav',{nav_url_:'/nav/corp_data',cache_key_:'index_module_announcement',title:'通告'});">
          <div class="home-icon-div" style="background:#F6EFD3;width:54px;height:54px;">
            <img src="/icons/3_corpdata.png" style="width:46px;">
          </div>
          <p class="weui_grid_label">
              通告
          </p>
      </div>



      <div onclick="call_native('openwin_with_nav',{nav_url_:'/nav/growup',cache_key_:'index_module_growup',nav_data___:[{txt:'学习计划',url:'/grow_up/study_plan'},{txt:'工作计划',url:'/grow_up/work_plan'},{txt:'成长总结',url:'/grow_up/summary'}],title:'成长'});" aanclick="call_native('open_win',{url:'/task/',title:});">
      
          <div class="home-icon-div" style="background:#F6EFD3;width:54px;height:54px;">
            <img src="/icons/4_growup.png" style="width:46px;">

          </div>
          <p class="weui_grid_label">
              成长
          </p>
      </div>


    <?php
    foreach ($cates as $cate) {
      $module = $this->di['V2ModuleService']->parseHtml($cate);
      // print_r($module);
    ?>
      <div onclick="call_native('open_win',{url:'<?=$module['url']?>',title:'<?=$cate['title']?>'});">
          <div class="home-icon-div" style="background:#F6EFD3;width:54px;height:54px;">
          <!--<div class="home-icon-div" style="background:-<?=$module['color']?>
;width:46px;height:46px;">-->
            <!--<div class="index_cate_icon_font"><?=$module['text']?></div>-->
            <img src="/icons/<?=$module['icon']?>.png" style="width:46px;">
          </div>
          <p class="weui_grid_label">
              <?=$cate['title']?>
          </p>
      </div>

    <?php
    }
    ?>


      <div onclick="call_native('openwin_with_nav',{nav_url_:'/nav/corp_bbs',cache_key_:'index_module_team_building',title:'团建'});">
          <div class="home-icon-div" style="background:#F6EFD3;width:54px;height:54px;">
            <img src="/icons/8_tuanjian.png" style="width:46px;">
          </div>
          <p class="weui_grid_label">
              团建
          </p>
      </div>


      <?php
      }
      ?>


<!-- 
      <div onclick="call_native('openwin_with_nav',{nav_data_:[{txt:'商学院课程',url:'/news/aj_nav_ls'},{txt:'企业课程',url:'/news/aj_nav_ls'}],title:'企业课堂'});" aanclick="call_native('open_win',{url:'/task/',title:});">
      
          <div class="home-icon-div" style="background:#FB6B5B;width:46px;height:46px;">
            <div class="index_cate_icon_font">任</div>
          </div>
          <p class="weui_grid_label">
              企业课堂
          </p>
      </div>
 -->



      <div onclick="javascript:alert('联系管理员开通');">
          <div class="home-icon-div" style="background:#F6EFD3;width:54px;height:54px;">
            <div class="index_cate_icon_font">...</div>
          </div>
          <p class="weui_grid_label">
              更多
          </p>
      </div>


<!-- 
      <div onclick="call_native('openwin_with_nav',{nav_url_:'/news/aj_nav_ls',cache_key_:'index_module_announcement',title:'更多'});">
          <div class="home-icon-div" style="background:#F6EFD3;width:54px;height:54px;">
            <div class="index_cate_icon_font">...</div>
          </div>
          <p class="weui_grid_label">
              更多
          </p>
      </div>



 -->












      

<!-- 

      <div onclick="call_native('open_win',{url:'/cate',title:'课程分类'});">
          <div class="home-icon-div" style="background:#4AC0C1;width:46px;height:46px;">
            <div class="index_cate_icon_font">课</div>
          </div>
          <p class="weui_grid_label">
              课程分类
          </p>
      </div>


      <div onclick="call_native('open_win',{url:'http://yfny.h5-legend.com/h5/yfny.html?t=1481948135839',title:'企业文化'});">
          <div class="home-icon-div" style="background:#4AC0C1;width:46px;height:46px;">
            <p class="index_cate_icon_font">企</p>
          </div>
          <p class="weui_grid_label">
              企业文化
          </p>
      </div>


      <div onclick="call_native('open_win',{url:'https://wj.qq.com/s/988862/fd0f',title:'调查问卷'});">
          <div class="home-icon-div" style="background:#FFC332;width:46px;height:46px;">
            <span class="icon icon-68 home-icon" style=""></span>
          </div>
          <p class="weui_grid_label">
              调查问卷
          </p>
      </div>

 -->

<!-- 

      <div onclick="call_native('event',{event_name:'OPEN_MODAL'});">
          <div class="home-icon-div" style="background:#63BD77;width:46px;height:46px;">
            <i class="mu-icon material-icons" style="color:#FFF;">picture_in_picture</i>
          </div>
          <p class="weui_grid_label">
              签到
          </p>
      </div>


      <div onclick="call_native('open_win',{url:'https://wj.qq.com/s/988862/fd0f',title:'调查问卷'});">
          <div class="home-icon-div" style="background:#FFC332;width:46px;height:46px;">
            <span class="icon icon-68 home-icon" style=""></span>
          </div>
          <p class="weui_grid_label">
              调查问卷
          </p>
      </div>
 -->

<!-- 
      <div onclick="call_native('openwin_with_nav',{nav_url_:'/news/aj_nav_ls',title:'通知'});">
          <div class="home-icon-div" style="background:#FB6B5B;width:46px;height:46px;">
            <i class="mu-icon material-icons" style="color:#FFF;">expand_more</i>
          </div>
          <p class="weui_grid_label">
              更多
          </p>
      </div>
 -->


<!-- 
      <div onclick="call_native('open_win',{url:'/tag/course?tag=a',title:'xxx'});">
          <div class="home-icon-div" style="background:#FFC332;width:46px;height:46px;">
            <span class="icon icon-68 home-icon" style=""></span>
          </div>
          <p class="weui_grid_label">
              xxx
          </p>
      </div>

 -->

    </div>




  <div style="background:#F0F0F0;height:4px;">
  </div>



<!-- 
    <div class="mu-sub-header inset" style="padding-left: 16px;">
        根据类别找课程
    </div>
 -->

    <div style="display: flex;justify-content: center;padding: 13px 7px 8px 8px;background: white;width: 100%">

        <div style="display: flex;justify-content:flex-start;flex-wrap: wrap;width:100%;">

<!--             
            <div class="skill-contentbox" style="background-image:linear-gradient(-180deg, #F9A57F 0%, #E26D5C 100%);"

              onclick="call_native('openwin_with_nav',{nav_data_:[{txt:'所有',url:'/course/index?type=1'},{txt:'必备课程',url:'/course/index?tag=必备课程&type=1'},{txt:'辅助课程',url:'/course/index?tag=辅助课程&type=1'},{txt:'岗位课程',url:'/course/index?tag=岗位课程&type=1'}],title:'商学院'});" 
      
              aaonclick="call_native('open_win',{url:'/course/index?type=1',title:'标配课程'});">
                <div class="skill-content-text"><nobr>商学院</nobr></div>
                <div class="skill-content-img">
                    <img src="/svg/hulianwang.svg">
                </div>
            </div>
 -->


            <div class="skill-contentbox" style="--background-image:linear-gradient(-180deg, #F9A57F 0%, #E26D5C 100%);"

              onclick="call_native('openwin_with_nav',{nav_url_:'/nav/course_task_pub',nav_data__:[{txt:'所有',url:'/course/index?type=1'},{txt:'必备技能',url:'/course/index?tag=必备技能&type=1'},{txt:'辅助技能',url:'/course/index?tag=辅助技能&type=1'},{txt:'岗位技能',url:'/course/index?tag=岗位技能&type=1'}],title:'商学院'});" 
      
              aaonclick="call_native('open_win',{url:'/course/index?type=1',title:'标配课程'});">
                <div class="skill-content-text">
                  <img src="/icons/mod_sxy.jpg" style="width:100%;" >
                </div>
            </div>


            <div class="skill-contentbox" style="--background-image:linear-gradient(-180deg, #8FE25A 0%, #68B238 100%);"
              onclick="call_native('openwin_with_nav',{nav_url_:'/nav/course_task_self',nav_data__:[{txt:'必备技能',url:'/task/self?tag=必备技能'},{txt:'辅助技能',url:'/task/self?from=辅助技能'},{txt:'岗位技能',url:'/task/self?from=岗位技能'}],title:'企业课堂'});">
                <div class="skill-content-text">
                  <img src="/icons/mod_qykt.jpg" style="width:100%;" >
                </div>
            </div>


            <?php if($_SESSION['edu_user']['type']==2 || 1 ){?>

            <div class="skill-contentbox" style="--background-image:linear-gradient(-180deg, #F8A63B 0%, #FD3C25 100%);width: 97%;"
              onclick="call_native('openwin_with_nav',{nav_url_:'/nav/course_recommand',nav_data_:[{txt:'所有',url:'/course/index?type=2'},{txt:'必备课程',url:'/course/index?tag=必备课程&type=2'},{txt:'辅助课程',url:'/course/index?tag=辅助课程&type=2'},{txt:'岗位课程',url:'/course/index?tag=岗位课程&type=2'}],title:'推荐课程'});" >
                <div class="skill-content-text">
                  <img src="/icons/mod_recommand.jpg" style="width:100%;" >
                </div>
            </div>

            <?php }?>

        </div>
    </div>





    <div class="mu-sub-header inset" style="padding-left: 16px;">
        公告
    </div>

    <div>
      <vue_autoload_list url_="/index/aj_announce" interval_="5"></vue_autoload_list>
    </div>

  </div>
</div>



<script type="text/javascript">

function ajaxSignIn(){
  $$.ajax({
    url:'/member/aj_sign_in',
    succ:function(data){
      // alert($$.js2str(data))
    }
  })
}

var v_instance = new Vue({
  el: '#v_main',

  data: function(){
    return {
      title:'',
      content:'',
      refreshing: true,
      can_save: false,
      files:[],
      uploading: false,
    }
  },

  methods: {

  },

  watch: {
  },

})

</script>




<?php
include \view('inc_home_footer');

