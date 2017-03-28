<?php
namespace controller;

class explore extends \app\controller
{

  function index() {
    $__nav = 'explore';
    $__title = '探索';
    include \view('explore__index');
  }


}
