<script type="text/javascript">
var IS_IN_APP = true
</script>

<script type="text/javascript">
<?php
if( empty($_SESSION['os']) ){
  //在浏览器里
?>
  IS_IN_APP = false
  // alert('in browser')

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
  //在客户端里
  if($_SESSION['os']=='ANDROID'){
    ?>

  var alert = function(str){
    call_native('alert',{
      str:str,
    })
  }

    <?php
  }
?>

<?php
}
?>
</script>

<script type="text/javascript">
var callBridgeStart = function(){}
var callBridgeStartList = []
// $(function(){$$.autoload()})

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

var _init_change_title = function(){
  call_native('event',{
    event_name: 'CHANGE_TITLE',
    title: '<?=$__title?>'
  })
}

callBridgeStartList.push(_init_change_title)

// alert('end')
</script>

<!-- <script type="text/javascript" src="/__assets__/libs/aaa_init.js?"></script> -->

<?php
// print_r($_GET);
// print_r($_SESSION);
