<!-- 多列 -->
<template id="m_ui_layout">

  <style type="text/css">
    div.cols > div {
      clear:none;
      float: left;
      text-align: left;
      background: #FF0000;
      margin: 1px;
    }
    div.cols_1 > div {
      width:calc(100% - 2px);
      padding-bottom: 33.98%;
    }
    div.cols_2 > div {
      /*width:50%;*/
      width:calc(50% - 2px);
      padding-bottom: 21.98%;
    }
    div.cols_3 > div {
      width:calc(33.33333% - 2px);
      padding-bottom: 12.98%;
    }
    div.cols_4 > div {
      width:25%;
      padding-bottom: 50.0%;
    }
  </style>

  <div v-bind:class="'cols cols_'+cols_" style="width:100%;">
      <slot></slot>
  </div>
</template>


<script type="text/javascript">
  $$.comp('m_ui_layout', {
    el: '#m_ui_layout',
    props: ['cols_'],
  })
</script>

