<?php
include \view('inc_home_header');
?>

<div v-choak id="v_main">

  <style type="text/css">
    .ui-label-list .ui-label {
        padding: 0.1rem 1.3rem 0.1rem 1.3rem;
        border-bottom: 1px solid #eee;
        font-size:1.6em;
        /*background: #FFFFFF;*/
        background: #F1F1F1;
        /*color: #FFF;*/
        color: #666;
    }

    .ui-label-list .touch_active {
      background-color: #e3e3e3;
    }
  </style>


    <div class="s-p">

      <div class="s-box">
        <div class="s-img" style="padding-bottom: 33%;background-image:url(/uploads/video/banner_x_<?=$__id?>.jpg);"></div>
          <div class="s-masker"> 
            <div class="s-title"> 
              <span class="s-time"><?=date('Y-m-d')?></span> 
            </div>
        </div> 
      </div>

    </div>




  <div class="weui_cells_title">专家推荐</div>

    <div class="bgwhite" style="padding-top:4px;">


      <ul class="flex-container space-around">
        <li class="flex-item flex-item-2 stouchable">

        <div class="s-box" style="height:10rem;">
          <div class="s-img" style="padding-bottom: 10rem;background-image:url(/uploads/video/005.jpg);"></div>
            <div class="s-masker"> 
              <div class="s-title"> 洗颜新潮流！人气洁面皂排行榜 <br> <span class="m-time">2016-03-18</span> 
            </div>
          </div> 
        </div>

        </li>
        <li class="flex-item flex-item-2 stouchable">销售</li>
        <li class="flex-item flex-item-2 stouchable">客服</li>
        <li class="flex-item flex-item-2 stouchable">生产/营运</li>
        <li class="flex-item flex-item-2 stouchable">行政/后勤</li>
        <li class="flex-item flex-item-2 stouchable">高级管理</li>
      </ul>

    </div>

  </div>








</div>

<script type="text/javascript">

$$.vue({
  el:'#v_main',
})

</script>





<?php
include \view('inc_home_footer');
?>
