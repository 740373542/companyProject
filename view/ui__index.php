<?php
include \view('inc_ui_header');
include \view('m_ui_layout');
include \view('m_ui_card');
?>


<div v-choak id="v_main" style="width:100%;">
  <m_ui_layout cols_="1" >
    <m_ui_card title_="AAA"></m_ui_card>
    <m_ui_card title_="BBB"></m_ui_card>
    <m_ui_card title_="CCC"></m_ui_card>
    <m_ui_card title_="DDD"></m_ui_card>
  </m_ui_layout>
  <div style="clear:both;"></div>
</div>




<script type="text/javascript">
$$.vue({
  el:'#v_main',
  data: {
    items:['1','2','3'],
  },
})
</script>


<?php
include \view('inc_footer');
?>