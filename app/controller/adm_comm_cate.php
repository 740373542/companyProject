<?php
namespace controller;

class adm_comm_cate extends adm_controller
{

  function index(){
    $data = $_GET;
    $__type = $data['type'];
    // 企业大学导航
    if($__type == 1){
      $__name = "团建";
      $__nav = '/adm_comm_cate/index?type=1';
    }
    // 企业通知导航
    if($__type == 2) {
      $__name = "企业通知";
      $__nav = '/adm_comm_cate/index?type=2';
    }
    include \view('adm_comm_cate__index');
  }


  // 获得论坛板块
  function get_cate_list() {
    $data = $_GET;
    $type = $data['type'];
    $company_id = $_SESSION['user']['company_id'];
    $ls = $this->di['CommCateService']->getCateList($company_id,$type);
    $this->data(['ls'=>$ls]);
    \vd($ls,'555');
  }
  // 板块设置
  function get_comm_cate_list() {
    $data = $_GET;
    $type = $data['type'];
    $total = 0;
    $page = 1;
    if (!empty($data['page'])) {
      $page = $data['page'];
    }
    $search = '';
    if (!empty($data['search'])) {
      $search = $data['search'];    
    }
    $company_id = '';
    if (!empty($data['company_id'])) {
      $company_id = $data['company_id'];    
    }
    // 默认一次查出十条
    $length = 10;
    if (!empty($data['length'])) {
      $length = $data['length'];
    }

    $ls = $this->di['CommCateService']->getCommCateList($type,$total, ['page'=>$page,'length'=>$length,'search'=>$search,'company_id'=>$company_id]);
    \vd($ls,'555');
    $this->data([
        'ls' => $ls,
        'page' => $page,
        'length' => $length,
        'count' => $total,
    ]);
  }

  // 添加模块
  function add() {
    $data = $_GET;
    $__type = $data['type'];
    include \view("adm_comm_cate__add");
  }

  function save_comm_cate() {
    $data = $_GET;
    $company_id = $data['company_id'];
    $title = $data['title'];
    $type = $data['type'];
    if(empty($title)){
      \except(-1,'标题不能为空!');
    }
    $comm_cate = $this->di['CommCateService']->addCommCate($title,$type,$company_id);
    $this->data(true);
  }

  

  // 添加模块
  function update_comm_cate() {
    $data = $_GET;
  	$company_id = $_SESSION['user']['company_id'];
    $title = $data['title'];
    $id = $data['id'];
    $type = $data['type'];
    if(empty($title)){
      \except(-1,'标题不能为空!');
    }
    if(empty($id)){
      $comm_cate = $this->di['CommCateService']->addCommCate($title,$type,$company_id);
    }else{
      $comm_cate = $this->di['CommCateService']->updateCommCate($id,$title,$type,$company_id);
    }
    $this->data(['ok']);
  }



  //删除模块
  function del_comm_cate(){
    $data = $_GET;
    $comm_cate = $this->di['CommCateService']->deleteCate($data['id']);
    $this->data(['ok']);
  }

  function delete_title() {
  	$data = $_GET;
  	$company_id = $_SESSION['user']['company_id'];
  	$type = $data['type'];
  	$delete = $this->di['CommCateService']->deleteCate($company_id,$type);
  	\vd($delete,'--------');
  }


}