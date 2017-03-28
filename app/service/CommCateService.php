<?php
namespace service;

class CommCateService extends \app\service {

  function getCateList($companyId_,$type) {
    $commcates = \model\comm_cate::finds("where deleted = 0 and company_id='".$companyId_."' and type='".$type."'");
    return $commcates;
  }

  function getCommCateList($type,&$total,$params = []) {

    $sql = '';
    if($params['search']) {
      $sql = " and title like '%".$params['search']."%'";
    }
    if ($params['company_id']) {
      $sql .= " and company_id = ".$params['company_id'];
    }
    $commcates = \model\comm_cate::finds("where deleted = 0 and type=".$type.$sql, " * ", $total, $params);
    return $commcates;
  }

  // 添加模块
  function addCommCate($title,$type,$company_id) {
    $cate = \model\comm_cate::finds(" where deleted = 0 and company_id='".$company_id."' and title='".$title."'" );
    \vd($cate,'#####');
    if (!empty($cate)) {
      \except(\CODE::模板已经存在);
    }
    // 插入新的一条
    $oCommCate = new \model\comm_cate;
    $oCommCate->data = [
      'title' => $title,
      'type' => $type,
      'create_at' => time(),
      'company_id' => $company_id,
    ];
    $oCommCate->save();
  } 

  // 修改论坛模块名称
  function updateCommCate($id,$title,$type,$company_id){
    $oCommCate = \model\comm_cate::loadObj($id,'id');
    if(\model\comm_cate::finds("where title='".$title."'")){
      \except(-1,'标题已存在!');
    }
    $oCommCate->data=[
      'title' => $title,
      'type' => $type,
      'update_at' => time(),
      'company_id' => $company_id,
    ];
    $oCommCate->save();
  }



  // 删除某一个模块
  function deleteCate($id) {
    
    \model\comm_cate::deleteById($id);
  }


}
