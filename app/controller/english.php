<?php 
namespace controller;

class english extends \app\controller {


	public function index(){

		$datas = [

			"问题1",
			"问题2",
			"问题3",

		];


		\vd($datas,"datas");



		require \view("english");

	}

	public function addEnglish(){

		$data = $_POST;
		$this->service["EnglishService"]->AddEnglish($data);
		$this->service["EnglishService"]->AddEnglishQuestion($data);
		$this->send(["ok"]);

	}


	public function ls(){

		$data = $_GET;

		$res = $this->service["EnglishService"]->getEnglishLs($data);

		$this->send(["ls"=>$res]);

	}


	function getQuestions(){

		$data = $_GET;

		$res = $this->service["EnglishService"]->getQuestionLs($data);

		\randArrayNotKey($res);

		$this->send(["ls"=>$res]);

	}

	function download(){
		$data = $_GET;
		\module\file::download($data['filename']);
	}

	// function md5(){
	// 	$data = $_GET;
	// 	echo md5($data['passwd']);
	// }



}