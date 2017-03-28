<?php
namespace model;

class news extends \app\model
{
    public static $table = "news";

    static $CONF_TYPE = [
      'BBS' => 1,
      'INFO' => 2,
      'ASK' =>3,
    ];
    
}