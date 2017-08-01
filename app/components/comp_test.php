<template id="comp_test">
	
	<div>
		my is component
		<slot :test="child"></slot>
	</div>


</template>

<script type="text/javascript">
	$$.comp({
		name:"comp_test",
		el:'#comp_test',
		props:["name"],
		EVENT:["AAA"],
		data:{
			aaa:'component',
		},

		init:function(){
		},	

		methods:{
			child:function(){
				alert("child")
			}
		}
	})
</script>
