<?php
namespace model;

class company_task_permission extends \app\model
{
    public static $table = "company_task_permission";
    
    // 区分部门任务和个人任务
    static $TYPE = [
      // 个人
      'PERSON' => 1,
      
      // 部门
      'ROLE' => 2,
    ];

    
}