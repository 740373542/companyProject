<?php
namespace controller;

class corp extends \app\controller
{

  function index() {
    $__nav = 'corp';
    if( $this->di['UserService']->notLogin() ){
      include \view('user__index'); 
      exit();
    }else{
      if( $this->di['UserService']->notJoined() ){
        include \view('corp__join');
        exit;
      }
    }

    include \view('corp__index');
  }

  function aj_nav_ls() {
    $ls = $this->di['CorpService']->getCorpNavListByLoginedUser();
    $this->data(['ls'=>$ls]);
  }

  // function aj_nav_ls_bk() {
  //   $ls = [
  //     ['txt'=> '公司制度', 'url'=> '/corp/test' ],
  //     ['txt'=> '读书会', 'url'=> '/test/waiting' ],
  //     ['txt'=> '新员工入职系列', 'url'=> '/test/waiting' ],
  //     ['txt'=> '团建', 'url'=> '/test/waiting' ],
  //     // ['txt'=> '创建公司', 'url'=> '/corp/regist' ],
  //     // ['txt'=> '加入公司', 'url'=> '/corp/join' ],
  //   ];
  //   $this->data(['ls'=>$ls]);
  // }

  function aj_regist() {
    $data = $_GET;
    $r = $this->di['CompanyService']->regist($data);
    
    $this->data(['ok'=>1]);
  }















  function test() {
    $__nav = 'corp';
    include \view('corp__test');
  }

  function join() {
    $__nav = 'corp';
    include \view('corp__join');
  }

  function regist() {
    $__nav = 'corp';
    include \view('corp__regist');
  }

}
