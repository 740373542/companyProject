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
    public $id="";

    public static $table="";

    public static $db = null;


    static function connect(){

        if(!self::$db){
            self::$db = new \medoo(\DB::$config);
        }

        self::$db->pdo->beginTransaction();
        return self::$db;

    }

    static function finds($where,$column="*",&$count=null,$params=['page'=>1,'length'=>0]){


        $db = self::connect();

        $sqlLimit = '';

        if($params['length'] > 0){

            $length = $params['length'];
            $page = $params['length']*($params['page']-1);
            $sqlLimit = " LIMIT {$page},{$length}";

        }

        $table = static::$table;

        $sql = "SELECT ".$column." FROM ".$table." ".$where.$sqlLimit;

        $arr = $db->query($sql);

       

        if($arr){
            $datas = $arr->fetchAll();
        }else{
            $datas = [];
        }

        if($count !== null){
            $count = static::sqlCount($column,$where);
        }

        return count($datas) <= 0 ? [] : $datas;

    }


    static function sqlCount($column,$where){

        if(self::$db){
            $db = self::$db;
        }else{
            $db = self::connect();
        }

        $table = static::$table;

        $sql = "SELECT count(".$column.") FROM ".$table." ".$where;

        $arr = $db->query($sql)->fetch();

        $res = array_values($arr);

        return $res[0];




    }

    static function findOnce($where,$column="*"){

        $datas = static::finds($where,$column);

        return count($datas) <=0 ? [] : $datas[0];

    }

    static function loadObj($val,$key="id"){

        if(self::$db){
            $db = self::$db;
        }else{
            $db = self::connect();
        }

        $table = static::$table;

        $column = "*";

        $where = [$key => $val];

        $res = $db->get($table,$column,$where);

        $obj = new static;


        if($res["id"]){
            $obj->id = $res["id"];
        }

        $obj->data = $res;

        return $obj;        


    }

    static function deleteId($id){

        if(self::$db){
            $db = self::$db;
        }else{
            $db = self::connect();
        }

        $table = static::$table;

        $db->delete($table,["id"=>$id]);

        \vd("deleted succ");

    }


    public function save(){

        if(self::$db){
            $db = self::$db;
        }else{
            $db = self::connect();
        }

        $table = static::$table;

        if(!$this->data["id"]){
            $db->insert($table,$this->data);
            \vd("exec:instert");
        }else{
            $db->update($table,$this->data,["id"=>$this->data['id']]);
            \vd("exec:update");
        }


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




