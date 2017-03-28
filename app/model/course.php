<?php
namespace model;

class course extends \app\model
{
    public static $table = "course";

    function parseVideos() {

    }
    
    // function _set_() {
    // }
    
    function _parse() {
      $extraData = \de($this->data['extra']);
      // print_r($extraData);
      if(empty($extraData)){
        $extraData = ['videos'=>[]];
      }
      $videoIds = $extraData['videos'];
      $videos = \model\video::finds("where id in(".implode(",", $videoIds).")");
      $videos = \indexBy($videos,'id');
      $r = [];

      foreach ($videoIds as $k => $vid) {
        $r[''.$vid] = $videos[''.$vid];
      }

      \vd($r,'$videos');
      $this->videos = $r;

      // return $r;
    }

    function addVideo ($videoId) {
      // {"videos":[17,16,15,14]}
      if( !$this->videos[''.$videoId] ){
        $this->videos[''.$videoId] = $videoId;
        $extraData = \de($this->data['extra']);
        $extraData['videos'][] = (int)$videoId;
        $this->data['extra'] = \en($extraData);
        $this->save();
      }
    }


}