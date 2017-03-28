<?php
namespace service;

class SmsService extends \app\service
{

  public function sendVerifyCode($phone,$vcode=NULL) {
    //查询是不是第一次在体系注册
    // $key = 'vcode_'.$phone;
    // $hasKey = $this->redis->exists($key);
    // if ($hasKey == 1) {
    //  return ErrorCode::PARAMETER_ERROR; //send too much request
    // }

    require_once(__APP_DIR__.'/lib/alidayu/TopSdk.php');

    $appkey = '23334359';
    $secret = '62018045925c26a97860792ca114d4f5';

    $c = new \TopClient;
    $c->format = 'json';
    $c->appkey = $appkey;
    $c->secretKey = $secret;
    $req = new \AlibabaAliqinFcSmsNumSendRequest;
    $req->setExtend("NONE");
    $req->setSmsType("normal");
    $req->setSmsFreeSignName("登录验证");
    if(!$vcode) $vcode = $this->getCode(6);
    $param = json_encode([
      'code' => ''.$vcode,
      'product' => '易学倍增'
    ]);
    $req->setSmsParam($param);
    $req->setRecNum($phone);
    $req->setSmsTemplateCode("SMS_6731457");
    $resp = $c->execute($req);
    $ret = isset($resp->code) ? -1 : 0;

    if($ret != 0) {
      \except(-1,'发送失败');
    }
    // $this->redis->setex($key, 120, $vcode);
    return true;
  }


  function getCode($len) {
    $low = pow(10, $len-1);
    $high = pow(10, $len);
    return mt_rand($low, $high-1);
  }

}