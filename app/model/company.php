<?php
namespace model;

class company extends \app\model
{
    public static $table = "company";

    // static $CONF_TYPE = [
    //    // 1:员工 2:管理员 3:老师
    //   'VISITOR'=> 0,
    //   'STAFF'=> 1,
    //   'MANAGER'=> 2,
    //   'TEACHER'=> 3,
    // ];

    function bindUser($userId, $type=null){
      if($type===null) $type = \model\user::$CONF_TYPE['STAFF'];
      
      $oUser = \model\user::loadObj($userId);
      if(!$oUser){
        exit('{"code":0,"data":"need_login"}');
      }
      $oUser->data['company_id'] = $this->data['id'];
      $oUser->data['type'] = $type;
      $oUser->save();
    }
    
}