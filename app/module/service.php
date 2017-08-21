<?php 
namespace module;

class service implements \ArrayAccess{

    public $container = [];

    private static $object = null;

    private function  __construct(){

    }   

    static function init(){

        if(!self::$object){
            self::$object = new self();
        }

        return self::$object;
        
    }

    public function offsetSet($offset, $value){

      // echo "offsetSet : {$offset} => {$value}\n";

    }
     
    public function offsetExists($offset){

      // echo "offsetExists : {$offset}\n";

    }
 
    public function offsetUnset($offset){

        if(isset($this->container[$offset]) && array_key_exists($offset,$this->container))
            unset($this->container[$offset]);
        }
     
    public function offsetGet($offset){


      if(isset($this->container[$offset]) && array_key_exists($offset,$this->container)){

        return $this->container[$offset];

      }else{

        $service = "\\service\\".$offset;

        $container[$offset] = new $service;

        return $container[$offset];
      }

    }



}