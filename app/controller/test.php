<?php
namespace controller;
  
class test extends \app\controller
{
  //当前修改的主页

  function index2(){
    include \view('test__test2');
  }

  function adm_invite(){
    include \view('test__adm_invite');
  }












































  function v2_getmytask(){
    $userid = 88;
    $target_id = 1;
    $type = 'video';
    $oMember = \model\member::loadObj($userid);
    $this->di['TaskService']->getMyTaskId($oMember, $target_id, $type);
  }


  function task(){
    $task = $this->di['CompanyTaskService']->getTasksAlreadyDone(88);
    print_r($task);
  }

  function tasking(){
    $task = $this->di['CompanyTaskService']->getTasksInProcess(88);
    $this->data(['tasks'=>$task]);
  }

  function video(){
    $__nav = 'home';
    $__title = '播放视频';
    include \view('video__detail');
  }


  function shenhe(){
    $__nav = 'home';
    $__title = '播放视频';
    $data = $_GET;
    $id = $data['id'];
    $oVideo = \model\video::loadObj($id);
    $__video = $oVideo->data;
    
    include \view('video__shenhe');
  }


  function _test_finish_video(){
    $this->di['TaskService']->finishVideo(88,5,1);
  }

  function _test_finish_test(){
    $this->di['TaskService']->finishTest(88,5,1);
  }



  function get_price() {
    $price = $this->di['PriceService']->get(1,61);
    \vd($price,'$price');

    $prices = $this->di['PriceService']->gets(1);
    \vd($prices,'$prices');
  }



  function aj_nav_ls() {
    $ls = [
      ['txt'=> '性格测试', 'url'=> '/survey/xingge' ],
      ['txt'=> '花皙蔻organic系列调查问卷', 'url'=> '/survey/detail' ],
      ['txt'=> '其他测试', 'url'=> '/corp/test' ],
    ];
    $this->data(['ls'=>$ls]);
  }


  function timeline(){
    $__nav = 'home';
    include \view('test__timeline');
  }



  function waiting(){
    $__nav = 'home';
    include \view('test__waiting');
  }













  function autoheight(){
    $__nav = 'home';
    include \view('test__autoheight');
  }

  function result(){
    $__nav = 'home';
    $__title = '播放视频';
    include \view('test__video');
  }

  // function index(){
  //   $__nav = 'home';
  //   $__title = '过关';
  //   include \view('test__index');
  // }

  function index(){
    include \view('test__test');
  }

  function detail(){
    $__nav = 'home';
    $__title = '做测验';
    include \view('test__detail');
  }

  function single(){
    $__nav = 'home';
    $__title = '做测验';
    include \view('test__single');
  }









}
