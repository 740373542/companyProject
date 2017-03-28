<?php
namespace controller;
use common\ErrorCode;

class nav extends \app\controller
{

  //企业新闻导航
  function corp_data() {
    // // $ls = $this->di['CorpService']->getNewsNavListByLoginedUser();
    // $ls = [];
    // $company_id = $this->di['UserService']->getCompanyId();

    // if( $company_id==56 ){
    //   $ls[] = [
    //     'id' => 1,
    //     'txt' => '通告',
    //     'url' => '/bbs/corp_ls?id=96',
    //     // 'notice' => 1,
    //   ];
    //   $ls[] = [
    //     'id' => 1,
    //     'txt' => '规章制度',
    //     'url' => '/bbs/corp_ls?id=97',
    //     // 'notice' => 1,
    //   ];
    //   $ls[] = [
    //     'id' => 1,
    //     'txt' => '其他',
    //     'url' => '/bbs/corp_ls?id=98',
    //     // 'notice' => 1,
    //   ];      
    // }


    // if( $company_id==2 ){
    //   $ls[] = [
    //     'txt' => '通告',
    //     'url' => '/bbs/corp_ls?id=107',
    //     // 'notice' => 1,
    //   ];
    //   $ls[] = [
    //     'txt' => '规章制度',
    //     'url' => '/bbs/corp_ls?id=108',
    //     // 'notice' => 1,
    //   ];
    //   $ls[] = [
    //     'txt' => '其他',
    //     'url' => '/bbs/corp_ls?id=109',
    //     // 'notice' => 1,
    //   ];      
    // }

    if(  $this->di['UserService']->notJoined() ){
        $this->data(['ls'=>[]]);
        return;
    }

    $company_id = $this->di['UserService']->getCompanyId();
    $ls = \model\comm_cate::finds("where company_id = '".$company_id."' and type=2");
    foreach($ls as $k=>&$v){
      $v['txt'] = $v['title'];
      $v['url'] = '/bbs/corp_ls?id='.$v['id'];
    }

    $this->data(['ls'=>$ls]);
  }

  //企业新闻导航
  function corp_bbs() {
    // $ls = $this->di['CorpService']->getNewsNavListByLoginedUser();

    // $company_id = $this->di['UserService']->getCompanyId();

    // $ls = [];
    // if( $company_id==56 ){
    //   $ls[] = [
    //     'id' => 1,
    //     'txt' => '论坛',
    //     'url' => '/bbs/corp_ls?id=99',
    //     // 'notice' => 1,
    //   ];
    //   $ls[] = [
    //     'id' => 1,
    //     'txt' => '读书会',
    //     'url' => '/bbs/corp_ls?id=100',
    //     // 'notice' => 1,
    //   ];
    //   $ls[] = [
    //     'id' => 1,
    //     'txt' => '心得分享',
    //     'url' => '/bbs/corp_ls?id=101',
    //     // 'notice' => 1,
    //   ];
    // }

    // if( $company_id==2 ){
    //   $ls[] = [
    //     'id' => 1,
    //     'txt' => '论坛',
    //     'url' => '/bbs/corp_ls?id=110',
    //     // 'notice' => 1,
    //   ];
    //   $ls[] = [
    //     'id' => 1,
    //     'txt' => '读书会',
    //     'url' => '/bbs/corp_ls?id=111',
    //     // 'notice' => 1,
    //   ];
    //   $ls[] = [
    //     'id' => 1,
    //     'txt' => '心得分享',
    //     'url' => '/bbs/corp_ls?id=112',
    //     // 'notice' => 1,
    //   ];
    // }

    if(  $this->di['UserService']->notJoined() ){
        $this->data(['ls'=>[]]);
        return;
    }

    $company_id = $this->di['UserService']->getCompanyId();
    $ls = \model\comm_cate::finds("where company_id = '".$company_id."' and type=1");
    foreach($ls as $k=>&$v){
      $v['txt'] = $v['title'];
      $v['url'] = '/bbs/corp_ls?id='.$v['id'];
    }
    
    $this->data(['ls'=>$ls]);
  }


  function course_public() {
    $ls = [];
    $ls[] = [
      'txt' => '必备技能',
      'url' => '/task/pub?tag=必备技能&from=public',
    ];
    $ls[] = [
      'txt' => '辅助技能',
      'url' => '/task/pub?tag=辅助技能&from=public',
    ];
    $ls[] = [
      'txt' => '岗位技能',
      'url' => '/task/pub?tag=岗位技能&from=public',
    ];
    $this->data(['ls'=>$ls]);
  }

  function course_all() {
    $ls = [];
    $ls[] = [
      'txt' => '必备技能',
      'url' => '/course/index?tag=必备技能&type=1',
    ];
    $ls[] = [
      'txt' => '辅助技能',
      'url' => '/course/index?tag=辅助技能&type=1',
    ];
    $ls[] = [
      'txt' => '岗位技能',
      'url' => '/course/index?tag=岗位技能&type=1',
    ];
    $this->data(['ls'=>$ls]);
  }
  
  function course_recommand() {
    $ls = [];
    $ls[] = [
      'txt' => '必备技能',
      'url' => '/course/index?tag=必备技能&type=2',
    ];
    $ls[] = [
      'txt' => '辅助技能',
      'url' => '/course/index?tag=辅助技能&type=2',
    ];
    $ls[] = [
      'txt' => '岗位技能',
      'url' => '/course/index?tag=岗位技能&type=2',
    ];
    $this->data(['ls'=>$ls]);
  }
  

  function growup() {
    $ls = [];

    if(  $this->di['UserService']->notJoined() ){
        $this->data(['ls'=>[]]);
        return;
    }

    $ls[] = [
      'txt' => '学习总结',
      'url' => '/grow_up/summary',
    ];
    $ls[] = [
      'txt' => '本周成长',
      'url' => '/grow_up/week',
    ];

    $ls[] = [
      'txt' => '工作周计划',
      'url' => '/grow_up/week_plan',
    ];
    $ls[] = [
      'txt' => '学习计划',
      'url' => '/grow_up/study_plan',
    ];
    $this->data(['ls'=>$ls]);
  }


  function course_task() {
    $ls = [];
    $ls[] = [
      'txt' => '公共课程',
      'url' => '/task/course?from=public',
    ];
    $ls[] = [
      'txt' => '企业课程',
      'url' => '/task/course?from=self',
    ];
    $this->data(['ls'=>$ls]);
  }

  function course_task_pub() {
    $ls = [];

    if(  $this->di['UserService']->notJoined() ){
        $this->data(['ls'=>[]]);
        return;
    }

    $ls[] = [
      'txt' => '必备技能',
      'url' => '/task/pub?tag=必备技能&from=public',
    ];
    $ls[] = [
      'txt' => '辅助技能',
      'url' => '/task/pub?tag=辅助技能&from=public',
    ];
    $ls[] = [
      'txt' => '岗位技能',
      'url' => '/task/pub?tag=岗位技能&from=public',
    ];

    $this->data(['ls'=>$ls]);
  }

  function course_task_self() {
    $ls = [];

    if(  $this->di['UserService']->notJoined() ){
        $this->data(['ls'=>[]]);
        return;
    }
    
    $ls[] = [
      'txt' => '必修课程',
      'url' => '/task/self?tag=必修课程&from=self',
    ];
    $ls[] = [
      'txt' => '岗位课程',
      'url' => '/task/self?tag=岗位课程&from=self',
    ];
    $ls[] = [
      'txt' => '辅助课程',
      'url' => '/task/self?tag=辅助课程&from=self',
    ];
    $this->data(['ls'=>$ls]);
  }


  // function course_task_self() {
  //   $ls = [];
  //   $ls[] = [
  //     'txt' => '必修课程',
  //     'url' => '/task/self?tag=必备技能',
  //   ];
  //   $ls[] = [
  //     'txt' => '岗位课程',
  //     'url' => '/task/self?tag=岗位技能',
  //   ];
  //   $ls[] = [
  //     'txt' => '辅助课程',
  //     'url' => '/task/self?tag=辅助技能',
  //   ];
  //   $this->data(['ls'=>$ls]);
  // }


}