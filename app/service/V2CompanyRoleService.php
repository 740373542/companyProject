<?php
namespace service;

class V2CompanyRoleService extends \app\service {

  // 获得公司的所有员工分组（部门）
  function getCompanyRoleByCompanyId($companyId, &$total, $params=[]) {

    $search = '';
    if($params['search']) {
      $search = " and title like '%".$params['search']."%'";
    }
    $roles = \model\company_role::finds(" where company_id = ".$companyId.$search, "*", $total, $params );
    return $roles;
  }


  function getMemberByRoleId($roleId, &$total, $params=[]) {
    $search = '';
    if($params['search']) {
      $search = " and name like '%".$params['search']."%'";
    }
    $memberIds = \model\company_role_member::finds(" where role_id = ".$roleId.$search." and company_id = ".$params['company_id'], "member_id", $total, $params );
    \vd($memberIds,'$roleIds$roleIds$roleIds$roleIds');

    $memberIds = \indexBy($memberIds,'member_id');
    \vd($memberIds,'数据');

    $ids = array_keys($memberIds);
    \vd($ids,'idsids');
    
    $members = \model\member::findByIds($ids);
    return $members;
  }


}
