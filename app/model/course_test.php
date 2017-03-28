<?php
namespace model;

class course_test extends \app\model
{
  public static $table = "course_test";

  function isCorrect($answers=[]){
    $correct_answers = \de($this->data['answers']);
    $r1 = array_diff($correct_answers, $answers);
    $r2 = array_diff($answers, $correct_answers);
    if( empty($r1) && empty($r2) ){
      return true;
    }
    return false;
  }

  function isWrong($answers=[]){
    return !$this->isCorrect($answers);
  }

}