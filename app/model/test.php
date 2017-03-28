<?php
namespace model;

class test extends \app\model
{
    public static $table = "test";

    static $CONF_TYPE = [
       // 1:员工 2:管理员 3:老师
      'VIDEO'=> 1,
      'TEST'=> 2,
      'NEW_COMMENT'=> 3,
      'FOLLOW_COMMENT'=> 4,
      'ASK'=> 5,
      'ANSWER'=> 6,
    ];

    static $CONF_TYPE_2_TEXT = [
      '1'=> '视频',
      '2'=> '过关',
      '3'=> '发贴',
      '4'=> '回帖',
      '5'=> '提问',
      '6'=> '解答',
    ];
    

    static $CONF_TYPE_2_URL = [
      '1'=> '/course/detail',
      '2'=> '/course/test',
      '3'=> '发贴',
      '4'=> '回帖',
      '5'=> '提问',
      '6'=> '解答',
    ];
    
    static $CONF_TYPE_2_NAV_ROUTE = [
      '1'=> 'video',
      '2'=> 'open_win',
      '3'=> 'open_win',
      '4'=> 'open_win',
      '5'=> 'open_win',
      '6'=> 'open_win',
    ];
    
}