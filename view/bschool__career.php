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



  <div class="weui_cells_title">请选择</div>






  <div class="bgwhite" style="padding-top:4px;">

    <style type="text/css">

    .flex-container {
        padding: 0;
        margin: 0;
        list-style: none;
        -ms-box-orient: horizontal;
        display: -webkit-box;
        display: -webkit-flex;
        display: flex;
    }

    .space-around {
        justify-content: space-around;
        /*justify-content: flex-start;*/
        flex-wrap: wrap;
    }

    .flex-center-text {
        position: absolute;
        top:50%;
        background: #FF0000;
        width: 100%;
        /*height: 50px;*/
        margin: 5px;
        /*line-height: 50px;*/
        color: #666;
        /*font-weight: bold;*/
        font-size: 1.6em;
        text-align: center;

    }


      .flex-item {
          background: #F1F1F1;
          /*color: #FFF;*/
          /*width: 25%;*/
          position: relative;
          width: 44%;
          
          /*margin: 0.5%;*/
          /*line-height: 50px;*/
          color: #999;
          font-weight: bold;
          font-size: 1.5rem;
          margin-bottom: 1rem;
          text-align: left;
          color: #888;
/*
          background-image:url(/app/3.jpg);
          background-repeat:no-repeat;
          background-position:bottom right;
          background-size: cover;
*/
      }

      .s-height-m {
        height: 8rem;
      }

      .flex-item-2 {
          width: 47%;
      }

      .col-4 {
          width: 30%;
      }

      .text-center-center {
        position: absolute;
        top:50%;
        transform: translateY(-50%); 
        /*background: #FF0000;*/
        display: inline-block;
        /*position: absolute;*/
        text-align: center; 
        /*text-shadow: 0 0 2px rgba(0,0,0,0.7);*/
        width: 100%;
      }
      

    li {
        display: list-item;
        text-align: -webkit-match-parent;
    }

    .flex-container .touch_active {
      background-color: #e3e3e3;
    }
    </style>



    <ul class="flex-container space-around">
    <?php
    // echo '<pre>';
    // print_r($__cates['sub_cates']);
    // echo '</pre>';
    if(!empty($__cates['sub_cates'])){
      foreach ($__cates['sub_cates'] as $k => $v) {
      ?>
        <li class="flex-item s-height-m col-4 stouchable">
          <div class="text-center-center"><span class="icon icon-49"></span><?=$v['name']?></div>
        </li>
      <?php
      }
    }
    ?>
    </ul>

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
