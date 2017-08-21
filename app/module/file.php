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


	static function upload($fileName,$moveDir=null){

		$name = $_FILES[$fileName]["name"];
		$type = $_FILES[$fileName]["type"];
		$tmp_name = $_FILES[$fileName]["tmp_name"];
		$error = $_FILES[$fileName]["error"];
		$size = $_FILES[$fileName]["size"];

		// $allowType = ['jpg','jpeg','png','svg'];
		// $ext = pathinfo($type,PATHINFO_EXTENSTION);
		// if(!in_array($ext, $allowType)){
		// 	\error(-1,"非法文件类型");
		// }

		//判断是否是http post上传
		// if(!is_uploaded_file($tmp_name)){

		// }


		//判断是否是图片
		// if(!getimagesize($tmp_name)){
		// 	\error(-1,"不是真正的图片类型");
		// }

		//生成唯一的文件名
		// $onceName = md5(uniqid(microtime(true),true))

		if(!$moveDir){
			$moveDir = "/upload" ;
			if(!file_exists($moveDir)){
				mkdir(__PROJECT__.$moveDir,0777,true);
				chmod(__PROJECT__.$moveDir, 0777);
			}
		}

		$finalDir = __PROJECT__ . $moveDir . "/" . $name;

		if($error == UPLOAD_ERR_OK){
			if(move_uploaded_file($tmp_name, $finalDir)){
				return $moveDir . "/" . $name;
			}else{
				echo "error:上传失败!";
			}
		}else{
			switch ($error) {
				case 1:
					\error(-1,"上传文件超过了PHP配置文件中upload_max_filesize选项的值");
					break;

				case 2:
					\error(-2,"超过了表单MAX_FILE_SIZE限制的大小");

					break;

				case 3:
					\error(-3,"文件部分被上传");

					break;

				case 4:
					\error(-4,"没有选择上传文件");

					break;

				case 6:
					\error(-6,"没有找到临时目录");

					break;

				case 7:
				case 8:
					\error(-8,"系统错误");
					break;
				
			}
		}

	}

	static function download($fileDir){

		header("content-disposition:attachment;filename=".basename($$fileDir));
		header("content-length:".filesize($$fileDir));


	}

}

