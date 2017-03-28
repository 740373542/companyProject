<?php
$__autoheight = true;
include \view('inc_vue_header');
?>

<script src="/public/v_aaa_bundle.js"></script>
<?php include \view('inc_vue_header_js'); ?>

<?php
?>

  
<script type="text/javascript">
var playVideo = function(video, startPlay){
  // alert('web:'+$$.js2str(video))

  if(!startPlay) startPlay = false;

  video.event_name = 'PLAY_VIDEO_IN_COURCE'
  video.play = startPlay
  // video.page_token = page_token
  video.course_id = '<?=$__course['id']?>'
  // alert('web:'+$$.js2str(video))

  call_native('event',video)


      $$.ajax({
        url: '/history/play_start',
        data: data,
        succ: function(data){
          console.log($$.js2str(data))
        },

        fail: function(msg,code){
        },

      })

  
}

// var playVideo = function(video, startPlay){
//    if(!startPlay) startPlay = false;
//    // alert('web:'+$$.js2str(video))
 
//    video.event_name = 'RECEIVE_VIDEO_INFO'
//    video.play = startPlay
//    // video.page_token = page_token
//    video.course_id = '<?=$__course['id']?>'
//    // alert('web:'+$$.js2str(video))
 
//    call_native('event',video)
  
// }



var callBridgeStart = function(){
  // alert('init')
  // playVideo({
  //   id:0,
  //   course_id:<?=$__course['id']?>,
  //   length:100,
  //   url:null,
  //   pic:'<?=\getFullPath($__course['pic'])?>',
  // })
}


</script>





<?php
$course = $__course;
?>

<img src="<?=$course['pic']?>" style="width:100%">
<div id="v_main" v-cloak style="background:#-FF0000;">
  

  <div style="background:#F0F0F0;">

    <div>
      
      <div class="mu-card" style="margin-bottom:5px;">
        <div class="mu-card-title-container">
          <div class="mu-card-title" style="font-size: 18px;line-height: 24px;">
            <?=$course['name']?>
          </div>
          <div class="mu-card-sub-title" style="font-size: 12px;line-height: 16px;">
            <?=str_replace(['"','[',']'],'',$course['tags'])?>
          </div>
        </div>

      </div>


      <div class="mu-card" style="margin-bottom:5px;">

        <div class="mu-card-title-container">
          <div class="mu-card-sub-title" v-bind:style="'font-size: 12px;line-height: 16px;'+(!this.desc_open?'max-height:70px;overflow:hidden;':'')">
            <?=$course['desc']?>
          </div>
          <a @click="swith_desc">{{this.desc_open?'收缩':'展开'}}</a>
        </div>

      </div>

    </div>




  <?php
  $processData = $__o_process->content;
  // print_r($processData);
  if(!empty($__videos)){
    $idx = 0;
    foreach ($__videos as $vid => $video) {
        $idx++ ;

        $status = $__o_process->content[''.$vid];

        if($processData[$vid]=='1'){
          $url = \model\task::$CONF_TYPE_2_URL[''.\model\task::$CONF_TYPE['TEST']].'?id='.$vid.'&course_id='.$__course['id'];
          $route = 'TEST';
        }else if($processData[$vid]=='2'){
          $url = NULL;
          $route = NULL;
        }else{
          $url = \model\task::$CONF_TYPE_2_URL[''.\model\task::$CONF_TYPE['VIDEO']].'?id='.$vid.'&course_id='.$__course['id'];
          $route = 'VIDEO';
        }



    ?>


            <?php
            if($route=='TEST'){
            ?>

              <div onclick="javascript: call_native('<?=\model\task::$CONF_TYPE_2_NAV_ROUTE[''. \model\task::$CONF_TYPE[$route] ]?>',{url:'<?=$url?>', }); void(0);"
                id="id_video_<?=$vid?>" tabindex="0" class="mu-item-wrapper" style="user-select: none; outline: none; cursor: pointer; -webkit-appearance: none; background:#FFF;">
            <?php
            }else if($route=='VIDEO'){
            ?>

              <div
                onclick="javascript:playVideo({id:'<?=$video['id']?>',length:'<?=$video['length']?>',url:'<?=\getFullPath($video['filepath'])?>',pic:'<?=\getFullPath($__course['pic'])?>'},true);void(0);"
                id="id_video_<?=$vid?>" tabindex="0" class="mu-item-wrapper" style="user-select: none; outline: none; cursor: pointer; -webkit-appearance: none; background:#FFF;">

            <?php
            }else{
            ?>
              <div
                onclick="javascript:playVideo({id:'<?=$video['id']?>',length:'<?=$video['length']?>',url:'<?=\getFullPath($video['filepath'])?>',pic:'<?=\getFullPath($__course['pic'])?>'},true);void(0);" 
                __onclick="javascript:alert('您已完成');"
                id="id_video_<?=$vid?>" tabindex="0" class="mu-item-wrapper" style="user-select: none; outline: none; cursor: pointer; -webkit-appearance: none; background:#FFF;">

            <?php
            }
            ?>


                  <div style="margin-left: 0px;border-bottom:solid 1px #F0F0F0;">
                      <div class="mu-ripple-wrapper">
                      </div>
                      <div class="mu-item show-left show-right has-avatar">
                          <div class="mu-item-left">
                              <div class="mu-avatar">
                                  <div class="mu-avatar-inner">
                                      <i class="mu-icon material-icons">
                                          play_arrow
                                      </i>
                                      <!---->
                                  </div>
                              </div>
                          </div>
                          <div class="mu-item-content">
                              <div class="mu-item-title-row">
                                  <div class="mu-item-title">
                                      第<?=($idx)?>集 <?=$video['name']?> <?=$processData[$videoId]?>
                                  </div>
                                  <div class="mu-item-after">
                                  </div>
                              </div>
                              <div class="mu-item-text" style="max-height: 36px; -webkit-line-clamp: 2;">
                                  <span style="color: #999999;font-size: 15px;"><?=\gmstrftime('%M:%S',$video['length'])?></span>
                              </div>
                          </div>
                          <div class="mu-item-right">
                              <!---->
                              <?=\tpl_video_text_next_action($__o_process->content, $vid)?>
                          </div>
                      </div>
                  </div>
              </div>







    <?php
    }
  }
  ?>


  <div style="height:70px;"></div>


  </div>




  
</div>



<script type="text/javascript">

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
      desc_open: false,
    }
  },

  methods: {
    swith_desc: function(){
      this.desc_open = !this.desc_open
      // if()
    },
  },

  watch: {
  },

})

</script>



<script type="text/javascript">

var reload = function() {

}

window.call_from_native = window.call_from_native || {}
window.call_from_native['VIDEO_PLAY_DONE'] = function(v){
  // alert('web::'+$$.js2str(v))
  window.location.reload()
}

window.call_from_native['TASK_DONE'] = function(){
  // alert('TASK_DONE')
  window.location.reload()
}

</script>

<?php
include \view('inc_home_footer');

