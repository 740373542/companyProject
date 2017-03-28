<?php
namespace controller;

class grow_up extends \app\controller
{

  // function aj_save() {
  //   $data = $_GET;
  //   $oCommContext = \model\comm_content::loadObj($data['id']);
  //   if(!$oCommContext){
  //     $oCommContext = new \model\comm_content;
  //   }
  //   $oCommContext->save([
  //     'key'=>$data['key'],
  //     'content'=>\en($data['data']),
  //     'type' => $data['type'],
  //     'member_id' => $_SESSION['edu_user']['id'],
  //   ]);
  //   $this->data(['id'=>$oCommContext->data['id'],'get'=>$_GET,'post'=>$_POST,]);
  // }

  function aj_save() {
    $data = $_GET;
    $oCommContext = \model\comm_content::loadObj($data['id']);
    if(!$oCommContext){
      $oCommContext = new \model\comm_content;
    }
    $oCommContext->save([
      'key'=>$data['key'],
      'content'=>$data['data'],
      'type' => $data['type'],
      'member_id' => $_SESSION['edu_user']['id'],
      'company_id' => $_SESSION['edu_user']['company_id'],
    ]);
    $this->data(['id'=>$oCommContext->data['id'],'get'=>$_GET,'post'=>$_POST,]);
  }


  // 学习总结
  function summary() {

    $__keys = ['本周课程学到最重要的知识点','下周运用到什么事上','运用后将会有什么结果发生'];
    $__type = 3;
    $__config = [];
    $__data = $this->di['GrowupService']->getData($_SESSION['edu_user']['id'],$__type,[
      '本周课程学到最重要的知识点'=>'','下周运用到什么事上'=>'','运用后将会有什么结果发生'=>''
    ]);
    \vd($__data,'$__data');

    include \view('grow_up__comm');

  }

  

  // 周计划
  function study_plan() {
    // $dateRange = $this->di['GrowupService']->getDateRange();
    // $dateRange = $this->di['GrowupService']->getDateRange(1);
    $__keys = ['课程学习目标','何时完成'];
    $__type = 4;
    $__config = [];
    $__data = $this->di['GrowupService']->getData($_SESSION['edu_user']['id'],$__type,[
      '课程学习目标'=>'','何时完成'=>'',
    ]);
    \vd($__data,'$__data');

    include \view('grow_up__comm');
  }

  function week() {

    $__keys = ['个人领导力成长打分','本周对团队的贡献'];
    $__type = 2;
    $__config = [
      '个人领导力成长打分'=>[
        'type' => 'slider',
        'step' => 12,
        'values' => ['承诺','负责任','共赢','影响力','欣赏','付出','信任','创造可能性','激情','勇敢','使命','感恩'],
      ],
    ];
    $__data = $this->di['GrowupService']->getData(
      $_SESSION['edu_user']['id'],
      $__type,
      [
        '个人领导力成长打分'=>'',
        '本周对团队的贡献'=>'',
      ]
    );

    \vd($__data,'$__data');

    include \view('grow_up__comm');
  }


  function week_plan() {
    $__keys = ['目标','何时做到','具体行动'];
    $__type = 1;
    $__config = [];
    $__data = $this->di['GrowupService']->getData($_SESSION['edu_user']['id'],$__type,[
      '目标'=>'','何时做到'=>'','具体行动'=>''
    ]);
    \vd($__data,'$__data');

    include \view('grow_up__comm');

  }


}