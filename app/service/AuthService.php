<?php
namespace service;

class AuthService extends \app\service {

  function login($phone, $password) {
    $oMember = \model\user::loadObj($phone, 'phone');

    if(!$oMember){
      \except(\CODE::账号错误);
    }

    if($oMember->data['passwd']!==$password){
      \except(\CODE::密码错误);
    }

    return $oMember;
  }

}
