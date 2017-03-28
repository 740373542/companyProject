
<?php 
  $__pagemark = time();

  $pxUnit = 9 / 360 / 3;
  $fontsize = $pxUnit * $_SESSION['_width'] * $_SESSION['_px'];
  $fontsize = $fontsize * 3/$_SESSION['_px'];
  // $fontsize = $fontsize/(3/2) ;
  
  $pxUnit = 9 / 360 / 3;
  $fontsize = $pxUnit * $_SESSION['_width'] * $_SESSION['_px'];

  $pxUnit = 9 / 3;
  $fontsize = $pxUnit * $_SESSION['_px'];

  $fontsize = $fontsize * 3/$_SESSION['_px'];
?>

<style>
html {
  font-size: <?=$fontsize?>px;
}
</style>

<?php
if(!isset($__pageBgColor)){
  $__pageBgColor = '#FFF';
}
?>
<script type="text/javascript" src="/__assets__/libs/zepto.js"></script>
<script type="text/javascript" src="/__assets__/libs/zepto_fastclick.js"></script>
<script type="text/javascript" src="/__assets__/libs/vue.min.js"></script>
<script type="text/javascript" src="/__assets__/libs/then.js"></script>
<script type="text/javascript" src="/__assets__/libs/aaa_init.js"></script>

</head>

<body style="background:<?=$__pageBgColor?>;-webkit-user-select:none;height:100%;position:relative;"  onselectstart="return false;">
<a name="top"></a>
<?php
if( !empty($_SESSION['_px']) ){
  $px1 = 1/2;
}
?>

<script type="text/javascript">
var IS_IN_APP = true
</script>

<script type="text/javascript">
<?php
if( empty($_SESSION['os']) ){
?>
  IS_IN_APP = false


  // alert('not in app')
  var window_alert = window.alert
  var WebViewBridge = {
    send: function(args) {
      try{
        console.log(args)
        var args = $$.str2js(args)
        if(args.mtd=='alert'){
          window_alert(args.msg.str)
        }else if(args.msg){
          var url = args.msg.url
          if(!url) url = args.msg.nav_url
          if(!url) url = args.msg.nav_url_
            
          if(url){
            window.open(url)
            // window.location.href = url
          }
        }
        console.log('NoBridge.send::..'+$$.js2str(args))
        // alert(msg) 
      }catch(e){
        console.log('NoBridge.send Exception::..'+$$.js2str(args))
      }
    }
  }
<?php
}else{
?>

  var alert = function(str){
    call_native('alert',{
      str:str,
    })
  }

<?php
}
?>
</script>

<script type="text/javascript">
var callBridgeStart = function(){}
var callBridgeStartList = []
$(function(){$$.autoload()})

var call = function(url,title){
  if(!title) title = ''
  var args = {
    mtd: 'open_nav',
    msg: {
      url: url,
      title: title,
      b: 'val_b',
    }
  }
  try{
    WebViewBridge.send($$.js2str(args));
  }catch(e){
  }
}

var call_native = function(type,args){
  if(!args) args={};
  var _args = {
    mtd: type,
    msg: args
  }
  try{
    // console.log('::'+$$.js2str(_args))
    WebViewBridge.send($$.js2str(_args));
  }catch(e){
  }
}

// var _init_change_title = function(){
//   call_native('event',{
//     event_name: 'CHANGE_TITLE',
//     title: '<?=$__title?>'
//   })
// }

// callBridgeStartList.push(_init_change_title)

</script>
<script type="text/javascript" src="/__assets__/app.js?3"></script>

<?php
// include \view('vue_base');
// print_r($_GET);
// print_r($_GET);

// _vd('0000');
// _vd($_GET);
// _vd($_SESSION);
// _vd('0001');
// print_r($_GET);
// print_r($__pagemark);
// print_r($_SESSION);
