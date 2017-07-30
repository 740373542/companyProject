<?php 
function view($fileName){

	$viewDir = __VIEW__ . '/' . $fileName . '.php';

	if(file_exists($viewDir)){
		return $viewDir;
	}else{
		echo "error:没有找到view文件!";
	}

}