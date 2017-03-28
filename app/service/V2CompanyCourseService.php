<?php
namespace service;

class V2CompanyCourseService extends \app\service {

  // 从公共课程中获取自己公司可以看到的课程
  function getCourseByCompanyId($companyId) {
    $companyCourse = \model\company_course::finds(" where company_id = ".$companyId." and state = 0");
    $courseIds = \pickBy($companyCourse,'course_id');
    \vd($courseIds,'课程Id');
    $courses = \model\course::findByIds($courseIds);
    return $courses;
  }






}
