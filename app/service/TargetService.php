<?php
namespace service;

class TargetService extends \app\service {

  function get_targets_by_member_id($param=[]) {
    $length = $param['length'];
    $page = $param['page'];

    $where_str = "";

    $limit_str = "  ";

    if (!empty($length)) {
      $limit_str.= " LIMIT ".($page - 1) * $length.",".$length;
    }

    $ls = [];
    $targets = \model\target::sqlQuery("select id,title,content,member_id,status,create_at from wb_target t, wb_target_relation tr where t.id = tr.target_id and tr.member_id=".$param['member_id']." and tr.type = ".$param['type']." order by create_at desc ".$limit_str);

    if ($targets) {
        foreach ($targets as $item) {
                // $item['status'] = empty($item['status']) ? false : true;
                $item['status'] = $item['status'] == 0 ? false : true;
                $ls[] = $item;  
            }
    }

    $members = $this->di['ToolService']->parseMember($ls);

    return array(
        'ls' => $ls,
        'members' => $members
    );
  }

}
