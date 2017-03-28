<?php
namespace controller;

class v2_news extends \app\controller
{

  // 获取最新问答或者论坛
  function get_company_topics() {

    $data = $_GET;
    $total = 0;
    $page = 1;
    $length = 10;

    $sqlCompany = ' ';
    $company_id = $_SESSION['edu_user']['company_id'];
    // echo '$company_id:'.$company_id;
    $sqlCompany = " and company_id ='". $company_id."' ";

    if(!empty($key)){
      $search = " and title like '%".$key."%'";
    }

    if ($data['page']) {
      $page = $data['page'];
    }
    if ($data['length']) {
      $length = $data['length'];
    }
    // 获取cateIds
    $type = $data['type'];
    \vd($type,'类型');

    // 回复数量排序
    $replyCountSql = "reply_count DESC";
    if (!empty($data['sort_by_reply_count'])) {
      $replyCountSql = " reply_count ASC";
    }
    // 精选
    $how = $data['how'];
    if (empty($how)) {
      $sql = " ORDER BY create_at DESC,".$replyCountSql;
    }
    // 未回复
    if ('hotnews' == $how) {
      $sql = "  and sort_order > 0 ORDER BY sort_order DESC";
    }

    if ('unreply' == $how) {
      $sql = " and reply_count = 0 ORDER BY create_at DESC" ;
    }

    $cateIds = $this->di['V2NewsService']->getCateIds($type);

    $cateIds[] = 0; 
    \vd($cateIds,'分类');
    // 获取类别下的具体内容
    if ($type == \model\comm_cate::$CONF_TYPE['corp']) {
      $news = \model\news::finds(" where cate_id in (".implode(',', $cateIds).") and company_id='".$company_id."'".$search." and type = ".\model\news::$CONF_TYPE['BBS']. $sql,'*',$total,['length'=>$length,'page'=>$page]);
      \vd($news,'论坛');
    }

    // 问答
    if ($type == \model\comm_cate::$CONF_TYPE['ask']) {
      $cateIds[] = 1; 
       $news = \model\news::finds(" where cate_id in (".implode(',', $cateIds).") and company_id='".$company_id."'".$search." and type = ".\model\news::$CONF_TYPE['ASK']. $sql,'*',$total,['length'=>$length,'page'=>$page]);
      \vd($news,'问答');
    }

    $this->di['V2NewsService']->remove_html($news);
    $this->di['ToolService']->setMemberInfo($news,['name'=>'nick_name']);

    return $this->data([
        'ls'=>$news,
        'count' =>$total,
        'page'=>$page,
        'length'=>$length,
      ]);

  }


  // 获得个人参与过的话题
  function topics_of_member() {
    
  }





















}
