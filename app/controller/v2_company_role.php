<?php
namespace controller;

class v2_company_role extends \app\controller {

  // 获得公司下所有的部门
  function aj_role_by_company_id() {

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
    if (empty($companyId)) {
      \except(-1,'请登录');
    }
    $roles = $this->di['V2CompanyRoleService']->getCompanyRoleByCompanyId($companyId, $total, ['page'=>$page,'length'=>$length,'search'=>$search]);
    // 拿到课程下的视频
    \vd($roles,'部门');

    $this->data([
        'ls' => $roles,
        'page' => $page,
        'length' => $length,
        'count' => $total,
    ]);
  }


  // function aj_company_member_by_role(){
  //   $data = $_GET;
  //   $total = 0;
  //   $page = 1;
  //   if (!empty($data['page'])) {
  //     $page = $data['page'];
  //   }
  //   $search = '';
  //   if (!empty($data['search'])) {
  //     $search = $data['search'];    
  //   }
  //   // 默认一次查出十条
  //   $length = 10;
  //   if (!empty($data['length'])) {
  //     $length = $data['length'];
  //   }

  //   // $companyId = $_SESSION['edu_user']['company_id'];
  //   $companyId = 1;
  //   $members = $this->di['V2MemberService']->getMemberByCompanyId($companyId,$total,['page'=>$page,'length'=>$length,'search'=>$search]);

  //   \vd($members,'当前公司所有员工');

  // }

  // 部门下的员工
  function aj_member_by_role() {
    $data = $_GET;
  }






}
