<?php
include \view('inc_vue_header');
?>

<script src="/public/v_aaa_bundle.js"></script>
<!-- <script type="text/javascript" src="/__assets__/libs/aaa_init.js?"></script> -->
<?php include \view('inc_vue_header_js'); ?>

<?php
include \view('vue_plan_item');
?>

<style type="text/css">
</style>

<div id="v_main" v-cloak class="swipe-content content-list" style="padding-right:0px;overflow-x:hidden;min-height:400px;">

    <v_plan_item v-for="it in data" 
      :daterange_="it.key" :data_="it.content"
      :id_="it.id"
      :config_="config"
      :keys_="keys"
    >
    </v_plan_item>

</div>

<script type="text/javascript">

var v_instance = new Vue({
  el: '#v_main',

  data: function(){
    return {
      // keys:['学习目的','成功','转化'],
      keys: $$.str2js('<?=\en($__keys)?>'),
      data: $$.str2js('<?=str_replace(['\\'],['\\\\'],\en($__data))?>'),
      config: $$.str2js('<?=\en($__config)?>'),
    }
  },

  methods: {
  },

})

</script>


<?php
include \view('inc_vue_footer');

