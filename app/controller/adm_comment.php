<?php
namespace controller;
// 继承管理后台的controller
class adm_comment extends adm_controller
{

  function index (){
    // $comments = \model\comm_comment::finds("");
    // \vd($comments,'全部评论');
    $__nav = "/adm_comment/index";
    include \view('adm_comment_check');
  }

  function aj_comment(){
    $data = $_GET;
    if(empty($data['page'])) $data['page'] = 1;
    if(empty($data['length'])) $data['length'] = 10;
    // 定义count，统计查询数据的总数
    $count = 0;
    $ls = $this->di['CommCommentService']->getcomment($count,[
        'page' => $data['page'],
        'length' => $data['length'],
      ]);
    \vd($ls,'全部评论');
    $member_ids = [];
    // 创建新数组
    $arr = [];
    foreach ($ls as $val) {
      $member_id = $val['member_id'];
      $member = \model\member::find("where id =".$member_id);
      $name = $member['real_name'];
      if(empty($name)){
        $name = $member['name'];
      }
      $val['name'] = $name;
      // 新数据放入新数组中
      $arr[] = $val;
    }
    \vd($arr,'=====');

    // $names = \model\member::findByIds($member_ids,'id,name');
    // \vd($names,'++++++');

    $this->data([
      'count' => $count,
      'ls' => $arr,
      ]);

  }

  function aj_commentdelet() {
    $data = $_GET;
    $id = $data['id'];
    $oCommComment = \model\comm_comment::loadObj($id);
    $oCommComment->data['deleted'] = 1;
    $oCommComment->save();
    $this->data(true);
  }





  // 获得某一标题下的内容
  function ask_ls() {
    $data = $_GET;
    $__type = $data['type'];
    $__nav = "/adm_comment/ask_ls?type=".\CONF_TYPE::$TYPE['ASK'];
    include \view('adm_comment_ask_ls');
  }

  // 查询comm_comment 中关于问答的数据
  function aj_ask_ls(){

    $company_id = $_SESSION['user']['company_id'];
    $data = $_GET;
    if(empty($data['page'])) $data['page']=1;
    if(empty($data['length'])) $data['length']=10;
    $count = 0;
    $ls = $this->di['CommCommentService']->get_asks($count,
      [
        'company_id' => $company_id,
        'length' => $data['length'],
        'page' => $data['page'],
        'key' => $data['search'],
        'type' => $data['type'],
      ]);
    \vd($ls,'__');
    // 添加问答用户的名字和问答的主题
    foreach ($ls as &$val) {
      $member_id = $val['member_id'];
      $member = \model\member::find(" where id =".$member_id);
      $name = $member['name'];
      $val['name'] = $name;
      $target_id = $val['target_id'];
      $news = \model\news::find(" where id = ".$target_id);
      $title = $news['title'];
      $val['title'] = $title;
    }
    \vd($ls,'问答');

    $this->data([
      'count'=>$count,
      'ls'=>$ls,
      ]);
  }


  // 管理员删除问答
  function remove_ask() {
    $data = $_GET;
    $user_id = $_SESSION['user']['id'];
    $this->di['CheckService']->CheckData($data['id'],$user_id,'comm_comment');
    $oCommComment = \model\comm_comment::loadObj($data['id']);
    $oCommComment->data['deleted'] = 1;
    $oCommComment->save();
    $this->data(['ok' => 1]);
  }





}
