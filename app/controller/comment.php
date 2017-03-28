<?php
namespace controller;

class comment extends \app\controller
{

  function aj_list() {
    // $videos = \model\video::finds('where id>0');

    $count = '_';
    $res = $this->di['CommentService']->gets($count, [
      'length' => $_GET['length'], 
      'page' => $_GET['page'],
    ]);
    
    $result = array(
      'ls' => $res,
      'count' => $count,
      // 'page' => $_GET['page'] + 1
    );
    $this->data($result);
  }


  function aj_commcomments() {
    // $videos = \model\video::finds('where id>0');

    $count = '_';
    $res = $this->di['CommCommentService']->gets([
      'length' => $_GET['length'], 
      'page' => $_GET['page'],
      'target_id' => $_GET['id'],
    ],$count);

    // print_r($res);
    $members = $this->di['ToolService']->parseMember($res['ls']);
    // print_r($members);
    
    $result = array(
      'ls' => $res['ls'],
      'count' => $res['count'],
      'members' => $members,
      'page' => $_GET['page'] + 1
    );
    $this->data($result);
  }

  function aj_save_comm_comment() {

    $target_id = $_GET['target_id'];
    $cate_id = 0;
    if(!empty($_GET['cate_id'])){
      $cate_id = (int) $_GET['cate_id'];
    }
    $content = $_GET['content'];
    $type = $_GET['type'];

    if (empty($target_id) || empty($content)) {
      \except('-1', 'error param');
    }

    $oComment = new \model\comm_comment;
    $data = [
      'target_id' => $target_id,
      'cate_id' => $cate_id,
      'comment' => $content,
      'member_id' => $_SESSION['edu_user']['id'],
      'company_id' => $_SESSION['edu_user']['company_id'],
      'type' => $type
    ];
    $oComment->data = $data;
    $oComment->save();

    $this->data(true);
  }

}
