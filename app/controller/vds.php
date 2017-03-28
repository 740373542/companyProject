<?php
namespace controller;

class vds extends \app\controller
{

  function index() {
    $__nav = 'video';
    $__tags = [
      '能力' => [
        '电子商务' => '电子商务',
        '采购' => '采购',
        '高级分析' => '高级分析',
        '数据管理平台' => '数据管理平台',
        '推广规划' => '推广规划',
      ],
      '岗位' => [
        '生产' => '生产',
        '销售' => '销售',
        '管理' => '管理',
        '文职' => '文职',
      ],
    ];
    include \view('video__index');
  }


  function tag() {
    $__title = '查找'.$_GET['tag'].'';
    include \view('video__tag');
  }


  function aj_list() {
    // $videos = \model\video::finds('where id>0');

    $param = $_GET['param'];
    $res = $this->di['VideoService']->gets([
      'length' => $_GET['length'], 
      'page' => $_GET['page'],
    ]);
    
    $result = array(
      'ls' => $res,
      'page' => $_GET['page'] + 1
    );
    $this->data($result);
  }


  function aj_list2() {
    // $videos = \model\video::finds('where id>0');

    $param = $_GET['param'];
    $res = $this->di['VideoService']->gets([
      'length' => $_GET['length'], 
      'page' => $_GET['page'],
    ]);
    
    $result = array(
      'ls' => $res,
      'page' => $_GET['page'] + 1
    );
    $this->data($result);
  }

}
