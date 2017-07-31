<?php
namespace controller;

class test extends \app\controller{

	function index(){
		// $datas = \model\user::finds("where id>0");
		require \view("test");
	}

}