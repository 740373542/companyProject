<?php
namespace controller;

class adm_auth extends \app\controller
{
  
  function login() {
    $oMember = $this->di['AuthService']->login($_GET['phone'],$_GET['password']);
    
    $_SESSION['user'] = $oMember->data;
    $_SESSION['IS_ADMIN'] = 1;
    
    $this->data(['ok']); 
  }

  // 退出
  function logout() {
    unset($_SESSION['IS_ADMIN']);
    unset($_SESSION['user']);
    header('Location: /adm_login');
    $this->data(['ok']);
    exit;
  }


}
