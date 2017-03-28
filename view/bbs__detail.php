<?php
include \view('inc_vue_header');
?>
<link rel="stylesheet" href="/style/loading.css"/>

<script src="/public/v_aaa_bundle.js"></script>
<?php include \view('inc_vue_header_js'); ?>

<!-- ?_pagemark=<?=$pagemark?>&target_id=<?=$_GET['id']?>&_event=<?=$__event?> -->

<?php
$files = \de($__news['files']);
if(empty($files)) $files = [];
?>


  <?php $bottom=8;?>
  <?php $style='right:15px;';?>
  
  <div>
</div>

<style type="text/css">

  section .optPanel {
      background: #fafafa;
      border-radius: 10px;
      height: auto;
      overflow: hidden;
  }

  .pinglun:first-child {
      padding-top: 1.1rem;
  }
  .pinglun {
      height: auto;
      overflow: hidden;
      clear: both;
      border-bottom: 1px solid #EEE;
      padding: 1.7rem 0;
  }
  .pinglun .pl-content {
      display: block;
      float: right;
      width: 85%;
      height: auto;
      overflow: hidden;
      padding-left: 0;
  }
  .pinglun .pl-date, .pinglun .pl-floor {
      color: #b5b5b5;
      font-size: 1.55rem;
      line-height: 2.3rem;
      float: left;
  }
  .pinglun .pl-body {
      clear: both;
      color: #7d7d7d;
      font-size: 1.875rem;
      line-height: 2.1rem;
  }
  .pinglun .pl-body .quote {
      font-size: 0.875rem;
      color: #a3a3a3;
  }
  .pl-body .quote {
      background: #fff;
      border-radius: 10px;
      padding: 0.3rem;
      border: 2px dashed #d5d5d5;
      margin-top: 1rem;
  }
  .pl-body .blockcode, .pl-body .quote {
      margin: 5px 0;
      zoom: 1;
  }

  .demo-float-button {
    position: fixed;
    z-index: 9999;
    bottom: 68px;
    right: 15px;
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

  .mu-sub-header {
    line-height: 28px;
  }

  table, td, th {
    border-collapse: collapse;
    border:1px solid #333;
  }

</style>



<div v-cloak id="v_main" style="margin:0 5px 0 5px;color:#4B4B4B;margin-top:0;">
      <!-- main postlist start -->
      <div>
        <mu-sub-header style="font-size:16px;color:#212121"><?=$__news['title']?></mu-sub-header>
        <mu-content-block >
          <div style="font-size:16px;">
          <?=$__news['content']?> 
          </div>

          <div style="width:100%;text-align:center;">
            <?php
            if( !empty($__news['files']) && $__news['files']!='null' ){
              $files = \de($__news['files']);
              foreach ($files as $k => $file) {
                ?>
                  <br /><img src="<?=__HOST__.''.$file?>" style="max-width:100%;" >

                <?php
              }
            ?>

            <?php
            }
            ?>
          </div>
        </mu-content-block>
        <mu-float-button  class="demo-float-button" @click="reply">回复</mu-float-button>
      </div>


      <section class="details" style="background:-#FFFFFF;">

        <div class="optPanel pingluns" id="pingluns">
          <vue_news_comment_list url="/comment/aj_commcomments?id=<?=$_GET['id']?>&desc=id" length="10" v-bind:should_reload_="should_reload" autoload="true"></vue_news_comment_list>
        </div>
      </section>
      <a name="comments"></a>
</div>




<?php
include \view('vue_news_comment_list');
?>



<script type="text/javascript">
  setTimeout(function(){
    call_native('event',{
      event_name: 'CHECK_NOTICE',
      notice:0,
    })
  },2000)
</script>

<script type="text/javascript">

var v_instance = $$.vue({
  el:'#v_main',
  data: function(){
    return {
      should_reload: false,
      title: "<?=$__news['title']?>",
    }
  },

  // mounted: function(){
  //   var self = this
  //   console.log(self.content)

  //   alert('111')
  //   $('#bbs_content').html(self.content)
  // },



  methods: {
    // 跳转回复页面
    reply:function(){
      call_native('open_win',{url:'/add/comment?submit_url=<?=urlencode($__submit_url)?>&_pagemark=<?=$__pagemark?>&_event=<?=$__event?>&_type_id=<?=$_GET['_type_id']?>',title:'回复',type:'replace',});
    },
  },

})


window.call_from_native = window.call_from_native || {}
window.call_from_native['ADD_COMMENT_SUCC'] = function(msgstr, msg) {
  var msg = $$.str2js(msgstr)
    // alert('in web:'+msgstr)
  // if(msg.page_mark == '<?=$__pagemark?>'){
    // alert($$.getTime())
    // window.location.reload();
    v_instance.setState({
      should_reload: $$.getTime(),
    })
    window.location.href = '#comments'
  // }else{
  //   // alert('do nothing')
  // }
}

</script>


<?php
include \view('inc_vue_footer');
?>