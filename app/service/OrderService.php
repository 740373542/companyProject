<?php

namespace service;

use model\order as OrderModel;
use app\service as Service;

class OrderService extends Service {

  //数据列表，带id
  function getList($thedate){
    $r = [];
    $orders = \model\order::finds(" WHERE thedate='$thedate' and deleted=0 group by client_id,product_id ",' id,client_id,storename,product_id,product_name,price,need_amount,send_amount,get_amount,thedate');

    foreach ($orders as $order) {
      $r[] = $order;
    }
    \vd($r,'$r');
    return $r;
  }

  // //汇总数据
  // function getGroupByList($thedate,$args){
  //   $r = [];
  //   $orders = \model\order::finds(" WHERE thedate='$thedate' group by client_id,product_id ",'*,sum(need_amount) as sum ');
  //   foreach ($orders as $order) {
  //     $r[] = $order;
  //   }
  //   \vd($r,'$r');
  //   return $r;
  // }


  // //汇总数据
  // function sumByDateSortByProduct($thedate){
  //   $r = [];
  //   $orders = \model\order::finds(" WHERE thedate='$thedate' group by client_id,product_id ",'*,sum(need_amount) as sum ');
  //   foreach ($orders as $order) {
  //     $r[] = $order;
  //   }
  //   \vd($r,'$r');
  //   return $r;
  // }
  
  // //汇总数据
  // function sumByDateSortByClient($thedate){
  //   $r = [];
  //   $orders = \model\order::finds(" WHERE thedate='$thedate' group by client_id,product_id ",'*,sum(need_amount) as sum ');
  //   foreach ($orders as $order) {
  //     $r[] = $order;
  //   }
  //   \vd($r,'$r');
  //   return $r;
  // }

}