<?php
namespace model;

class company_role_member extends \app\model
{
    public static $table = "company_role_member";


    // 查询部门下的员工
    static function role_memner_list($role_id,$company_id) {
      $memberIds = \model\company_role_member::finds('where role_id = '.$role_id." and company_id = ".$_SESSION['user']['company_id'],'member_id');
      $memberIds = \indexBy($memberIds,'member_id');
      $memberIds = array_keys($memberIds);
      \vd($memberIds,'didididi');
      $members = \model\member::findByIds($memberIds,'*','id');
      return $members;
    }
    
}