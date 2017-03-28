<?php
namespace model;

class comm_cate extends \app\model
{
    public static $table = "comm_cate";

    static $CONF_TYPE = [
      'corp' => 1,   //论坛模块
      'news' => 2,   //企业通知模块  
      'ask'  => 3,   //问答模块
      'tag'  => 4,   //视频分类

      // 'comment'=> 7,
      // 'career'=> 8,
      // 'test'=> 9,
    ];

    static $CONF_NAME = [
      1 => '企业大学',   
      2 => '企业通知',   
      3 => '问答',   
    ];
    
}