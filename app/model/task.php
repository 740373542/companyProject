<?php
namespace model;

class task
{
    
    static $CONF_TYPE = [
      'COURSE'=> 1,
      'TEST'=> 2,
      'NEW_COMMENT'=> 3,
      'FOLLOW_COMMENT'=> 4,
      'ASK'=> 5,
      'ANSWER'=> 6,
      'VIDEO'=> 7,
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
      '2'=> '/video/test',
      '3'=> '/task/add',
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