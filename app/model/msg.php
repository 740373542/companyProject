<?php
namespace model;

class msg extends \app\model
{
    public static $table = "msg";

    static $CONF_TYPE = [
       // 1:员工 2:管理员 3:老师
      'VIDEO'=> 1,
      'TEST'=> 2,
      'NEW_COMMENT'=> 3,
      'FOLLOW_COMMENT'=> 4,
    ];
    
}