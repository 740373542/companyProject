<?php
namespace controller;

class target extends \app\controller
{

  // 个人任务列表

  function test(){
    $ls = \model\target::finds();
    $this->data(['ls' => $ls]);
  }

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
    $__id = 0;
    if (!empty($_GET['id'])) {
      $__id = $_GET['id'];
    }
    include \view("target__detail");
  }

  function aj_targets_list() {
    $params = [
      'length' => $_GET['length'], 
      'page' => $_GET['page'],
      'member_id' => 88,
      'type' => $_GET['type'],
      // 'member_id' => $_SESSION['edu_user']['id'],
    ];

    $res = $this->di['TargetService']->get_targets_by_member_id($params);
    \vd($res);

    $result = array(
      'ls' => $res['ls'],
      'members' => $res['members'],
      'page' => $_GET['page'] + 1,
    );

    $this->data($result);
  }


  function aj_add() {
    $title = $_GET['title'];
    $content = $_GET['content'];
    $status = $_GET['status'];
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
      'status' => $status,
    ];
    $oTarget->data = $data;
    $oTarget = $oTarget->save();
    if (empty($target_id)) {
      $target_id = $oTarget->data['id'];
      \vd($target_id,'1');
    }

    if (empty($_GET['id'])) {
      $oTargetRelation = new \model\target_relation;
      $data = [
        'target_id' => $target_id,
        'member_id' => $_SESSION['edu_user']['id'],
        'type' => \model\target_relation::$CONF_TYPE['CREATOR'],
      ];  

      $oTargetRelation->data = $data;
      $oTargetRelation->save();
    }

    \model\target_relation::sqlQuery("delete from wb_target_relation where target_id=".$target_id . " and type=".\model\target_relation::$CONF_TYPE['FOLLOW']);

    foreach($relation as $p) {
      $oTargetRelation = new \model\target_relation;
      $data = [
        'target_id' => $target_id,
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
    // $_SESSION['edu_user']['id'] = 88;
    $id = $_GET['id'];
    $oTarget = \model\target::loadObj($id);
    $result = array(
      'title' => $oTarget->data['title'],
      'content' => $oTarget->data['content'],
      'sub_targets' => json_decode($oTarget->data['params'], true)
    );

    $relations = \model\target_relation::finds('where target_id='.$id);
    $members = $this->di['ToolService']->parseMember($relations);
    foreach ($relations as $item) {
      if ($relations['target_id'] != $_SESSION['edu_user']['id']) {
        $tmp['target_id'] = $item['member_id'];
        $tmp['avatar'] = $members[$item['member_id']]['avatar'];
        $list[] = $tmp;
      }
    }

    $result['relation'] = $list;

    $this->data($result);
  }


  // function 

}
