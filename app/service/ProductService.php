<?php

namespace service;

use model\order as OrderModel;
use app\service as Service;

class ProductService extends Service {

  function getList(){
    $r = [];
    $f = \model\product::finds(" WHERE deleted=0 ",' id,price,name,py');
    $r = \indexBy($f,'id');
    return $r;
  }

}