<?php
namespace controller;

class adm_comm_tag extends adm_controller{

  // 获取标签类型
  function get_comm_tag() {
    $tags = $this->di['TagService']->getCommTags();
    \vd($tags,'标签');
    $this->data(['ls'=>$tags]);
  }


  // 获取关于视频的标签
  function get_tags() {
    // $type = \model\comm_tag::$CONF_TYPE['视频'];
    $data = $_GET;
    $type = $data['type'];
    // 暂时公司id == 0
    $company_id = 0;
    $res = $this->di['TagService']->getTags($company_id,$type);
    \vd($res,'视频标签');
    $this->data(['ls'=>$res]);
  }

  // 获取行业标签
  function get_industry_tags() {
    $data = $_GET;
    $type = "行业-分类";
    // 暂时公司id == 0
    $company_id = 0;
    $res = $this->di['TagService']->getTags($company_id,$type);
    $tags = $res[0]['tags'];
    $arr = [];
    foreach ($tags as &$v) {
      $arr[$v] = $v;
    }
    \vd($arr,'标签');
    \vd($res,'行业-分类');
    $this->data(['ls'=>$arr]);
  }

  // 标签选择
  function index() {
    \view('adm_comm_tag__index');
  }




  //根据标签标题类筛选课程
  //需要传comm_tag标对应title的id
  function course_ls_by_tag_title(){
    $data = $_GET;
    $tag_id = $data['id'];
    $company_id = $_SESSION['user']['company_id'];
    $courses = $this->di['TagService']-> getCourseByTagTitle($company_id,$tag_id);
    // \vd($courses,'@@@@');
    $this->data(['ls'=>$courses]);
  }
}