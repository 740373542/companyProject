<?php
namespace model;

class cate extends \app\model
{
    public static $table = "cate";
    
    static function getTree() {
      $r = [];
      $byparent = [];
      $ls = \model\cate::finds('where deleted=0');
      foreach ($ls as $cate) {
        if(!isset($byparent[''.$cate['parent']])){
          $byparent[''.$cate['parent']] = [];
        }
        $byparent[''.$cate['parent']][''.$cate['id']] = $cate;
      }

      \vd($byparent,'$byparent');
      foreach ($byparent['0'] as $cate) {
        self::getSubCates($cate, $byparent);
        $r[''.$cate['id']] = $cate;
      }
      // \vd($r,'$r');
      return $r;
    }

    static function getSubCates(&$target,$all) {
      $target['sub_cates'] = [];
      if(!empty($all[''.$target['id']])){
        foreach($all[''.$target['id']] as $cate){
          self::getSubCates($cate,$all);
          $target['sub_cates'][''.$cate['id']] = $cate;
        } 
      }
    }


    function SaveCateStr() {
      $parentId = $this->data['parent'];
      $cate_str = '';
      if( $parentId != 0 ){
        $oCateParent = \model\cate::loadObj($parentId);
        $cate_str = $oCateParent->data['cate_str'];
      }
      // echo $cate_str;
      $cate_str = $cate_str.$this->data['id'].',';
      $this->data = [];
      $this->data['cate_str'] = $cate_str;
      $this->save();
    }

}
