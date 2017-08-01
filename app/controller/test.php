<?php
namespace controller;

class test extends \app\controller{

	function index(){
		// $datas = \model\user::finds("where id>0");
		require \view("test");
	}

	function add(){

		// $this->send(['ls'=>"data"]);
		// \error(-1,"sss");

		// $this->send(['ls'=>$_POST]);
	}

}