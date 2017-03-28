<?php
include \view('inc_home_header');
?>

<div v-choak id="v_main">

  <style type="text/css">
    .ui-label-list .ui-label {
        padding: 0.2rem 1.3rem 0.2rem 1.3rem;
        border-bottom: 1px solid #eee;
        font-size:1.6em;
        background: #FFFFFF;
    }
  </style>




  <div class="weui_cells_title">请选择技能</div>

  <div class="ui-label-list" style="margin-top:1rem;">
      <label class="ui-label">咨询/顾问</label>
      <label class="ui-label">艺术/设计</label>
      <label class="ui-label">科研/培训</label>
  </div>









</div>

<script type="text/javascript">

$$.vue({
  el:'#v_main',
})

$(function(){

  $('#slide2').swipeSlide({
    autoSwipe:true,//自动切换默认是
    speed:3000,//速度默认4000
    continuousScroll:true,//默认否
    transitionType:'cubic-bezier(0.22, 0.69, 0.72, 0.88)',
    //过渡动画linear/ease/ease-in/ease-out/ease-in-out/cubic-bezier
    lazyLoad:true,//懒加载默认否
    firstCallback : function(i,sum,me){
      me.find('.dot').children().first().addClass('cur');
    },
    callback : function(i,sum,me){
      me.find('.dot').children().eq(i).addClass('cur').siblings().removeClass('cur');
    }
  });

}); 
</script>





<?php
include \view('inc_home_footer');
?>
