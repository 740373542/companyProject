<?php
namespace service;

class CompanyCourseService extends \app\service {

  // 获取公司已经购买的课程
  function getCourseList(&$count,$param=[]) {

    if(empty($param['page'])) $param['page'] = 1;
    if(empty($param['length'])) $param['length'] = 10;
    $company_id = $_SESSION['user']['company_id'];
    
    // $courseIds = \model\company_course::finds(" where company_id =".$company_id,'course_id');
    // $courseIds = \indexBy($courseIds,'course_id');
    // $courseIds = array_keys($courseIds);
    // 查询course表
    $sql = '';
    if(!empty($param['key'])){
      $sql = " and c.name like '%".$param['key']."%'";
    }
    // $course = \model\course::finds(" where deleted = 0  and id in (".implode(',',$courseIds).") ".$sql." ",'*',$count,$param);

    $course = \model\course::sqlQuery(" select c.* from wb_course c left join wb_company_course cc on c.id = cc.course_id where  ( c.company_id='".$company_id."' or (c.company_id = 0 and c.price=0) or cc.company_id = ".$company_id.") and c.deleted=0 ".$sql." group by c.id  order by c.id desc limit ".($param['page']-1)*$param['length'].",".$param['length']);

    $course_all = \model\course::sqlQuery(" select c.* from wb_course c left join wb_company_course cc on c.id = cc.course_id where  ( c.company_id='".$company_id."' or (c.company_id = 0 and c.price=0) or cc.company_id = ".$company_id.") and c.deleted=0 ".$sql." group by c.id  order by c.id desc");


    $count = count($course_all);


    return [
            'course' => $course,
            'course_all' => $course_all,
           ];
  }

  function getCourseCanView() {


  }

}
