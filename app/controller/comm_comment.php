<?php
namespace controller;

class comm_comment extends \app\controller
{

  function reply() {
   // $_POST = $_GET;
    $data = $_GET;
    $type = $_GET['type'];
    $company_id = $_SESSION['edu_user']['company_id'];
    if (empty( $_SESSION['edu_user']['company_id'])) {
      $company_id = 0;
    }
    if ( "bbs" == $type ) {
      $type = \model\news::$CONF_TYPE['BBS'];
    }
    if ( "ask" == $type ) {
      $type = \model\news::$CONF_TYPE['ASK'];
    }
    $oComment = new \model\comm_comment;


    $oComment->data['comment'] = $data['content'];
    $oComment->data['cate_id'] = 0;
    $oComment->data['target_id'] = $data['id'];
    $oComment->data['member_id'] = $_SESSION['edu_user']['id'];
    $oComment->data['company_id'] = $company_id;
    $oComment->data['create_at'] = \datetime();
    $oComment->data['type'] = $type;
    $oComment->save();
    $oNews = \model\news::loadObj($data['id']);
    $oNews->data['reply_count'] =$oNews->data['reply_count'] + 1;
    $oNews->save();
    $this->data([
      'news' => $oNews->data,
      'reply_count' => $oNews->data['reply_count'],
    ]);

  }

  // 获得对问题回复的人和回复的内容
  function ask_commemts() {
    $data = $_GET;
    $count = 'auto';
    $member_id = $_SESSION['edu_user']['id'];
    $company_id = $_SESSION['edu_user']['company_id'];
    $target_id = $data['id'];
    if (empty($data['page'])) $data['page'] = 1;
    if (empty($data['length'])) $data['length'] = 10;

    $answers = \model\comm_comment::sqlQuery("SELECT com.id,com.comment, com.create_at, m.real_name as reply_name,m.avatar as avatar FROM wb_comm_comment com, wb_member m WHERE com.member_id = m.id and com.type = 3 and com.company_id =".$company_id." and  com.target_id = ".$target_id." and com.deleted = 0 ORDER BY com.id LIMIT ".($data['page'] - 1) * $data['length'].",".$data['length']);

    $count_res = \model\comm_comment::sqlQuery("SELECT count(com.id) as count FROM wb_comm_comment com, wb_member m WHERE com.member_id = m.id and com.member_id=".$member_id." and com.type = 3 and com.company_id =".$company_id." and  com.target_id = ".$target_id." and com.deleted = 0 ORDER BY com.id");
    $count = $count_res[0]['count'];
    \vd($count_res,'1111');

    if(empty($answers)){
      $answers = [];
    }

    $result = array(
      'ls' => $answers,
      'length' => $data['length'], 
      'count' => $count,
    );
    

    $this->data($result);
  }













}
