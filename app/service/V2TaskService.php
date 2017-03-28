<?php
namespace service;

class V2TaskService extends \app\service {

	//获得公司下所有任务
	function getCompanyAllTask($companyId, &$total = 0, $params=[]){

		$search = '';
    if($params['search']) {
      $search = " and name like '%".$params['search']."%'";
    }
    $tasks = \model\company_task::finds(" where company_id = ".$companyId."  and deleted = 0".$search, "*", $total, $params );
    return $tasks;

	}

	//获得某组所有任务
	function getTaskByRole($roleId , &$total = 0, $params=[] ){

		$search = '';
    if($params['search']) {
      $search = " and name like '%".$params['search']."%'";
    }

    if($params['companyId']){
    	$companyId = $params['companyId'];
    }

    $type = \model\company_task_permission::$TYPE['ROLE'];

    $taskIds = \model\company_task_permission::finds(" where company_id = ".$companyId."  and user_type=".$type." and user_id=".$roleId .$search, "task_id", $total, $params );

    $taskIds = \indexBY($taskIds,'task_id');
    $taskIds = array_keys($taskIds);

    $tasks = \model\company_task::findByIds($taskIds);
    return $tasks;

	}	

}

