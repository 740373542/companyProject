<?php
namespace controller;

class adm_company_task_permission extends adm_controller
{
  
  // 获得任务下有权限的部门
  function get_role_permission() {
    // 获得task_id
    $data = $_GET;
    $arr = [];
    $task_id = $data['task_id'];
    $userIds = \model\company_task_permission::finds('where task_id = '.$task_id." and company_id = ".$_SESSION['user']['company_id']." and user_type = ".\model\company_task_permission::$TYPE['ROLE'] ,'user_id');
    $userIds = \indexBy($userIds,'user_id');
    \vd($userIds,'部门');
    foreach ($userIds as $key => $val) {
      $arr[$key] = $key;
    }
    \vd($arr,'分组');
    $this->data(['ls' => $arr]);
  }

  // 给部门分配任务
  function add_role_permission() {
    $data = $_GET;
    $task_id = $data['task_id'];
    $user_id = $data['role_id'];
    $id = $_SESSION['user']['id'];
    if(!empty($task_id)){
      $this->di['CheckService']->CheckData($task_id,$id,'company_task_permission');
    }

    if(!empty($user_id)){
      $this->di['CheckService']->CheckData($user_id,$id,'company_role');
    }

    $this->di['CompanyTaskService']->setTaskToRole($task_id,$user_id);
    $this->data(true);
  }

  // 移除该部门的课程权限
  function remove_role_permission() {
    $data = $_GET;
    $task_id = $data['task_id'];
    $role_id = $data['role_id'];

    $id = $_SESSION['user']['id'];
    if(!empty($task_id)){
      $this->di['CheckService']->CheckData($task_id,$id,'company_task_permission');
    }

    if(!empty($user_id)){
      $this->di['CheckService']->CheckData($user_id,$id,'company_role');
    }

    $res = \model\company_task_permission::find(" where task_id =".$task_id." and user_id=".$role_id);
    $id = $res['id'];
    \vd($id,'id.');
    // 删除这一条记录
    \model\company_task_permission::deleteById($id);
    $this->data(true);
  }

}
