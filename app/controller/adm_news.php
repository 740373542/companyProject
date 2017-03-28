<?php
namespace controller;
// 继承管理后台的controller
class adm_news extends adm_controller
{


  function index(){
    $id = $_GET['id'];
    $type = $_GET['type'];
    $option = $_GET['option'];
    if($type == \model\news::$CONF_TYPE['BBS']){
      $__nav = '论坛';
      $__how = $option;
    }

    if($type == \model\news::$CONF_TYPE['ASK']){
      $__nav = '问答';
      $__how = '问答';
      $option = '问答';
    }

    if($type == 0){
      $__nav = '公告';
      $__how = '公告';
      $option = '公告';
    }

    $__nav = 'adm_news__option_'.$option;
    require \view('adm_news__index');
  }

  // 获得某一标题下的内容
  function get_news_list() {
    $cateid = $data['id'];
    $news = $this->di['NewsService']->getNewsByCateId($cateid);
    $this->data(['ls' => $news]);
  }

  // 修改某一个news的title和content的页面
  function adm_news_detail() {
    $data = $_GET;
    $__type = $data['type']; 
    $__how = '添加';
    $__pic = '';
    $__cates = [];
    $oCate = \model\comm_cate::loadObj($data['cate_id']);
    $__cate_id = $oCate->data['id'];
    $__cate_name = $oCate->data['title'];
    $__type = $data['type'];

    if (!empty($data['id'])) {
      $__how = '修改';
      $oNews = \model\news::loadObj($data['id']);
      $__pic = $oNews->data['pic'];
      $__type = $oNews->data['type'];
      $__new_title = $oNews->data['title'];
      $__news_content = $oNews->data['content'];
    }else{
      $__news = null;
    }

    // if ($__type == \model\news::$CONF_TYPE['BBS']) {
    //   $company_id = $_SESSION['user']['company_id'];
    //   $__cates = $this->di['CommCateService']->getCateList($company_id, \model\news::$CONF_TYPE['BBS']);
    //   \vd($__cates,'论坛');
    // }
    include \view('adm_news__detail');
  }

  // 保存修改
  function aj_news_save() {
    // $_POST = $_GET;
    $data = $_POST;
    $type = $data['type'];
    if (!empty($data['id'])) {
      $oNews = \model\news::loadObj($data['id']);
    }else{
      // 添加新news标题
      $oNews = new \model\news;
    }
    if (empty($data['title'])) {
      \except(\CODE::标题为空);
    }

    $oNews->data['title'] = $data['title'];
    $oNews->data['cate_id'] = $data['cate_id'];
    $oNews->data['content'] = $data['content'];
    $oNews->data['pic'] = $data['pic'];
    $oNews->data['member_id'] = $_SESSION['user']['id'];
    $oNews->data['company_id'] = $_SESSION['user']['company_id'];
    $oNews->data['update_at'] = \datetime();
    if(!empty($type)){
      $oNews->data['type'] = $type;
    }
    $oNews->save();
    $this->data(['ok']);
  }


  // 获取最新问答或者论坛
  function get_topics() {
    $data = $_GET;
    $count = 0;
    $page = 1;
    $length = 50;
    $cate_id = $data['cate_id'];
    $type = $data['type'];
    $key = $data['search'];
    $company_id = $_SESSION['user']['company_id'];
    $sort = $data['sort'];

    if ($data['page']) {
      $page = $data['page'];
    }
    if ($data['length']) {
      $length = $data['length'];
    }

    $news = $this->di['NewsService']->getNewsByCateIdList([
        'cate_id'=> $cate_id,
        'type' => $type,
        'key' => $key,
        'sort' => $sort,
      ],
      $count,
      [
        'page'=>$page,
        'length'=>$length
      ]);

    $this->data([
      'ls' => $news,
      'page' => $page,
      'length' => $length,
      'count' => $count,
    ]);



    // 获取cateIds
    // $type = $data['type'];
    // \vd($type,'类型');
    // // 精选
    // $how = $data['how'];
    // \vd($how,'2222');
    // if (empty($how)) {
    //   $sql = " ORDER BY create_at DESC";
    // }

    // $how = $data['how'];
    // if (empty($how)) {
    //   $sql = " ORDER BY create_at DESC";
    // }
    // // 热点
    // if ('hotnews' == $how) {
    //   $sql = "  and sort_order > 0 ORDER BY sort_order DESC";
    // }
    // // 未回复
    // if ('unreply' == $how) {
    //   $add_sql = " and reply_count = 0 ORDER BY create_at DESC" ;
    // }

    // $cateIds = $this->di['NewsService']->getCateIds($type);

    // $sub_count = $this->di['NewsService']->getReplyCount($type);
    // \vd($sub_count,'计数');

    // $cateIds[] = 0; 
    // \vd($cateIds,'分类');
    // // 获取列别下的具体内容
    // if ($type == \model\comm_cate::$CONF_TYPE['corp']) {
    //   $news = \model\news::finds(" where cate_id in (".implode(',', $cateIds).") and company_id='".$company_id."'".$search." and type = ".\model\news::$CONF_TYPE['BBS']. $sql,'*',$count,['length'=>$length,'page'=>$page]);

    //   \vd($news,'论坛');

    // }

    // // 获取列别下的具体内容
    // if ($type == \model\comm_cate::$CONF_TYPE['news']) {
    //   $news = \model\news::finds(" where cate_id in (".implode(',', $cateIds).") and company_id='".$company_id."'".$search." and type = ".\model\news::$CONF_TYPE['INFO']. $sql,'*',$count,['length'=>$length,'page'=>$page]);

    //   \vd($news,'论坛');

    // }

    // // 问答
    // if ($type == \model\comm_cate::$CONF_TYPE['ask']) {
    //   $cateIds[] = 1; 
    //    $news = \model\news::finds(" where cate_id in (".implode(',', $cateIds).") and company_id='".$company_id."'".$search." and type = ".\model\news::$CONF_TYPE['ASK']. $sql,'*',$count,['length'=>$length,'page'=>$page]);
    //   \vd($news,'问答');
    // }
    
    // $this->di['ToolService']->setMemberInfo($news,['name'=>'nick_name']);
    // $this->data([
    //     'ls'=>$news,
    //     'sub_count'=>$sub_count,
    //     'count' =>$count,
    //     'page'=>$page,
    //     'length'=>$length,
    // ]);

  }

  function set_news_level(){
    $data = $_GET;
    $id = $data['id'];
    $sort_order = $data['sort_order'];

    $user_id = $_SESSION['user']['id'];
    $this->di['CheckService']->CheckData($id,$user_id,'news');


    $oNews = \model\news::loadObj($id);
    $oNews->data['sort_order'] = $sort_order;
    $oNews->save();
    $this->data(['ok']);
  }

  function cancel_news_level(){
    $data = $_GET;
    $id = $data['id'];

    $user_id = $_SESSION['user']['id'];
    $this->di['CheckService']->CheckData($id,$user_id,'news');
    
    $oNews = \model\news::loadObj($id);
    $oNews->data['sort_order'] = 0;
    $oNews->save();
    $this->data(['ok']);
  }


  function delete_news(){
    $data = $_GET;
    $id = $data['id'];
    $user_id = $_SESSION['user']['id'];
    $this->di['CheckService']->CheckData($id,$user_id,'news');
    \model\news::deleteById($id);
    $this->data(['ok']);
  }


  
  






















}
