<?php
namespace service;

class CorpService extends \app\service {

  static function getSelf(){
    // print_r($_SESSION['edu_user']);
    $o = \model\user::loadObj($_SESSION['edu_user']['id']);
    // print_r($o);
    if(!$o){
      return false;
    }
    return $o;
  }


  function getCorpNavListByLoginedUser(){
    if($this->di['UserService']->notJoined__LoginedUser()){
      return $this->getNavList(0,\model\comm_cate::$CONF_TYPE['corp']);
    }else{
      return $this->getNavList($_SESSION['edu_user']['company_id'],\model\comm_cate::$CONF_TYPE['corp']);
    }
  }


  function getNewsNavListByLoginedUser(){
    if($this->di['UserService']->notJoined__LoginedUser()){
      $ls = $this->getNavList(0,\model\comm_cate::$CONF_TYPE['news']);
    }else{
      $ls = $this->getNavList($_SESSION['edu_user']['company_id'],\model\comm_cate::$CONF_TYPE['news']);
    }

    foreach ($ls as &$v) {
      $v['url'] = '/news/ls?id='.$v['id'];
    }
    return $ls;
  }


  function getNavList($corpId = 0, $type=0){
    $ls = \model\comm_cate::finds(" where company_id='".$corpId."' and type='".$type."' order by sort_order desc,id asc ",'title as txt,id');
    foreach ($ls as &$v) {
      $v['url'] = '/bbs/corp_ls?id='.$v['id'];
    }

    return $ls;
    // \copyArr($oUser->data,$data,'name,real_name');
  }

}