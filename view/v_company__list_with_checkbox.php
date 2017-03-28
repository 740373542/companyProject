<!-- 子组件模板 -->
<template id="v_company__list_with_checkbox">
 
  <div style="text-align:left;padding:0;">

    <div v-for="v in selected_">
      <div @click="onClose(v)" class="fade-transition ivu-tag ivu-tag-blue ivu-tag-closable"> <span class="ivu-tag-text">{{v.name}}</span><i class="ivu-icon-ios-close-empty ivu-icon"></i> </div>
    </div>

  </div>

</template>

<style type="text/css">
  .ivu-select-dropdown {
    max-height: 400px;
  }
</style>


<script type="text/javascript">
  $$.comp('v_company__list_with_checkbox', {
    el: '#v_company__list_with_checkbox',
    props: ['fun_select_','fun_unselect_','selected_'],

    data: function () {
      return {
      }
    },

    _init: function() {
      this.fun_select_ = this.fun_select_ || function(){}
    },

    methods: {

      onClose: function(v) {
        this.fun_unselect_(v)
      }

    },

    watch: {
    }

  }) // panel-wait
</script>


