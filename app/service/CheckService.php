<?php
namespace service;

class CheckService extends \app\service{

	function CheckData($id,$user_id,$table_name){
		if( empty($id) ){
			exit('Error:没有找到内容，请刷新确认!');
		}

		$check_data = null;

		if($table_name == 'course'){
			$oCourse = \model\course::loadObj($id);
			$check_data = $oCourse->data['company_id'];
		}

		if($table_name == 'news'){
			$oNews = \model\news::loadObj($id);
			$check_data = $oNews->data['company_id'];
		}

		if($table_name == 'comm_comment'){
			$oComm_comment = \model\comm_comment::loadObj($id);
			$check_data = $oComm_comment->data['company_id'];
		}

		if($table_name == 'course_test'){
			$oCourse_test = \model\course_test::loadObj($id);
			$check_data = $oCourse_test->data['company_id'];
		}

		if($table_name == 'company_role'){
			$oRole = \model\company_role::loadObj($id);
			$check_data = $oRole->data['company_id'];
		}

		if($table_name == 'member'){
			$oMember = \model\member::loadObj($id);
			$check_data = $oMember->data['company_id'];
		}

		if($table_name == 'company'){
			$oComapny = \model\company::loadObj($id);
			$check_data = $oComapny->data['id'];
		}

		if($table_name == 'company_task'){
			$oCompany_task = \model\company_task::loadObj($id);
			$check_data = $oCompany_task->data['id'];
		}

		if($table_name == 'company_task_permission'){
			$oCompany_task_permission = \model\company_task::loadObj($id);
			$check_data = $oCompany_task_permission->data['company_id'];
		}

		
		$oUser = \model\member::loadObj($user_id);
		$currtent_user_company_id = $oUser->data['company_id'];

		if($check_data == $currtent_user_company_id){
			return true;
		}else{
			exit('Error:此操作没有权限!');
		}

	}

}
