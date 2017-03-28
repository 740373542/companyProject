<?php
namespace controller;

class plan extends \app\controller
{

  //任务计划导航 withnav
  function aj_nav_ls() {
    $ls = [
      ['txt'=> '上级指定计划', 'url'=> '/task/' ],
      // ['txt'=> '上级指定计划', 'url'=> '/plan/from_company' ],
      ['txt'=> '自定学习计划', 'url'=> '/plan/self' ],
    ];
    $this->data(['ls'=>$ls]);
  }

  function from_company() {
    $__nav = 'plan';
    $__pageBgColor = '#FFFFFF';
    $ls = $this->di['PlanService']->getList([
        'from_who' => 'other',
      ]);
    \vd($ls);
    include \view('plan__comm');
  }

  function self() {
    $__nav = 'plan';
    $__pageBgColor = '#FFFFFF';
    $ls = $this->di['PlanService']->getList([
        'from_who' => 'self',
      ]);
    \vd($ls);
    include \view('test__waiting');
    // include \view('plan__comm');
  }






}
