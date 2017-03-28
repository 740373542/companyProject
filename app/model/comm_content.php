<?php
namespace model;

class comm_content extends \app\model
{
    public static $table = "comm_content";

    static $CONF_v_2_t = [
      '1' => '工作周计划',
      '2' => '本周成长',
      '3' => '学习总结',
      '4' => '学习计划',
    ];

    static $CONF_t_2_v = [
      '工作周计划' => '1',
      '本周成长' => '2',
      '学习总结' => '3',
      '学习计划' => '4',
    ];

}