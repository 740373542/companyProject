<?php
namespace service;

class PriceService extends \app\service {
  
  function get($clientId,$productId){
    //先从单独配置表读
    $price = \model\price::find("where client_id='".$clientId."' and product_id='".$productId."'");

    if(empty($price['id'])){
      //从总表读
      \vd('no shop price','$price');
      $price = \model\product::find("where id='".$productId."'");
    }

    return $price['price'];
  }
  
  function gets($clientId){
    //先从单独配置表读
    $prices = \model\price::finds("where client_id='".$clientId."' ");
    return $prices;
  }


  function getConfigWithInit($priceTypeId) {
    $pids_not_set = \model\price::sqlQuery(" 
select distinct product.id from  ".\DbConfig::$mysql['prefix']."product as product  where product.id not in (select product_id from ".\DbConfig::$mysql['prefix']."price_type_config as price where price.price_type_id='".$priceTypeId."')");
    
    \vd($pids_not_set,'$pids_not_set');
    $pids_not_set = \indexBy($pids_not_set,'id');
    \vd($pids_not_set,'$pids_not_set');

    $products = \model\product::finds('where id in ('.implode(',', array_keys($pids_not_set)).')  ','id,name,price');
    \vd($products,'$products');

    foreach ($products as $key => $prod) {
      \model\price_type_config::execSql("REPLACE INTO ", "SET price_type_id='".$priceTypeId."',product_id='".$prod['id']."',price='".$prod['price']."' ");
    }
  }


  function getProductPriceByClient($productId,$clientId){
    $price = \model\price::find("where product_id='".$productId."' and client_id='".$clientId."'  ");
    return $price;
  }




  //为商品生成未配置的门店列表
  function getClientConfigWithInitByProduct($priceTypeId,$productId) {

    $ids_not_set = \model\price::sqlQuery(" 
select distinct client.id from  ".\DbConfig::$mysql['prefix']."client as client  where client.deleted=0 and client.id not in (select client_id from ".\DbConfig::$mysql['prefix']."price as price where price.price_type_id='".$priceTypeId."' and price.product_id='".$productId."'  )");
    
    \vd($ids_not_set,'$ids_not_set');
    $ids_not_set = \indexBy($ids_not_set,'id');
    \vd($ids_not_set,'$ids_not_set');



    $oProduct = \model\product::loadObj($productId);
    // $priceTypeId = $oClient->data['price_type_id'];
    $price = $oProduct->data['price'];

    $clients = \model\client::finds('where id in ('.implode(',', array_keys($ids_not_set)).') and deleted=0 and price_type_id='.$priceTypeId.' ','id,storename');
    \vd($clients,'$clients');

    foreach ($clients as $key => $v) {
      \model\price::execSql("REPLACE INTO ", "SET price_type_id='".$priceTypeId."',product_id='".$productId."',client_id='".$v['id']."',price='".$price."' ");
    }
  }


  function __getClientConfigWithInit($clientId) {

    $oClient = \model\client::loadObj($clientId);
    $priceTypeId = $oClient->data['price_type_id'];

    $pids_not_set = \model\price::sqlQuery(" 
select distinct product.id from  ".\DbConfig::$mysql['prefix']."product as product  where product.id not in (select product_id from ".\DbConfig::$mysql['prefix']."price as price where price.price_type_id='".$priceTypeId."' price.client_id='".$clientId."' and  )");
    
    \vd($pids_not_set,'$pids_not_set');
    $pids_not_set = \indexBy($pids_not_set,'id');
    \vd($pids_not_set,'$pids_not_set');

    $products = \model\product::finds('where id in ('.implode(',', array_keys($pids_not_set)).')  ','id,name,price');
    \vd($products,'$products');

    foreach ($products as $key => $prod) {
      \model\price_type_config::execSql("REPLACE INTO ", "SET price_type_id='".$priceTypeId."',product_id='".$prod['id']."',price='".$prod['price']."' ");
    }
  }

}