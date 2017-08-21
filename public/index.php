<?php 

header("Content-Type:text/html;charset=utf-8");

error_reporting(E_ALL^E_NOTICE);

date_default_timezone_set("PRC");

define("__PUBLIC__",substr(__FILE__,0,strrpos(__FILE__,'/')));

define("__PROJECT__",substr(__PUBLIC__,0,strrpos(__PUBLIC__,'/')));

define("__APP__",__PROJECT__.'/app');

define("__CONTROLLER__",__APP__.'/controller');

define("__MODEL__",__APP__.'/model');

define("__VIEW__",__APP__.'/view');

define("__UPLOAD__",__PROJECT__.'/upload');

require_once __APP__.'/app.php';



try{

	\app\engine::run();
  	if(\app\model::$db) \app\model::$db->pdo->commit();

} 

catch(Exception $e){
  	if(\app\model::$db)  \app\model::$db->pdo->rollBack();
  	$error = [
  		"code"=>$e->getCode(),
  		"msg"=>$e->getMessage(),
  	];
	echo json_encode($error,JSON_UNESCAPED_UNICODE);
}


