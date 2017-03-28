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


  <div class="weui_cells_title">请选择行业</div>

  <div class="ui-label-list" style="margin-top:1rem;">
      <label class="ui-label">计算机/互联网</label>
      <label class="ui-label">贸易/消费/制造/营运</label>
      <label class="ui-label">会计/金融/银行/保险</label>
      <label class="ui-label">制药/医疗</label>
      <label class="ui-label">广告/媒体</label>
      <label class="ui-label">房地产/建筑</label>
      <label class="ui-label">专业服务/教育/培训</label>
      <label class="ui-label">服务业</label>
      <label class="ui-label">物流/运输</label>
      <label class="ui-label">政府/非赢利机构/其他</label>
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
