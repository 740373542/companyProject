<?php
namespace controller;

class survey extends \app\controller
{


  function detail() {
    include \view('survey__detail');
  }

  function xingge() {
    include \view('survey__xingge');
  }

}