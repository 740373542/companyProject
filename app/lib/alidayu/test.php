<?php
include "TopSdk.php";
date_default_timezone_set('Asia/Shanghai'); 
    

$appkey = '23334359';
$secret = '62018045925c26a97860792ca114d4f5';

$c = new TopClient;
$c->appkey = $appkey;
$c->secretKey = $secret;
$req = new AlibabaAliqinFcSmsNumSendRequest;
$req->setExtend("123456");
$req->setSmsType("normal");
$req->setSmsFreeSignName("注册验证");
$req->setSmsParam("{\"code\":\"1234\",\"product\":\"惠有钱\"}");
$req->setRecNum("15901375546");
$req->setSmsTemplateCode("SMS_6731457");
echo '4';
$resp = $c->execute($req);

echo '5';
echo $resp;


echo '6';

/**
    include "TopSdk.php";
    date_default_timezone_set('Asia/Shanghai'); 

    $httpdns = new HttpdnsGetRequest;
    $client = new ClusterTopClient("23334359","62018045925c26a97860792ca114d4f5");
    $client->gatewayUrl = "http://api.daily.taobao.net/router/rest";
    var_dump($client->execute($httpdns,"6100e23657fb0b2d0c78568e55a3031134be9a3a5d4b3a365753805"));
*/



/**

APP证书

App Key:
23334359
App Secret:
62018045925c26a97860792ca114d4f5
隐藏 / 重置
*/
