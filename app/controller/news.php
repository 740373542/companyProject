<?php
namespace controller;

class news extends \app\controller
{


  //企业新闻导航
  function aj_nav_ls() {
    $ls = $this->di['CorpService']->getNewsNavListByLoginedUser();
    $ls[] = [
      'id' => 1,
      'txt' => '软件提醒',
      'url' => '/news/ls_news_from_us',
      // 'notice' => 1,
    ];
    $this->data(['ls'=>$ls]);
  }


  // function ls() {
  //   $ls = [
  //     ['txt'=> '公司通知', 'url'=> '/news/ls_corp' ],
  //     ['txt'=> '行业新闻', 'url'=> '/news/ls_society' ],
  //   ];
  //   $this->data(['ls'=>$ls]);
  // }



  function ls(){
    $__nav = 'corp';
    $__news = \model\news::finds("where cate_id='".$_GET['id']."' ");
    $__type = 'NEWS';
    $__type_id = \CONF_TYPE::$TYPE[$__type];
    \vd($__type_id,'555');
    include \view('bbs__ls');
  }

  function ls_society(){
    include \view('news__ls_society');
  }

  function ls_corp(){
    include \view('news__ls_corp');
  }

  function ls_news_from_us(){
    $__news = \model\news::finds("where cate_id='0' ");
    $type = 'NEWS';
    $__type_id = \CONF_TYPE::$TYPE[$type];
    include \view('bbs__ls');
  }

    // 获取最新问答或者论坛
  function get_topics() {

    if( $this->di['UserService']->notJoined() ){

      return $this->data([
          'ls'=>[],
          'sub_count'=>0,
          'count' =>0,
          'page'=>0,
          'length'=>0,
        ]);
    }

    $data = $_GET;
    $count = 0;
    $page = 1;
    $length = 50;
    if ($data['page']) {
      $page = $data['page'];
    }
    if ($data['length']) {
      $length = $data['length'];
    }
    // 获取cateIds
    $type = $data['type'];
    \vd($type,'类型');
    // 精选
    $how = $data['how'];
    if (empty($how)) {
      $sql = " ORDER BY create_at DESC";
    }
    // 未回复
    if ('hotnews' == $how) {
      $sql = "  and sort_order > 0 ORDER BY sort_order DESC";
    }

    if ('unreply' == $how) {
      $sql = " and reply_count = 0 ORDER BY create_at DESC" ;
    }

    $cateIds = $this->di['NewsService']->getCateIds($type);

    $sub_count = $this->di['NewsService']->getReplyCount($type);
    \vd($sub_count,'计数');

    $cateIds[] = 0; 
    \vd($cateIds,'分类');
    // 获取列别下的具体内容
    if ($type == \model\comm_cate::$CONF_TYPE['corp']) {
      $news = \model\news::finds(" where cate_id in (".implode(',', $cateIds).") and type = ".\model\news::$CONF_TYPE['BBS']. $sql,'*',$count,['length'=>$length,'page'=>$page]);
      \vd($news,'论坛');

    }

    $sqlCompany = ' ';
    $company_id = $this->di['UserService']->getCompanyId();
    // echo '$company_id:'.$company_id;
    $sqlCompany = " and company_id ='". $company_id."' ";

    // 问答
    if ($type == \model\comm_cate::$CONF_TYPE['ask']) {
      // $cateIds[] = 1; 
       $news = \model\news::finds(" where cate_id in (".implode(',', $cateIds).") and type = ".\model\news::$CONF_TYPE['ASK']. $sqlCompany .$sql,'*',$count,['length'=>$length,'page'=>$page]);
      \vd($news,'问答');
    }

    $this->di['NewsService']->remove_html($news);
    $this->di['ToolService']->setMemberInfo($news,['real_name'=>'nick_name']);

    return $this->data([
        'ls'=>$news,
        'sub_count'=>$sub_count,
        'count' =>$count,
        'page'=>$page,
        'length'=>$length,
      ]);

  }


  function add_news() {
    $_POST = $_GET;
    $data = $_GET;
    $type = $data['type'];
    $oNews = new \model\news;
    // $company_id = $_SESSION['edu_user']['company_id'];
    // if (empty($_SESSION['edu_user']['company_id'])) {
    //   $company_id = 0;

    // }
    
    $company_id = $this->di['UserService']->getCompanyId();
    if (empty($data['title'])) {
      \except(\CODE::标题为空);
    }

    if ( "bbs" == $type ) {
      $type = \model\news::$CONF_TYPE['BBS'];
    }
    if ( "ask" == $type ) {
      $type = \model\news::$CONF_TYPE['ASK'];
    }
    $oComment = new \model\comm_comment;

    $oNews->data['title'] = $data['title'];
    $oNews->data['cate_id'] = 0;
    $oNews->data['content'] = $data['content'];
    $oNews->data['member_id'] = $_SESSION['edu_user']['id'];
    $oNews->data['company_id'] = $company_id;
    $oNews->data['update_at'] = \datetime();
    $oNews->data['type'] = $type;
    if(!empty($data['file'])){
      // print_r($data['file']);
      // $oNews->data['files'] = [];
      // $oNews->data['files'][] = ['file'=>$data['file']['file'],'w'=>$data['file']['w'],'h'=>$data['file']['h'],];
      $oNews->data['files'] = $data['file'];
    }
    $oNews->save();
    $this->data(['ls' => $oNews->data]);
  }





















}
