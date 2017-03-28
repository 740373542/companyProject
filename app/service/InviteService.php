<?php
namespace service;

class InviteService extends \app\service {

  function gets($args) {
    $companyId = $args['company_id'];
    $type = $args['type'];

    $sql = "company_id='".$companyId."' ";

    if(isset($args['type'])){
      $sql .= " and type='".$type."' ";
    }

    $ls = \model\member::finds("where $sql ");
    // print_r($ls);
    return $ls;
  }

}
