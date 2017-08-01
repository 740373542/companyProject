<template id="comp_test">
	<div>{{aaa}}</div>
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
			alert(this.name)
		},	

		methods:{
			call_AAA:function(val){
				alert(val)
			}
		}
	})
</script>
