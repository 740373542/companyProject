<?php
namespace controller;

class me extends \app\controller
{

  function index() {
    $__nav = 'me';

    if(!empty($_GET['logout'])){
      $_SESSION['edu_user'] = null;
    }

    // print_r($_SESSION['edu_user']);
    if(empty($_SESSION['edu_user'])){
      header('Location: /user');
      // include \view('user__index');
      // exit;
    }
    include \view('me__index');
  }

  function aj_saveavatar() {
    $data = $_GET;
    $avatar = $data['avatar'];

    $oUser = $this->di['UserService']->getSelf();
    $oUser->save([
        'avatar' => $avatar,
      ]);
    $_SESSION['edu_user']['avatar'] = $avatar;
    $this->data(['user'=>$oUser->data]);
  }


}
