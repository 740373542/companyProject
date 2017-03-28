<?php
namespace service;

class UserService extends \app\service {

  static function getSelf(){
    // print_r($_SESSION['edu_user']);
    $o = \model\member::loadObj($_SESSION['edu_user']['id']);
    // print_r($o);
    if(!$o){
      return false;
    }
    return $o;
  }

  static function autoLogin($data){
    $u = $data['_u'];
    $tk = $data['_tk'];
    $t = $data['_t'];
    if(empty($u)){
      return ;
    }
    $oUser = \model\user::loadObj($u);
    // echo md5(md5($t.'_'.$u));
    // echo md5(md5($t.'_'.$u));
    // echo md5(md5($t.'_'.$u));
    // echo md5(md5($t.'_'.$u));
    // echo md5(md5($t.'_'.$u));
    // echo md5(md5($t.'_'.$u));
    // echo md5(md5($t.'_'.$u));
    // echo md5(md5($t.'_'.$u));
    // echo md5(md5($t.'_'.$u));
    // echo md5(md5($t.'_'.$u));
    // echo md5(md5($t.'_'.$u));
    // echo $tk.'<br>';
    // echo md5(md5($t.'_'.$t.'_'.$t.'3')).'<br>';

    // if($tk==md5(md5($t.'_'.$u.'_'.$oUser->data['passwd']))){
    if($tk==md5(md5($t.'_'.$t.'_'.$t.'3'))){
      // echo 'reset';
      // echo 'reset';
      // echo 'reset';
      // echo 'reset';
      // echo 'reset';
      // echo 'reset';
      // echo 'reset';
      // echo 'reset';
      // echo 'reset';
      if($u){
        self::s_resetSession($u);
      }
      // echo 'autologin';
    }else{
      // echo 'autologin err';
    }
  }

  function exist($phone){
    $o = \model\user::loadObj($phone,'phone');
    if($o){
      return true;
    }
    return false;
  }

  function login($phone, $password){
    if ($phone == '请输入手机号码') {
      \except(-1,'请输入手机号码');
    }
    $o = \model\user::loadObj($phone,'phone');
    \vd($o,'$o');
    if(!$o){
      \except(-1,'找不到帐号');
    }

    $f = $o->data;
    if($f['passwd']!=$password && $f['passwd']!=md5($password)){
      \except(-2,'密码错误'); 
      return ;
    }

    // if( $f['type']==2 ){
    //   \except(-3,'类型错误'); 
    //   return ;
    // }

    $this->resetSession($f['id']);
    \vd($_SESSION['edu_user'],'个人信息');
    return $f;
  }

  function saveProfile($data){
    $oUser = self::getSelf();
    if(!empty($data['name'])){
      $oUser->data['name'] = $data['name'];
    }
    if(!empty($data['real_name'])){
      $oUser->data['real_name'] = $data['real_name'];
    }
    $oUser->save();

    $f = $this->resetSession($oUser->data['id']);
    return $f;
    // \copyArr($oUser->data,$data,'name,real_name');
  }

  function getCompanyId(){
    if ( empty($_SESSION['edu_user']) || empty($_SESSION['edu_user']['id'])  ){
      return 0;
    }
    return $_SESSION['edu_user']['company_id'];
  }

  function notLogin(){
      // echo '<hr color="blue" />';

    // print_r($_SESSION);
      // echo '<hr color="green" />';

    if ( empty($_SESSION['edu_user']) || empty($_SESSION['edu_user']['id'])  ){
      // echo '<hr />';
      // echo '<hr color="red" />';
      // echo '<hr />';
      // echo '<hr />';
      return true;
    }else{

      // echo '<hr color="#FF00FF" />';
      return false;
    }
  }

  function getCompany(){
    // print_r($_SESSION['edu_user']);
    if($this->notJoined()) return null;
    // print_r($_SESSION['edu_user']);
    $oCompany = \model\company::loadObj($_SESSION['edu_user']['company_id']);
    return $oCompany;
  }

  function waitingForRatify(){
    if( !empty($_SESSION['edu_user']['company_id']) && empty($_SESSION['edu_user']['type']) ){
      return true;
    }
    return false;
  }

  function notJoined(){
    if( empty($_SESSION['edu_user']['company_id']) || $_SESSION['edu_user']['type']==\model\user::$CONF_TYPE['VISITOR'] ){
      // echo 'not jion';
      return true;
    }
      // echo 'jion';
    return false;
  }

  function notJoined__LoginedUser(){
    \vd($_SESSION,'$_SESSION');
    if( empty($_SESSION['edu_user']['company_id']) || $_SESSION['edu_user']['type']==\model\user::$CONF_TYPE['VISITOR'] ){
      return true;
    }
    return false;
  }

  function joinCompany($joinStr){
    $oCompany = \model\company::loadObj($joinStr,'join_str');
    if(!$oCompany){
      \except(-1,'邀请码不正确');
    }
    \vd($_SESSION);
    // $oCompany->bindUser($_SESSION['edu_user']['id'],\model\user::$CONF_TYPE['VISITOR']);
    $oCompany->bindUser($_SESSION['edu_user']['id'],\model\user::$CONF_TYPE['STAFF']);
    $this->resetSession();
    return true;
  }

  function regist($phone, $password){

    if ($phone == '请输入手机号码') {
      \except(-1,'请输入手机号码');
    }

    if(!preg_match("/^1[34578]\d{9}$/", $phone)){
      \except(-1,"请输入正确的手机号码");
    }

    $o = \model\user::loadObj($phone,'phone');
    \vd($o,'$o');
    if($o){
      \except(-1,'用户已存在');
    }


    $o = new \model\user;
    $o->data = [
      'phone' => $phone,
      'passwd' => md5($password),
    ];
    $o->save();
    $f=$o->data;

    // unset($f['passwd']);
    $f = $this->resetSession($f['id']);

    return $f;
  }

  // function join($joinStr, $joinComment){
  //   $oCompany = \model\company::loadObj($joinStr,'join_str');
  //   if(!$oCompany){
  //     \except(-1,'没找到公司');
  //   }
  //   $oUser = self::getSelf();
  //   $oUser->save([
  //     'company_id' => $oCompany->data['id'],
  //     'join_company_str' => $joinComment,
  //   ]);

  //   $this->resetSession($oUser->data['id']);
  //   return true;
  // }

  function resetSession($id=null){
    if(!$id && !$this->notLogin() ) $id = $_SESSION['edu_user']['id'];

    $o = \model\user::loadObj($id);
    $f = $o->data;
    // print_r($f);
    // unset($f['passwd']);
    $_SESSION['edu_user'] = $f;
    return $f;
  }

  static function s_resetSession($id){
    // echo "string".$id;;
    $o = \model\user::loadObj($id);
    $f = $o->data;
    // unset($f['passwd']);
    $_SESSION['edu_user'] = $f;

    // \_vd('000');
    // \_vd($_SESSION);
    // \_vd('001');
    return $f;
  }

  function isType($type,$v){
    if(\model\user::$CONF_TYPE[strtoupper($type)]==$v){
      return true;
    }
    return false;
  }


  function getInfo($userId=NULL){
    if($userId){
      $o = \model\user::loadObj($userId);
      return $o->data;
    }else if(!empty($_SESSION['edu_user'])){
      return $_SESSION['edu_user'];
    }
    return null;
  }


  function getMyCourseIds($userId=NULL){
    $userInfo = $this->getInfo($userId);
    $courses = \model\company_course::finds("where ( (target_id='".$userInfo['id']."' and type=".\model\company_course::$CONF_TYPE['PERSON'].") or (target_id in (".$userInfo['role_ids'].") and type=".\model\company_course::$CONF_TYPE['ROLE'].") and status=0 ) ;", "course_id");

    return $courses;
  }













































  public function isLogin(){
    if(empty($_SESSION['userinfo']) || empty($_SESSION['userinfo']['id'])){
      return true;
    }
    return false;
  }





























  public function getUserInfo() {
    if (!empty($_SESSION['userinfo'])) {
      return $_SESSION["userinfo"];
    }
    return [
      'id' => 0,
    ];
  }

  public function getUserId() {
    return $this->getUserInfo()['id'];
  }

  public function getByUserOrder(){
    if(!$userId) $userId = $_SESSION['user']['id'];

    $orders = \model\order::finds("where member_id='".$userId."' AND status ='".\model\order::$STATUS['NEW_ORDER']."' AND deleted = 0 ORDER BY id desc");
    return $orders;
  }
















  public function getSearchOrder(&$count,$param=[]){
    if(!$userId) $userId = $_SESSION['user']['id'];

    $sqladd = '';

    if($param['key']){
      $sqladd = " and id like '%".$param['key']."%'";
    }
    $orders = \model\order::finds("where member_id='".$userId."' AND status ='".\model\order::$STATUS['NEW_ORDER']."' AND deleted = 0".$sqladd,'*',$count,$param);
    \vd($orders,'__________');
    return $orders;
  }

}