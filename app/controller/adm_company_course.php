<?php
namespace controller;
// 企业课程任务分配
class adm_company_course extends adm_controller
{

  function company_course_list() {
    include \view('vue_company_course_list');
  }

    // 获取可分配的课程列表 type = 0
   function aj_get_courses_list() {
    // 获取公司已经购买课程的ID
    $data = $_GET;
    $count = 0;
    $courses = $this->di['CompanyCourseService']->getCourseList($count,[
        'page' => $data['page'],
        'length' => $data['length'],
        'key' => $data['search'],
      ]);
    \vd($courses,'课程');
    $this->data([
      'ls' => $courses['course'],
      'course_all' => $courses['course_all'],
      'count' => $count,
      ]);
  }

  // 判断某一个课程下有权限的部门
  function get_role_course() {
    $data = $_GET;
    $arr = [];
    $course_id = $data['course_id'];
    $targetIds= \model\company_course::finds(" where course_id = ".$course_id,'target_id');
    $targetIds = \indexBy($targetIds,'target_id');
    // 在目前这个课程下的部门Id
    foreach ($targetIds as $key => $val) {
      $arr[$key] = $key; 
    }
    \vd($arr,'分组Id');
    $this->data(['ls' => $arr]);
  }


  //得到公司全部分组
  function v2_get_all_roles(){
    $data = $_GET;
    $arr = [];
    $course_id = $data['course_id'];
    $company_id = $_SESSION['user']['company_id'];
    \vd($company_id,'company_id');

    $rolePermissions = [];

    $task = \model\company_task::find("WHERE type=1 and target_id='".$course_id."' and company_id='".$company_id."' ");
    if($task){
      $rolePermissions= \model\company_task_permission::finds(" where task_id = ".$task['id']." and user_type=2 ");
    }else{
      $oTask = new \model\company_task;
      $oTask->data = [
        'title' => '任务'.$course_id,
        'company_id' => $company_id,
        'target_id' => $course_id,
        'type' => '1',
      ];
      $oTask->save();
      $task = $oTask->data;
    }

    foreach ($rolePermissions as $key => $val) {
      $arr[] = $val['user_id']; 
    }

    \vd($arr,'分组Id');


    $ls = $this->di['CompanyRoleService']->getList($company_id);

    $this->data([
      'ls' => $ls,
      'task' => $task,
      'selected' => $arr,
    ]);
  }

  // 给部门添加课程任务
  function add_role_course() {
    $data = $_GET;
    $oCompanyCourse = new \model\company_course;
    $oCompanyCourse->data = [
      'course_id' => $data['course_id'],
      'company_id' => $_SESSION['user']['company_id'],
      'type' => \model\company_role::$TYPE['group'],
      'target_id' => $data['target_id'],
      'create_at' => \datetime()
    ];
    $oCompanyCourse->save();
    $this->data(true);
  }

  // 移除该部门的课程权限
  function remove_role_course() {
    $data = $_GET;
    $course_id = $data['course_id'];
    $target_id = $data['target_id'];
    $res = \model\company_course::finds(" where course_id =".$course_id." and target_id=".$target_id);
    $id = $res[0]['id'];
    // 删除这一条记录
    \model\company_course::deleteById($id);
    $this->data(true);
  }

  // 获得公司的公共课程
  function get_pub_course() {
    $data = $_GET;
    $page = 1;
    $length = 10;
    if($data['page']) $page = $data['page'];
    if($data['length']) $length = $data['length'];
    $count = 0;
    $courses = $this->di['CourseService']->getPublicCourse($count,['page'=>$page,'length'=>$page]);
    \vd($courses,'课程');
    $this->data(['ls'=>$courses,'length'=>$page,'count'=>$count,'page'=>$page]);
  }

}