<?php
namespace controller;

class course extends \app\controller {

  function index() {
    $data = $_GET;
    
    if ($data['type'] == 1) {
      $__courses = $this->di['V2CourseService']->getFreeCourses($data['tag']);
    } else if ($data['type'] == 2) {
      $__courses = $this->di['V2CourseService']->getCoursesNeedBuy($data['tag']);
    }

    include \view('course__index');
  }

  // function aj_ls() {
  //   $__nav = 'course';
  //   $__title = '课程';

  //   $__ls = \model\course::finds('where id>0 and company_id=0 and state=1 order by id desc');
  //   // print_r($__ls);
  //   foreach ($__ls as $k => &$v) {
  //     $v['content'] = \remove_html($v['content']);
  //     $v['desc'] = \remove_html($v['desc']);
  //   }

  //   $this->data([
  //     'ls' => $__ls,
  //   ]);
  // }

  function aj_ls() {
    $__nav = 'course';
    $__title = '课程';


    $this->data([
      'ls' => [],
    ]);
  }


  function aj_video_ls() {
    $this->aj_video_ls_shenhe();
  }


  function aj_video_ls_shenhe() {
    $__nav = 'course';
    $__title = '课程';

    $__ls = \model\video::finds('where id>0 order by id desc');

    $this->data([
      'ls' => $__ls,
    ]);
  }


  function detail() {
    $__nav = 'course';
    if(empty($_GET['id'])){
      $_GET['id'] = 1;
    }
    $courseId = $_GET['id'];


    $__oCourse = \model\course::loadObj($courseId);
    // $__oCourse->save([
    //     'aim' => time(),
    //   ]);
    // exit;
    $__videos = $__oCourse->videos;
    $__course = $__oCourse->data;
    $__title = $__course['name'];
    $__ls = \model\course::finds('where id>0 order by id desc');

    // print_r($__videos);

    $__o_process = $this->di['CourseProcessService']->getRecord($_SESSION['edu_user']['id'], $courseId);

    include \view('course__detail');
  }

  //根据单个标签筛选标签下所有课程

  function ls(){
    $data = $_GET;
    $tag = $data['tag'];
    $company_id = $_SESSION['user']['company_id'];
    // $company_id = 1;

    $courses = $this->di['TagService']->getCourseByTag($company_id,$tag);
    \vd($courses,'@@@@');
    $this->data(['ls'=>$courses]);
  }


  // function aj_finishvideo() {
  //   if(empty($_GET['id'])) exit;
  //   $id = $_GET['id'];
  //   $this->di['TaskService']->finishVideo($id);
  //   $this->data(['ok']);
  // }




























}
