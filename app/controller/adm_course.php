<?php
namespace controller;

class adm_course extends adm_controller
{

  function index(){
    $__nav = '/adm_course/index';
    include \view('adm_course__index');
  }

  function cate(){
    $__nav = '/adm_course/index';
    include \view('adm_course__cate');
  }

  function get_all_course(){
    $data = $_GET;
    if (empty($data['page'])) $data['page'] = 1;
    if (empty($data['length'])) $data['length'] = 10;
    $count = 0;
    $ls = $this->di['CourseService']->getAllCourse($count,[
      'page' => $data['page'],
      'length' => $data['length'],
      ],$data['search']);
    \vd($ls,'$$$$$');
    \vd($count,'555');
    $this->data([
      'ls' => $ls,
      'count' => $count,
      ]);
  }

  function aj_course_by_company_v2(){
    $data = $_GET;
    if (empty($data['page'])) $data['page'] = 1;
    if (empty($data['length'])) $data['length'] = 1000;
    $count = 0;
    $ls = $this->di['CourseService']->getAllCourseByCompany($count,[
      'company_id' => $_SESSION['user']['company_id'],
      'search' => $data['search'],
      'page' => $data['page'],
      'length' => $data['length'],
      ],'id,name,tags,company_id');

    \vd($ls,'$$$$$');
    \vd($count,'555');

    $this->data([
      'ls' => $ls,
      'count' => $count,
      ]);
  }

  function aj_get_roles_link_to_course(){
    
  }

  function video_detail(){
    $data = $_GET;
    $__type = '修改';
    $__course_id = $data['course_id'];
    // $user_id = $_SESSION['user']['id'];
    
    if(empty($data['id'])){
      $__type = '添加';
      $__id = 0;
      $__video = [];
    }else{
      $__id = (int)$data['id'];
      $__m_video = \model\video::loadObj($__id);
      $__video = $__m_video->data;
    }

    include \view('adm_course__video_detail');
  }

  function aj_ls_exercise() {
    $data = $_GET;
    $key = $data['search'];
    $company_id = $_SESSION['user']['company_id'];
    $sql = '';
    if(!empty($key)){
      $sql = " and title like '%".$key."%'";
    }
    $ls = \model\course_test::finds("where company_id = '".$company_id."' ".$sql." order by id desc ");
    $this->data([
      'ls' => $ls,
    ]);
  }

  function aj_save_pic() {
    $data = $_GET;
    $oCourse = \model\course::loadObj($data['course_id']);
    $oCourse->data['pic'] = $data['pic'];
    $oCourse->save();

    $this->data([
      'course' => $oCourse->data,
    ]);
  }

  function aj_save_videos_to_course() {
    $data = $_POST;
    $oCourse = \model\course::loadObj($data['course_id']);
    $videoIds = $data['ids'];
    // echo $testIds;

    $extraData = \de($this->data['extra']);
    // print_r($extraData);
    $extraData['videos'] = $videoIds;
    $oCourse->data['extra'] = \en($extraData);
    $oCourse->save();
    $this->data([
      'ok'=>1,
    ]);
  }

  function aj_save_testids_to_video() {
    $data = $_POST;
    $oVideo = \model\video::loadObj($data['video_id']);
    $testIds = implode(',', $data['ids']);
    // echo $testIds;
    $oVideo->data['test'] = $testIds;
    $oVideo->save();
    $this->data([
      'ok'=>1,
    ]);
  }

  function aj_ls_exercise_by_videoid() {
    $oVideo = \model\video::loadObj($_GET['id']);
    $testes = $oVideo->getTests();

    $this->data([
      'ls' => $testes,
    ]);
  }

  function aj_add_test_to_video() {
    $oVideo = \model\video::loadObj($_GET['video_id']);
    $oVideo->addTest($_GET['test_id']);

    $testes = $oVideo->getTests();

    $this->data([
      'ls' => $testes,
    ]);
  }

  function aj_video_save() {
    $data = $_POST;
    if(!empty($data['id'])){
      $oVideo = \model\video::loadObj($data['id']);
    }else{
      $oVideo = new \model\video;
    }
    if(!empty($data['name'])){
      $oVideo->data['name'] = $data['name'];
    }
    if(!empty($data['length'])){
      $oVideo->data['length'] = $data['length'];
    }
    if(!empty($data['path'])){
      $oVideo->data['filepath'] = $data['path'];
    }
    $oVideo->save();

    $oCourse = \model\course::loadObj($data['course_id']);
    $oCourse->addVideo($oVideo->data['id']);

    $this->data(['video'=>$oVideo->data]);

  }


  function aj_videos(){
    $data = $_GET;
    $user_id = $_SESSION['user']['id'];

    $__m_course = \model\course::loadObj($data['id']);
    $__course = $__m_course->data;
    $check = $this->di['CheckService']->CheckData($__course['id'],$user_id,'course');
    $__videos = array_values($__m_course->videos);

    $this->data([
      'videos' => $__videos,
    ]);

  }

  function detail(){
    $data = $_GET;
    $__course_id = $data['id'];
    $user_id = $_SESSION['user']['id'];
    $check = $this->di['CheckService']->CheckData($__course_id,$user_id,"course");
    // $__m_course = \model\course::loadObj($data['id']);
    $__course = \model\course::find("where id=".$data['id']);
    $__tags = $__course['tags'];
    // $__tags = \en($__course['tags']);
    \vd($__tags,'标签');


    // $__course = $__m_course->data;
    // $__videos = array_values($__m_course->videos);

    if(!empty($data['id'])){
      $__how = "修改";
    }else{
      $__how = "添加";
    }

    include \view('adm_course__detail');
  }


  function modify(){
		$data = $_GET;
		$__how = "修改";
		$_ls = \model\course::find("where id=".$data['id']);
		\vd($_ls,'%%%%');
		include \view('adm_course_modify');
	}

	function add(){
		$data = $_GET;
		$__how = "保存";
		$id = $data['id'];
		// $_ls = \model\course::find("where id=".$data['id']);
		// \vd($_ls,'%%%%');
		include \view('add_course');
	}

	function save(){
		$data = $_POST;
		
		$newcourse = \model\course::loadObj($data['id']);
    $newcourse->data['name'] = $data['name'];
		$newcourse->data['desc'] = $data['desc'];
		$newcourse->save();
		$this->data(['ok']);

	}

	function aj_add_course_save(){
		$data = $_POST;
		$newcourse = new \model\course;
		$newcourse->data=[
			'name' => $data['name'],
			'desc' => $data['desc'],
		];
		$newcourse->save();
		$this->data(['ok']);

	}

	function aj_deletedcourse (){
		$data = $_GET;
    $user_id = $_SESSION['user']['id'];
    $check = $this->di['CheckService']->CheckData($data['id'],$user_id,'course');
		$newcourse = $this->di['CourseService']->getdeletedcourse($data['id']);
    $this->data(['ok']);
		\vd($newcourse,'66666');
	}


  // 添加课程名字
  function add_course() {
    $data = $_GET;
    $name = $data['name'];
    if (empty($name)) {
      \except(-1,'请输入课程名字');
    }
    $course = \model\course::finds(" where name = '".$name."' and company_id =  ".$_SESSION['user']['company_id']);
    if ($course) {
      \except(-1,'课程名字已存在');
    }
    $oCourse = new \model\course;
    $oCourse->data['name'] = $name;
    $oCourse->data['company_id'] = $_SESSION['user']['company_id'];
    $oCourse->save();
    $this->data(['ok']);
  }


  // 修改课程状态
  function modify_state() {
    $data = $_GET;
    $id = $data['id'];
    $oCourse = \model\course::loadObj($id);
    $state = $oCourse->data['state'];
    if ( 1== $state  ) {
      $oCourse->data['state'] = 0;
    }else{
      $oCourse->data['state'] = 1;
    }
    $oCourse->save();
    $this->data(['ok']);
  }

  // 获得公共课程
  function pub () {
    $__nav = '/adm_course/pub';
    include \view('adm_course__pub');
  }
  // 课程标签
  function course_tags() {
    $data = $_GET;
    $__course_id = $data['course_id'];
    $oCourse = \model\course::loadObj($__course_id);
    $__tags = $oCourse->data['tags']; 
    include \view("adm_course__course_targs");
  }

  function aj_save_tag() {
    $data = $_GET;
    $user_id = $_SESSION['user']['id'];
    $course_id = $data['course_id'];
    $check = $this->di['CheckService']->CheckData($course_id,$user_id,'course');

    $oCourse = \model\course::loadObj($course_id);
    $tags = array_keys($data['tags']);
    \vd($tags,'tags');

    $oCourse->data['tags'] = \en($tags);
    $oCourse->save();
    \vd($oCourse->data['tags'],'$oCourse->data[tags]');

    $this->data([
      'get' => $data,
    ]);


  }

  // 给指定课程添加标签
  function add_tags_to_course() {
    $data = $_GET;
    // 课程id
    $user_id = $_SESSION['user']['id'];
    $course_id = $data['course_id'];
    $check = $this->di['CheckService']->CheckData($course_id,$user_id,'course');
    // 标签名称
    $tag_name = $data['tag'];

    $oCourse = \model\course::loadObj($course_id);
    // $tags = \de($oCourse->data['tags']);
    // $tags[] = $tag_name;
    $tag_name = explode(",",$tag_name);

    $tag_name = \en($tag_name);
    \vd($tag_name,'标签');
    $oCourse->data['tags'] = $tag_name;
    $oCourse->save();
    $this->data(['ok']);
  }

  // 删除指定视频下的标签
  function delete_tags_of_course() {
    $data = $_GET;
    // 课程ID
    $tags = '';
    $course_id = $data['course_id'];
    $oCourse = \model\course::loadObj($course_id);
    if (!empty($data['tag'])) {
      $tags = explode(",",$data['tag']);
      $tags = \en($tags);
      \vd($tags,'标签');
    }
    $oCourse->data['tags'] = $tags;
    $oCourse->save();
    $this->data(['ok']);
  }



}