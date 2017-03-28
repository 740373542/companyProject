<?php
namespace controller;

class task extends \app\controller
{

  function index() {
    $__nav = 'task';
    $__title = '任务';
    // $__tasks = $this->di['TaskService']->getMyGroupedTasks($_SESSION['edu_user']['id']);
    // $__tasks = $this->di['TaskService']->getMyGroupedTasks($_SESSION['edu_user']['id'],'undone');
    $__tasks = $this->di['TaskService']->getMyTasks($_SESSION['edu_user']['id']);
    \vd($__tasks,'$__tasks');
    include \view('plan__corp');
    // include \view('task__index');
  }


  // function 

}
