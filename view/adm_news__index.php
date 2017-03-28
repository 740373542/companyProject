<?php
require \view('adm_inc__header');
require \view('vue_all_news_list');
require \view('vue_page');
?>

<div id="v_news_list">
	<div class="example ivu-row">
	    <div class="example-demo ivu-col ivu-col-span-24">
	      	<div class="example-case">
				<h1><?=$_GET['option']?></h1><a name="top"></a>
		      	<br/>
		      	<div class="ivu-table-header">
				    <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
			      		<thead>
					        <tr>
					        	
				          	<th style="width:70%;text-align:left">
				            	<i-input  icon="search" placeholder="请输入标题名称" size="large"  :value.sync="search" style="width:40%"></i-input>

                      <input type="radio" name="sort" checked="checked" @click="sortType('time')" style="margin-left:20px"><span style="margin-left:5px">按更新时间排序</span></input >

                      <input type="radio" name="sort" @click="sortType('level')" style="margin-left:10px"><span style="margin-left:5px">按精选等级排序</span></input>

				          	</th>


										<th style="width:30%;text-align:right;">
		                    <i-button type="success" :loading="button_loading" icon="plus-round"
		                      style="font-size:14px;-font-weight:bold;box-shadow:0 0 7px #999;"
		                      @click="addNews('',cate_id,type)">
		                      <span>添加</span>
		                    </i-button>
										</th>


					        </tr>
				      	</thead>
				    </table>
			  	</div>


			  	<br/>
			  	
						<v_all_news_list
							v-bind:url_="url"
							v-bind:func_loaded_="func_loaded"
							col_config_="news"
							v-bind:th_width_="th_width"
							img_="document-text"
							img_text_="title"
							v-bind:cate_id_="cate_id"
							v-bind:type_="type"
							state_="true"
						>
						</v_all_news_list>

      			<br />


						<v_page 
							v-bind:count_="count"
							v-bind:length_="length"
							v-bind:page_="page"
							v-bind:func_pagechanged_="func_pagechanged"
						>
						</v_page>


	      	</div>
	    </div>



	    <Modal :visible.sync="alert" width="360">
			<p slot="header" style="color:#464c5b;text-align:center">
				<Icon type="compose"></Icon>
				<span>{{title_name}}</span>
			</p>
			<div style="text-align:center">
				<h4>请输入精选等级:<h4><i-input icon="gear-a" placeholder="如要取消精选请输入0" style="width: 200px" :value.sync="level"></i-input>
			</div>
	        <div slot="footer">
				<i-button type="success" size="large" long  @click="sevaLevel">保存</i-button>
			</div>
		</Modal>
	</div>
</div>

<script type="text/javascript">
	var url = '/adm_news/get_topics?cate_id=<?=$id?>&type=<?=$type?>' 

	$$.vue({
		el:'#v_news_list',
		EVENT:['SET_ELITE'],
		data:function(){
			return {
				url:null,
		    loading:false,
				page:1,
				count:0,
				length:10,
				search: '',
				alert:false,
				th_width:[200,150,60,120,300],
				level:null,
				cate_id:'<?=$id?>',
				type:'<?=$type?>',
				title_id:'',
				title_name:'',
        update:true,
        sort:'',
        nav:'<?=$__nav?>',
        option:'<?=$__how?>',
			}
		},
		_init:function(){
			this.resetUrl()
  		},

		methods:{

      sortType:function(val){
        this.sort = val
        this.page = 1
        this.resetUrl()
      },

			hd_SET_ELITE:function(val){
				var self = this 
				self.title_id = val.data.id 
				self.title_name = val.data.title
				self.alert = true
			},

			resetUrl:function(){
				var self = this
				this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search+'&sort='+this.sort
			},

			func_loaded: function(data){
				this.count = data.count
				window.location.href = "#top"
			},

			func_pagechanged: function(idx){
				this.page = idx
				this.resetUrl()
			},



			addNews:function(id,cate_id,type){
				var self = this
				$('#Id_Right_Drawer_Content').html('加载中')
				$$.event.pub('OPEN_DRAWER',{width:800})
				$.get('/adm_news/adm_news_detail?cate_id='+cate_id+'&id='+id+'&type='+type,function(res){
				$('#Id_Right_Drawer_Content').html(res)
				})
			},

			sevaLevel:function(){
				var self = this
				$$.ajax({
					url:'/adm_news/set_news_level',
					data:{
						id:self.title_id,
						sort_order:self.level,
					},
					succ:function(data){
						self.alert = false
						$$.event.pub('SAVE_LEVEL_SUCC',{
							idx:self.title_idx,
							level:self.level,
						})
					},
				})
			},

		},

		watch:{
      		search: function(val){
        		this.page = 1
        		this.count = []
        		this.resetUrl()
      		},
    	}
	})
</script>

<?php
require \view('adm_inc__footer');
?>
