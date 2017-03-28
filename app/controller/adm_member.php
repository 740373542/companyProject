<?php
namespace controller;

class adm_member extends adm_controller
{
	function ls(){
		$company_id = $_SESSION['user']['company_id'];
		$ls = $this->di['MemberService']->getList($company_id);
		\vd($ls,'ls__');
		$this->data(['ls'=>$ls]);
	}

  function member_course_process(){
    $__nav = "/adm_member/member_course_process";
    require \view("adm_member__member_course_process");
  }

  function aj_member_course_process_ls(){
    $company_id = $_SESSION['user']['company_id'];
    $data = $_GET;
    $count = 0;
    $page = $data['page'];
    $key = $data['key'];
    if(empty($page)) $page = 1;
    $length = $data['length'];
    if(empty($length)) $length = 10;
    $ls = $this->di['MemberService']->getMemberCourseProcess($company_id,$count,['page' => $page, 'length' => $length],$key);
    $this->data([
      'ls' => $ls,
      'page' => $page,
      'length' => $length,
      'count' => $count,
    ]);
  }

  function assign_role() {
    $data = $_GET;
    $__member_id = $data['member_id'];
    include \view('adm_member__assign_role');
  }


  function get_tags() {
    $data = $_GET;
    $member_id = $data['id'];
    $tag_ids = \model\company_role_member::finds("where member_id='".$member_id."' and company_id='".$_SESSION['user']['company_id']."'",'role_id');
    $tag_ids = array_keys(\indexBy($tag_ids,'role_id'));
    $roles = array_keys(\indexBy(\model\company_role::findByIds($tag_ids,'title'),'title'));
    \vd($roles,'123456789');
    $roles = implode(",",$roles);

    echo $roles;
  }

}