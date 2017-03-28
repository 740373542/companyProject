<?php
namespace service;

class V2CourseService extends \app\service {

  // 获得公司自己发布的课程
  function getSelfCourseByCompanyId($companyId, &$totalV2 = 0, $params=[]) {

    $search = '';
    if($params['search']) {
      $search = " and name like '%".$params['search']."%'";
    }
    $course = \model\course::finds(" where company_id = ".$companyId." and state = 1 and deleted = 0".$search, "*", $total, $params );
    return $course;
  }

  // 获得公司可以看的所有课程 可以看到的课程包括别的公司共享的视频和自己公司购买的视频
  function getAllCourseByCompanyId($companyId, &$total = 0, $params=[]) {
    // 公司自己购买课程
    $selfCourses = $this->di['V2CourseService']->getSelfCourseByCompanyId($companyId);
    // 其他公司共享的课程
    
  }

  // 获得公司某一课程下的所有视频
  function getVideoByCourseId($courses) {
    $arr = [];
    foreach ($courses as $course) {
      // 转成数组
      $extra = \de($course['extra']);
      $ids = $extra['videos'];
      \vd($extra,'视频');
      if (!empty($ids)) {
        $video = $this->di['V2VideoService']->getVideoById($ids);
        $course['video'] = $video;
        $arr[] = $course;
      }else{
        $course['video'] = [];
        $arr[] = $course;
      }
    }
    return $arr;
  }
  

  function getFreeCourses($tag){
    $sql_add = "";
    if (!empty($tag)) {
      $sql_add = " AND tags like '%".$tag."%'";
    }
    $arr = \model\course::finds('WHERE company_id=0 and price=0 '.$sql_add.' order by sort_order desc');
    \vd($arr,'FreeCourses');
    return $arr;
  }

  function getCoursesNeedBuy($tag){
    $sql_add = "";
    if (!empty($tag)) {
      $sql_add = " AND tags like '%".$tag."%'";
    }
    $arr = \model\course::finds('WHERE company_id=0 and price>0 '.$sql_add.' order by sort_order desc');
    \vd($arr,'FreeCourses');
    return $arr;
  }


}
// {"videos":[30,31,32]}