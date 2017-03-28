<?php
include \view('inc_home_header');
function geturl($task){
  if($task['type']===''){
    $extra = \de($task['extra']);
    return '';
  }
}
?>

<style>
.border-top-eee {
  border-top: 1px solid #EEE;
}
</style>

<div v-choak id="v_main" style="width:100%;height:100%;background:#-FF0000;">

    <?php
    foreach ($__tasks as $task) {
    ?>

    <div class="weui_cells weui_cells_checkbox" style="margin-top: 0;">
      <a onclick="javascript: call_native('<?=\model\task::$CONF_TYPE_2_NAV_ROUTE[''.$task['type']]?>',{url:'<?=\model\task::$CONF_TYPE_2_URL[''.$task['type']]?>?id=<?=$task['target_id']?>', title: '<?=$task['title']?>', }); void(0);">
      <label class="weui_cell weui_check_label" for="s11">
          <div class="weui_cell_hd">
            <?php if($task['status']==1){?>
              <i class="weui_icon_success"></i>
            <?php }else{ ?>
              <i class="weui_icon_checked"></i>
            <?php }?>
          </div>
          <div class="weui_cell_bd weui_cell_primary">
              <p> <?=\model\task::$CONF_TYPE_2_TEXT[''.$task['type']]?>：<?=$task['title']?></p>
          </div>
      </label>
      </a>
    </div>
    <?php
    }
    ?>


  </div>
</div>

<script type="text/javascript">

$$.vue({
  el:'#v_main',
})

$(function(){})

window.call_from_native = window.call_from_native || {}
window.call_from_native['TASK_DONE'] = function(){
  alert('need reload')
  window.location.reload()
}
</script>


<?php
include \view('inc_home_footer');
?>