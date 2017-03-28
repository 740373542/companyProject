<?php
namespace service;

class V2NewsService extends \app\service {

   // 根据公司的ID和type取出问答或者论坛的id
  function getCateIds($type_) {
    $companyId = 0;
    if(!empty($_SESSION['edu_user']['company_id'])){
      $companyId = $_SESSION['edu_user']['company_id'];
    }

    $cateIds = \model\comm_cate::finds("where company_id = ".$companyId." and type = ".$type_,'id');
    $cateIds = \indexBy($cateIds,'id');
    $cateIds = array_keys($cateIds);
    return $cateIds;
  }



  function remove_html(&$news) {
    if(!empty($news)){
      foreach ($news as &$new) {
        $content = $new['content'];
        $content = strip_tags($content);

        \vd($content,'去标签');
        $qian=array(" ","　","\t","\r");
        $hou=array("","","","");
        $content = str_replace($qian,$hou,$content); 
        // \vd($content,'截取');
        $new['content'] = $content;
      }
    }
  }


  function getAnnouncementByCompany($companyId){
    $ls = \model\news::finds('WHERE company_id='.$companyId.' and type=0 order by id desc');
    $this->di['ToolService']->parseNews($ls);
    return $ls;
  }


}
