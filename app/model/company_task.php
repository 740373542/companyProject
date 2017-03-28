<?php
namespace model;

class company_task extends \app\model
{
    public static $table = "company_task";

    static  $TYPE = [
      'COURSE' => 1,
      'ORTHER' => 2, 
    ];
    
}