<?php
namespace service;

class PlanService extends \app\service {

  function getList($args=[]){
    $sql = '';
    if(empty($args['user_id'])){
      $args['user_id'] = $_SESSION['edu_user']['id'];
    }

    $sql = $sql." member_id='".$args['user_id']."'";

    if(!empty($args['from_who'])){
      if($args['from_who']=='self'){
        $sql = $sql." and from_id='".$args['user_id']."'";
      }else if( $args['from_who']=='other' ){
        $sql = $sql." and from_id<>".$args['user_id']."";
      }
    }

    if(!empty($args['type'])){
      $sql = $sql." and type='".$args['type']."'";
    }

    $ls = \model\msg::finds('where '.$sql);

    return $ls;
  }

}
