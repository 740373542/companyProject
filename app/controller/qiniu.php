<?php
namespace controller;

class qiniu extends \app\controller
{
  function token(){
    error_reporting(E_ALL^E_NOTICE^E_WARNING);
    $token = $this->di['QiniuService']->getToken();
    echo '{"uptoken":"'.$token.'"}';
  }

}