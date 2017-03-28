<?php
namespace service;

class AdmService extends \app\service {

  static function getCompanyId(){
    return $_SESSION['user']['company_id'];
  }

}