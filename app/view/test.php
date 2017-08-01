<?php 
 require \view("header");
 require \component("comp_test");
?>




<div id="test">
	<div style="font-size:20px">{{ls}}</div>



	<comp_test :name="ls">
		<template scope="props">
			<div style="font-size:20px;color:red" @click="props.test">	{{ls}}
			</div>
		</template>
	</comp_test>




	
</div>


<script>


$$.vue({
	el:"#test",

	data:{
		ls:"lh",
	},

	init:function(){

	},

	methods:{

		test:function(){
		},


	}
})



</script>