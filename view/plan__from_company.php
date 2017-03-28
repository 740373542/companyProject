<?php
include \view('inc_home_header');
?>

<style>
.border-top-eee {
  border-top: 1px solid #EEE;
}
</style>

<div v-choak id="v_main" style="width:100%;height:100%;background:#-FF0000;">

          <div class="weui_cells weui_cells_checkbox border-top-eee">
            <a onclick="call_native('open_win',{url:'/test/single/',title:'答题：企业文化'});" >
            <label class="weui_cell weui_check_label" for="s11">
                <div class="weui_cell_hd">
                    <i class="weui_icon_checked"></i>
                </div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p>答题：企业文化</p>
                </div>
            </label>
            </a>
            <a onclick="call_native('open_win',{url:'/test/video',title:'查看企业文化视频'});" >
            <label class="weui_cell weui_check_label border-top-eee" for="s12">
                <div class="weui_cell_hd">
                    <i class="weui_icon_checked"></i>
                </div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p>查看企业文化视频</p>
                </div>
            </label>
            </a>

            <a onclick="call_native('open_win',{url:'/bbs/detail?id=1',title:'查看公司规章制度'});" >
            <label class="weui_cell weui_check_label border-top-eee" for="s13">
                <div class="weui_cell_hd">
                    <i class="weui_icon_success"></i>
                </div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p>查看公司规章制度</p>
                </div>
                <div class="weui_cell_ft">
                    <span style="color:red;">+5</span>
                </div>
            </label>
            </a>
            <a onclick="call_native('open_win',{url:'/me/',title:'完善信息'});" >
             <label class="weui_cell weui_check_label border-top-eee" for="s14">
                <div class="weui_cell_hd">
                    <i class="weui_icon_success"></i>
                </div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p>完善信息 <?=$px1?> </p>
                </div>
                <div class="weui_cell_ft">
                    <span style="color:red;">+3</span>
                </div>
            </label>
            </a>
                      
        </div>

</div>

<script type="text/javascript">

$$.vue({
  el:'#v_main',
})

$(function(){

</script>


<?php
include \view('inc_home_footer');
?>