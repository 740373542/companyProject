<?php
include \view('inc_header');
?>

<script type="text/javascript">

// var playVideo = function(video, startPlay){
//   if(!startPlay) startPlay = false;

//   video.event_name = 'RECEIVE_VIDEO_INFO'
//   video.play = startPlay
//   video.page_token = page_token
//   video.course_id = '<?=$__course['id']?>'
//   // alert('web:'+$$.js2str(video))

//   call_native('event',video)
// }



var playVideo_fullscreen = function(video, startPlay){
  // alert('web:'+$$.js2str(video))

  if(!startPlay) startPlay = false;

  video.event_name = 'PLAY_VIDEO_IN_COURCE'
  video.play = startPlay
  video.page_token = page_token
  video.course_id = '<?=$__course['id']?>'
  // alert('web:'+$$.js2str(video))

  call_native('event',video)
  
}

var playVideo = function(video, startPlay){
   if(!startPlay) startPlay = false;
 
   video.event_name = 'RECEIVE_VIDEO_INFO'
   video.play = startPlay
   video.page_token = page_token
   video.course_id = '<?=$__course['id']?>'
   // alert('web:'+$$.js2str(video))
 
   call_native('event',video)
  
}



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


<style>
.pl-content {
  display: inline-block;
  width:100%;
}

</style>

<img src="<?=$__course['pic']?>" style="width:100%" />

<div id="v_main" style="margin:0 5px 0 5px;color:#4B4B4B;margin-top:0px;">
 

<div style="display: flex;flex-direction: column;width: 100%;background: #-ff0000;margin-top: 0px;">



      <div style="display: flex;flex-direction: column;justify-content: space-around;width: 100%;background: #FFF;box-shadow: 0px 1px 1px 0px rgba(0,0,0,0.1);box-sizing: border-box;padding: 5px 10px;z-index: 111;">
        <div style="font-size:18px;color:#414141;;"><?=$__course['name']?> </div><!-- 需要规定字段长度 -->

        <div style="display: flex;justify-content: flex-start;">
          <div style="font-size:13px;color:#414141;">讲师：<?=$__course['teacher']?></div>
          <!-- <div style="font-size:13px;color:#414141;margin-left: 20px;">2016-11-12</div> -->
        </div>

        <div style="display: flex;justify-content: flex-start;max-height:100px;overflow:hidden;">
          <div style="font-size:13px;color:#414141;"><?=$__course['desc']?></div>
        </div>

        <div style="display: flex;justify-content: flex-start;max-height:100px;">
          更多
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



      <div id="id_video_<?=$vid?>" style="display: flex;align-items: center;padding: 0px 10px;min-height:86px;justify-content: space-between;width: 100%;border-bottom:1px solid rgba(0,0,0,0.1);background: #FFF;font-size:16px;color:#757575;font-weight: 500;">
        <div style="display: flex;justify-content: flex-start;align-items: center;flex:1;">








            <div style="height: 28px;width: 28px;min-width: 28px;" class="ripple" data-ripple-color="blue" style="float:left;" 
              onclick="javascript:playVideo({id:'<?=$video['id']?>',length:'<?=$video['length']?>',url:'<?=\getFullPath($video['filepath'])?>',pic:'<?=\getFullPath($__course['pic'])?>'},true);void(0);">

              <img src="/svg/fenjibofang.svg" style="width: 100%">
            </div>

            <?php
            if($route=='TEST'){
            ?>



            <div class="pl-content ripple" style="" onclick="javascript: call_native('<?=\model\task::$CONF_TYPE_2_NAV_ROUTE[''. \model\task::$CONF_TYPE[$route] ]?>',{url:'<?=$url?>', }); void(0);"  data-ripple-color="#f1f1f1">
            <?php
            }else if($route=='VIDEO'){
            ?>










            <div class="pl-content ripple"  style="" data-ripple-color="red" onclick="javascript:playVideo({id:'<?=$video['id']?>',length:'<?=$video['length']?>',url:'<?=\getFullPath($video['filepath'])?>',pic:'<?=\getFullPath($__course['pic'])?>',task_id:'<?=$_GET['task_id']?>'},true);void(0);" >
            <?php
            }else{
            ?>


            <div class="pl-content" style="" onclick="javascript:alert('您已完成');">


            <?php
            }
            ?>

                <div style="height: 16px;"></div>
                <div style="margin-left: 15px;">第<?=($idx)?>集 <?=$video['name']?> <?=$processData[$videoId]?><br><div style="height: 4px;"></div><videotime style="color: #999999;font-size: 15px;"><?=\gmstrftime('%M:%S',$video['length'])?></videotime>
                </div>
                <div style="height: 16px;"></div>
               
            </div>

        </div>
        <?=\tpl_video_text_next_action($__o_process->content, $vid)?>

      </div>

    <?php
    }
  }
  ?>




</div>








<script type="text/javascript">

var reload = function() {

}

window.call_from_native = window.call_from_native || {}
window.call_from_native['VIDEO_PLAY_DONE'] = function(v){
  // alert('web::'+$$.js2str(v))
  window.location.reload()
}

window.call_from_native['TASK_DONE'] = function(){
  window.location.reload()
}

</script>

<?php
include \view('inc_home_footer');
?>