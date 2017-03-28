<?php

function tpl_test(){
  echo '<hr />xxxxxxxxxxxxxxx<hr />';
}

function tpl_db(){
  $di = di::get();
  $res = $di['XXService'];
  echo '';
}

function tpl_videoHeight($width){
  return 9/16 * $width;
}

function tpl_products_cate($cate_id,$limit=4) {
	// $limit = 6;
	$di = \app\di::get();
	$cate = $di['CateService']->getCateById($cate_id);
	$res = $di['ProductService']->getProducts($limit, $cate_id);

	// if (count($res) > 0) {

    echo '<div id="cate_1" class="cate_frame" style="">';
    echo '<div class="cate_title" style="clear:both;width:100%;"><b>'.$cate['name'].'</b></div>';
    echo '<div class="cate_list" style="position:relative;display:block;width:100%;">';
      foreach ($res as $key => $product) {
        echo '<a href="/shop/detail?id='.$product['id'].'">';
              echo '<div class="cate tc" style="overflow:hidden;">';
                  echo '<div style="width:100%;">';
                      echo '<img class="weui_media_appmsg_thumb-" style="margin-top:-0px;max-width:120px;overflow:hidden;max-height:126px;" src="'.$product['pic'].'" alt="" >';

                  echo '</div>';
                  echo '<div class="product_price">';
                      echo '¥'.$product['price'].'';
                  echo '</div>';
                  echo '<div class="product_name">';
                      echo $product['name'];
                  echo '</div>';
              echo '</div>';
        echo '</a>';
    }
    echo '<div style="clear:both;"></div>';
    echo '</div>';
    echo '</div>';
	// }

}

function tpl_product_detail_img($class='', $style='') {
  for($i = 1; $i < 11; $i++) {
    if (file_exists(__PUBLIC_DIR__."/products/".$_GET['id']."/".$i.".jpg")) {
      $src = '<img src="/products/'.$_GET['id'].'/'.$i.'.jpg" width="100%" ';
      if (!empty($class)) {
        $src .= " class='".$class."' ";
      }

      if (!empty($style)) {
      $src .= " style='".$style."' ";
      }

      $src .= "/>";

      echo ($src);
    }
  }
}



function tpl_video_next_action($processData=[], $videoId) {
  if($processData[$videoId]=='1'){
    return '<div style="background:#62BD77;color:#FFF;border-radius: 50%;">过关</div>';
  }else if($processData[$videoId]=='2'){
    return '<div style="background:#F1F1F1;color:#999;border-radius: 50%;">完成</div>';
  }else{
    return '<div style="background:#00A7F7;color:#FFF;border-radius: 50%;">播放</div>';
  }
}



function tpl_video_text_next_action($processData=[], $videoId) {
  if($processData[$videoId]=='1'){
    return '<div style="display:flex;justify-content: center;align-items: center;margin-left: 10px;background:#f29f33;border-radius:4px;min-height:23px;color: white;font-size: 12px;color: white;min-width: 40px;margin-top: -20px;">答题</div>';
  }else if($processData[$videoId]=='2'){
    return '<div style="display:flex;justify-content: center;align-items: center;margin-left: 10px;background:#73d918;border-radius:4px;min-height:23px;color: white;font-size: 12px;color: white;min-width: 40px;margin-top: -20px;">完成</div>';
  }else{
    return '<div style="display:flex;justify-content: center;align-items: center;margin-left: 10px;background:#00A7F7;border-radius:4px;min-height:23px;color: white;font-size: 12px;color: white;min-width: 40px;margin-top: -20px;">播放</div>';
  }
}




