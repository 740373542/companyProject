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

  var _init_change_title = function(){
    call_native('event',{
      event_name: 'CHANGE_TITLE',
      title: '<?=$__title?>'
    })
  }

  callBridgeStartList.push(_init_change_title)


</script>
<?php
