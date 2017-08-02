<template id="vue_page_index">
	<div>{{ls}}</div>
</template>

<script type="text/javascript">
	$$.component.index = $$.child({
		el:"#vue_page_index",

		EVENT:["AAA"],

		data:{
			ls:"Welcome Home Page",
		},

	})
</script>