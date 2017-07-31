<?php
namespace controller;

class test extends \app\controller{

	function index(){

		// require \view("test");
		// \app\model::connect();

		$datas = \model\user::finds("where id>0");
		\vd($datas,"data");
	}

}