<?php
namespace controller;

class ask extends \app\controller
{

  function index() {
    $__nav = 'task';
    $__title = '问答';

    // $__pagemark = 'ask_'.time();
    // $__event = 'ADD_ASK_SUCC';

    // $__ls = \model\news::finds('where cate_id=1 order by id desc');
    // $__members = $this->di['ToolService']->parseMember($__ls);

    include \view('ask__index');
  }

  function index2() {
    $__nav = 'task';
    $__title = '问答';

    $__pagemark = 'ask_'.time();
    $__event = 'ADD_ASK_SUCC';

    $__ls = \model\news::finds('where cate_id=1 order by id desc');
    $__members = $this->di['ToolService']->parseMember($__ls);

    include \view('ask__index2');
  }

  function my_askes() {
    $__nav = 'task';
    $__title = '我的提问';

    $__ls = \model\news::finds("where cate_id=1 and member_id='".$_SESSION['edu_user']['id']."' order by id desc");
    $__members = $this->di['ToolService']->parseMember($__ls);

    include \view('ask__index');
  }

  function my_answers() {
    $__nav = 'task';
    $__title = '我的回答';

    $__ls = \model\news::sqlQuery('select * from wb_news where id in (select target_id from wb_comm_comment where  and member_id = '.$_SESSION['edu_user']['id'].' and cate_id=1 group by target_id)');
    $__members = $this->di['ToolService']->parseMember($__ls);

    include \view('ask__index');
  }



  // ajax
  function aj_ls_index() {
    $count = 'auto';
    $cate_id = 1;
    $where = " WHERE cate_id='".$cate_id."' ORDER BY create_at DESC";
    $__ls = \model\news::finds($where
      , '*'
      , $count
      , [
        'length' => $_GET['length'], 
        'page' => $_GET['page'],
      ]);

    $this->di['ToolService']->setMemberInfo($__ls);


    $result = array(
      'ls' => $__ls,
      'length' => $_GET['length'], 
      'count' => $count,
    );
    // $__ls = \model\news::finds('where cate_id=1 order by id desc');
    // $__members = $this->di['ToolService']->parseMember($__ls);
    \vd($result,'5555');


    $this->data($result);
  }

  function aj_my_askes() {
    $count = 'auto';
    $cate_id = 1;
    // $_SESSION['edu_user']['id'],
    $member_id = $_SESSION['edu_user']['id'];
    $where = " WHERE cate_id='".$cate_id."' AND member_id='".$member_id."' order by create_at desc";
    $__ls = \model\news::finds($where
      , '*'
      , $count
      , [
        'length' => $_GET['length'], 
        'page' => $_GET['page'],
      ]);
    $lh = [];
    foreach ($__ls as $ls) {
      $lh[]['title'] = $ls['title'];
      
    }
    \vd($lh,'dddd');

    $result = array(
      'ls' => $__ls,
      'length' => $_GET['length'], 
      'count' => $count,
    );
    
    \vd($result,'我的提问');

    $this->data($result);
  }

  function aj_my_answers() {
    $count = 'auto';
    $member_id = $_SESSION['edu_user']['id'];
    $company_id = $_SESSION['edu_user']['company_id'];
    $where = " WHERE member_id='".$member_id."' and type = 3 and company_id =".$company_id;
    $my_answers = \model\comm_comment::finds($where
      , '*'
      , $count
      , [
        'length' => $_GET['length'], 
        'page' => $_GET['page'],
      ]);
      foreach ($my_answers as &$my_answer) {
        $id = $my_answer['target_id'];
        $oNews = \model\news::loadObj($id);
        $title = $oNews->data['title'];
        $my_answer['answer_title'] = $title;
        $my_answer['title'] =$my_answer['answer_title'];
        // $id = $my_answer['target_id'];
        // $otitle = \model\news::loadObj($id);
        // $title = $otitle->data['title'];
        // $my_answer['title'] = $title;
        // $my_answer['comments'] = "问题主题：".$my_answer['title']."我的回答：".$my_answer['comment'];
        
      }

      \vd($my_answers,'我的回答');


    $result = array(
      'ls' => $my_answers,
      'length' => $_GET['length'], 
      'count' => $count,
    );
    
    // \vd($result,'555');

    $this->data($result);
  }

  function aj_save_content(){
    $data = $_GET;
    $company_id = $_SESSION['edu_user']['company_id'];
    $member_id = $_SESSION['edu_user']['id'];
    if (empty($data['title'])) {
      \except(-1,"标题不能为空");
    }
    $asks = \model\news::finds("WHERE title='".$data['title']."' AND company_id='".$company_id."' AND member_id='".$member_id."'");
    if ($asks) {
      \except(-1,"请不要重复提问");
    }
    $oAsk = new \model\news;
    $oAsk->save([
      'title' => $data['title'],
      'cate_id' => 1,
      'type' => 3,
      'company_id' => $company_id,
      'member_id' => $member_id,
      'content' => $data['content'],
      ]);
      $this->data(['ok']);
  }

  // function detail() {
  //   $__nav = 'task';
  //   $oNews = \model\news::loadObj($_GET['id']);
  //   $__news = $oNews->data;
  //   $__title = '问答-';
  //   $__type = \CONF_TYPE::$TYPE['ASK'];


  //   include \view('bbs__detail');
  // }


}
