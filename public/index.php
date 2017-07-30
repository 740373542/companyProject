<?php 

header("Content-Type:text/html;charset=utf-8");

define("__PUBLIC__",substr(__FILE__,0,strrpos(__FILE__,'/')));

define("__PROJECT__",substr(__PUBLIC__,0,strrpos(__PUBLIC__,'/')));

define("__APP__",__PROJECT__.'/app');

define("__CONTROLLER__",__APP__.'/controller');

define("__MODEL__",__APP__.'/model');

define("__VIEW__",__APP__.'/view');

define("__UPLOAD__",__PROJECT__.'/upload');

require_once __APP__.'/app.php';

\app\engine::run();

