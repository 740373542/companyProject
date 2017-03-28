<?php
namespace controller;

class bbs extends \app\controller
{

  function aj_ls() {
    $cate_id = $_GET['id'];
    if (!empty($_GET['sort'])) {
      $sort = $_GET['sort'];
    } else {
      $sort = "id";
    }

    $count = 'auto';
    $where = " WHERE cate_id='".$cate_id."' ORDER BY ".$sort." desc";
    $ls = \model\news::finds($where
      , '*'
      , $count
      , [
        'length' => $_GET['length'], 
        'page' => $_GET['page'],
      ]);
    
    $result = array(
      'ls' => $ls,
      'length' => $_GET['length'], 
      'count' => $count,
    );
    $this->data($result);

  }



  function corp_ls__bk() {
    $sort = "";
    if (isset($_GET['sort'])) {
      $sort = $_GET['sort'];
    } else {
      $sort = "id";
    }
    $__nav = 'corp';
    $__pagemark = 'page_'.time();
    $__event = 'ADD_BBS_SUCC';

    $__type = 'BBS';
    $__type_id = \CONF_TYPE::$TYPE[$__type];

    if(isset($_GET['type_id'])){
      $__type_id = $_GET['type_id'];
    }

    if(empty($_GET['length'])){
      $_GET['length'] = 50;
    }
    $__length = (int) $_GET['length'];

    $__news = \model\news::finds("where cate_id='".$_GET['id']."' order by ".$sort." desc LIMIT ".$__length);
    \vd($__news,'222222');
    // $this->data(['ls'=>$__news]);
    include \view('bbs__ls');
  }



    function bbs_ls() {
    $count = 0;

    $sort = "";
    if (isset($_GET['sort'])) {
      $sort = $_GET['sort'];
    } else {
      $sort = "id";
    }
    $__nav = 'corp';
    $__pagemark = 'page_'.time();
    $__event = 'ADD_BBS_SUCC';

    $__type = 'BBS';
    $__type_id = \CONF_TYPE::$TYPE[$__type];

    if(isset($_GET['type_id'])){
      $__type_id = $_GET['type_id'];
    }

    if(empty($_GET['length'])){
      $_GET['length'] = 50;
    }
    $__length = (int) $_GET['length'];

    $__news = \model\news::finds("where cate_id='".$_GET['id']."' order by ".$sort." desc",'*',$count, [
        'length' => $_GET['length'], 
        'page' => $_GET['page'],
      ]);
    \vd($__news,'222222');
    $this->data(['ls'=>$__news]);
    // include \view('bbs__ls');
  }



  function corp_ls() {
    $this->index();
  }


  function index() {
    include \view('bbs__index');
  }

  function detail() {
    $oNews = \model\news::loadObj($_GET['id']);

    //判断是否是自己公司的，自己是否有权限

    $__news = $oNews->data;
    \vd($__news,'内容');
    // $__news['content'] = preg_replace ( "/(\<[^\<]*\>|\r|\n|\s|\[.+?\])/is", ' ', $__news['content']);
    $__title = $__news['title'];


    $__type_id = $_GET['type_id'];

    $__pagemark = 'page_'.time();
    $__event = 'ADD_COMMENT_SUCC';
    $__submit_url = '/comment/aj_save_comm_comment?target_id='.$__news["id"].'&type_id='.$__type_id.'&cate_id='.$__news['cate_id'];
    // $this->data(['ls' => $__news]);

    include \view('bbs__detail');
  }

  function detail_bk() {
    $oNews = \model\news::loadObj($_GET['id']);
    $__news = $oNews->data;
    \vd($__news,'内容');
    $__title = $__news['title'];

    $__type_id = $_GET['type_id'];

    $__pagemark = 'page_'.time();
    $__event = 'ADD_COMMENT_SUCC';
    $__submit_url = '/comment/aj_save_comm_comment?target_id='.$__news["id"].'&type_id='.$__type_id.'&cate_id='.$__news['cate_id'];
    $this->data(['ls' => $__news]);
    // include \view('bbs__detail_bk');
  }
  

  





























  function detail_test() {
    
    include \view('bbs__detail');
  }



  // function ls() {
  //   $ls = [
  //     ['txt'=> '公司制度', 'url'=> '/corp/test' ],
  //     ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
  //     ['txt'=> '能力测评2', 'url'=> '/index/index' ],
  //   ];
  //   $this->data(['ls'=>$ls]);
  // }


  // function ls2() {
  //   $ls = [
  //     ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
  //     ['txt'=> '能力测评2', 'url'=> '/index/index' ],
  //     ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
  //     ['txt'=> '能力测评2', 'url'=> '/index/index' ],
  //     ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
  //     ['txt'=> '能力测评2', 'url'=> '/index/index' ],
  //     ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
  //     ['txt'=> '能力测评2', 'url'=> '/index/index' ],
  //     ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
  //     ['txt'=> '能力测评2', 'url'=> '/index/index' ],
  //     ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
  //     ['txt'=> '能力测评2', 'url'=> '/index/index' ],
  //   ];
  //   $this->data(['ls'=>$ls]);
  // }





























}
