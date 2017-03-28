<?php
// unset($_SESSION);
?>
<script type="text/javascript">
var url_=window.location.href;
var pos_ = url_.indexOf('/',10)
var baseurl_ = url_.substring(0,pos_)
var newurl=baseurl_+"/target/#/target/1";
history.replaceState(null, "",newurl);
</script>

<?php $__css = 'muse'; ?>
<?php include \view('inc_meta'); ?>

<script src="/public/v_aaa_bundle.js"></script>
<?php include \view('inc_vue_header_js'); ?>
<script src="/dist/target.entry.js?<?=time()?>"></script>
<?php
include \view('inc_vue_footer');
