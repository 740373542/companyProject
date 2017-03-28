<?php
namespace model;

class user extends \app\model
{
    public static $table = "member";

    static $CONF_TYPE = [
       // 1:员工 2:管理员 3:老师
      'VISITOR'=> 0,
      'STAFF'=> 1,
      'MANAGER'=> 2,
      'TEACHER'=> 3,
    ];
    
}