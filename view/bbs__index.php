<script type="text/javascript">
var url_=window.location.href;
var pos_ = url_.indexOf('/',10)
var baseurl_ = url_.substring(0,pos_)
 
var __args__ = __args__ || {} 
<?if(!empty($_GET['id'])){?>
__args__.id = '<?=$_GET['id']?>';
var newurl=baseurl_+"/bbs/#/list/<?=$_GET['id']?>";
history.replaceState(null, "",newurl);
<?}?>
</script>

<?php
include \view('inc_vue_header');
?>

<script type="text/javascript">
// $$.args = __args__
</script>

<script src="/public/v_aaa_bundle.js"></script>
<?php include \view('inc_vue_header_js'); ?>
<script src="/dist/bbs.entry.js?<?=time()?>"></script>


<script type="text/javascript">
window.call_from_native = window.call_from_native || {}
window.call_from_native['ADD_BBS_SUCC'] = function(msgstr, msg) {
  // alert('1')

  // alert('in web 1:'+msgstr)
  var msg = $$.str2js(msgstr)

  // alert('msg.pagemark:'+msg.page_mark + ' ~ ' + 'bbs_<?=$_GET['id']?>' )
  if( msg.page_mark == 'bbs_<?=$_GET['id']?>' ){
    $$.event.pub('RELOAD')
    return 
  }
}

</script>


<?php
include \view('inc_vue_footer');
