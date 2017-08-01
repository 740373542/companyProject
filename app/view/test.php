<?php 
 require \view("header");
?>




<div id="test">{{ls}}</div>



<script>


$$.vue({
	el:"#test",

	EVENT:['AAA',"BBB"],

	data:{
		ls:"lh",
	},

	init:function(){

	},

	methods:{

	


	}
})



</script>