<?php
namespace service;

class ModuleService extends \app\service {

	function moduleLs(&$count , $parmas = []){

		$sql = '';
		if(!empty($parmas['key'])){
			$sql = " and title like '%".$parmas['key']."%'"; 
		}

		if(!empty($parmas['company_id'])){
			$sql .= " and company_id ='".$parmas['company_id']."'";
		}

		$modules = \model\company_module::finds("where deleted=0 and status=0 " .$sql ,'*',$count,$parmas);

		$ls = $this->getModuleCompanyName($modules);

		return $ls;

	}

	function getModuleCompanyName($modules){
		$ls = [];
		foreach ($modules as $key => $module) {
			$companyName = \model\company::loadObj($module['company_id']);
			$module['company_name'] = $companyName->data['name'];
			$ls [] = $module; 
		}

		return $ls;
	}

}