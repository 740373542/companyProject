<?php
namespace controller;

class tag extends \app\controller
{

  function course() {
    $data = $_GET;
    $tag = $data['tag'];
    $__courses = $this->di['TagService']->getCourseByTag($tag);
    \vd($__courses,'$__courses');

    // include \view('tag__course');
    include \view('rem__index');
  }










}
