<?php
namespace model;

class notice extends \app\model
{
    public static $table = "notice";

    static $TYPE = [
      'qian_dao' => 'qian_dao',
      'task' => 'task',
      'news' => 'news',
      'bbs' => 'bbs',
      'ask' => 'ask',
      'reply' => 'reply',
      'wen_juan' => 'wen_juan',
      'bschool' => 'bschool',
      'more' => 'more',
    ];
}