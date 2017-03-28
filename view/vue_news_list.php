<?php
include \view('vue_comm_table');
?>

<template id="v_news_list">



  <!-- <br/>
   <div class="ivu-article">
    <article>
      <div class="ivu-table-wrapper">
        <div class="ivu-table ivu-table-border">

          <div class="ivu-table-body">
            <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">


              <thead>
                <tr>
                  <th>
                    <div class="ivu-table-cell">标题名称</div>
                  </th>
                  <th>
                    <div class="ivu-table-cell">操作</div>
                  </th>
                </tr>
              </thead>
              <tbody class="ivu-table-tbody">
                <tr class="ivu-table-row" v-for="(idx,v) in search_result">
                    <td >
                      <div class="ivu-table-cell">{{v.title}}</div>
                    </td>
                    <td class="ivu-table-column-center">
                      <div >
                        <i-button v-bind:id="v.id+'role'" type="primary" @click="commCateInfo(v)">内容</i-button>
                        <i-button type="error" @click="saveData('/adm_comm_cate/del_comm_cate?id='+v.id)">删除</i-button>
                      </div>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      <article>
    </div> -->












<!--  		<table class="table table-hover">
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

        <tr v-if="ls == '' && !loading">
          <th colspan="10" style="text-align:center">暂时不存在请添加</th>
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
		</table> -->
 </template>

 <template id="v_news_option">
    <i-button  type="success" @click="selectNews(v.id,cate_id_)">查看内容详情</i-button>
</template>

 <script>
 	$$.part('v_news_option', $('#v_news_option').html())

 	$$.comp('v_news_list',$$.vCopy(__v__common_table(),{
 		el:'#__v__common_table',
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