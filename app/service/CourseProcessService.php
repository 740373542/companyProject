<?php
namespace service;

class CourseProcessService extends \app\service {

  function getRecord($userId,$courseId){
    $find = \model\member_course_process::find('where member_id='.$userId.' and course_id='.$courseId.'');

    $oMember = \model\member::loadObj($userId);

    if(!$find){
      $o = new \model\member_course_process;
      $o->data = [
        'member_id' => $userId,
        'course_id' => $courseId,
        'company_id' => $oMember->getCompanyId(),
        'update_at' => \datetime(),
        'course_id' => $courseId,
        'content' => '{}',
      ];
      $o->save();
      $find = $o->data;
    }else{
      $o = \model\member_course_process::loadObj($find['id']);
    }
    return $o;
  }

  // function getNext($processData,$courseId){
    
  // }


  function finishVideo($userId, $videoId, $courseId){
    $o = $this->getRecord($userId,$courseId);
    $data = $o->data;
    $content = $o->content;

    $oVideo = \model\video::loadObj($videoId);

    if( empty($oVideo->getTests()) ){
      $nextVal = 2; //全部完成 
    }else{
      $nextVal = 1; //下一步做题
    }

    $currentVal = (int) $content[''.$videoId];
    if( !$currentVal || $currentVal < $nextVal ){
      $content[''.$videoId] = $nextVal;
    }

    // $oMember = \model\member::loadObj($userId);
    $newdata = [
      'content' => \en($content),
      // 'company_id' => $oMember->data['company_id'],
      'update_at' => \datetime(),
    ];
    $o->save($newdata);

    $o = $this->reCalcuRate($o);

    return $o;
  }


  function finishTest($userId, $videoId, $courseId){
    $o = $this->getRecord($userId,$courseId);
    $content = $o->content;

    $content[''.$videoId] = 2; //过关

    $o->save([
      'content' => \en($content),
    ]);

    $o = $this->reCalcuRate($o);

    return $o;
  }


  function reCalcuRate($oProcess){
    $o = $oProcess;
    $data = $o->data;
    $content = \de($o->data['content']);

    $courseId = $oProcess->data['course_id'];

    $oCourse = \model\course::loadObj($courseId);
    $extraData = \de($oCourse->data['extra']);
    $videoIds = $extraData['videos'];
    $allLength = count($videoIds)*2; //两步：视频+过关


    $count = 0;
    foreach ($content as $v) {
      if($v==2){  // 视频和过关都通过了
        $count += 2;
      }else{
        $count += 1;  // 只看了视频
      }
    }

    $process = $count/$allLength;

    $newdata = [
      'process' => $process,
      'content' => \en($content),
    ];
    $o->save($newdata);

    return $o;
  }


}