<?php
include \view('adm_inc__header');
include \view('vue_comm_cate_detail');
include \view('vue_news_list');
?>

<div v-cloak id="v_comm_cate_index" style="width:100%;background:#FFF;float:right">

		<div class="example ivu-row">
      <div class="example-demo ivu-col ivu-col-span-12">
        <div class="example-case">

        	<h1><?=$__name?></h1>

        	<br/>

        	<v_comm_cate_type 
					v-bind:url_="'/adm_comm_cate/get_cate_list?type='+<?=$__type?>"
					v-bind:title_name_="add_title"
					v-bind:type_="<?=$__type?>"
					v-bind:should_reload_="should_reload"
					v-bind:idx_="null"
				/>

        </div>
      </div>



      <div class="example-split"></div>
      <div class="example-demo ivu-col ivu-col-span-12 ivu-col-split-right">
        <div class="example-case">

        	<h1>{{title_name}}</h1>

        	<br/>

        	<i-col offset="2" v-if="title_name == '操作提示'">
            <Card shadow>
                <p slot="title">小提示</p>
                <p>1.添加标题时标题不能为空</p>
                <p>2.点击内容按钮查看该标题详情</p>
            </Card>
        	</i-col>



      	  <div class="ivu-table-header" v-if="title_name != '操作提示'" style="margin-top:3px">
				    <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">

				      <thead>
				        <tr >
				        	<th style="width:50%;"">
				        		
				        	</th>

				          <th style="width:50%;text-align:center">
				            <div >
				              <i-button type="primary" :loading="button_loading" icon="plus-round"
				              style="font-size:16px;font-weight:bold;box-shadow:0 0 7px #999;"
				              @click="addNews('',cate_id)">
				                  <span v-if="!button_loading">添加内容</span>
				                  <span v-else>执行中</span>
				              </i-button>
				            </div>
				          </th>


				        </tr>
				      </thead>
				    </table>
				  </div>

        	<br/>

        	<div v-if="title_name != '操作提示'">
        	<v_news_list 
						col_config_="news"
						v-bind:url_="url"
						v-bind:cate_id_="cate_id"
						keep_data_when_loading_="true"
					/>
					</div>

        </div>
      </div>
    </div>
	
</div>
<script>
	$$.vue({
		el:'#v_comm_cate_index',
		EVENT:['COMMCATE_INFO'],
		data:function(){
			return {
				should_reload:false,
				title_name:'操作提示',
				add_title:'',
				url:'',
				cate_id:null,
			}
		},
		methods:{
			hd_COMMCATE_INFO:function(v){
				var self = this
				var id = v.data.id

				self.cate_id = id
				self.title_name = v.data.title
				self.url = '/adm_news/get_news_list?id='+id
			},

			addNews:function(id,cate_id){
			  $('#Id_Right_Drawer_Content').html('加载中')

			  $$.event.pub('OPEN_DRAWER',{width:800})
			  $.get('/adm_news/adm_news_detail?cate_id='+cate_id+'&id='+id,function(res){
			    $('#Id_Right_Drawer_Content').html(res)
			  })
			},


		},

	})
</script>


<style type="text/css">
	.cate_list_div{
		width:48%;height:100%;
		margin-top:10px;
		border:1px solid #CDCDCD;
		border-radius:5px;margin-left:10px;
		display: inline-block;
		box-shadow: 0 0 10px #CDCDCD;
		position: relative;
	}

	.news_list_div{
		display: inline-block;
		border:1px solid #CDCDCD;
		border-radius:5px;margin-left:10px;
		width:48%;height:100%;
		overflow-y:auto; 
		box-shadow: 0 0 10px #CDCDCD;
	}
</style>

<?php
include \view('adm_inc__footer');