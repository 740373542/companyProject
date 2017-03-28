<?php
namespace controller;

class adm_company_role extends adm_controller
{
	function manage(){
    $__nav = "/adm_company_role/manage";
		include \view('adm_company_role__manage');
	}


  // 搜索公司员工
  function search_member(){
    $data = $_GET;
    $name = $data['name'];
    $company_id = $_SESSION['user']['company_id'];
    $members = $this->di['MemberService']->getList($company_id,$name);
    \vd($members,'员工');
    $this->data(['ls'=>$members]);
  }


  // 获得某一个部门下的员工
  function role_members() {
    $data = $_GET;
    $arr = [];
    $role_id = $data['role_id'];
    $company_id = $_SESSION['user']['company_id'];
    $user_id = $_SESSION['user']['id'];
    $this->di['CheckService']->CheckData($role_id,$user_id,'company_role');
    $members = \model\company_role_member::role_memner_list($role_id,$company_id);
    $this->data(['ls'=>$members]);
  }



  // 获得部门下的员工
  // function get_role_member() {
  //   // 获得task_id
  //   $data = $_GET;
  //   $arr = [];
  //   $role_id = $data['role_id'];
  //   $memberIds = \model\company_role_member::finds('where role_id = '.$role_id." and company_id = ".$_SESSION['user']['company_id'],'member_id');
  //   $memberIds = \indexBy($memberIds,'member_id');
  //   \vd($memberIds,'部门下的员工');
  //   foreach ($memberIds as $key => $val) {
  //     $arr[$key] = $key;
  //   }
  //   \vd($arr,'分组');
  //   $this->data(['ls' => $arr]);
  // }

	//得到公司全部分组
	function ls(){
		$company_id = $_SESSION['user']['company_id'];
		$ls = $this->di['CompanyRoleService']->getList($company_id);
		\vd($ls,'ls_');
		$this->data(['ls' => $ls]);
	}

  function member_by_role(){
    $company_id = $_SESSION['user']['company_id'];
    $member_id = $_GET['member_id'];

    $member_by_roles = \model\company_role_member::finds("where member_id='".$member_id."' and company_id='".$company_id."'",'role_id');
    $member_by_roles = array_keys(\indexBy($member_by_roles,'role_id'));

    $ls = $this->di['CompanyRoleService']->getList($company_id);
    \vd($ls,'ls_');
    $this->data([
      'ls' => $ls,
      'selected' =>$member_by_roles,
    ]);
  }

	//创建新分组
	function create_role(){
		$data = $_GET;
		$role_name = $data['title'];
		$company_id = $_SESSION['user']['company_id'];
		$role = $this->di['CompanyRoleService']->createRole($role_name,$company_id);
		$this->data(['ok']);
	}

	//移除一个分组
	function remove_role(){
		$data = $_GET;
		$role_id = $data['id'];
		$user_id = $_SESSION['user']['id'];
    $this->di['CheckService']->CheckData($role_id,$user_id,'company_role');
		$role = $this->di['CompanyRoleService']->removeRole($role_id);
		$this->data(['ok']);
	}

	//员工添加分组
	function set_member_role(){
		$data = $_GET;
		$company_id = $_SESSION['user']['company_id'];
		$member_id = $data['member_id'];
		$role_id = $data['role_id'];
		$user_id = $_SESSION['user']['id'];

		if(!empty($role_id))
    $this->di['CheckService']->CheckData($role_id,$user_id,'company_role');
  	if(!empty($member_id)){
  		$this->di['CheckService']->CheckData($member_id,$user_id,'member');
  	}

    if (empty($role_id)) {
      $this->error(-1,'请选择部门');
      return;
    }
		$member = $this->di['CompanyRoleService']->setMemberToRole($member_id,$role_id,$company_id);
		$this->data(['ok']);
	}

	//员工移除分组
	function remove_member_role(){
		$data = $_GET;
		$company_id = $_SESSION['user']['company_id'];
		$member_id = $data['member_id'];
		$role_id = $data['role_id'];
		$user_id = $_SESSION['user']['id'];

		if(!empty($role_id))
    $this->di['CheckService']->CheckData($role_id,$user_id,'company_role');
  	if(!empty($member_id)){
  		$this->di['CheckService']->CheckData($member_id,$user_id,'member');
  	}

		$member = $this->di['CompanyRoleService']->removeMemberFromRole($member_id,$role_id,$company_id);
		$this->data(['ok']);
	}


}