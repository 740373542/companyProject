<?php
namespace service;

class CompanyService extends \app\service {

  function getByCurrentUser() {
    if( $this->di['UserService']->notLogin() ){
      // echo '<hr color="yellow" />';
      return false;
    }
    $companyId = $_SESSION['edu_user']['company_id'];
    $oCompany = \model\company::loadObj($companyId);
    // print_r($oCompany);
    return $oCompany;
  }


  function getCurrentId() {
    if( !empty($_SESSION['edu_user']) && !empty($_SESSION['edu_user']['company_id']) ){
      return $_SESSION['edu_user']['company_id'];
    }
    return 0;
  }


  function regist($data) {
    if( empty($data['company_name']) ){
      \except(-1,'缺少公司名称');
    }
    if( empty($data['company_manager']) ){
      \except(-1,'缺少管理员');
    }
    if( empty($data['manager_phone']) ){
      \except(-1,'缺少管理员手机号码');
    }
    if( empty($data['password']) ){
      \except(-1,'缺少密码');
    }

    $company_name = $data['company_name'];
    $company_manager = $data['company_manager'];
    $manager_phone = $data['manager_phone'];
    $password = $data['password'];


    //todo 先查公司是否存在 
    $o = \model\company::loadObj($company_name,'name');
    \vd($o,'$o');
    if($o){
      \except(-1,'公司已存在');
    }

    // //todo 先查用户是否存在 
    // $find = $this->di['UserService']->exist($company_manager);
    // if($find){
    //   \except(-1,'用户已存在');
    // }


    // $user = $this->di['UserService']->regist($manager_phone, $password);

    $user = $_SESSION['edu_user'];

    $oCompany = new \model\company;
    $oCompany->data = [
      'name' => $company_name,
      'join_str' => \createRandomStr(5),
      'manager_name' => $company_manager,
      'manager_phone' => $manager_phone,
      'manager_id' => $user['id'],
    ];
    $oCompany->save();

    $oCompany->bindUser($user['id'], \model\user::$CONF_TYPE['MANAGER'] );

    return true;
  }

  function bindUser() {

  }

  function getcompanyjoin($company_id){
    $join = \model\company::loadObj($company_id);
    $join = $join->data;
    return $join;
  }

  function getjoinsave($data,$company_id){
    $join = \model\company::loadObj($company_id);
    $join->data = [
      'join_str' => $data['join_str'],
      ];
    $join->save();
    return $join;
  }
  // 获取公司列表
  function getCompanyLs(&$total,$params = []) {

    $search = '';
    if($params['search']) {
      $search = " and title like '%".$params['search']."%'";
    }

    $companies = \model\company::finds(" where 1 = 1".$search, " * ", $total, $params);  
    \vd($companies,'adfsadfsdfs');
    return $companies;
  }

}