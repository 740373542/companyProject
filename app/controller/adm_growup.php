<?php
namespace controller;

class adm_growup extends adm_controller
{

  function index(){
    $__nav = "/adm_growup/";
    $data = $_GET;
    if(empty($data['type'])){
      $__type = \model\comm_content::$CONF_v_2_t['1'];
    }else{
      $__type = \model\comm_content::$CONF_v_2_t[''.$data['type']];
    }
    $__types_t_2_v = \model\comm_content::$CONF_t_2_v;
    $__types_v_2_t = \model\comm_content::$CONF_v_2_t;

    include \view('adm_growup__index');
  }

  function getContentStr($content,$idx=0){
    $r = '';
    $idx++;

    $pre = '';
    for($i=1;$i<$idx;$i++){
      $pre.="　";
    }

    if( is_array($content) ){
      foreach ($content as $k => $v) {
        if($k!='undefined'){
          $answer = $this->getContentStr($v,$idx);
          $br = '<br>';
          if($idx==1){
            $answer='<br>'.$pre.''.$answer;
            $br = '<br><br>';
          }

          $r .= ($br.''.$pre.'<b>'.$k.'</b>:'.$answer.'' );
        }
      } 
    }else{
      if( (int)$content > 0 ){
        $content = (int)$content/10;
      }
      $r = $content;
    }
    return $r;
  }

  function aj_ls() {
    $data = $_GET;
    $count = [];
    $param=[
        'length'=>0,
        'page'=>1,
      ];
    if(!empty($data['page'])){
      $param['page'] = $data['page'];
    }
    if(!empty($data['length'])){
      $param['length'] = $data['length'];
    }

    $ls = \model\comm_content::finds('where company_id='.$_SESSION['user']['company_id'].' and type='.$_GET['type'].' order by `key` desc,id', '*', $count, $param);

    $this->di['ToolService']->setMemberInfo($ls,['name'=>'nick_name','real_name'=>'real_name']);

    foreach ($ls as $k=>&$v) {
      $content = \de($v['content']);

      $v['content_str'] = $this->getContentStr($content).'<br><br>';
    }

    $this->data([
      'ls' => $ls,
      'count' => $count,
      'length' => $param['length'],
      'page' => $param['page'],
    ]);
  }

}