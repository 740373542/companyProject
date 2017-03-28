<?php

namespace service;

use model\order as OrderModel;
use app\service as Service;

class ClientService extends Service {

  //数据列表，带id
  function getList(){
    $r = [];
    $f = \model\client::finds(" WHERE deleted=0 ",' id,storename,username,deposit,py');
    $r = \indexBy($f,'id');
    return $r;
  }


}