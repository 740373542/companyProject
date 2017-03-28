<?php
namespace controller;

class adm_manager extends adm_controller
{

  public function index() {
    $__nav = 'home';
    //是否登陆过
    include \view('adm_invite__ls');
  }

  public function index2() {
    $__nav = 'home';
    //是否登陆过
    include \view('adm_invite__ls2');
  }

}
