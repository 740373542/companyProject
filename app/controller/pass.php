<?php
namespace controller;

class pass extends \app\controller
{

  function aj_nav_ls() {
    $ls = [
      ['txt'=> '职业通道', 'url'=> '/test/waiting' ],
      ['txt'=> '岗位测评', 'url'=> '/test/waiting' ],
    ];
    $this->data(['ls'=>$ls]);
  }






}
