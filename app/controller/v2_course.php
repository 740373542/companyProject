<?php
namespace controller;

class v2_course extends \app\controller {

  // 获得公司自己发布的所有课程
  function aj_self_course_by_company_id() {
    $data = $_GET;

    $total = 0;
    $page = 1;
    if (!empty($data['page'])) {
      $page = $data['page'];
    }
    $search = '';
    if (!empty($data['search'])) {
      $search = $data['search'];    
    }
    // 默认一次查出十条
    $length = 10;
    if (!empty($data['length'])) {
      $length = $data['length'];
    }

    $companyId = $_SESSION['edu_user']['company_id'];
    // $companyId = 1;
    if (empty($companyId)) {
      \except(-1,'请登录');
    }
    $courses = $this->di['V2CourseService']->getSelfCourseByCompanyId($companyId,$total,['page'=>$page,'length'=>$length,'search'=>$search]);
    // 拿到课程下的视频
    if (!empty($courses)) {
      $courses = $this->di['V2CourseService']->getVideoByCourseId($courses);
    }
    \vd($courses,'课程');

    $this->data([
        'ls'=>$courses,
        'page' => $page,
        'length' => $length,
        'count' => $total,
    ]);
  }

  // 获得公司可以看的所有课程
  function aj_all_course_by_company_id() {
    // 其他公司共享的视频
    $otherCompanyCourse = $this->di['V2CompanyCourseService']->getCourseByCompanyId(1);
    \vd($otherCompanyCourse,'共享的课程');
    // 自己公司的课程
    $companyId = $_SESSION['edu_user']['company_id'];
    // $companyId = 1;
    $selfCompanyCourse = $this->di['V2CourseService']->getSelfCourseByCompanyId($companyId);
    \vd($selfCompanyCourse,'自己公司的课程');



    // 合并两个数组
    $allCourses = array_merge($otherCompanyCourse,$selfCompanyCourse);
    \vd($allCourses,'所有的课程');
    $allCourses = $this->di['V2CourseService']->getVideoByCourseId($allCourses);
    \vd($allCourses,'组装视频之后的课程');
    $this->data(['ls'=>$allCourses]);
  }


  function get_free_courses() {
    $ls = $this->di['V2CourseService']->getFreeCourses();
    $this->data(['ls'=>$ls]);
  }

  
}
