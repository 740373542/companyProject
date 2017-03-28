<?php
require \view("vue_comm_table");
?>

<template id="v_company_module_option">
		<i-button type="primary" icon="ios-checkmark" @click="update_module(v.id)">修改</i-button>

    <i-button type="error"  icon="ios-close" @click="delete_module(v.id)">删除</i-button>


</template>


<script type="text/javascript">
	$$.part('v_company_module_option',$("#v_company_module_option").html())

	$$.comp('v_company_modules_ls',$$.vCopy(__v__common_table(),{
		el:"#__v__common_table",
		EVENT:['SELECT_COMPANY','SAVE_CUSS'],
		props_ext:['number_'],

		_setup:function(){
			this.manage_ = 'v_company_module_option'
		},

		methods:{
			update_module:function(id){
	    	$$.event.pub('OPEN_DRAWER',{
	    		width:600,
	    		url:'/adm_company_module/update_module?id='+id
	    	})
	    },

	    hd_SAVE_CUSS:function(){
	    	var self = this
	    	self.loadData()
	    },

	    delete_module:function(id){
	    	var self = this 
	    	$$.ajax({
	    		url:'/adm_company_module/del_module',
	    		data:{
	    			id:id,
	    		},
	    		succ:function(data){
	    			self.loadData()
	    			self.$Notice.error({
	    				title:"删除成功",
	    			})
	    		},
	    	})
	    },
		},

	}))
</script>