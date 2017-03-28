
<!DOCTYPE html>
<html class="root" lang="zh" style="height:100%;">
<head>
    <title>-<?=$__title?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name = "format-detection" content = "telephone=no">

    <link rel="stylesheet" href="/style/custom.css?<?=\app\engine::get('theme')?>"/>
    <link rel="stylesheet" href="/__assets__/custom.css" type="text/css" media="all">
    <link rel="stylesheet" href="/__assets__/main.css?<?=\app\engine::get('theme')?>"/>
    

<link rel="stylesheet" href="/style/loading.css"/>

    <?php 
      $pxUnit = 9 / 360 / 3;
      $fontsize = $pxUnit * $_SESSION['_width'] * $_SESSION['_px'];
      $fontsize = $fontsize * 3/$_SESSION['_px'];
    ?>
    <?php?>

    <style>
    html {
      font-size: <?=$fontsize?>px;
    }
    </style>
    
</head>
<script type="text/javascript" src="/__assets__/libs/zepto.js"></script>
<script type="text/javascript" src="/__assets__/libs/zepto_fastclick.js"></script>
<script type="text/javascript" src="/__assets__/libs/swipe.js"></script>
<script type="text/javascript" src="/__assets__/libs/vue.min.js"></script>
<script type="text/javascript" src="/__assets__/libs/then.js"></script>
<script type="text/javascript" src="/__assets__/libs/aaa_init.js?<?=\app\engine::get('theme')?>"></script>
<script type="text/javascript" src="/__assets__/app.js?<?=\app\engine::get('theme')?>"></script>

<?php
if(!isset($__pageBgColor)){
  $__pageBgColor = '#F1F1F1';
}
?>

<body style="background:<?=$__pageBgColor?>;-webkit-user-select:none;"  onselectstart="return false;">
<?php
if( !empty($_SESSION['_px']) ){
  $px1 = 1/2;
}
?>

<script type="text/javascript">
$(function(){$$.autoload()})

// var call = function(url,title){
//   if(!title) title = ''
//   var args = {
//     mtd: 'open_nav',
//     msg: {
//       url: url,
//       title: title,
//       b: 'val_b',
//     }
//   }
//   WebViewBridge.send($$.js2str(args));
// }

var call_native = function(type,args){
  try{
    var _args = {
      mtd: type,
      msg: args
    }
    WebViewBridge.send($$.js2str(_args));
  }catch(e){}
}

$(function(){
  //修改标题
  setTimeout(function(){
    call_native('event',{
      event_name: 'CHANGE_TITLE',
      title: '<?=$__title?>',
    })
  },100)
})


if (WebViewBridge) {
    WebViewBridge.onMessage = function (message) {
      // alert('web get from native:' + message)
      // console.log('=====================WEB receive '+message)
      // window.location.href="http://www.baidu.com"
      try{
        var msg = $$.str2js(message)
        window.call_from_native[msg.event_name](message) 
      }catch(e){}
    };
}


</script>

<?php
include \view('vue_base');

