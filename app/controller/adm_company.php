<?php
namespace controller;

class adm_company extends \app\controller
{
	// 修改企业行业信息
	function index(){
    $__nav = "/adm_company/index";
		$company_id = $_SESSION['user']['company_id'];
    \vd($company_id,'33333');
		$oCompany = \model\company::loadObj($company_id);
    $__company = $oCompany->data;
    $__industry = '';
    if (!empty($__company['industry'])) {
      $industry = \de($__company['industry']);
      foreach ($industry as &$v) {
        $__industry[$v] = $v;
      }
      $__industry = \en($__industry);
    }
    \vd($__industry,'行业');

		include \view('adm_company__index');
  }

  // 企业列表
  function ls() {
    $__nav = "/adm_company/ls";
    include \view('adm_company__ls');
  }

  function aj_compnay_ls() {

    $data = $_GET;

    $total = 0;
    $page = 1;
    if (!empty($data['page'])) {
      $page = $data['page'];
    }
    $search = '';
    if (!empty($data['search'])) {
      $search = $data['search'];    
    }
    // 默认一次查出十条
    $length = 10;
    if (!empty($data['length'])) {
      $length = $data['length'];
    }
    // $companyId = 1;
    $company = $this->di['CompanyService']->getCompanyLs($total, ['page'=>$page,'length'=>$length,'search'=>$search]);
    // 拿到课程下的视频
    \vd($company,'公司');

    $this->data([
        'ls' => $company,
        'page' => $page,
        'length' => $length,
        'count' => $total,
    ]);
  }

  // 修改公司名称
  function modify_name() {
    $data = $_GET;
    $name = $data['name'];
    $oCompany = \model\company::loadObj($data['id']);
    $oCompany->data['name'] = $name;
    $oCompany->save();
    $this->data(true);
  }

  // 为企业取消课程

  function assign() {
    $__nav = "/adm_company/assign";
    include \view('adm_company__assign');
  }

  // 分配课程给企业
  function assign_course() {
    $data = $_GET;
    include \view('adm_company__assign_course');
  }

  // 获得所有公司列表
  function aj_all_list() {
    $__companys = \model\company::finds('where id>0 order by id desc');
    $this->data([
      'ls' => $__companys,
    ]);
  }

  function aj_get_rel_company() {
    $data = $_GET;
    $__companys = \model\company_course::finds("WHERE course_id='".$data['course_id']."' group by company_id ");

    $this->di['ToolService']->setCompanyInfo($__companys);

    $this->data([
      'args' => $data,
      'ls' => $__companys,
    ]);
  }

  function aj_assign(){
    $data = $_GET;

    \model\company_course::execSql('DELETE FROM'," WHERE course_id='".$data['course_id']."' and company_id='".$data['company_id']."'");

    $oCompanyCourse = new \model\company_course;
    $oCompanyCourse->save([
      'course_id' => $data['course_id'],
      'company_id' => $data['company_id'],
    ]);

    $this->data([
      'data' => $data,
      'rs' => $oCompanyCourse->data,
    ]);
  }

  function aj_unassign(){
    $data = $_GET;
    \model\company_course::execSql('DELETE FROM'," WHERE course_id='".$data['course_id']."' and company_id='".$data['company_id']."'");
    $this->data([
      'data' => $data,
    ]);
  }








  // 添加行业标签
  function add_tag_of_industry() {
    $data = $_GET;
    $company_id = $data['company_id'];
    $tag_name = $data['tag'];
    $user_id = $_SESSION['user']['id'];
    $this->di['CheckService']->CheckData($company_id,$user_id,'company');
    $oCompany = \model\company::loadObj($company_id);
    $industry = array_keys($data['tag']);
    $oCompany->data['industry'] = \en($industry);
    $oCompany->save();
    $this->data(['ok']);
  }

  // 删除指定行业标签
  function delete_tag_of_industry() {
    $data = $_GET;
    $company_id = $data['company_id'];
    $user_id = $_SESSION['user']['id'];
    $this->di['CheckService']->CheckData($company_id,$user_id,'company');
    $oCompany = \model\company::loadObj($company_id);
    \vd($data['tag'],'标签');
    if (!empty($data['tag'])) {
      $industry = array_keys($data['tag']);
      $oCompany->data['industry'] = \en($industry);
    }else{
      $oCompany->data['industry'] = $data['tag'];
    }
    $oCompany->save();
    $this->data(['ok']);
  }

  // 创建公司
    // 创建公司
  function establish(){
    $__nav = '/adm_company/establish';
    include \view('adm_company__establish');
  }
  // 创建公司
  function aj_add_establish(){
    $data = $_GET;
    $company = \model\company::finds("WHERE name='".$data['name']."'");
    if (!empty($company)) {
      \except(-1,'公司已存在');
    }
    $member = \model\member::finds("WHERE phone='".$data['phone']."'");
    if (!empty($member)) {
      \except(-1,'账号已存在');
    }
    $newcompany = new \model\company;
    $newcompany->data=[
      'name' => $data['name'],
      'manager_name' => $data['manager_name'],
      'corp_url' => $data['corp_url'],
      'create_at'=> \datetime(),
    ];
    $newcompany->save();
    $oCompany = \model\company::loadObj($data['name'],'name');
    $id = $oCompany->data['id'];
    \vd($id,'####');
    $newmember = new \model\member;
    $newmember->data=[
      'company_id' => $id,
      'phone' => $data['phone'],
      'name' => $data['manager_name'],
      'passwd' => $data['passwd'],
      'real_name'=>$data['manager_real_name'],
      'type' => 2,
    ];
    $newmember->save();
    $this->data(['ok']);
  }

  function culture_index(){
    $company_id = $_SESSION['user']['company_id'];
    $oCompany = \model\company::loadObj($company_id);
    $__corp_url = $oCompany->data['corp_url'];

    $__nav = "/adm_company/culture_index";

    require \view("adm_company__culture_index");
  }

  //设置公司企业文化
  function company_culture_save(){
    $data = $_GET;
    $corp_url = $data['corp_url'];
    if(empty($corp_url)){
      \except(-1,"输入的地址不能为空！");
    }
    $company_id = $_SESSION['user']['company_id'];
    $oCompany = \model\company::loadObj($company_id);
    $oCompany->data['corp_url'] = $corp_url;
    $oCompany->save();
    $this->data(['ok']);
  }





}
