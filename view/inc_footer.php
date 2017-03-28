<?php
?>

<?php if(empty($__autoheight)){ ?>

  <?php if($_SESSION['os']=='ANDROID'){?>
  <div style="clear:both;height:40px;text-align:center;">
  </div>
  <?php }else{?>
  <div style="clear:both;height:98px;text-align:center;">
  </div>
  <?php }?>

<?php }?>

<script type="text/javascript">

<?php if($_SESSION['os']=='ANDROID'){?>

  $(function(){
    try{
      callBridgeStart()
      for(var i in callBridgeStartList){
        var calli = callBridgeStartList[i]
        calli()
      } 
    }catch(e){}
  })


  if (WebViewBridge) {
      WebViewBridge.onMessage = function (message) {
        // alert('web get from native:' + message)
        // console.log('=====================WEB receive '+message)
        // window.location.href="http://www.baidu.com"
        try{
          var msg = $$.str2js(message)
          var method = msg.web_event_name
          if(window.call_from_native[method]){
            window.call_from_native[method](message) 
          }
        }catch(e){}
      };
  }


<?php }else{ ?>

<?php } ?>


  $(function(){
    window.setTimeout(function(){
      call_native('event',{
        event_name: 'LOAD_FINISHED',
        user:'ok',
      })
    },10)

  })

  var native__need_login = function() {
    call_native('event',{
      event_name: 'NEED_LOGIN',
      user:'ok',
    })
  }

</script>

</body>    
    
</html>