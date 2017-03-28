<?php
namespace controller;

class ui extends \app\controller
{

  function index() {
    $__nav = 'home';

    include \view('ui__index');
  }
  
}