<?php
namespace controller;

class member_controller extends \app\controller
{

    public function __construct()
    {
        $this->di = \app\di::get();
        //判断是否登陆
        // $this->di['MemberService']->checkLoginStatus();
    }
  
}
