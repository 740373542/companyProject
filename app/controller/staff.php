<?php
namespace controller;

class staff extends \app\controller
{
	//单选type传radio，多选type传check
	function index(){
    $__nav = 'home';
		$data = $_GET;
		$__type = $data['type'];
		// $data['staff_ids'] = ['72','92'];
		$data['staff_ids'] = $data['staff_ids'];
		$__staff_ids = $data['staff_ids'];
		
		

		if(empty($__type)){
			\except(-1,'请确定选择类型!');
		}
		include \view('staff__index');
	}

	function ls(){
		$data = $_GET;
		$key = $data['key'];
		$company_id = $_SESSION['edu_user']['company_id'];
		$members = $this->di['MemberService']->getList($company_id,$key);
		$members = \indexBy($members,'id');
		\vd($members,'___');
		$this->data(['ls' => $members]);
		
	}
}



