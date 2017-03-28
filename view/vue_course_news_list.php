<?php
include \view('vue_comm_table');
?>

<template id="v_course_news_list">
 		<table class="table table-hover">
	     <tbody>
		     <tr>
			     	


            <th colspan="10">
              <div style="text-align:center">
                <span @click="selectNews('',cate_id_)" style="cursor:pointer;background:#0099FF;padding:15px 30px;border-radius:5px;color:#FFF;">添加内容</span>
              </div>
            </th>

		     </tr>

        <tr>
	        <th style="width:50%;text-align:center" v-for="col in col_texts">
		        {{col}}
		      </th>

      		<th style="width:50%;text-align:center">操作</th>

        </tr>

        <tr v-if="loading">
        	<th colspan="10">Loading...</th>
        </tr>

        <tr v-if="!loading" v-for="(idx,v) in ls">
		      <td style="text-align:center" v-for="col in col_ids">
		        {{v[col]}}
		      </td>
		      
		      <td>
		        <partial v-if="manage_" v-bind:name="manage_"></partial>
		      </td>

    		</tr>

	    </tbody>
		</table>
 </template>

 <template id="v_course_news_option">
    <div style="text-align:center">
      	<span class="add_option_button" @click="selectNews(v.id,cate_id_)">查看</span>
    </div>
</template>

 <script>
 	$$.part('v_course_news_option', $('#v_course_news_option').html())

 	$$.comp('v_course_news_list',$$.vCopy(__v__common_table(),{
 		el:'#v_course_news_list',
    props_ext:['cate_id_'],
    EVENT:['SAVENEWS_SUCC'],

 		_setup: function(){
    	this.manage_ = 'v_news_option'
  	},


 		_init: function() {
      var config = __config__table_column__[this.col_config_]
      this.col_ids = []
      this.col_texts = []
      for(var col in config){
        var text = config[col]
        if(config[col]){
          this.col_ids.push(col)
          this.col_texts.push( text ) 
        }
      }
      if(!this.func_loaded_){
        this.func_loaded_ = function(){}
      }
      if(this.url_ != ''){
      	this.loadData()	
      }
    },

		methods:{

      hd_SAVENEWS_SUCC:function(){
        this.loadData()
      },  

			selectNews:function(id,cate_id){
				  $('#Id_Right_Drawer_Content').html('加载中')

				  $$.event.pub('OPEN_DRAWER',{width:800})
				  $.get('/adm_news/adm_news_detail?cate_id='+cate_id+'&id='+id,function(res){
				    $('#Id_Right_Drawer_Content').html(res)
				  })
				},
		},
    
 	}))


















 </script>