<?php
namespace controller;

class test extends \app\controller{


	function __construct(){

		parent::__construct();

		$this->event->setEvent("AAA",['user']);
	}


	function index(){

	}

}

?>
