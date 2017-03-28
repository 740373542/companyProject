<?php
namespace model;

class member extends \app\model
{
  public static $table = "member";

  static $CONF_TYPE = [
     // 0:  1:员工 2:管理员 3:老师
    'VISITOR'=> 0,
    'STAFF'=> 1,
    'MANAGER'=> 2,
    'TEACHER'=> 3,
  ];
  
  function getCompanyId(){
    if( empty($this->data['company_id']) ){
      \except('-1', 'no company');
    }
    return $this->data['company_id'];
  }


  function addScore($score=0){
    if($score>0){
      $this->data['score'] += $score;
      $this->save();
    }
  }

}