<?php
namespace controller;

class adm_company_module extends \app\controller
{
	  function module(){
	    require \view("adm_company_module__module");
	  }

	  function aj_module_ls(){

	  	$data = $_GET;

	  	$page = $data['page'];
	  	$length = $data['length'];
	  	$search = $data['search'];
	  	$id = $data['company_id'];
	  	$count = 0;

	  	if(empty($page)) $page = 1;
	  	if(empty($length)) $length = 10;



	  	$ls = $this->di['ModuleService']->moduleLs($count,['page'=>$page,'length'=>$length,'key'=>$search,'company_id'=>$id]);


	  	$this->data([
	  		'ls' => $ls,
	  		'count' => $count,
	  		'page' => $page,
	  		'length' => $length,
	  	]);

	  }

	  function update_module(){
	  	$data = $_GET;
	  	$companys = \model\company::finds();
	  	$__company_name = '';
	  	$__title = '';
	  	$__companys = \en($companys);
	  	$__extra = '';
	  	$__company_id = '';
	  	$__module_id = $data['id'];

	  	if(empty($data['id'])){
	  		$__nav = '添加';
	  	}else{
	  		$__nav = '修改';
	  		$oModule = \model\company_module::loadObj($data['id']);
	  		$__title = $oModule->data['title'];
	  		$company = \model\company::loadObj($oModule->data['company_id']);
	  		$__company_name = $company->data['name'];
	  		$__company_id = $company->data['id'];
	  		$__extra = $oModule->data['extra'];
	  		\vd($__extra,'!!!');
	  	}

	  	require \view("adm_company_module__add_module");
	  }

	  function save_module(){
	  	$data = $_GET;
	  	$title = $data['title'];
	  	$company_id = $data['company_id'];
	  	$extra = $data['extra'];
	  	$module_id = $data['module_id'];


	  	if(empty($module_id)){
	  	
	  		if(empty($title)){
	  			\except(-1,"标题不能为空");
	  		}

	  		if(empty($company_id)){
	  			\except(-1,"请设置所属公司");
	  		}


	  		$oModule = new \model\company_module;
	  		$oModule->data = [
	  			'title' => $title,
	  			'company_id' => $company_id,
	  			'extra' => $extra,
	  			'create_at' => \datetime(),
	  		];
	  	}else{
	  		if(empty($title)){
	  			\except(-1,"标题不能为空");
	  		}

	  		$oModule = \model\company_module::loadObj($module_id);
	  		$oModule->data = [
	  			'title' => $title,
	  			'company_id' => $company_id,
	  			'extra' => $extra,
	  			'update_at' => \datetime(),
	  		];
	  	}

	  	$oModule->save();
	  	$this->data(['ok']);

	  }

	  function del_module(){
	  	$data = $_GET;
	  	$module_id = $data['id'];
	  	$oModule = \model\company_module::loadObj($module_id);
	  	$oModule->data['deleted'] = 1;
	  	$oModule->save();
	  	$this->data(['ok']);
	  }


}