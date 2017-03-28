<?php
include \view('adm_inc__header');
include \view('vue_company_role_detail');
include \view('vue_role_employees');
?>

<div v-cloak  id="v_role_index">
  
      <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-12">
          <div class="example-case">

          <h1>部门和角色管理</h1>

          <br/>

            <v_company_role_list 
              v-bind:url_="'/adm_company_role/ls'"
              v-bind:should_reload_="should_reload"
            />
          </div>
        </div>
        <div class="example-split" ></div>
        
        <div class="example-demo ivu-col ivu-col-span-12 ivu-col-split-right">
          <div class="example-case">
            <v_member_list 
            />
          </div>
        </div>
        
      </div>
</div>




<script>
	$$.vue({
		el:'#v_role_index',
		data:function(){
			return {
				should_reload:false,
			}
		},
	})
</script>






<style type="text/css">
	.company_list_div{
		width:48%;height:100%;
		margin-top:10px;
		border:1px solid #CDCDCD;
		border-radius:5px;margin-left:10px;
		display: inline-block;
		box-shadow: 0 0 10px #CDCDCD;
	}

	.member_list_div{
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