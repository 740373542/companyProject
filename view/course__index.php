<?php
  $__autoheight = true;
  include \view('inc_vue_header');
?>

<script src="/public/v_aaa_bundle.js"></script>
<script type="text/javascript" src="/__assets__/libs/aaa_init.js?"></script>
<?php include \view('inc_vue_header_js'); ?>

  <?php
  if(!empty($__courses)){
    foreach ($__courses as $course) {
    ?>
    <div  onclick="javascript: call_native('open_win',{url:'/course/detail?id=<?=$course['id']?>', title: '<?=$course['name']?>', }); void(0);" style="margin:0 0 10px 0;">
      
      <div class="mu-card">
        <div class="mu-card-media">
          <img src="<?=$course['pic']?>">
        </div>

        <div class="mu-card-title-container">
          <div class="mu-card-title" style="font-size: 18px;line-height: 24px;">
            <?=$course['name']?>
          </div>
          <div class="mu-card-sub-title" style="font-size: 12px;line-height: 16px;">
            <?=str_replace(['"','[',']'],'',$course['tags'])?>
          </div>
        </div>

      </div>

    </div>


    <?php
    }
  }else{
  ?>

    <div style="text-align:center;padding-top:50px;">
      
      <img src="/app/empty2.png" style="max-width:40%;" >

      <p style="color:#999;">目前还没有内容</p>

    </div>

  <?php
  }
  ?>



<?php
include \view('inc_home_footer');