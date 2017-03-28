<?php
namespace service;

class ToolService extends \app\service {

  function parseUser($ls){
    $userIds = \pickBy($ls,'user_id');
    // print_r($userIds);
    // foreach ($ls as $k => $v) {
    //   if(!empty($v['course_id'])){
    //     $ids[''.$v['course_id']] = $v['course_id'];
    //   }
    // }
    $users = \model\user::findByIds($userIds,'id,real_name,name,avatar','id');
    foreach ($users as &$v) {
      if( !empty($v['real_name']) && empty($v['name']) ){
        $v['name'] = $v['real_name'];
      }
    }
    // print_r($users);
    return $users;
  }

  function parseMember($ls){
    // \_vd($ls);
    $userIds = \pickBy($ls,'member_id');
    // print_r($userIds);
    $users = \model\user::findByIds($userIds,'id,real_name,name,avatar','id');
    // print_r($users);
    foreach ($users as &$v) {
      if( !empty($v['real_name']) ){  //  && empty($v['name'])
        $v['name'] = $v['real_name'];
      }
    }
    return $users;
  }

  function parseNews(&$ls){
    foreach ($ls as $news) {
      $news['pic'] = null;
      try{
        $news['pics'] = \de($news['files']);
        $news['pic'] = $news['pics'][0];
      }catch(\Exception $e){
      }
    }
  }


  function setMemberInfo(&$ls,$keys=['name'=>'nick_name','real_name'=>'real_name']){
    // \_vd($ls);
    $userIds = \pickBy($ls,'member_id');
    // print_r($userIds);
    $users = \model\user::findByIds($userIds,'id,name,avatar,real_name','id');
    // print_r($users);
    if(!empty($ls)){
      foreach ($ls as $key => &$v) {
        if( !empty($users[$v['member_id']]) && !empty($users[$v['member_id']]['avatar']) ){
          $v['avatar'] = $users[$v['member_id']]['avatar']; 
        }else{
          $v['avatar'] = '/app/noavatar_big.gif'; 
        }
        foreach ($keys as $k => $v2) {
          $v[$v2] = $users[$v['member_id']][$k];
        }
      } 
    }else{
      $ls = [];
    }

  }

  function setCompanyInfo(&$ls,$args=[]){
    if( !empty($args['keys']) ){
      $keys = $args['keys'];
    }else{
      $keys=  ['name'=>'name'];
    }
    
    if( !empty($args['rel_key']) ){
      $rel_key = $args['rel_key'];
    }else{
      $rel_key = 'company_id';
    }

    $ids = \pickBy($ls,$rel_key);
    // print_r($userIds);
    $companies = \model\company::findByIds($ids,'id,name','id');
    // print_r($users);
    if(!empty($ls)){
      foreach ($ls as $key => &$v) {
        foreach ($keys as $k => $v2) {
          $v[$v2] = $companies[$v[$rel_key]][$k];
        }
      } 
    }else{
      $ls = [];
    }

  }

  function setTaskInfo(&$ls,$args=[]){
    if( !empty($args['keys']) ){
      $keys = $args['keys'];
    }else{
      $keys=  ['name'=>'name','pic'=>'pic','tags'=>'tags','company_id'=>'from_company_id'];
    }
    
    if( !empty($args['rel_key']) ){
      $rel_key = $args['rel_key'];
    }else{
      $rel_key = 'target_id';
    }

    $ids = \pickBy($ls,$rel_key);
    // print_r($userIds);
    $courses = \model\course::finds('where id in ('.implode(',', $ids).') and state=1 ','id,name,pic,tags,company_id');
    $courses = \indexBy($courses,'id');
    if(!empty($ls)){
      foreach ($ls as $key => &$v) {
        foreach ($keys as $k => $v2) {
          $v[$v2] = $courses[$v[$rel_key]][$k];
        }
      } 
    }else{
      $ls = [];
    }

  }

}
