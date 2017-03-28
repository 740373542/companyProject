<?php
namespace service;

class TaskService extends \app\service {

  //获得公司对应的 task id
  function getCompanyTaskInfo($companyId_, $targetId_, $type_){
    $find = \model\company_task::find("where company_id='".$companyId_."' and target_id=".$targetId_." and type=".$type_."  ");
    return $find;
  }

  //获得我的 task id
  function getMyTaskInfo($oMember_,$targetId_,$type_){

    $companyId = $oMember_->getCompanyId();
    $taskinfo = $this->getCompanyTaskInfo($companyId, $targetId_, $type_);
    if(!$taskinfo){
      return false;
    }

    return $taskinfo;
  }

  function setTaskResult($oMember_, $taskId_){

  }

  function getMyTasks($userId, $type=NULL){
    $sql = '';
    if($type){
      $sql = " and type=". $type ." ";
    }
    $tasks = \model\company_task_result::finds("where member_id='".$userId."' ".$sql." ");
    // print_r($tasks);
    return $tasks;
  }


  function autoCreateTask($userId_, $targetId_, $type_){

    $find = \model\company_task_result::find(" WHERE member_id=".$userId_." and target_id=".$targetId_." and type=".$type_." ");
    if($find){
      $o = new \model\company_task_result;
      $o->setData($find);
      return $o;
    }

    //没找到
    $oMember = \model\member::loadObj($userId_);
    $taskInfo = $this->di['TaskService']->getMyTaskInfo($oMember, $targetId_, $type_);

    if($taskInfo){
        $taskId = $taskInfo['id'];
        \vd($taskId, 'taskId');

        $oTask = new \model\company_task_result;
        $oTask->data = [
          'member_id' => $userId_,
          'company_id' => $oMember->getCompanyId(),
          'update_at' => \datetime(),
          'target_id' => $targetId_,
          'task_id' => $taskId,
          'score' => $taskInfo['score'],
          'type' => $type_,
          'extra' => '{}',
        ];
        $oTask->save();
        return $oTask;
    }else{
      \vd('no taskId');
    }

    return false;
  }

  function saveTaskProcess($oTask, $oProcess){
    $process = (int)($oProcess->data['process']*100);
    // if($process==100){
    if($process>=100){
      //发送积分
      $oMember = $this->di['UserService']->getSelf();
      $oMember->addScore($oTask->data['score']);
    }

    $oTask->save([
      'process' => $process,
      'company_id' => $oMember->data['company_id'],
      'update_at' => \datetime(),
    ]);
  }

  function finishVideo($userId, $videoId, $courseId){

    $oTask = $this->autoCreateTask($userId, $courseId, \model\company_task_result::$CONF_TYPE['COURSE']);

    $oProcess = $this->di['CourseProcessService']->finishVideo($userId, $videoId, $courseId);

    if($oTask){
      $this->saveTaskProcess($oTask, $oProcess);
    }
  }


  function finishTest($userId, $videoId, $courseId=NULL){

    $oTask = $this->autoCreateTask($userId, $courseId, \model\company_task_result::$CONF_TYPE['COURSE']);

    $oProcess = $this->di['CourseProcessService']->finishTest($userId, $videoId, $courseId);

    if($oTask){
      $this->saveTaskProcess($oTask, $oProcess);
    }
  }



}