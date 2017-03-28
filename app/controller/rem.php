<?php
namespace controller;

use common\ErrorCode;

class rem extends \app\controller
{

  function index() {
    $__nav = 'home';

    $__o_company = $this->di['UserService']->getCompany();
    $__company = $__o_company->data;
    // \_vd($__company);

    include \view('rem__index');
  }


}
