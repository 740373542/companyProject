<?php
namespace controller;

use common\ErrorCode;

class index extends \app\controller
{

  function index() {
    return ;
    $__nav = 'home';

    $__o_company = $this->di['UserService']->getCompany();
    $__company = $__o_company->data;
    // \_vd($__company);

    include \view('index__index');
  }

  function aj_announce() {
    $companyId = $this->di['CompanyService']->getCurrentId();
    $__ls = $this->di['V2NewsService']->getAnnouncementByCompany($companyId);
    $this->data([
      'ls' => $__ls,
    ]);
  }

  function aj_shenhe() {

    // $__nav = 'home';
    $__videos = \model\video::finds("where id and pic != '' order by id desc limit 3");
    // $__videos = \model\video::finds("where id and pic != '' order by id desc limit 1");
    // $__videos[0]['filepath'] = 'http://localhost:30000/uploads/df.mp4';

    $__videos = [];
    $this->data([
      'ls' => $__videos,
    ]);
  }

  function more() {
    $__nav = 'more';
    $__title = '更多模块';
    include \view('index__more');
  }

  function test() {
    $__nav = 'home';
    include \view('index__test');
  }

  function p_index() {
    $__nav = 'home';
    include \view('index__p_index');
  }


  function shenhe() {
    $this->vue_index();
    // $this->rn_index();
  }


  function rn_index() {
    // print_r($_SESSION);
    $__nav = 'home';
    $__pageBgColor = '#FFF';
    $__o_company = $this->di['UserService']->getCompany();
    \vd($__o_company,'$__o_company');
    $__company = $__o_company->data;

    include \view('index__rn_index');
  }

  function vue_index() {
    // print_r($_SESSION);
    // return '';

    $__nav = 'home';
    $__pageBgColor = '#FFF';
    $__o_company = $this->di['UserService']->getCompany();
    \vd($__o_company,'$__o_company');
    $__company = $__o_company->data;

    // $__nav = 'home';
    // $__videos = \model\video::finds("where id and pic != '' order by id desc limit 3");
    // $__courses = \model\course::finds("where id>0 and pic != '' order by id desc limit 3");


    include \view('index__vue_index');
  }


}
