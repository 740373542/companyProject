<?php
namespace service;

require(__BASE_DIR__.'/vendor/php-sdk-master/autoload.php');
require(__APP_DIR__.'/config/qiniu.php');

use Qiniu\Storage\UploadManager;
use Qiniu\Auth;

class QiniuService extends \app\service {

  function getToken() {
    $upManager = new UploadManager();
    // $auth = new Auth($accessKey, $secretKey);
    $auth = new Auth(\QiNiu::$config['ak'], \QiNiu::$config['sk']);
    $token = $auth->uploadToken('video');
    list($ret, $error) = $upManager->put($token, 'formput', 'hello world');
    // $error保留了请求响应的信息，失败情况下ret 为none, 将$error可以打印出来，提交给我们。
    // API 的使用 demo 可以参考 单元测试。
    
    return $token;    
  }


}