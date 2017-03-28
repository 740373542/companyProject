<?php
namespace controller;

class video extends \app\controller
{

  function detail() {
    $__nav = 'video';
    $__title = '播放视频2';
    include \view('course__detail');
  }

  function index() {
    $__nav = 'video';
    include \view('video__index');
  }

  function aj_done() {
    $this->di['TaskService']->finishVideo($_SESSION['edu_user']['id'],$_GET['id'],$_GET['course_id']);
    $this->data(['get'=>$_GET]);
  }

  function ag_list() {
    $videos = \model\video::finds('where id>0');

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


  function aj_test_submit() {

    // $input = rawurldecode(file_get_contents("php://input"));
    // echo $input;

    // $test = array_merge($_POST, json_decode(rawurldecode(file_get_contents("php://input")), true));

    // if(!empty($_POST)){
      // $_POST = json_decode(file_get_contents('php://input'), true);
    // }
    $data = $_POST;
    $asks = $data['asks'];
    if(empty($data['answers'])){
      $this->err(-1,'未提交答案');
      exit;
    } 

    $answers = [];
    foreach ($asks as $k => $askId) {
      $answers[''.$askId] = [];
    }
    foreach ($data['answers'] as $item) {
      $s = explode('_', $item);
      $answers[''.$s[0]][] = (int) $s[1];
    }

    $correct_rate = 0;
    $correct_count = 0;
    $asks_length = count($data['asks']);
    foreach ($asks as $k => $askId) {
      $oTest = \model\course_test::loadObj($askId);
      if($oTest->isCorrect($answers[''.$askId])){
        $correct_count += 1;
      }
      // exit;
    }
    $correct_rate = $correct_count/$asks_length;

    //如果通过
    $pass = 'false';
    if($correct_rate>=0.6){
      $this->di['TaskService']->finishTest($_SESSION['edu_user']['id'],$_POST['video_id'],$_POST['course_id']);
      $pass = 'true';
    }

    $this->data(['pass'=>$pass, 'post'=>$_POST,'answers'=>$answers,]);
  }

  // function aj_test() {
  //   $__video_id = 0;
  //   $__test_id = 0;
  //   if(!empty($_GET['video_id'])){
  //     $__video_id = (int) $_GET['video_id'];
  //   }
  //   $__oVideo = \model\video::loadObj($__video_id);
  //   if(!empty($__oVideo->data['']))
  //   $__test_id = (int) 

  //   $__tests = $__oVideo->getTests();

  //   $this->data([
  //     'id' => 
  //   ]);
  // }

  function test() {
    $__nav = 'course';
    if(empty($_GET['id'])){
      $_GET['id'] = 1;
    }
    $__title = '过关';
    $__oVideo = \model\video::loadObj($_GET['id']);
    $__tests = $__oVideo->getTests();

    // $__ls = \model\course::finds('where id>0 order by id desc');
    include \view('video__test');
  }


}
