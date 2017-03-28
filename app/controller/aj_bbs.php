<?php
namespace controller;

class aj_bbs extends \app\controller
{

  function ls() {
    $ls = [
      ['txt'=> '公司制度', 'url'=> '/corp/test' ],
      ['txt'=> '学习计划', 'url'=> '/task' ],
      ['txt'=> '能力测评', 'url'=> '/corp/test' ],
      ['txt'=> '读书会', 'url'=> '/test/waiting' ],
      ['txt'=> 'xx 1', 'url'=> '/test/waiting' ],
      ['txt'=> 'xx 2', 'url'=> '/test/waiting' ],
      ['txt'=> 'xx 3', 'url'=> '/test/waiting' ],
      ['txt'=> 'xx 4', 'url'=> '/test/waiting' ],
    ];
    $this->data(['ls'=>$ls]);
  }


  function ls2() {
    $ls = [
      ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
      ['txt'=> '能力测评2', 'url'=> '/index/index' ],
      ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
      ['txt'=> '能力测评2', 'url'=> '/index/index' ],
      ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
      ['txt'=> '能力测评2', 'url'=> '/index/index' ],
      ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
      ['txt'=> '能力测评2', 'url'=> '/index/index' ],
      ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
      ['txt'=> '能力测评2', 'url'=> '/index/index' ],
      ['txt'=> '学习计划1', 'url'=> '/corp/test' ],
      ['txt'=> '能力测评2', 'url'=> '/index/index' ],
    ];
    $this->data(['ls'=>$ls]);
  }





























}
