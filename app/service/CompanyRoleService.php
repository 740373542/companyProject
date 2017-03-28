<?php
namespace service;

class CompanyRoleService extends \app\service {

  //创建组
  function createRole($roleName_,$companyId_){
    //判断是否存在
    if( empty($roleName_) ){
      \except(-1,'请输入分组名称!');
    } 
    if( \model\company_role::finds("where title='".$roleName_."' and company_id='".$companyId_."'") ){
      \except(-1,'此分组已存在!');
    }
    if(empty($companyId_)){
      \except(-1,'请登录!');
    }
    $oRole = new \model\company_role;
    $oRole->data=[
      'title' => $roleName_,
      'company_id' => $companyId_,
    ];
    $oRole->save();
  }


  //删除组（真删）
  function removeRole($roleId_){
    // 删除指定的部门
    \model\company_role::deleteById($roleId_);
    // 删除部门之后，解散该部门下的所有员工
    \model\company_role_member::sqlQuery("delete from wb_company_role_member where role_id=".$roleId_);
  }


  //获得某公司的角色类别
  function getList($companyId_){
    $r = [];
    $f = \model\company_role::finds("where company_id='".$companyId_."'");
    $r = \indexBy($f,'id');
    return $r;
  }


  //添加某人到组中
  function setMemberToRole($memberId_, $roleId_,$companyId_){
      $member = \model\company_role_member::finds("where role_id='".$roleId_."' and member_id='".$memberId_."' and company_id='".$companyId_."'");
      if(!empty($member)){
        \except(-1,'员工已经存在此部门');
      }else{
        $oMember = new \model\company_role_member;
        $oMember->data = [
          'role_id' => $roleId_,
          'member_id' => $memberId_,
          'company_id' => $companyId_,
        ];
        $oMember->save();
      }
  }


  //从组中移除某人
  function removeMemberFromRole($memberId_, $roleId_,$companyId_){
    $member = \model\company_role_member::find("where role_id='".$roleId_."' and member_id='".$memberId_."' and company_id='".$companyId_."'");
    $id = $member['id'];
    $oMember = \model\company_role_member::deleteById($id);
  }




  function memberByRole($companyId){
    
    $ls = [];

    $members = \model\user::finds("where company_id='".$companyId."' and deleted = 0",'id');
    $members = array_keys(\indexBy($members));

    foreach ($members as $k => $v) {
      $roleByMembers = \model\company_role_member::finds("where company_id='".$companyId."' and member_id='".$v."'",'role_id');
      $roleByMembers = array_keys(\indexBy($roleByMembers,'role_id'));
      $ls[$v] = $roleByMembers;
    }

    \vd($ls,'count');
    return $ls;


  }















}