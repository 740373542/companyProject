<?php
namespace service;

class MemberService extends \app\service
{

  // 不传参数的时候，给个默认值
	function getList($companyId_,$key = null, $type_=NULL){
    // $type = \model\member::$CONF_TYPE['STAFF'];
    $sql = '';
    $count = 0;
    if(!empty($key)){
      $sql = " and (real_name like '%".$key."%' or name like '%".$key."%') ";
    }
    $sqlAdd = '';

    $members = \model\member::finds("where company_id='".$companyId_."' and deleted=0 ".$sqlAdd."  ".$sql." ");
    return $members;
  }


  // //获取列表
  // function getStaffList() {
  // }


  //获取列表
  function checkLoginStatus() {
    if( empty($_SESSION['edu_user']) || empty($_SESSION['edu_user']['id']) ){
      \except(-1,'need login');
    }
  }


  //获取列表
  function gets(&$count=null,$param=[]) {
    $sqladd = ' deleted = 0 ';

    \vd($param);

    $type = null;
    if( isset($param['type']) ){
      $type = (int)$param['type'];
      $sqladd .= " and type='".$type."' ";
    }

    $company_id = null;
    if( isset($param['company_id']) ){
      $company_id = (int)$param['company_id'];
      $sqladd .= " and company_id='".$company_id."' ";
    }

    $key = null;
    if(!empty($param['key'])){
      $key = $param['key'];
      $sqladd .= " and (real_name like '%".$key."%' or name like '%".$key."%' or phone like '%".$key."%' )";
    }

    $order = 'id desc';
    if($param['order']){
      $order = $param['order'];
    }

    $ls = \model\member::finds("where  ".$sqladd." order by ".$order."",'*',$count,$param);

    return $ls;
  }

  function getMemberCourseProcess($company_id, &$count ,$parmas=[],$key){

    $ls = [];

    if(!empty($key)){
        $sql = " where company_id='".$company_id."' and real_name like '%".$key."%'";
        $memberIds = \model\user::finds($sql,'id');
        $memberIds = array_keys(\indexBy($memberIds,'id'));
        $result = $this->findByIdsPage($memberIds,'*',$count,$parmas);
    }else{
      $result = \model\member_course_process::finds("where company_id='".$company_id."'",'*',$count,$parmas);
    }

    foreach ($result as $k => $v) {
      $oMember = \model\user::loadObj($v['member_id']);
      $memberName = $oMember->data['real_name'];
      $oCourse = \model\course::loadObj($v['course_id']);
      $courseName = $oCourse->data['name']; 
      $v['process'] = $v['process'] * 100;
      $v['member_name'] = $memberName;
      $v['course_name'] = $courseName;
      $ls[] = $v; 
    }

    \vd($ls,"所有数据");

    return $ls;

  }



  function findByIdsPage($ids = [],$columns='*',&$count,$params){

    $ids = arrRmEmpty($ids);
    $res = \model\member_course_process::finds('where member_id in ('.implode(',', $ids).')', $columns,$count,$params);
    return $res;
  }

  


























  
}