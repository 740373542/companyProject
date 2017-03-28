<?php
namespace controller;

class adm_url_crud extends adm_controller
{
  function index (){
    $__nav = "/adm_url_crud/index";
    include \view('adm_url_crud');
  }

  // 取出title,url,cate_id,type,id
  function ls (){
    $data = $_GET;
    $company_id = 0;//$_SESSION['edu_user']['company_id'];


    if (empty($data['page'])) $data['page'] = 1;
    if (empty($data['length'])) $data['length'] = 10;
    $count = 0;


    $urls = $this->di["UrlCrudService"]->geturls($count,[
        'page' => $data['page'],
        'length' => $data['length'],
        'search' => $data['search'],
      ],$company_id);

    $this->data([
      'ls' => $urls,
      'count' => $count,
      ]);
    \vd($urls,'lhhh');
  }

  function check (){
    $data = $_GET;
    $_ls = \model\url::find("where id=".$data['id']);

    $title = $_ls['title'];
    $url = $_ls['url'];
    $cate_id = $_ls['cate_id'];
    $id = $_ls['id'];
    
    include \view('adm_url_modify');
  }


  function checkurl (){
    $data = $_GET;
    // $company_id = $_SESSION['edu_user']['company_id'];

    $newurl = $this->di['UrlCrudService']->getnewulr($data);
    $this->data(['ok']);
    // \vd($newurl,'lhhh');
  }

  function aj_deleteurl(){
    $data = $_GET;
    $newurl = \model\url::deleteById($data['id']);
    $this->data(['ok']);
  }

  function comm_cate_check(){
    $data = $_GET;
    $commcates = \model\comm_cate::finds("where type=".$data['type']);
    \vd($commcates,'lhhhh');
    $this->data([
      'ls' => $commcates,
      ]);
  }

 

}
