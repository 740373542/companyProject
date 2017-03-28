<?php
namespace model;

class company_role extends \app\model
{
    public static $table = "company_role";

    static $TYPE = [
      // 个人
      'person' => 1,
      // 部门
      'group' => 2,
    ];
    
}