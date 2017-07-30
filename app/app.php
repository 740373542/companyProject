<?php

namespace app;

require_once __APP__ . '/methods.php';

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

    public $data;

    function error(){

    }

}



class model {

    public $data=[];

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




