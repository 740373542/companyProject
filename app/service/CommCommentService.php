<?php
namespace service;

class CommCommentService extends \app\service {

  function gets($param=[] , &$count) {
    $length = $param['length'];
    $page = $param['page'];
    $whereAdd = "WHERE target_id='".$param['target_id']."'";
    $limit_str = "  ";
    if (!empty($length)) {
      $limit_str.= " LIMIT ".$page * $length.",".$length;
    }

    if($count){
      $ls = \model\comm_comment::finds($whereAdd." order by id asc ".$limit_str, '*', $count); 
    }else{
      $ls = \model\comm_comment::finds($whereAdd." order by id asc ".$limit_str, '*'); 
    }
    $users = $this->di['ToolService']->parseUser($ls);
    
    return [
      'ls' => $ls,
      'users' => $users,
    ];
  }


  // 获得问答数据 分页
  function get_asks(&$count,$param=[]) {
    $sqladd = ' deleted = 0 ';

    \vd($param);

    $type = null;
    if( isset($param['type']) ){
      $type = (int)$param['type'];
      $sqladd .= " and type='".$type."' ";
    }

    $company_id = null;
    if( isset($param['company_id']) ){
      $company_id = (int)$param['company_id'];
      $sqladd .= " and company_id='".$company_id."' ";
    }

    $key = null;
    if(!empty($param['key'])){
      $key = $param['key'];
      // 模糊查询问答的内容或者用户的ID
      $sqladd .= " and (comment like '%".$key."%' or id like '%".$key."%')";
    }

    $order = 'id desc';
    if($param['order']){
      $order = $param['order'];
    }

    $ls = \model\comm_comment::finds("where  ".$sqladd." order by ".$order."",'*',$count,$param);

    return $ls;
  }


  // 评论
  function getcomment(&$count=null,$param=[]){
    $company_id = $_SESSION['user']['company_id'];
    $ls = \model\comm_comment::finds("where deleted = 0 and company_id = '".$company_id."'","*",$count,$param);
    return $ls;
  }

}
