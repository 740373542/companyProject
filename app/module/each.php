<?php
namespace module;

class each implements \Iterator{


	private $index = 0;

	private $objs = [];

	public function __construct($ids=null){

		if(is_array($ids)){

		}

		if(is_string($ids)){

		}

		if(!$ids){
			echo "error:没有找到要修改的ids集合";
			return;
		}


	}

	public function current(){

	} 

	public function next(){

	}

	public function valid(){

	}

	public function rewind(){


	}

	public function key(){


	}

}