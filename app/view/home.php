<?php
	require \view("header");
	require \view("index");
?>

<div id="home">
	<component v-bind:is="componentName"></component>
</div>

<script type="text/javascript">

	var users = <?=$_users?>

	$$.vue({
		el:"#home",

		EVENT:["chenge_page"],

		data:{
			componentName:"vue_page_index",
		},

		init:function(){

		},

		methods:{

			call_chenge_page:function(val){
				var self = this
				console.log("页面名称:"+val.name)
				console.log("页面参数:"+$$.str(val.params))
				self.componentName = val.name
				var eventName = val.name+"_params"
				var params = val.params

				window.setTimeout(function(){
					$$.event.send(eventName,params)
				},100)
				
			}

		},

		childs:{
			"vue_page_index":$$.component.index,
		}

	})
</script>	
