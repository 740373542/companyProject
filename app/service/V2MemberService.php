<?php
namespace service;

class V2MemberService extends \app\service {

  // 获得公司的所有员工
  function getMemberByCompanyId($companyId, &$total, $params=[]) {
    $search = '';
    if($params['search']) {
      $search = " and name like '%".$params['search']."%'";
    }
    $members = \model\member::finds(" where company_id = ".$companyId.$search." and type=".$type, "*", $total, $params );
    return $members;

  }

  //根据某个特定模块得到成员名称
  function getAppointMemberName($arr,$option){
  	$ls = [];
  	foreach ($arr as $k => $v) {
  		$memberId = $v[$option];
  		$memberName = \model\member::find(" where id = '".$memberId."'",'name');
  		$v['member_name'] = $memberName['name'];
  		$ls[] = $v; 
  	}
  	\vd($ls,'组装后的数组');
  	return $ls;
  }



}
