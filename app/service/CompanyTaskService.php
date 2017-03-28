<?php
namespace service;

class CompanyTaskService extends \app\service {

  function getAllTaskIds($userId_, $from_id=false) {

    if( false===$from_id ){
      $sqladd = '';
    }else{
      $sqladd = 'pm.task_from_company_id='.$from_id.' and ';
    }

    $sql = 'select pm.task_id as taskid  from `wb_company_task_permission` as pm,`wb_company_role_member` as role where  '.$sqladd.'  ( ( role.member_id='.$userId_.' and pm.user_type='.\config_types::$ROLE_TYPE['GROUP'].' and pm.user_id=role.role_id ) or ( pm.user_type='.\config_types::$ROLE_TYPE['PERSON'].' and pm.user_id='.$userId_.' ) ) group by taskid ;';
    $ls = \app\model::sqlQuery($sql);
    \vd($ls,'$ls');

    $taskids = [];
    if(!empty($ls)){
      foreach ($ls as $v) {
        $taskids[$v['taskid']] = $v['taskid'];
      } 
      $taskids = array_values($taskids);
    }
    return $taskids;
  }


  // 获取已经完成的任务
  function getTasksResultsByTaskIds($userId_, $taskIds_=NULL) {
    if( !$taskIds_ )$taskIds_ = $this->getAllTaskIds($userId_);
    $res = \model\company_task_result::finds('where task_id in ('.implode(',', $taskIds_).') and member_id='.$userId_."");
    \vd($res,'$res');
    return $res;
  }


  // 获取已经完成的任务
  function getAllTasks($userId_, $taskIds_=NULL) {
    if( !$taskIds_ )$taskIds_ = $this->getAllTaskIds($userId_);
    $tasks = \model\company_task::findNoDeleteByIds($taskIds_);
    \vd($tasks,'$tasks');
    return $tasks;
  }


  // 获取已经完成的任务
  function getAllTasksSorted($userId_, $taskIds_=NULL) {
    $tasks_sorted = [
      'done' => [], //完成
      'ing' => [],  //进行中
      'null' => [], //未进行
    ];

    if( !$taskIds_ )$taskIds_ = $this->getAllTaskIds($userId_);

    //获取所有任务
    $tasks = $this->getAllTasks($userId_,$taskIds_);
    \vd($tasks,'$tasks');
    $tasks = \indexBy($tasks,'id');

    $this->di['ToolService']->setTaskInfo($tasks);
    \vd($tasks,'$tasks_parsed');

    //获取已经开始的任务
    $result = $this->getTasksResultsByTaskIds($userId_);
    \vd($result,'$result');
    $result = \indexBy($result,'task_id');

    foreach ($tasks as $taskid => &$task) {
      if(!empty($result[''.$taskid])){
        $res = $result[''.$taskid];

        if(empty($task['result'])) $task['result'] = [];
        $task['result'] = $res;

        if($res['process']==100){
        if(empty($tasks_sorted['done'])) $tasks_sorted['done'] = [];
          $tasks_sorted['done'][] = $task;
        }else if($res['process']<100){
        if(empty($tasks_sorted['ing'])) $tasks_sorted['ing'] = [];
          $tasks_sorted['ing'][] = $task;
        }
      }else{
        if(empty($tasks_sorted['null'])) $tasks_sorted['null'] = [];
        $tasks_sorted['null'][] = $task;
      }
    }

    return [
      'sorted' => $tasks_sorted,
      'tasks' => $tasks,
    ];
  }




















































  // 获取已经完成的任务
  function getTasksAlreadyDone($userId_) {
    $sql = 'select task.*,res.* from `wb_company_task_result` as res,`wb_company_task` as task where res.process=100 and member_id='.$userId_.' and task.id=res.task_id;';
    $ls = \app\model::sqlQuery($sql);
    \vd($ls);
    return $ls;
  }

  // 获取尚未完成的任务
  function getTasksInProcess($userId_) {
    $sql = 'select task.*,res.* from `wb_company_task` as task,`wb_company_task_result` as res where task.id in ( select task.id as taskid from wb_company_task as task,`wb_company_task_permission` as pm,`wb_company_role_member` as role where role.member_id='.$userId_.' and ( ( pm.user_type='.\config_types::$ROLE_TYPE['GROUP'].' and pm.user_id=role.role_id ) or ( pm.user_type='.\config_types::$ROLE_TYPE['PERSON'].' and pm.user_id='.$userId_.' )   ) and task.id=pm.task_id    ) and res.member_id='.$userId_.'  and res.task_id=task.id and res.process<100 ;';
    $ls = \app\model::sqlQuery($sql);
    \vd($ls);
    return $ls;
  }


  // // 获取所有的任务
  // function getAllTasks($userId_) {
  //   $sql = 'select task.* from `wb_company_task` as task where task.id in ( select pm.task_id as taskid  from `wb_company_task_permission` as pm,`wb_company_role_member` as role where role.member_id='.$userId_.' and ( ( pm.user_type='.\config_types::$ROLE_TYPE['ROLE'].' and pm.user_id=role.role_id ) or ( pm.user_type='.\config_types::$ROLE_TYPE['PERSON'].' and pm.user_id='.$userId_.' ) ) group by taskid ) ;';
  //   $ls = \app\model::sqlQuery($sql);

  //   \vd($ls);
  //   return $ls;
  // }


  // //获得某用户的任务  
  // function getTasksByUser($userId_, $args_ = null){
  //   //获得用户所在的组
  //   $roleIds = \model\company_role_member::finds(" where member_id = ".$userId_." and company_id = ".$_SESSION['user']['company_id'],'role_id');
  //   $roleIds = \indexBy($roleIds,'role_id');
  //   $roleIds = array_keys($roleIds);
  //   // \vd($roleIds,'分组');
  //   //获得组的任务ID
  //   $taskIds = \model\company_task_permission::finds(" where user_id in (".implode(',',$roleIds).") and company_id =".$_SESSION['user']['company_id'],'task_id');
  //   $taskIds = \indexBy($taskIds,'task_id');
  //   $taskIds = array_keys($taskIds);
  //   // \vd($taskIds,'任务ID'); 
  //   // 获取组具体的任务
  //   $tasks = \model\company_task::findByIds($taskIds,'*','id');
  //   return $tasks;
  // }







  //给组发布任务
  function setTaskToRole($taskId_, $roleId_){
    // 查询分组是否存在该任务
    $res = \model\company_task_permission::find(" where task_id = ".$taskId_." and user_id = ".$roleId_."and company_id=".$_SESSION['user']['company_id']);
    if ($res) {
      \except(\CODE::任务已存在);
    }
    $oCompanyTaskPermission = new \model\company_task_permission;
    $oCompanyTaskPermission->data = [
      'task_id' => $taskId_,
      'company_id' => $_SESSION['user']['company_id'],
      'user_id' => $roleId_,
      'user_type' => \config_types::$ROLE_TYPE['GROUP'],
    ];
    $oCompanyTaskPermission->save();
    // 返回插入成功之后的对象
    return $oCompanyTaskPermission;
  }

  // 创建任务主题
  function setCompanyTask($args_ = null) {
    if ($args_['type'] == '课程')  $type = \model\company_task::$TYPE['COURSE'];
    if ($args_['type'] == '帖子')  $type = \model\company_task::$TYPE['ORTHER'];
    if ($args_['type'] == '回复')  $type = \model\company_task::$TYPE['ORTHER'];
    // 判断任务名是不是存在
    if (empty($args_['title']) || empty($args_['target_id'])) {
      \except(\CODE::创建条件不足);
    }
    // 查询该项任务主题是不是存在
    $res = \model\company_task::finds(" where target_id = ".$args_['target_id']." and type = ".$type." and company_id = ".$_SESSION['user']['company_id']." and deleted = 0 and title='".$args_['title']."'");
    if ($res) {
      \except(\CODE::任务主题已存在);
    }
    $oCompanyTask = new \model\company_task;
    $oCompanyTask->data = [
      'title' => $args_['title'],
      'company_id' => $_SESSION['user']['company_id'],
      'target_id' => $args_['target_id'],
      'type' => $type,
      'score' => $args_['score'],
      'create_at' => \datetime(),
    ];
    $oCompanyTask->save();
    // 插入之后返回对象
    return $oCompanyTask;
  }



























  // 设置任务进度(目前只设置任务是视频的进度)
  function setTaskProcess($taskId_, $args_){
    // 

    //如果 100%
    if( 100 ){
      $this->finishTask($taskId_);
    }
  }

  //完成任务
  function finishTask($taskId_){
    //
  }





  //设置任务进度，看视频
  function setTaskProcess__video($taskId_, $args_){
    
  }

  //设置任务进度，做练习
  function setTaskProcess__test($taskId_, $args_){
    
  }

  //设置任务进度
  function setTaskProcess__bbs($taskId_, $args_){
    
  }

  //设置任务进度
  function setTaskProcess__bbs_reply($taskId_, $args_){
    
  }

  //设置任务进度
  function setTaskProcess__news($taskId_, $args_){
    
  }

  //设置任务进度
  function setTaskProcess__news_reply($taskId_, $args_){
    
  }

  // 添加任务
  function managetaskadd(){
    $data = $_GET;

    $query = \model\course_test::find("where ");
    if (!empty($managetask)) {
      \except(\CODE::重复操作);
    }
    $managetask = new \model\course_test;
  }



// select task.*,res.* from `wb_company_task` as task,`wb_company_task_result` as res where task.id in ( select task.id as taskid from wb_company_task as task,`wb_company_task_permission` as pm,`wb_company_role_member` as role where role.member_id=88 and ( ( pm.user_type=2 and pm.user_id=role.role_id ) or ( pm.user_type=1 and pm.user_id=88 )   ) and task.id=pm.task_id    ) and res.member_id=88  and res.task_id=task.id and res.process<100 ;
 

// select * from `wb_company_task_result` as res where res.process=100;
 
// select task.*,res.* from `wb_company_task_result` as res,`wb_company_task` as task where res.process=100 and task.id=res.task_id;
 
 



}