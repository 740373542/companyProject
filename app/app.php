<?php

namespace app;

require_once __APP__ . '/lib/methods.php';
require_once __APP__ . '/lib/meedo.php';
require_once __APP__ . '/config/config.php';

class engine {

    static function route(){

        $uri = explode('?',$_SERVER['REQUEST_URI']);

        $arr = explode('/', $uri[0]);

        $controller = 'index';

        $function = 'index';

        if(!empty($arr[1])){

            $controller = $arr[1];

        }

        if(!empty($arr[2])){

            $function = $arr[2];

        }

        return [
            'controller' => $controller,
            'function' => $function,
        ];     


    }

    static function run(){

        $urls = self::route();

        $controller = urldecode($urls['controller']);
        $function = urldecode($urls['function']);

        $class = '\\controller\\'.$controller;

        $obj = new $class;
        $obj->$function();


    }



}




class controller {

    public $error;

    public $code;

    public $data = [];


    public function send($arr){

        $arr['code'] = 0;

        echo json_encode($arr,JSON_UNESCAPED_UNICODE);

    }



}



class model {

    public $data=[];

    public static $table="";

    public static $db = null;


    static function connect(){

        if(!self::$db){
            self::$db = new \medoo(\DB::$config);
        }

        self::$db->pdo->beginTransaction();
        return self::$db;

    }

    static function finds($where,$column="*",&$count=null,$parmas=['page'=>0,'length'=>1]){

        $db = self::connect();

        $table = static::$table;

        $sql = "SELECT ".$column." FROM ".$table." ".$where;

        $arr = $db->query($sql);

        if($count != null){
            $count = self::privateCount($table,$column,$where);
        }

        return $arr->fetchAll();

    }


    static function privateCount($table,$column,$where){

        if(self::$db){
            $db = self::$db;
        }else{
            $db = self::connect();
        }

        $sql = "SELECT count(".$column.") FROM ".$table." ".$where;

        $arr = $db->query($sql);



    }



}







class Loader{

    public static function controllerloader($className){
        $path = explode('\\',$className);
        $dirName = $path[0];
        $fileName = $path[1];
        $requireFile = __APP__.'/'.$dirName.'/'.$fileName.'.php';

        if(file_exists($requireFile)){
            require_once $requireFile;
        }else{
            echo "没有找到指定类文件！";
        }
    }
    
}

spl_autoload_register(array("\app\Loader","controllerloader"));




