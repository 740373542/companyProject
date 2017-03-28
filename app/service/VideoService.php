<?php
namespace service;

class VideoService extends \app\service {

  function gets($param=[]) {
    $length = $param['length'];
    $page = $param['page'];
    $whereAdd = "WHERE 1>0";
    $limit_str = "";
    if (!empty($length)) {
      $limit_str.= " LIMIT ".$page * $length.",".$length;
    }

    return \model\video::finds($whereAdd." order by id desc ".$limit_str);
  }

}
