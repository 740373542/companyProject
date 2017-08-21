<?php 
namespace module;

class event {

    private $container = [];

    private static $obj = null;

    private function __construct(){}

    static function init(){

        if(!self::$obj){
            self::$obj = new self;
        }

        return self::$obj;
    }


    public function setEvent($eventName,$models=[]){

        if(!isset($this->container[$eventName])){
            
            $this->container[$eventName] = $models;
            \vd($this->container[$eventName],"no exsits");


        }else if(issset($this->container[$eventName]) && count($models)>0){

            foreach ($models as $k => $v) {

                array_push($this->container[$eventName],$v);
                \vd($this->container[$eventName],"exsits");

            }

        }else{

            echo "error:请确认事件参数是否正确!";

        }


    }

    public function sendEvent($eventName,$params=null){

        if(isset($this->container[$eventName])){

            foreach ($this->container[$eventName] as $k => $obj) {
                
                $class = "\\model\\".$obj;

                if(!$params){

                    $class::$eventName();

                }else{

                    $class::$eventName($params);

                }

            }

        }else{

            echo "error:请先设置对应的eventName";

        }


    }

}