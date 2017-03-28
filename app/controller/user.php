<?php
namespace controller;

class user extends \app\controller
{

  function index() {
    $__nav = 'me';
    include \view('user__index');
  }

  function logout() {
    $_SESSION = [];
    // unset($_SESSION);
    $_SESSION['logout'] = 1;
  }

  function init_task() {
    $__nav = 'init_task';
    // $myCourseIds = $this->di['UserService']->getMyCourseIds();
    // print_r($myCourseIds);
    $this->di['TaskService']->initByUser($_SESSION['edu_user']['id']);

  }

  function staff_login() {
    $__nav = 'me';
    include \view('user__staff_login');
  }

  function corp_login() {
    $__nav = 'me';
    include \view('user__corp_login');
  }

  function aj_logout(){
    $_SESSION['edu_user'] = [];
    $_SESSION = [];
    $_SESSION['logout'] = 1;
    
    $this->data(['ok'=>1]);
  }

  
  function aj_login() {
    $data = $_GET;
    $r = $this->di['UserService']->login($data['phone'], $data['password']);
    if($r){
      $this->data(['user' => $r]);

    }else{
      $this->err(['user' => null]);
    }

  }




  function aj_saveprofile() {
    $data = $_GET;
    $user = $this->di['UserService']->saveProfile($data);

    $this->data(['user' => $user]);
  }



  function aj_join() {
    $data = $_GET;

    if($this->di['UserService']->notLogin()){
      exit('{"code":0,"data":"need_login"}');
    }

    $user = $this->di['UserService']->joinCompany($data['join_str']);

    $this->data(['user' => $user]);
  }


  
  function aj_regist() {
    
    $_POST = json_decode(file_get_contents('php://input'), true);
    // \errlog($_POST);
    
    // $this->err(-1,'post:'.$_POST['phone']);
    // exit;


    // $this->err(-1,'aaa');
    // exit;

    // $this->data(['post' => $_POST]);
    // exit;

    // $data = $_GET;
    $data = $_POST;

    $r = $this->di['UserService']->regist($data['phone'], $data['password']);
    if($r){
      $this->data(['post' => $data, 'user' => $r]);
    }else{
      $this->err(['user' => null]);
    }
  }

  // function aj_join() {
  //   $data = $_GET;
  //   $r = $this->di['UserService']->join($data['join_str'], $data['join_company_str']);
  //   if($r){
  //     $this->data(['join' => 'ok']);
  //   }
  //   $this->err(-1);
  // }




}
