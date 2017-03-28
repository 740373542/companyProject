<?php
namespace model;

class comment extends \app\model
{
    public static $table = "comment";

    static $CONF_TYPE = [
       // 1:员工 2:管理员 3:老师
      'VIDEO'=> 1,
    ];
    
}