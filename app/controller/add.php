<?php
namespace controller;

class add extends member_controller
{
  
  function ask() {
    // $__type = 'ask';
    // $__submit_url = '/add/aj_ask_save';

    if(!empty($_GET['bbs_id'])){
      $__type = 'bbs';
      $__event = $_GET['_event'];
      $__pagemark = $_GET['_pagemark'];
      $__submit_url = '/add/aj_bbs_save?cate_id='.$_GET['bbs_id'];
    }
    $__type_id = $_GET['_type_id'];
    // $__submit_url = urlencode($__submit_url);
    // echo $__submit_url;

    include \view('add__ask');
  }
  
  function comment() {
    $__type = 'comment';
    $__event = 'ADD_COMMENT_SUCC';
    $__pagemark = $_GET['pagemark'];
    $__submit_url = urldecode($_GET['submit_url']);
    $__type_id = $_GET['_type_id'];

    include \view('add__ask');
  }

  function aj_ask_save(){
    $data = $_GET;
    $oAsk = new \model\ask;
    $oAsk->save([
      'title' => $data['title'],
      'content' => $data['content'],
      'member_id' => $_SESSION['edu_user']['id'],
      'files' => \en($data['files']),
    ]);
    if($oAsk->id){
      $this->data(['r'=>$oAsk->data]);
    }else{

    }

  }


  function aj_bbs_save(){
    $data = $_GET;
    // if(empty($data['files'])){
    //   $data['files'] = [];
    // }
    // print_r($data);
    // exit;

    $type = $data['type'];
    if(!empty($data['cate_id'])){
      $oCate = \model\comm_cate::loadObj($data['cate_id']);
      $type = $oCate->data['type'];
    }

    $oNews = new \model\news;
    $oNews->save([
      'title' => $data['title'],
      'content' => $data['content'],
      'cate_id' => $data['cate_id'],
      'member_id' => $_SESSION['edu_user']['id'],
      'company_id' => $_SESSION['edu_user']['company_id'],
      // 'member_id' => 1,
      // 'company_id' => 2,
      'files' => \en($data['files']),
      'type' => $type,
    ]);
    if($oNews->id){
      $this->data(['r'=>$oNews->data]);
    }else{ 
      $this->err(['r'=>'err']);

    }

  }











  function aj_comment_save(){
    $data = $_GET;
    $videoId = $data['video_id'];

    $o = new \model\comment;
    $o->save([
      'type' => \model\comment::$CONF_TYPE['VIDEO'],
      'video_id' => $videoId,
      'comment' => $data['content'],
    ]);
    if($o->id){
      $this->data(['r'=>$o->data]);
    }else{

    }

  }

}
