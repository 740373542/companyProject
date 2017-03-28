<?php
namespace service;

class V2VideoService extends \app\service {

  // 根据视频Id获取视频
  function getVideoById($ids) {
    if (is_array($ids)) {
      $video = \model\video::findByIds($ids);
      return $video;
    }else{
      \except(-1,'数据格式错误');
    }

  }


  // 获得公司课程下的所有视频
  // function getVideoByCourseId($courses) {
  //   $arr = [];
  //   foreach ($courses as $course) {
  //     // 转成数组
  //     $extra = \de($course['extra']);

  //   }
  // }

}
