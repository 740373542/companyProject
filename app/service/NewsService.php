<?php
namespace service;

class NewsService extends \app\service {

    // function gets($param=[] , &$count=null) {
    //   $whereAdd = " ";

    //   // if( empty($param['where']) ){
    //   //   if(!empty($param['target_id'])){
    //   //     $whereAdd = " WHERE target_id='".$param['target_id']."'";
    //   //   }

    //   //   if(empty($param['cols'])){
    //   //     $param['cols'] = '*';
    //   //   }

    //   //   if(!empty($param['sort'])){
    //   //     $param['sort'] = 'id desc';
    //   //   }
    //   //   $whereAdd = $whereAdd. ' ORDER BY '.$param['sort'];
    //   // }else{
    //     $whereAdd = $param['where'];
    //   // }

    //   $ls = \model\news::finds($whereAdd, $param['cols'], $count, $param);
      
    //   return [
    //     'ls' => $ls,
    //     // 'users' => $users,
    //   ];
    // }



  // 获得标题下的具体信息
  function getNewsByCateId($cate_id_) {
    $news = \model\news::finds(" where deleted = 0 and cate_id =".$cate_id_." and type = ".\model\news::$CONF_TYPE['INFO']);
    $news = \indexBy($news,'id');
    \vd($news,'dsdfdfsdf');
    return $news;
  }

   // 根据公司的ID和type取出问答或者论坛的id
  function getCateIds($type_) {
    $companyId = 0;
    if(!empty($_SESSION['edu_user']['company_id'])){
      $companyId = $_SESSION['edu_user']['company_id'];
    }

    if(isset($_SESSION['user'])){
      $companyId = $_SESSION['user']['company_id'];
    }

    $cateIds = \model\comm_cate::finds("where company_id = ".$companyId." and type = ".$type_,'id');
    $cateIds = \indexBy($cateIds,'id');
    $cateIds = array_keys($cateIds);
    return $cateIds;
  }


   // 获取对应板块的回复
  function getReplyCount($type_) {
    if ($type_ == \model\comm_cate::$CONF_TYPE['corp']) {
      $replyCount = \model\news::finds(' where type = '.\model\news::$CONF_TYPE['BBS']);
    }
    if ($type_ == \model\comm_cate::$CONF_TYPE['ask']) {
      $replyCount = \model\news::finds(' where type = '.\model\news::$CONF_TYPE['ASK']);
    }
    $count = count($replyCount);
    return $count;
  }

  function remove_html(&$news) {
    if(!empty($news)){
      foreach ($news as &$new) {
        $content = $new['content'];
        $content = strip_tags($content);

        \vd($content,'去标签');
        $qian=array(" ","　","\t","\r");$hou=array("","","","");
        $content = str_replace($qian,$hou,$content); 
        \vd($content,'截取');
        $new['content'] = $content;
      }
      
    }
  }



function getNewsByCateIdList($data = [],&$count,$params = []) {

  $cate_id = $data['cate_id'];
  $type = $data['type'];
  $key = $data['key'];
  $sort = $data['sort'];

  $sql = '';

  if(!empty($key)){
    $sql = " and title like '%".$key."%'";    
  }

  if(!empty($cate_id)){
    $sql .= ' and cate_id = '.$cate_id;
  }

  if(empty($sort)){
    $sort = 'time';
  }
  if(!empty($sort) && $sort == 'time'){
    $sql .= ' order by create_at desc';
  }

  if(!empty($sort) && $sort == 'level'){
    $sql .=' order by sort_order desc';
  }
  // and type = ".$type. '
  $news = \model\news::finds(" where deleted = 0 and company_id = '".$_SESSION['user']['company_id']."'  and type='".$type."'" .$sql,'*',$count,$params);

  return $news;
}
























}