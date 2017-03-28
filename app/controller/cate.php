<?php
namespace controller;

use common\ErrorCode;

class cate extends \app\controller
{

  function index() {
    $__nav = 'home';
    $__pageBgColor = '#F0F0F0';
    include \view('cate__index');
  }
  function industry() {
    $__nav = 'home';
    $__pageBgColor = '#F0F0F0';
    $__cates = $this->di['TagService']->getTagsByName('行业-分类');
    \vd($__cates,'$__cates');

    include \view('cate__industry');
    // include \view('rem__index');
  }

}
