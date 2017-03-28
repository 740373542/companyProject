<?php
namespace controller;
use \app\controller;

class seed extends controller{

  function msg (){
    $data = $_GET;
    $phone = $data['phone'];

    if(empty($phone)){
      \except(-1,"手机号码不能为空");
    }

    if(!preg_match("/^1[34578]\d{9}$/", $phone)){
      \except(-1,"请输入正确的手机号码");
    }

    $oMember = \model\user::loadObj($phone,'phone');

    if(empty($oMember)){
      \except(-1,"请确认该号码是否注册");
    }

    $oMember->data['validate_sms'] = $this->di['SmsService']->getCode(6);
    $oMember->save();

    $this->di['SmsService']->sendVerifyCode($phone,$oMember->data['validate_sms']);
    $this->data(["发送成功"]);
  }


  function comfirm_sms(){
    $data = $_GET;
    $phone = $data['phone'];
    
    if(empty($phone)){
      \except(-1,"手机号码不能为空");
    }

    if(!preg_match("/^1[34578]\d{9}$/", $phone)){
      \except(-1,"请输入正确的手机号码");
    }

    $code = $data['code'];
    if(empty($code)){
      \except(-1,"请输入验证码");
    }

    $oMember = \model\user::loadObj($phone,'phone');
    $validate_sms = $oMember->data['validate_sms'];
    if($validate_sms == $code){
      $this->data(['ok']);
    }else{
      \except(-1,"验证码错误!");
    }

  }

  function update_passwd_save(){
    $data = $_GET;
    $phone = $data['phone'];
    $update_passwd_1 = $data['update_passwd_1'];
    $update_passwd_2 = $data['update_passwd_2'];

    if($update_passwd_1 != $update_passwd_2){
      \except(-1,"请确认输入的密码是否相同");
    }

    if(empty($update_passwd_1) || empty($update_passwd_2)){
      \except(-1,"输入的密码不能为空");
    }

    $oMember = \model\user::loadObj($phone,'phone');
    $oMember->data['passwd'] = $update_passwd_1;
    $oMember->save();
    $this->data(["ok"]);
  }






























}