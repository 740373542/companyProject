<?php
namespace service;

class UrlCrudService extends \app\service {

  function geturls (&$count=null,$param=[],$company_id){
    if(!empty($param['search'])){
      $sqladd = " and (url like '%".$param['search']."%' or title like '%".$param['search']."%')";
       $urls = \model\url::finds("where company_id='".$company_id."'".$sqladd."",'title,url,cate_id,type,id',$count,$param);
    }else{
      $urls = \model\url::finds("where company_id='".$company_id."'",'title,url,cate_id,type,id',$count,$param);
    }
    return $urls;
  }

  function getnewulr($data){
    if ($data['id']) {
      $newurl = \model\url::loadObj($data['id']);
      $newurl->data=[
        'title' => $data['title'],
        'url' => $data['urls'],
        'cate_id' => $data['cate_id'],
      ];
      $newurl->save();
      return $newurl;
    }else{
      $newurl = new \model\url;
      $newurl->save([
        'title' => $data['title'],
        'url' => $data['urls'],
        'cate_id' => $data['cate_id'],
      ]);
      return $newurl;
    }
  }
}
