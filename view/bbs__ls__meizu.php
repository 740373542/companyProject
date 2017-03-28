<?php
include \view('inc_header');
?>

<style type="text/css">
.m_article {
    font-size: 1.86rem;
    /*padding: .2rem 0;*/
    padding: 0rem 0;
    border-bottom: 1px solid #e5e5e5;
    margin: 0rem;

    background: #FFF;
    width: 100%;
}

section {
    background: #f6f6f6;
    width: 6.9rem;
}

.m_article .m_article_img {
    float: left;
    width: 27%;
    max-height: 8.3rem;
    overflow: hidden;
    position: relative;
    margin-right: 1.0rem;
    margin-top: 0.4rem;
}

.m_article .m_article_img img {
  width: 100%;
}

.m_article .m_article_info {
    overflow: hidden;
    padding-bottom: 4px;
    padding-left: 0.8rem;
}

.m_article .m_article_img .m_article_mark {
    color: #fff;
    background: #FF0000;
    font-size: 1.7rem;
    text-align: center;
    padding: .04rem;
    position: absolute;
    display: inline-block;
    left: 0;
    top: 0;
    width: 4.6rem;
    height: 2.4rem;
    line-height: 2.4rem;
    opacity: .9;
}

.m_article .m_article_info .m_article_title {
    font-size: 2.10rem;
    margin-top: .5rem;
    margin-bottom: .5rem;
    color: #404040;
    line-height: 2.76rem;
    padding-right: 0.8rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    overflow: hidden;
    -webkit-line-break: auto;
    -webkit-box-orient: vertical;
}

.m_article .m_article_desc .m_article_channel {
    display: inline-block;
    color: rgba(255,51,51,0.9);
    font-size: 12px;
    padding: 2px;
    line-height: 12px;
    margin-right: .1rem;
    background: url(http://img2.cache.netease.com/f2e/wap/common/images/border_red.png) no-repeat;
    background-size: 100% 100%;
}

.m_article .m_article_desc .m_article_time {
    font-size: 1.24rem;
    color: #888;
    display: inline-block;
}

.m_article .m_article_desc .m_article_desc_r {
    display:  none;

    float: right;
    background-size: contain;
    background-position: left 0;
    background-repeat: no-repeat;
    color: #888;
    line-height: .37rem;
}



.m_article .m_article_info {
  background: #FFF;
}

.m_article .touch_active {
  background: #DEDEDE;
}
</style>



<style type="text/css">
  
#bbs_header .nav {
    width:39%;
    margin: 0 5%;
    display:inline-block;text-align:center;
    line-height: 40px;
    font-size: 16px;
    color: #FFF;
}

a{
 text-decoration:none;
}

.bg-blue {
   background:#5796FF; 
}

.bg-orange {
   background:#FF6B00; 
}

.bg-green {
   background: #ef4f4f;
}

.float-container {
  /*display: flex;*/
  /*flex-direction: row;*/
  background: #FF0000;
  border-radius: 50%;
  width:4.5rem;
  height:4.5rem;
  line-height: 4.5rem;
  text-align: center;
  font-size: 1.6rem;
  color: #FFF;
}

</style>

<?php
$pagemark = 'page_'.time();
?>


        <?php if (empty($_GET['sort'])) {?>

        <a href="/bbs/corp_ls?sort=sort_order&id=<?=$_GET['id']?>" class="nav bg-blue">
        <div id="bbs_header" class="float-container" style="position:fixed;z-index:9999;bottom:17rem;right:20px;background:#1255CC;"
        >
          头条
        </div>
        </a>

        
        <?php } else {?>
        <a  href="/bbs/corp_ls?&id=<?=$_GET['id']?>" class="nav bg-green">
        <div id="bbs_header" class="float-container" style="position:fixed;z-index:9999;bottom:17rem;right:20px;background:#62BD77;"
        >
          最新
        </div>
        </a>
        <?php } ?>

        <div id="bbs_header" class="float-container" style="position:fixed;z-index:9999;bottom:10rem;right:20px;"
          onclick="call_native('open_win',{url:'/add/ask?_pagemark=<?=$pagemark?>&bbs_id=<?=$_GET['id']?>&_event=<?=$__event?>',title:'添加话题',type:'replace',});"
        >
          +
        </div>

<!-- 
        <div id="bbs_header" style="background:#F1F1F1;margin:0px;padding:10px 0 10px 0;position:absolute;width:100%;z-index:999;bottom:60px;right:20px;">
            <?php if (empty($_GET['sort'])) {?>
            <a href="/bbs/corp_ls?sort=sort_order&id=<?=$_GET['id']?>" class="nav bg-blue">头条</a>
            <?php } else {?>
            <a  href="/bbs/corp_ls?&id=<?=$_GET['id']?>" class="nav bg-green">最新</a>
            <?php } ?>
            <div class="nav bg-orange"
               onclick="call_native('open_win',{url:'/add/ask?_pagemark=<?=$pagemark?>&bbs_id=<?=$_GET['id']?>&_event=<?=$__event?>',title:'添加话题',type:'replace',});"
            >发布</div>
        </div>
        
 -->

<div class="swipe-content content-list" style="position:relative;width:100%;overflow-x:hidden;padding-top:0px;">



<?php
if ( empty($__news) ) {
?>
  <div style="width:100%;height:100%;padding-top:3rem;text-align:center;font-size: 1.8rem;color:#999;">
      暂时没有内容
  </div>
<?php
}
?>

  <style type="text/css">
    section .ui-label {
        background: #FFFF00;
    }

    section .touch_active {
      background-color: #e3e3e3;
    }
  </style>


<?php
foreach ($__news as $item) {
  // print_r($item);
?>
  <section class="m_article list-item list-article  clearfix " id="C67VEK78liu_li">
      <a onclick="call_native('open_win',{url:'/bbs/detail?id=<?=$item['id']?>',title:'auto'});">
          <div class="m_article_info stouchable">
              <div class="m_article_title">
                  <span>
                    <?=$item['title']?>
                  </span>
              </div>
              <div class="m_article_desc clearfix">
                  <div class="m_article_desc_l">
                        <?php if(!empty($item['files'])) {?>
                          <span class="m_article_channel">图</span>
                        <?php }?>
                          
                      <span class="m_article_time"><?=$item['create_at']?></span>
                  </div>
                      <div class="m_article_desc_r">
                          <div class="left_hands_desc">
                              <span class="iconfont">xxx</span>0
                          </div>
                      </div>
              </div>
          </div>
      </a>
  </section>

<?php
}
?>


</div>


<script type="text/javascript">
  $(function () {

        //按钮点击效果
        $(document).on("touchstart", ".stouchable:not(.disable)", function (e) {
            var $this = $(this);
            var flag = true;
            //遍历子类
            $this.find("*").each(function () {
                //查看有没有子类触发过active动作
                if ($(this).hasClass("touch_active")) flag = false;
            });
            //如果子类已经触发了active动作，父类则取消active触发操作
            if (flag) $this.addClass("touch_active");

        });

        $(document).on("touchmove", ".stouchable:not(.disable)", function (e) {
            if ($(this).hasClass("touch_active")) $(this).removeClass("touch_active");
        });

        $(document).on("touchend", ".stouchable:not(.disable)", function (e) {
            if ($(this).hasClass("touch_active")) $(this).removeClass("touch_active");
        });


});





window.call_from_native = window.call_from_native || {}
window.call_from_native['ADD_BBS_SUCC'] = function(msgstr, msg) {
  // alert('in web:'+msgstr)
  var msg = $$.str2js(msgstr)
  if(msg.page_mark == '<?=$pagemark?>'){
    window.location.reload();
  }
}


</script>


<?php
include \view('inc_footer');
?>

