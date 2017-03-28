<?php
include \view('inc_home_header');
// include \view('vue_video_list');
// print_r($_SESSION['edu_user']);
?>

<style type="text/css">
  .s-title {
    font-size: 1.8rem;
  }
</style>

<div v-choak id="v_main">
  

<div class="weui_grids bgwhite" style="padding-top:4px;">


  <!-- <div class="weui_cells_title">探索</div> -->

  <div class="bgwhite" style="padding-top:4px;">

  <?php
  foreach ($__videos as $video) {
  ?>
    <div class="s-p" onclick="javascript:call('/test/shenhe?id=<?=$video['id']?>','<?=$video['name']?>');void(0);">

      <div class="s-box" style="height:16rem;">
        <div class="s-img-top" style="padding-top: 43%;background-image:url(<?=$video['pic']?>);"></div>
          <div class="s-masker"> 
        </div> 
      </div>

            <div class="s-title-bottom" style="font-size:1.6rem;"><?=$video['name']?> <span style="font-size:1.2rem;color:#999;"><?=\printdate($video['create_at'])?></span> 
            </div>
    </div>
  <?php
  }
  ?>
<!-- 
    <div class="s-p" onclick="javascript:call('/test/shenhe');void(0);">

      <div class="s-box" style="height:16rem;">
        <div class="s-img-top" style="padding-top: 43%;background-image:url(http://photocdn.sohu.com/20110510/Img307175268.jpg);"></div>
          <div class="s-masker"> 
            <div class="s-title"> 提高员工执行力 
              <br> 
              <span class="s-time"><?=date('Y-m-d')?></span> 
            </div>
        </div> 
      </div>

    </div>


    <div class="s-p" onclick="javascript:call('/test/shenhe');void(0);">

      <div class="s-box" style="height:16rem;">
        <div class="s-img-top" style="padding-top: 43%;background-image:url(http://photocdn.sohu.com/20110510/Img307175268.jpg);"></div>
          <div class="s-masker"> 
            <div class="s-title"> 提高员工执行力 
              <br> 
              <span class="s-time"><?=date('Y-m-d')?></span> 
            </div>
        </div> 
      </div>

    </div>

 -->


    <div style="clear:both;width:100%;text-align:center;height:2.5rem;padding-top:20px;color:#999;font-size:2rem;">敬请期待，我们正在努力更新
    <br />
    <br />
    </div>







  </div>







</div>



<script type="text/javascript">

$$.vue({
  el:'#v_main',
})

$(function(){

}); 
</script>





<?php
include \view('inc_home_footer');
?>