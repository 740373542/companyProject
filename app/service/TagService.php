<?php
namespace service;

class TagService extends \app\service {

  // 获取不类型的标签
  function getCommTags($company_id_= 0,$type_ = '' ) {
    $type = '';
    if ($type_) {
      $type = $type_;
    }
    $tags = \model\comm_tag::finds(" where company_id = ".$company_id_." ");
    // foreach ($tags as &$tag) {
    //   $tag['tags'] = \de($tag['tags']);
    // }
    return $tags;

  }

  // 获取不tong类型的标签
  function getTags($company_id_= 0,$type_ = '' ) {
    $type = '';
    if ($type_) {
      $type = $type_;
    }
    $tags = \model\comm_tag::finds(" where company_id = ".$company_id_." and title like '%".$type_."%' order by sort_order desc");
    \vd($tags,'标签');
    foreach ($tags as &$tag) {
      $tag['tags'] = \de($tag['tags']);
    }
    return $tags;

  }

  // //根据单个标签筛选标签下所有课程
  // function getCourseByTag($company_id = 0 , $tag){
  //   if( empty($tag) ){
  //     \except(-1,'请选择标签类型');
  //   }
  //   $courses = \model\course::finds("where company_id='".$company_id."' and state = 1");

  //   $ls = [];

  //   foreach ($courses as $key => $course) {
  //     $course['tags'] = \de($course['tags']);

  //     if( in_array( $tag,(array)$course['tags']) ){
  //       $ls[] = $course;
  //     }
  //   }
  //   \vd($ls,'ls');

  //   return $ls;

  // }

  function getTagsByName($tagname) {
    $oTag = \model\comm_tag::loadObj($tagname,'title');
    return $oTag->tags;
  }


  //根据单个标签筛选标签下所有课程
  function getCourseByTag($tag, $company_id = 0 ){
    if( empty($tag) ){
      \except(-1,'请选择标签类型');
    }
    // $courses = \model\course::finds("where company_id='".$company_id."' and state = 1");
    // $courses = \model\course::finds("where company_id=0 and tags like \"%\\\"".$tag."\\\"%\" and state = 1");
    $courses = \model\course::finds("where company_id=0 and tags like '%\\\"".$tag."\\\"%' and state = 1");
    // $courses = \model\course::finds("where company_id=0 and tags like '%".$tag."%' and state = 1");
    // \vd($courses,'$courses');
    return $courses;

  }

  //根据标签标题类筛选课程
  //需要传comm_tag标对应title的id
  function getCourseByTagTitle($company_id = 0, $tag_id){
    if( empty($tag_id) ){
      \except(-1,'请选择类型');
    }

    $tag = \model\comm_tag::find("where company_id='".$company_id."' and deleted = 0 and id='".$tag_id."'");
    $tags = $tag['tags'];

    $courses = \model\course::finds("where company_id='".$company_id."' and state = 1"); 

    $ls = [];
    foreach ($courses as $key => $course) {
      if( $course['tags'] == $tags ){
        $ls[] = $course;
      }
    }

    return $ls;
  }

}
