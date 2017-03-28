<?php
namespace controller;

class adm_invite extends adm_controller
{
  function ls_bk(){
    $__nav = "/adm_invite/ls";
    $company_id = $_SESSION['user']['company_id'];
    $ls = $this->di['MemberService']->getList($company_id);
    \vd($ls,'ls__');
    
    include \view('adm_invite__ls');
  }

  function ls(){
    $__nav = "/adm_invite/ls";
    $company_id = $_SESSION['user']['company_id'];
    $ls = $this->di['MemberService']->getList($company_id);
    \vd($ls,'ls__');
    
    include \view('adm_invite__lsv2');
  }

  function lsv2(){
    $__nav = "/adm_invite/lsv2";
    $company_id = $_SESSION['user']['company_id'];
    $ls = $this->di['MemberService']->getList($company_id);
    \vd($ls,'ls__');
    
    include \view('adm_invite__lsv2');
  }

  function vue(){    
    include \view('__header');
  }

  function aj_ls(){
    \vd($_SESSION['user']);
    $company_id = $_SESSION['user']['company_id'];

    $data = $_GET;

    if(empty($data['page'])) $data['page']=1;
    if(empty($data['length'])) $data['length']=10;

    $count = 0;

    $ls = $this->di['MemberService']->gets($count,
      [
        'company_id' => $company_id,
        'length' => $data['length'],
        'page' => $data['page'],
        'key' => $data['search'],
      ]);


    $this->data([
      'count'=>$count,
      'page'=>$data['page'],
      'length'=>$data['length'],
      'ls'=>$ls,
    ]);
  }

  function aj_settype() {
    $data = $_POST;
    $user_id = $_SESSION['user']['id'];
    $this->di['CheckService']->CheckData($data['id'],$user_id,'member');
    $oMember = \model\member::loadObj($data['id']);
    $oMember->data['type'] = $data['type'];
    $oMember->save();
    $this->data(['member'=>$oMember->data]);
  }


  // 取出所有评论
  
}
