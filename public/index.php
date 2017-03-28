<?php
session_start();
ini_set('date.timezone','Asia/Shanghai');
header('Content-Type: text/html; charset=UTF-8');
header('access-control-allow-origin: *');

$__BASE_PATH__ = rtrim(realpath(__FILE__), '/');
$__BASE_DIR__ = realpath(substr($__BASE_PATH__, 0, strrpos($__BASE_PATH__, '/') + 1).'/../');
define('__BASE_DIR__', $__BASE_DIR__);

define('__APP_DIR__', realpath($__BASE_DIR__.'/app/'));
define('__PUBLIC_DIR__', realpath( $__BASE_DIR__.'/public/') );
define('__VIEW_DIR__', realpath( $__BASE_DIR__.'/view/') );
define('__ERRLOG__', '/var/log/php.leopard.log');

require __APP_DIR__.'/config/types.php';
require __APP_DIR__.'/app.php';
require __APP_DIR__.'/config/config.php';
require __APP_DIR__.'/config/dbconfig.php';
require __APP_DIR__.'/config/env.php';

\app\engine::set('theme',8);
// \app\engine::set('theme',time());

\errlog('start '.$_SERVER['REQUEST_URI']);
// echo '<pre>';
// \print_r($_SERVER);
// echo '</pre>';

// \vd($_SERVER);

\Config::INIT();

// if(empty($_SESSION['width'])){
  if(!empty($_GET['_width'])){
    $_SESSION['_width'] = $_GET['_width'];
  }
  if(empty($_SESSION['_width'])) $_SESSION['_width']=320;
// }

// if(empty($_SESSION['os'])){
  if(!empty($_GET['os'])){
    $_SESSION['os'] = $_GET['os'];
  }
// }

if(empty($_SESSION['_px'])){
  if(!empty($_GET['_px'])){
    $_SESSION['_px'] = $_GET['_px'];
  }
}

if(empty($_SESSION['_px'])) $_SESSION['_px']=1;

// print_r($_SESSION);


if( empty($_SESSION['edu_user']) && !empty($_GET['_t']) && !empty($_GET['_tk']) && !empty($_GET['_u'])  ){
  // $u = $_GET['_u'];
  // $tk = $_GET['_tk'];
  // $t = $_GET['_t'];
  // echo md5(md5($t.'_'.$u));
  \service\UserService::autoLogin($_GET);
}

if( strpos( (','.$_GET['_url']) , '/index/') >0 ){
  $_GET['time'] = time();
    // \_vd($_SERVER);
    // \_vd($_GET);

    \service\UserService::autoLogin($_GET);
    if(!empty($_SESSION['edu_user']) && $_SESSION['edu_user']['id'] ){
      \service\UserService::s_resetSession($_SESSION['edu_user']['id']); 
    }else if( empty($_SESSION['logout']) ){
      $oUser = \model\user::loadObj(2);
      $_SESSION['edu_user'] = $oUser->data;
    }
  // \_vd($_SESSION);

    // if(empty($_GET['_u'])){
    //   $_SESSION['edu_user'] = [];
    // }
}

// if(!empty($_SESSION['edu_user']) && !empty($_SESSION['edu_user']['company_id']) ){
//   require __APP_DIR__.'/company/company_'.$_SESSION['edu_user']['company_id'].'.php';
//   // print_r();
// }

\safequery();
// \vd($_GET,'$_GET');

try{

  \app\model::connect();
  \app\model::sqlQuery("SET autocommit=0;");
  \app\model::sqlQuery("START TRANSACTION;");
  \app\engine::run();
  \errlog('end '.$_SERVER['REQUEST_URI']);
  // throw new \Exception("Error Processing Request", 1);
  
  \app\model::sqlQuery("COMMIT;");
}catch(\Exception $e){
  \app\model::sqlQuery("ROLLBACK;");
  echo '{"code":'.$e->getCode().',"msg":"'.$e->getMessage().'"}';
  if(__MODE__=='dev' && isset($_GET['debug']) ){
    echo '<pre>'. print_r($e,true).'</pre>';
  }
}



