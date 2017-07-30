<?php 
namespace module;

class file {
	
	public $path;
	public $content="";

	public static function getFilePro($fileName){

		if(!file_exists($fileName)){
			echo "文件不存在";
			return;
		}else{
			$filePro = [];
			$filePro['size'] = filesize($fileName);
			$filePro['create_time'] = filectime($fileName);	
			$filePro['update_time'] = filemtime($fileName);
			$filePro['visit_time'] = filemtime($fileName);
		}

	}


	public function create(){
		if(file_exists($this->path)){
			echo "文件已经存在";
			return;
		}else{
			
		}
	}

}

