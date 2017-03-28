<?php
include \view('inc_header');
include \view('vue_news_comment_list');


$files = \de($__news['files']);
if(empty($files)) $files = [];
?>

<?php
?>




  <?php $bottom=8;?>
  <?php $style='right:15px;';?>
  
  <div data-ripple-color="#FFF" data-ripple-class="" class="ripple float-container" style="position:fixed;z-index:9999;bottom:<?=$bottom?>rem;<?=$style?>;"
    onclick="call_native('open_win',{url:'/add/comment?submit_url=<?=urlencode($__submit_url)?>&_pagemark=<?=$__pagemark?>&_event=<?=$__event?>&_type_id=<?=$_GET['_type_id']?>',title:'回复',type:'replace',});"
  >
    回复
  </div>
  
  <div>
</div>


<style>

.demo-float-button {
  margin-right: 12px;
  position: fixed;
  z-index: 9999;
  bottom: <?=$bottom?>rem;<?=$style?>;
}

.border-top-eee {
  border-top: 1px solid #EEE;
}

img {
  max-width: 100%;
}

.artHeader {
    display: block;
    float: left;
    width: 85.5%;
    height: auto;
    padding: 0;
    color:#222;
    font-size: 2.15rem;
}
.artAvatar {
    display: block;
    float: right;
    width: 10.5%;
    height: 20%;
}
.artHeader .artnote, .artHeader .artnote a {
    color: #b5b5b5;
    font-size: 1.45rem;
    padding-top: 0.1rem;
}
.details article .artSub {
    padding-top: 2.25rem;
    font-size: 1.65rem;
    border-top: 1px solid #c8c8c8;
}
</style>

<script type="text/javascript">
    // $$.event.pub('CHECK_NOTICE',{notice:0})

  setTimeout(function(){
    call_native('event',{
      event_name: 'CHECK_NOTICE',
      notice:0,
    })
  },2000)
</script>

<div v-cloak id="v_main" style="margin:0 5px 0 5px;color:#4B4B4B;margin-top:0;">

    <div class="articles details" style="background:#FFFFFF;">
      <!-- main postlist start -->
      <article class="first" style="padding:10px;">
          <div class="artHeader">
            <b><?=$__news['title']?></b>
            <p class="artnote">管理员 · 2016/11/18</p>
          </div>


    <div id="post_19608181" style="clear:both;">
      <div id="pid19608181" class="artSub pl-body">
        <?=$__news['content']?>
        

          <?php
          foreach ($files as $file) {
          ?>
          <img src="<?=$file?>" onerror="this.onerror=null;this.src=&quot;http://common.res.meizu.com/resources/php/bbs/static/image/noavatar_big.gif&quot;"> <br />
          <?php
          }
          ?>

        <div style="clear:both;width:100%"></div>
      </div>
    </div>

    </article>
    <!-- main postlist end -->
  </div>

  


    <div class="weui_cells_title" style="margin:20px 0px 5 0px;font-size:1.85rem;padding-top:1.85rem;padding-bottom:0.55rem;">评论</div>

    <section class="details" style="background:-#FFFFFF;">
      <div class="optPanel pingluns" id="pingluns">
        
        <vue_news_comment_list url="/comment/aj_commcomments?id=<?=$_GET['id']?>&desc=id" length="2" v-bind:should_reload_="should_reload" autoload="true"></vue_news_comment_list>

      </div>

    </section>


  <a name="comments"></a>

</div>

<script type="text/javascript">

var v_instance = $$.vue({
  el:'#v_main',
    EVENT:['SCROLL_TO_PAGE_END'],
  data: function(){
    return {
      should_reload: false,
    }
  },

  _init: function(){
  },

  methods: {
      hd_SCROLL_TO_PAGE_END: function(){
        var self = this
        alert('xxxxxxxxxxx')
      },
  },

})


window.call_from_native = window.call_from_native || {}
window.call_from_native['ADD_COMMENT_SUCC'] = function(msgstr, msg) {
  var msg = $$.str2js(msgstr)
  // alert('in web:'+msgstr+' self:<?=$__pagemark?>')
  if(msg.page_mark == '<?=$__pagemark?>'){
    // alert($$.getTime())
    // window.location.reload();
    v_instance.setState({
      should_reload: $$.getTime(),
    })
    window.location.href = '#comments'
  }else{
    // alert('do nothing')
  }
}

</script>


<?php
include \view('inc_home_footer');
?>