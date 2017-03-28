<?php
namespace service;

class CourseService extends \app\service {


  // 获得公司下的课程
  function getCourseList() {
    
  }

  function getAllCourse(&$count=null,$param=[],$search) {
    $company_id = $_SESSION['user']['company_id'];
    $AllCourses = \model\course::finds("where deleted=0 and company_id = ".$company_id." and name like '%".$search."%'" ,'*',$count,$param);
    return $AllCourses;

  }

  function getAllCourseByCompany(&$count=null,$param=[],$column='*') {
    if( !empty($param['company_id']) ){
      $company_id = $param['company_id'];
    }else{
      $company_id = $_SESSION['user']['company_id'];
    }

    $search = '';
    if( empty($param['search']) ){
      $search = $param['search'];
    }

    $AllCourses = \model\course::finds("where deleted=0 and (company_id = ".$company_id." or company_id = '0') and name like '%".$search."%'" ,$column,$count,$param);
    return $AllCourses;

  }

  function getdeletedcourse($id){
  	$ls = \model\course::loadObj($id);
  	$ls->data['deleted'] = 8;
  	$ls->save();
  	return $ls;
  }


  // 获取公共课程Id
  function getPublicCourse(&$count,$param) {
    $company_id = $_SESSION['user']['company_id'];
    $courses = \model\company_course::finds(" where company_id = ".$company_id,'*',$count,$param);
    foreach ($courses as &$course) {
      $id = $course['course_id'];
      $course_ls = \model\course::loadObj($id);
      $course['name'] = $course_ls->data['name'];
    }
    return $courses;
  }



}
