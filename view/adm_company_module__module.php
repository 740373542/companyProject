<?php
require \view("adm_inc__header");
require \view("vue_company_modules");
require \view("vue_page");
?>
<div id="v_company_module">
	<div class="example ivu-row">
	  <div class="example-demo ivu-col ivu-col-span-24">
	    <div class="example-case">

	    <h1>模块管理</h1>

	    <br/>


	    <div class="ivu-table-header">
        <table width="100%">
          <thead>
            <tr>
              <th style="width:50%;text-align:left">
<!-- 
                    <i-input icon="android-search" placeholder="请输入模块名" style="width:50%;" :value.sync="search" ></i-input>
 -->
                    <i-select :model.sync="select_company" placeholder="选择公司名称" style="width:200px">
							        <i-option v-for="item in companys" :value="item.name" @click="selectCompany(item.id)" >{{ item.name }}</i-option>
							    </i-select>


              </th>


              <th style="width:50%;text-align:right">
                	<i-button type="success" icon="android-add-circle" @click="update_module('')">
                		添加模块
                	</i-button>
              </th>


            </tr>
          </thead>
        </table>
      </div>

      <br/>

	    <v_company_modules_ls
	    	v-bind:url_="url"
	    	v-bind:func_loaded_="func_loaded"
	    	col_config_="module"
	    	v-bind:th_width_="['80','120','150']"
	    	v-bind:number_="number"
	    >
	    	
	    </v_company_modules_ls>

	    <br/>

	    <v_page 
        v-bind:count_="count"
        v-bind:length_="length"
        v-bind:page_="page"
        v-bind:func_pagechanged_="func_pagechanged"
      >
      </v_page>
	    </div>
	  </div>



	</div>
</div>
<script type="text/javascript">

	var url = '/adm_company_module/aj_module_ls?'

	$$.vue({
		el:"#v_company_module",
    EVENT:['SAVE_CUSS'],

		data:function(){
			return {
				url:null,
				loading:false,

				page:1,
				length:10,
				count:0,

				companys:[],

				select_company:'',

				search:'',
				number:0,

				company_id:'',
			}
		},

		 _init: function() {
        this.resetUrl()
        this.loadCompany()
      },

      methods: {
      	selectCompany:function(id){
      		var self = this 
      		self.company_id = id
      	},


      	loadCompany:function(){
      		var self = this
      		$$.ajax({
      			url:'/adm_company/aj_compnay_ls',
      			data:{
      				length:10000,
      			},
      			succ:function(data){
      				self.companys = data.ls
      			},

      		})
      	},

        resetUrl: function(){
          this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search+'&company_id='+this.company_id
        },

        func_loaded: function(data){
          this.count = data.count
          window.location.href = "#top"
        },

        func_pagechanged: function(idx){
          this.page = idx
          this.resetUrl()
        },

        update_module:function(id){
        	$$.event.pub('OPEN_DRAWER',{
        		width:600,
        		url:'/adm_company_module/update_module?id='+id
        	})
        },

        hd_SAVE_CUSS:function(){
          this.$Notice.success({
            title:"保存成功",
          })
        },
      },

      watch: {
        search: function(val){
          this.page = 1
          this.resetUrl()
        },

        company_id:function(val){
        	this.page = 1
          this.resetUrl()
        },
      }


	})
</script>

<?php
require \view("adm_inc__footer");
?>