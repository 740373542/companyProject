<?php 
 require \view("header");
?>




<div id="test">{{ls}}</div>



<script >

new Vue({
	el:'#test',
	data:function(){
		return{
			ls:'xxx',
		}
	}
})









</script>