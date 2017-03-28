<?php
include \view('inc_header');
include \view('vue_bbs_list');
?>

<?php
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
    /*color: rgba(255,51,51,0.9);*/
    background: rgba(255,51,51,0.9);
    color: #FFF;
    border-radius: 3px;

    font-size: 12px;
    padding: 2px;
    line-height: 12px;
    margin-right: .1rem;
    /*background: url(http://img2.cache.netease.com/f2e/wap/common/images/border_red.png) no-repeat;*/
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
 
</style>

        <?php if ($__type=='BBS') {?>
          <?php $bottom=8;?>
          <?php $style='right:15px;';?>


          <div data-ripple-color="#FFF" data-ripple-class="" class="ripple float-container" style="position:fixed;z-index:9999;bottom:<?=$bottom?>rem;<?=$style?>"
            onclick="call_native('open_win',{url:'/add/ask?bbs_id=<?=$_GET['id']?>&_event=<?=$__event?>&_pagemark=<?=$__pagemark?>&_type_id=<?=$__type_id?>',title:'添加话题',type:'replace',});"
          >
            +
          </div>

          <?php $bottom+=8;?>

          <?php if (empty($_GET['sort'])) {?>

          <a href="/bbs/corp_ls?sort=sort_order&id=<?=$_GET['id']?>&type_id=<?=$__type_id?>" class="nav bg-blue">
          <div data-ripple-color="#FFF" data-ripple-class="" class="ripple float-container" style="position:fixed;z-index:9999;bottom:<?=$bottom?>rem;<?=$style?>background:#1255CC;"
          >
            头条
          </div>
          </a>

          
          <?php } else {?>
          <a  href="/bbs/corp_ls?&id=<?=$_GET['id']?>&type_id=<?=$__type_id?>" class="nav bg-green">
          <div data-ripple-color="#FFF" data-ripple-class="" class="ripple float-container" style="position:fixed;z-index:9999;bottom:<?=$bottom?>rem;<?=$style?>background:#62BD77;"
          >
            最新
          </div>
          </a>
          <?php } ?>


        <?php }?>


<div v-cloak id="v_main" class="swipe-content content-list" style="position:relative;width:100%;overflow-x:hidden;padding-top:0px;">



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
if(!empty($__news)){
  foreach ($__news as $item) {
    // print_r($item);
  ?>
    <section class="m_article list-item list-article  clearfix " id="C67VEK78liu_li">
        <a onclick="call_native('open_win',{url:'/bbs/detail?id=<?=$item['id']?>&_type_id=<?=$__type_id?>',title:'auto'});">
            <div data-ripple-color="#999" data-ripple-class="" class="ripple m_article_info -stouchable" style="padding:20px 10px;position:relative;">
                <div class="m_article_title" style="padding-bottom:6px;">
                    <span>
                      <?=$item['title']?>
                    </span>
                </div>
                <div class="m_article_desc clearfix">
                    <div class="m_article_desc_l">
                          <?php if(!empty($item['files']) && $item['files']!='null') {?>
                            <?php
                            // print_r($item['files']);
                            ?>
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
}
?>


<v_bbs_list url_="/bbs/aj_ls?id=<?=$_GET['id']?>&sort=<?=$_GET['sort']?>&page=2&" page_="2" type_id_="<?=$__type_id?>" length_="<?=$__length?>" autoload_="true"></v_bbs_list>


<!-- 
  <div class="p" style="width:100%;"><div class="ripple_button ripple" style="margin:10px;height:45px;line-height:45px;font-size:18px;;background:#1255CC;text-align:center;color:#FFF;border-radius: 2px;">提交</div></div>
 -->



</div>




<script type="text/javascript">
var v_instance = $$.vue({
  el:'#v_main',
  data: function(){
    return {
      should_reload: false,
    }
  },

  methods: {
  },

})

</script>

<script type="text/javascript">
window.call_from_native = window.call_from_native || {}
window.call_from_native['ADD_BBS_SUCC'] = function(msgstr, msg) {
  var msg = $$.str2js(msgstr)
  if(msg.page_mark == '<?=$__pagemark?>'){
    window.location.reload();
  }else{
  }
}
</script>


<?php
include \view('inc_footer');
?>

