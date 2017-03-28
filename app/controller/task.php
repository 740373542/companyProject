<?php
namespace controller;

class task extends \app\controller
{

  function pub() {
    $__tasks = [];
    $id = $_SESSION['edu_user']['id'];
    \vd($id,'商学院');
    include \view('task__index');
  }

  function self() {
    
    $__tasks = [];
    $id = $_SESSION['edu_user']['id'];
    \vd($id,'企业课堂');
    include \view('task__index');
  }



  function aj_all() {
    
    $__tasks = [];
    $userid = $_SESSION['edu_user']['id'];
    // 获取任务
    // $__tasks_res = $this->di['CompanyTaskService']->getTasksResultsByTaskIds($userid);
    
    $__tasks = $this->di['CompanyTaskService']->getAllTasksSorted($userid);

    if (empty($__tasks)) {
      $__tasks = [];
    }

    if ( $this->di['UserService']->notJoined() ) {
      $__tasks = [];
      return;
    }

    $_tmp = ['ing'=>[],'null'=>[],'done'=>[],];



    $companyId = $this->di['UserService']->getCompanyId();
    foreach ($__tasks['sorted'] as $type => $vs) {
      foreach ($vs as $key => $task) {
        // print_r($_GET['from']);
        // print_r($task);
        if(empty($_GET['from'])){
          $_tmp[$type][] = $task;
        }else{
          if( $_GET['from']=='public' && $task['from_company_id'] != $companyId ){
            $_tmp[$type][] = $task;
          }else if( $_GET['from']=='self' && $task['from_company_id']==$task['company_id'] ){
            // echo 'xxxxxxx'.$type;
            $_tmp[$type][] = $task;
          }
        }


      }
    }

    // print_r($_tmp);

    
    $_tmp2 = ['ing'=>[],'null'=>[],'done'=>[],];

    foreach ($_tmp as $type => $vs) {
        // echo $type;
        // echo '<br>';
      foreach ($vs as $key => $task) {
        // echo $_GET['tag'];
        // print_r($task);
        // echo stripos($task['tags'],'"'.$type.'"');
        if( empty($_GET['tag']) ){
          $_tmp2[$type][] = $task;
        }else if( stripos($task['tags'],'"'.$_GET['tag'].'"') > 0 ){
          $_tmp2[$type][] = $task;
        }
      }
    }




    $__tasks['sorted'] = $_tmp2;


    \vd($__tasks,'所有的任务');
    $this->data([
      'ls' => $__tasks['sorted'],
    ]);

  }



  // 获取用户任务列表
  function course() {
    $__tasks = [];
    $id = $_SESSION['edu_user']['id'];
    \vd($id,'任务');
    // $__course_type = $_GET['from'];
    include \view('task__index');
  }


  // 获取用户任务列表
  function index() {

    // 获取已经完成的任务
    // 测试使用
    // $id = 109;
    $__tasks = [];
    $id = $_SESSION['edu_user']['id'];
    \vd($id,'任务');
    // $id = 88;
    // $__done_task = $this->di['CompanyTaskService']->getTasksAlreadyDone($id);
    // if (!empty($__done_task)) {
    //   $__done_task = \indexBy($__done_task,'task_id');
    // }
    // \vd($__done_task,'已经完成的任务');

    // // 获取尚未完成的任务
    // $doing_task = $this->di['CompanyTaskService']->getTasks($id);
    // \vd($doing_task,'所有任务');

    // // 获取尚未完成的任务
    // $__tasks = $this->di['CompanyTaskService']->getAllTasks($id);
    // \vd($__tasks,'$__tasks');
    // if (empty($__tasks)) {
    //   $__tasks = [];
    // }
    // \vd($__tasks,'所有的任务');

    include \view('task__index');
  }








  // function aj_done() {
  //   $__tasks = [];
  //   $id = $_SESSION['edu_user']['id'];
  //   \vd($id,'任务');
  //   // $id = 88;
  //   $__done_task = $this->di['CompanyTaskService']->getTasksAlreadyDone($id);
  //   if (!empty($__done_task)) {
  //     $__done_task = \indexBy($__done_task,'task_id');
  //   }
  //   \vd($__done_task,'已经完成的任务');
  //   $this->data([
  //     'ls' => $__done_task,
  //   ]);
  // }

  // function aj_ing() {
  //   $__tasks = [];
  //   $id = $_SESSION['edu_user']['id'];

  //   $taskIds = $this->di['CompanyTaskService']->getTaskAllIds($id);
  //   \vd($taskIds,'$taskIds');

  //   // 获取尚未完成的任务
  //   $__tasks = $this->di['CompanyTaskService']->getTasksInProcess($id);
  //   if (empty($__tasks)) {
  //     $__tasks = [];
  //   }
  //   \vd($__tasks,'进行中的任务');
  //   $this->data([
  //     'ls' => $__tasks,
  //   ]);

  // }


}
