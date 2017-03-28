<?php
namespace controller;

class v2_member extends \app\controller {

  // 获得公司所有的员工
  function aj_member_by_company_id() {
    $data = $_GET;
    $total = 0;
    $page = 1;
    if (!empty($data['page'])) {
      $page = $data['page'];
    }
    $search = '';
    if (!empty($data['search'])) {
      $search = $data['search'];    
    }
    // 默认一次查出十条
    $length = 10;
    if (!empty($data['length'])) {
      $length = $data['length'];
    }

    $companyId = $_SESSION['edu_user']['company_id'];
    // $companyId = 1;
    $members = $this->di['V2MemberService']->getMemberByCompanyId($companyId,$total,['page'=>$page,'length'=>$length,'search'=>$search]);
    \vd($members,'当前公司所有员工');
    $this->data([]);

    $this->data([
        'ls'=>$members,
        'page' => $page,
        'length' => $length,
        'count' => $total,
    ]);
  }


  // 获得部门下的员工
  function aj_member_by_role_id() {
    $data = $_GET;
    $total = 0;
    $page = 1;
    if (!empty($data['page'])) {
      $page = $data['page'];
    }
    $search = '';
    if (!empty($data['search'])) {
      $search = $data['search'];    
    }
    // 默认一次查出十条
    $length = 10;
    if (!empty($data['length'])) {
      $length = $data['length'];
    }
    $roleId = $data['role_id'];
    // $companyId = $_SESSION['edu_user']['company_id'];
    $companyId = 1;
    $members = $this->di['V2CompanyRoleService']->getMemberByRoleId($roleId,$total,['page'=>$page,'length'=>$length,'search'=>$search,'company_id'=>$companyId]);
    \vd($members,'当前公司所有员工');
    
    $this->data([
        'ls'=>$members,
        'page' => $page,
        'length' => $length,
        'count' => $total,
    ]);
  }




}
