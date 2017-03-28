
<script type="text/javascript">
window.call_from_native = window.call_from_native || {}
window.call_from_native['SELECT_MEMBER'] = function(msgstr, msg) {
  alert(msgstr)
  var msg = $$.str2js(msgstr)
}


<?php
if($__autoheight){
?>

// alert('abcd')
// alert(''+<?=$__autoheight?>+'')

function documentHeight() {
    return Math.max(
        document.documentElement.clientHeight,
        document.body.scrollHeight,
        document.documentElement.scrollHeight,
        document.body.offsetHeight,
        document.documentElement.offsetHeight
    );
}

// window.setInterval(getNewSize,1000)


var __last_window_height = 0
window.setInterval(function(){
  var newheight = documentHeight()
  // alert(newheight)
  if(__last_window_height !== newheight){
    __last_window_height = newheight
    var args = {
      mtd: 'attr_height',
      msg: {
        height: newheight,
      }
    }

    // alert($$.js2str(args))
    WebViewBridge.send(JSON.stringify(args));
  }else{
    // alert('=')
  }
},100)


var __updateWebHeight = function(){
  var newheight = documentHeight()
  // alert(newheight)
  var args = {
    mtd: 'attr_height',
    msg: {
      height: newheight,
    }
  }

  WebViewBridge.send(JSON.stringify(args));

  __last_window_height = newheight

}
callBridgeStartList.push(__updateWebHeight)


<?php  
}
?>
// alert('yes')
</script>



<?php
include \view('inc_footer');
?>
