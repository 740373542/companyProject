<?php
require \view('vue_comm_table');
?>

<template id="v_adm_comment_option">
    <i-button type="error" @click="deleteComment(v.id)" icon="ios-close">删除</i-button>
</template>

<script type="text/javascript">
	$$.part('v_adm_comment_option',$('#v_adm_comment_option').html())

	$$.comp('v_adm_comment_list',$$.vCopy(__v__common_table(),{
		el:'#__v__common_table',

		_setup:function(){
			this.manage_ = 'v_adm_comment_option'
		},

		methods:{
			deleteComment:function(id){
				var self = this
				$$.ajax({
					url:'/adm_comment/remove_ask',
					data:{
						id:id,
					},
					succ:function(data){
						self.loadData()
						self.succMessage()
					},
				})
			},

			succMessage:function(){
        this.$Message.success('评论删除成功');
      },

      
		}


	}))
</script>