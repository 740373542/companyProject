<?php
namespace service;

class V2ModuleService extends \app\service {

  // 获得公司模块
  function getByCompanyId($companyId) {
    $ls = \model\company_module::finds(" where company_id = ".$companyId." and deleted = 0 order by sort_order desc", "*" );
    return $ls;
  }

  function parseHtml($data) {
    $data = \de($data['extra']);
    return $data;
    // if( $data['type']=='cates' ){

    // }
    // return [
    //   'title' => $data['title'],
    //   'text' => $data['text'],
    //   'url' => $data['url'],
    // ];
  }

}