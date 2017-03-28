<?php
namespace service;

class GrowupService extends \app\service {

  function getDateRange($diff=0) {
    $curDate = date('Y-m-d');
    $curDateIdxInWeek = date('w');
    $startDays = (-$diff*7)-$curDateIdxInWeek;
    $endDays = $startDays+6;
    if($startDays>0){
      $startDays = '+'.$startDays;
    }
    if($endDays>0){
      $endDays = '+'.$endDays;
    }
    // echo '<br>'.$endDays.'<br>';

    $startDate = date("Y-m-d",strtotime("$curDate 12:12:12 ".$startDays." day"));
    $endDate = date("Y-m-d",strtotime("$curDate 12:12:12 ".($endDays)." day"));
    $dateRange = $startDate.'至'.$endDate;
    return $dateRange;
  }

  function getData($memberId,$type,$default=[]){
    $ls = \model\comm_content::finds('where member_id='.$memberId.' and type='.$type.' order by id desc');
    $ls = \indexBy($ls,'key');
    foreach ($ls as $k => &$v) {
      $v['content'] = \de($v['content']);
    }

    $dates = [];
    $dates[] = $this->di['GrowupService']->getDateRange();
    $dates[] = $this->di['GrowupService']->getDateRange(1);
    $dates[] = $this->di['GrowupService']->getDateRange(2);
    $dates[] = $this->di['GrowupService']->getDateRange(3);
    $dates[] = $this->di['GrowupService']->getDateRange(4);
    // print_r($dates);
    $r = [];
    foreach ($dates as $date) {
      if(!empty($ls[$date])){
        $r[] = $ls[$date];
      }else{
        $r[] = ['key'=>$date,'content'=>$default];
      }
    }
    return $r;
  }

}