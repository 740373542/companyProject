<?php
namespace model;

class video extends \app\model
{
    public static $table = "video";

    function getTests() {
      $testIds = $this->data['test'];
      $tests = \model\course_test::finds('where id in ('.$testIds.')');
      return $tests;
    }
    
    function addTest($id) {
      $id = (int) $id;
      $testIds = $this->data['test'];
      $testIds = str_replace('"', '', $testIds);
      $testArr = explode(',', $testIds);

      $find = array_search($id, $testArr);
      if( false === $find ){
        $testArr[] = $id;
        $testArr = arrRmEmpty($testArr);
        $testIds = implode(',', $testArr);
        $this->data['test'] = $testIds;
        $this->save();
      }
    }
}