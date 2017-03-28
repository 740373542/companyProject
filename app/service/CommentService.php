<?php
namespace service;

class CommentService extends \app\service {

  function gets(&$count, $param=[]) {
    $length = $param['length'];
    $page = $param['page'];
    $whereAdd = "WHERE 1>0";
    $limit_str = "";
    if (!empty($length)) {
      $limit_str.= " LIMIT ".$page * $length.",".$length;
    }

    return \model\comment::finds($whereAdd." order by id desc ".$limit_str);
  }

}
