<?php
namespace controller;
// 任务接口测试
class task_test extends \app\controller
{

  function test_test(){
    $res = $this->di['CompanyTaskService']->getTasksByUser(1);
    \vd($res,'所属于的任务组');
  }
  // 给组分配任务
  function test_task() {
    $res = $this->di['CompanyTaskService']->setTaskToRole(3,1);
    \vd($res,'创建成功');
  }

  // 测试
  function test() {
    if ('0'.'') {
      echo "qqqqqqqq";
    }
    echo 'adadsadsds';
  }
  


}
