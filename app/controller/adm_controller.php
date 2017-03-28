<?php
namespace controller;

class adm_controller extends \app\controller
{

    public function __construct()
    {
        $this->di = \app\di::get();
        //判断是否登陆

        if(empty($_SESSION['IS_ADMIN'])){
          header('Location: /adm_login');
          exit;
        }

    }
  
}
