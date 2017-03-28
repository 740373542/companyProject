<!-- 多列 -->
<template id="m_ui_card">
  <div v-bind:class="''" style="background:-#FF0000;">
      <div style="margin:0px 4px 0px 4px;">
        <div style="width:100%;height:100%;background:#B1B1B1;color:#FFF;"><h1>{{title_}}</h1></div>
      </div>
  </div>
</template>


<script type="text/javascript">
  $$.comp('m_ui_card', {
    el: '#m_ui_card',
    props: ['title_'],
  })
</script>

