<?php
include \view("vue_comm_table");
?>

<template id="v_staff__list">
  <table class="table table-hover" style="width:100%;">
    <tbody>
	    <tr >
	      <td style="width:50%;text-align:center;" v-for="col in col_texts">
	        {{col}}
	      </td>
	      <td style="width:50%;text-align:center;">操作</td>
	    </tr>
    </tbody>

    <tr v-if="!loading" v-for="(idx,v) in ls" style="height:40px">
      <td  style="text-align:center" v-for="col in col_ids">
        {{v[col]}}
      </td>
      
      <td>
        <partial v-if="manage_" v-bind:name="manage_"></partial>
      </td>
    </tr>
    <tr v-if="loading">
      <td colspan="100">
      Loading
      </td>
    </tr>
  </table>
</template>

<template id="v__p_staff_option">
	<div v-show="type_ == 'radio'">
    <div v-if="staff_id_ != v.id" style="text-align:center">
      <span class="v_option_button_on" @click="selectMember(v)">选择</span>
    </div>

    <div v-if="staff_id_ == v.id" style="text-align:center">
     <span class="v_option_button_off" @click="selectMember(v)">已选择</span>
    </div> 
  </div>

  <div v-show=" type_ == 'check' " style="text-align:center">
    <input class="v_checkbox_option" type="checkbox" v-bind:value="v" v-model="staff_info_">
  </div>
</template>

<script type="text/javascript">
	$$.part('v_staff_option',$('#v__p_staff_option').html())

	$$.comp('v_staff__list', $$.vCopy(__v__common_table(),{
  el: '#v_staff__list',
  props_ext:['select_staff_func_','type_','staff_info_','staff_id_'],

  _init_after:function(){
  	var self = this
  	self.manage_ = 'v_staff_option'
  },

  methods:{
    selectMember:function(v){
      var self = this
      if(self.type_ == 'radio'){
        self.staff_id_ = v.id
      }
      self.select_staff_func_(v)
    },
  },
}))
</script>


<style type="text/css">
	.v_option_button_on{
		border:1px solid #999;
		padding:3px 25px;
		color: #999;
		cursor:pointer;
	}

  .v_option_button_off{
    padding:4px 25px;
    color: #FFF;
    cursor:pointer;
    background: red;
  }

  .v_checkbox_option{
    width: 20px;
    height: 20px;
  }
</style>

