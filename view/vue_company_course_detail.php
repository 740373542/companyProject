<?php
require_once \view('vue_comm_table');
?>

 <template id="v_option_course">
 	<!-- <div  style="text-align:center">
      <span  class="add_option_button_off" >选择</span>
      <span  class="add_option_button_on" >已选择</span>
	</div> -->
	<i-button v-if="item_id_ == v.id" type="error">已选择</i-button>
	<i-button v-if="item_id_ != v.id" type="success" @click="selectItem(idx,v)">选择</i-button>

 </template>

<script type="text/javascript">
	$$.part('v_option_course', $('#v_option_course').html())


	$$.comp('v_company_course_detail',$$.vCopy(__v__common_table(),{
		el:'#__v__common_table',
		props_ext:['item_id_'],
		_setup:function(){
			this.manage_ = 'v_option_course'
		},

		methods:{
			selectItem:function(idx,v){
				this.item_id_ = v.id
				$$.event.pub('SELECT_ITEM',{
					data:v,
					idx:idx,
				})
			},
		},
		
	}))
</script>

<style type="text/css">
	.add_option_button_on{
    background:#FF3333;
    padding:5px 20px;
    border-radius:5px;
    color:#FFF;
    /*margin-left:30px;*/
    cursor:pointer;
  }

	.add_option_button_off{
    background:#33CC66;
    padding:5px 27px;
    border-radius:5px;
    color:#FFF;
    /*margin-left:30px;*/
    cursor:pointer;
  }
</style>
