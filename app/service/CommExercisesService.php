<?php
namespace service;

class CommExercisesService extends \app\service {

 function getls($search,&$count,$param=[]){
  $getls = \model\course_test::finds("where company_id='".$_SESSION['user']['company_id']."' and title like '%".$search."%'","*",$count,$param);
  \vd($getls,'$getls$getls');
  return $getls;
 }
 

}
