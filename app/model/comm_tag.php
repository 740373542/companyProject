<?php
namespace model;

class comm_tag extends \app\model
{
    public static $table = "comm_tag";

    static $CONF_TYPE = [
      '视频' => 1,
      '话题' => 2,
    ];
    

    function _parse() {
      $this->tags = \de($this->data['tags']);
    }

}