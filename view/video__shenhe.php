<?php
include \view('inc_home_header');
include \view('vue_comment_list');
?>

<div>

  <div v-cloak id="v_main" style="position:fixed;z-index:1;left:0;top:0;">


    <video id="my-video" class="video-js" controls preload="false" width="<?=$_SESSION['_width']?>" height="<?=tpl_videoHeight($_SESSION['_width'])?>"
    poster="<?=$__video['pic']?>" data-setup="{}"  webkit-playsinline playsinline>
      <source src="<?=$__video['filepath']?>" type='video/mp4'>
      <p class="vjs-no-js"></p>
    </video>



</div>

<script type="text/javascript">
    // <v_video img_="/uploads/video/006.jpg"></v_video>
  
$$.vue({
  el:'#v_main',
})
</script>


<style>
.border-top-eee {
  border-top: 1px solid #EEE;
}
img {
  max-width: 100%;
}

.artHeader {
    display: block;
    float: left;
    width: 100%;
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
    font-size: 1.75rem;
    padding-top: 0.1rem;
}
.details article .artSub {
    padding-top: 2.25rem;
    font-size: 1.85rem;
    border-top: 1px solid #c8c8c8;
}
</style>

<div v-cloak id="v_video_shenhe" style="margin:0 5px 0 5px;color:#4B4B4B;margin-top:<?=tpl_videoHeight($_SESSION['_width'])?>px;">


  <div class="articles details" style="background:#FFFFFF;">
      <!-- main postlist start -->
      <article class="first" style="padding:10px;">
          <div class="artHeader">
            <b><?=$__video['name']?></b>
            <p class="artnote">CNE · <?=\printdate($__video['create_at'])?></p>
          </div>


    <div id="post_19608181" style="clear:both;">
      <div id="pid19608181" class="artSub pl-body">
        <?=$__video['desc']?>

        <div style="clear:both;width:100%"></div>
      </div>
    </div>
    </article>
    <!-- main postlist end -->


  </div>










  
  <section v-choak v-if="show_add_comment" id="" class="details" style="background:-#FFFFFF;">

      <div class="weui_cells weui_cells_form">
                
              <div class="weui_cell">
                  <div class="weui_cell_bd weui_cell_primary">
                      <textarea class="weui_textarea"   
                        placeholder="请输入评论"
                        v-model="content"
                        rows="3"
                      ></textarea>
                      <div class="weui_textarea_counter"><span id="textarea_num">剩余200字</span></div>
                  </div>
              </div>

              <script>
                $(function(){
                  $(".weui_textarea").on("input paste" , function(){
                        var num_left=200-$(this).val().length;
                        if(num_left<0){
                          $("#textarea_num").text("超过"+(-num_left)+"字");
                          $("#textarea_num").css("color","#E44443");
                        }else{
                          $("#textarea_num").text("剩余"+(num_left)+"字");
                          $("#textarea_num").css("color","#999999");
                        }
                      });

                })
              </script>   

                
      </div>









      <div class="p"><a @click="ajaxSave" class="weui_btn weui_btn_primary open-popup " data-target="#popup">提交</a></div>






  </section>











  <style type="text/css">

section .optPanel {
    background: #fafafa;
    border-radius: 10px;
    height: auto;
    overflow: hidden;
    padding: 1.5rem;
}

.pinglun .avatar {
    display: block;
    width: 4rem;
    height: 4rem;
    border-radius: 50%;
    float: left;
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
    font-size: 1.675rem;
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

  </style>
  
  <div class="weui_cells_title" style="margin:20px 0px 5 0px;font-size:1.65rem;padding-top:1.85rem;padding-bottom:0.55rem;">
    <span style="margin-left:0px;">评论</span>
    <span style="margin-left:10px;" @click="addcomment">我要评论</span>
    <!-- <span style="margin-left:10px;"  onclick="call_native('open_win',{url:'/add/comment?_last_uid=<?=$_GET["_uid"]?>',title:'添加评论',type:'replace',});">我要评论<?=$_GET["_uid"]?></span> -->
  </div>






  <section class="details" style="background:-#FFFFFF;">
    <div class="optPanel pingluns" id="pingluns">

<!-- 
          <div class="pinglun" id="pid19608394">
            <img src="" class="avatar" onerror="this.onerror=null;this.src='/app/noavatar_big.gif'" />

            <div class="pl-content">
                <div class="pl-head">
                    <div class="pl-date">weber_chuck &nbsp;2016.11.18</div>
                    <div class="pl-floor">                                
                      <div class="first">沙发</div>   
                    </div>
                </div>
                <div class="pl-body">怎么添加到系统表情库                        
                </div>
            </div>
          </div>
 -->

          <vue_comment_list url="/comment/aj_list?" length="10" v-bind:should_reload_="should_reload" autoload="true"></vue_comment_list>




    </div>
  </section>





</div>


<script type="text/javascript">
  $$.vue({
    el:'#v_video_shenhe',

    data: function(){
      return {
        show_add_comment: false,
        // comments: [],
        should_reload: false,
      }
    },

    _init: function(){
      this.reloadComment()
    },

    methods: {
      addcomment: function(){
        this.show_add_comment = true
      },

      // reloadComment: function(){
      //   var self = this

      //   $$.ajax({
      //     url: '/comment/aj_list?&length=10&page=0',
      //     data: {
      //       title: this.title,
      //       content: this.content,
      //     },
      //     succ: function(data){
      //       self.comments = data.ls
      //     },
      //     fail: function(msg,code){
      //     },

      //   })

      // },

      ajaxSave: function(){
        var self = this
        $$.ajax({
          url: '/add/aj_comment_save',
          data: {
            // title: this.title,
            content: this.content,
            video_id: '<?=$__video['id']?>',
          },
          succ: function(data){
            self.should_reload = $$.getTime()
            self.show_add_comment = false

            // alert('添加成功')
            // call_native('event',{
            //   event_name: 'RELOAD_ROUTE',
            //   event_key: 'ask_list',
            // })
            // call_native('event',{
            //   event_name: 'NAV_GO_BACK',
            //   id:'xxxx',
            // })

            // $$.event.pub('COMMENT_SAVED')

            // call_native('event',{
            //   event_name: 'RELOAD_ROUTE_DELAY',
            //   uid: '<?=$_GET["_last_uid"]?>',
            // })
            

          },
          fail: function(msg,code){
            alert('添加失败 '+$$.js2str(msg))
          },

        })

      },

    },

  })
</script>






<?php
include \view('inc_home_footer');
?>