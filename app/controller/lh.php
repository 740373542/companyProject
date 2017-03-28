<?php
namespace controller;

class lh extends \app\controller
{

  // 个人任务列表
  function index() {
    $__targets = $this->di['TargetService']->get_targets_by_member_id($count, [
      'length' => $_GET['length'], 
      'page' => $_GET['page'],
      'member_id' => $_SESSION['edu_user']['id'],
    ]);
    include \view('target__index');
  }

  function add() {
    if (isset($_GET['id'])) {
      $__targetId = $_GET['id'];
    }
    include \view('target__add');
  }

  function detail() {
    $oTarget = \model\target::loadObj($_GET['id']);
    $__targetId = $oTarget->data['id'];
    $__title = $oTarget->data['title'];
    $__content = $oTarget->data['content'];
    $__subTargets = json_decode($oTarget->data['params'], true);

    $list = \model\target_relation::finds('where target_id='.$_GET['id']);
    $__relation = [];
    foreach ($list as &$item) {
      $oMember = \model\member::loadObj($item['member_id']);
      $item['avatar'] = $oMember->data['avatar'];
      $__relation[] = $item;
    }

    include \view("target__detail");
  }

  function aj_self_targets() {
    $count = '_';
    $res = $this->di['TargetService']->get_targets_by_member_id($count, [
      'length' => $_GET['length'], 
      'page' => $_GET['page'],
      'member_id' => $_SESSION['edu_user']['id'],
    ]);

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

  function aj_add() {
    $title = $_GET['title'];
    $content = $_GET['content'];
    $relation = json_decode(str_replace('\\', '', $_GET['relation']), true);
    $sub_targets = json_decode(str_replace('\\', '', $_GET['sub_targets']), true);
   
    if (isset($_GET['id']) && !empty($_GET['id'])) {
      $oTarget = \model\target::loadObj($_GET['id']);
      $target_id = $_GET['id'];
    } else {
      $oTarget = new \model\target;
    }
    
    $data = [
      'title' => $title,
      'content' => $content,
      'params' => json_encode($sub_targets),
    ];
    $oTarget->data = $data;
    $oTarget = $oTarget->save();
    if (empty($target_id)) {
      $target_id = $oTarget->data['id'];
    }

    \model\target_relation::sqlQuery("delete from wb_target_relation where target_id=".$target_id);

    $oTargetRelation = new \model\target_relation;
    $data = [
      'target_id' => $target_id,
      'member_name' => $_SESSION['edu_user']['name'],
      'member_id' => $_SESSION['edu_user']['id'],
      'type' => \model\target_relation::$CONF_TYPE['CREATOR'],
    ];  

    $oTargetRelation->data = $data;
    $oTargetRelation->save();

    foreach($relation as $p) {
      $oTargetRelation = new \model\target_relation;
      $data = [
        'target_id' => $target_id,
        'member_name' => $p['target_name'],
        'member_id' => $p['target_id'],
        'type' => \model\target_relation::$CONF_TYPE['FOLLOW'],
      ];
      $oTargetRelation->data = $data;
      $oTargetRelation->save();
    }

    $this->data(true);
  }

  function aj_get_sub_targets() {
     $oTarget = \model\target::loadObj($_GET['id']);
     $this->data(json_decode($oTarget->data['params'], true));
  }

  function aj_save_status() {
    $target_id = $_GET['id'];
    $sub_targets = json_decode(str_replace('\\', '', $_GET['sub_targets']), true);
   
    $oTarget = \model\target::loadObj($target_id);
    $oTarget->data['params'] = json_encode($sub_targets);
    $oTarget = $oTarget->save();
    $this->data(true);
  }

  function aj_get_target_info() {
    $id = $_GET['id'];
    $oTarget = \model\target::loadObj($id);
    $result = array(
      'title' => $oTarget->data['title'],
      'content' => $oTarget->data['content'],
      'sub_targets' => json_decode($oTarget->data['params'], true)
    );

    $relations = \model\target_relation::finds('where target_id='.$id);
    $list = array();
    foreach ($relations as $item) {
      $tmp = array();
      if ($relations['target_id'] != $_SESSION['edu_user']['id']) {
        $tmp['target_id'] = $item['member_id'];
        $tmp['target_name'] = $item['member_name'];
        $list[] = $tmp;
      }
    }
    $result['relation'] = $list;

    $this->data($result);
  }

  function ajsss (){
    $data = $_GET;
    $member_id = 88;
    $asks = \model\news::finds("WHERE member_id='".$member_id."' AND cate_id='1' AND type=3","*");
    \vd($asks,'$$$');
    $oNew = \model\member::loadObj($member_id);
    foreach ($asks as &$v) {
      $replys = \model\comm_comment::finds("WHERE target_id='".$v['id']."'","comment");
      \vd($replys,"ssss");
      if (empty($replys)) {
        $replys[]['comment'] = '暂无回复';
      }
      $v['comments'] = $replys;
    }
    \vd($asks,"%%%%%");
    $this->data([
      'ls' => $asks,
      'name' => $oNew->data['name'],
      ]);
  }
  function liuhuan (){
    include \view('lh_test_lh');
  }

}
