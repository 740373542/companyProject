<?php
	require \view("header"); 
	// require \component("test1"); 
	require \component("test2"); 
?>



<div id="test">
	
	<!-- <test1></test1> -->
	<test2></test2>

</div>

<script type="text/javascript">
	$$.vue({
		el:"#test",
	})
</script>





















<?php
	require \view("footer"); 
?>


