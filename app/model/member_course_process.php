<?php
namespace model;

class member_course_process extends \app\model
{
    public static $table = "member_course_process";


    function _parse() {
      $content = \de($this->data['content']);
      $this->content = $content;
    }

    function finished(){
      if($this->data['process']>=1){
        return true;
      }
      return false;
    }

}