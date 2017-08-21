<?php 
namespace controller;

class index extends \app\controller{

	function index(){

		$count = 0;
		$users = \model\user::finds("where id>0 order by hot",'*',$count,["page"=>1,"length"=>9]);

		$cates = \model\cate::finds("where id>0");


		$_users = json_encode($users);
		$_cates = json_encode($cates);

		require \view("home");
	}

}