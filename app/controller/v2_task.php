<?php
namespace controller;

class v2_task extends \app\controller {

    //得到公司下所有任务
	function aj_get_company_all_task(){
		$data = $_GET;

        $total = 0;
        $page = 1;
        if (!empty($data['page'])) {
          $page = $data['page'];
        }
        $search = '';
        if (!empty($data['search'])) {
          $search = $data['search'];    
        }
        // 默认一次查出十条
        $length = 10;
        if (!empty($data['length'])) {
          $length = $data['length'];
        }

        $companyId = $_SESSION['edu_user']['company_id'];
        // $companyId = 51;

        if (empty($companyId)) {
          \except(-1,'请登录');
        }	

        $tasks = $this->di['V2TaskService']->getCompanyAllTask($companyId,$total,['page'=>$page,'length'=>$length]);

        $tasks = $this->di['V2MemberService']->getAppointMemberName($tasks,'target_id');

        $this->data([
            'ls' => $tasks,
            'page' => $page,
            'length' => $length,
            'count' => $total,
        ]);

        \vd($tasks,'获得公司下所有任务');
    
	}

    //获得某组所有任务
    function aj_get_task_by_role(){
        $data = $_GET;
        $roleId = $data['role_id']; 

        $total = 0;
        $page = 1;
        if (!empty($data['page'])) {
          $page = $data['page'];
        }
        $search = '';
        if (!empty($data['search'])) {
          $search = $data['search'];    
        }
        // 默认一次查出十条
        $length = 10;
        if (!empty($data['length'])) {
          $length = $data['length'];
        }

        $companyId = $_SESSION['edu_user']['company_id'];
        // $companyId = 1;

        if (empty($companyId)) {
          \except(-1,'请登录');
        }   

        $tasks = $this->di['V2TaskService']->getTaskByRole($roleId,$total,['page'=>$page,'length'=>$length,'companyId'=>$companyId]);

        $this->data([
            'ls' => $tasks,
            'page' => $page,
            'length' => $length,
            'count' => $total,
        ]);
        
        \vd($tasks,'获得某组所有任务');
    }


}