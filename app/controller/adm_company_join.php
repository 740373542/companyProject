<?php
namespace controller;

class adm_company_join extends \app\controller
{
	// 修改邀请码页面
	function index(){
    $__nav = "/adm_company_join/index";
		$company_id = $_SESSION['user']['company_id'];
		$join = $this->di['CompanyService']->getcompanyjoin($company_id);
		$join_str = $join['join_str'];
		$company_name = $join['name'];
		include \view('adm_company_join__index');
	}
	// 修改邀请码
  function save(){
  	$data = $_GET;
		$company_id = $_SESSION['user']['company_id'];
		$joins = \model\company::find("where join_str='".$data['join_str']."'");
		// 判断邀请码是否存在，如果存在，是否是自己公司的
		if (!empty($joins) && $joins['id']!==$company_id) {
			\except(-1,'邀请码不能与其他公司重复!');
		}
  	$nowjoin = $this->di['CompanyService']->getjoinsave($data,$company_id);
  	$this->data(['ok']);
  }
  // function joinloadData(){
  // 	$company_id = $_SESSION['user']['company_id'];
		// $join = $this->di['CompanyService']->getcompanyjoin($company_id);
		// \vd($join,'xxxx');
		// $this->data([
		// 	'join_str' => $join['join_str'],
		// 	'name' => $join['name'],
		// 	]);
  // }
}
