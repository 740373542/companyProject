<?php
namespace controller;

//PHP图片的等比缩放和增加Logo水印   --->百度 “美日汇”

class upload extends \app\controller
{


  function mkdir_r($dirName, $rights=0755){
    $dirs = explode('/', $dirName);
    $dir='';
    foreach ($dirs as $part) {
        $dir.=$part.'/';
        if (!is_dir($dir) && strlen($dir)>0)
            mkdir($dir, $rights);
    }
  }

  public function convert($size='s') {
    if($size=='s'){
      $len = 50;
    }else if($size=='m'){
      $len = 100;
    }else if($size=='l'){
      $len = 150;
    }else if($size=='xl'){
      $len = 200;
    }


  }

  //android
  public function ajax_64() {

    if(empty($_SESSION['ajax'])) $_SESSION['ajax'] = 0;
    $_SESSION['ajax'] += 1;

    $_POST = json_decode(file_get_contents('php://input'), true);
    \errlog($_POST);
    foreach ($_POST as $k => $v) {
      \errlog($k);
      \errlog($v);
    }

    $base64_image_content = $_POST['imgdata'];
    \errlog($base64_image_content);

    $base64_image_content = str_replace('%2B', '+', $base64_image_content);
    $base64_image_content = str_replace('%26', '&', $base64_image_content);

    // \errlog($base64_image_content);


    $FOLDER = $_POST['key'];
    $FILE_PATH = 'uploads/'.$FOLDER.'/';

    //data:image/jpeg;base64,ksjlksdj
    // if(!empty($_POST['rename'])){
    // }


    // \errlog('$_GET');
    // \errlog($_GET);
    // \errlog('$_POST');
    // \errlog($_POST['imgdata']);
    // \errlog($base64_image_content);

    // \errlog('$_POST');


    // \errlog('0-50'. substr($base64_image_content, 0,50));
    // \errlog('50-...'. substr($base64_image_content, strlen($base64_image_content)-50));

    $UPLOAD_DIR = __PUBLIC_DIR__.'/'.$FILE_PATH;
    $this->mkdir_r($UPLOAD_DIR);

    //保存base64字符串为图片
    //匹配出图片的格式


    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){



      \errlog('$_POST 01');
      $type = $result[2];
      \errlog('$type');
      \errlog($type);

      $type = strtolower($type);
      if( $type=='jpeg' ) $type='jpg';


      $FILE_NAME = date('YmdHis').'.'.$type;


      $targetfile = $UPLOAD_DIR."".$FILE_NAME;
      // echo $targetfile;
      if (file_exists($targetfile))
      {
        echo $_FILES["file"]["name"] . " 文件已经存在。 ";
      }
      else
      {
        // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
        // echo '/'.$FILE_PATH.$FILE_NAME;
      }


      \errlog('$targetfile');
      \errlog($targetfile);

      if (file_put_contents($targetfile, base64_decode(str_replace($result[1], '', $base64_image_content)))){


        $imageInfo = getimageSize($targetfile);
        $w = $imageInfo[0];//获取宽度
        $h = $imageInfo[1];//获取高度


          if($_POST['resize']){
            $size = (int) $_POST['resize'];
            $pre = "";
            $resizefile = self::imageUpdateSize($targetfile,$size,$size,$pre);
            $FILE_NAME = $pre.$FILE_NAME;
          }


        $this->data([
          'file'=> '/'.$FILE_PATH.$FILE_NAME ,
          'w'=> $w ,
          'h'=> $h ,
          'ajax'=> $_SESSION['ajax'] ,
        ]);

      }
      

    }else{
      \errlog('$_POST 02');

      \errlog('no $type');
    }
  }

  public function ajax() {
    if(empty($_SESSION['ajax'])) $_SESSION['ajax'] = 0;
    $_SESSION['ajax'] += 1;

    if(!empty($_FILES['wangEditorH5File'])){
      $_FILES['file'] = $_FILES['wangEditorH5File']; 
      unset($_FILES['wangEditorH5File']);
    }
    // var_dump($_POST);
    // var_dump($_FILES);
    \errlog($_FILES);


    //创建文件夹
    $FOLDER = '';
    if(!empty($_POST['key'])){
      $FOLDER = $_POST['key'];
    }else if(!empty($_GET['key'])){
      $FOLDER = $_GET['key'];
    }

    $FILE_PATH = 'uploads/'.$FOLDER.'/';
    $FILE_NAME = $_FILES["file"]["name"];

    $temp = explode(".", $FILE_NAME);
    // echo $_FILES["file"]["size"];
    $extension = end($temp);     // 获取文件后缀名
    $RAW_FILE_NAME = $temp[0];

    if(!empty($_POST['rename'])){
      $RAW_FILE_NAME = date('YmdHis');
      $FILE_NAME = $RAW_FILE_NAME.'.'.$extension;
    }

    $UPLOAD_DIR = __PUBLIC_DIR__.'/'.$FILE_PATH;

    $this->mkdir_r($UPLOAD_DIR);

    // 允许上传的图片后缀
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    if ((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/x-png")
      || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 204800*40*4000)   // 小于 200 kb
    && in_array($extension, $allowedExts))
    {
      if ($_FILES["file"]["error"] > 0)
      {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
      }
      else
      {
        // echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        // echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
        // echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        // echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
        
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777

        $targetfile = $UPLOAD_DIR."".$FILE_NAME;
        // echo $targetfile;
        if (file_exists($targetfile))
        {
          echo $_FILES["file"]["name"] . " 文件已经存在。 ";
        }
        else
        {
          // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
          move_uploaded_file($_FILES["file"]["tmp_name"], $targetfile);
          // echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];

          // echo \Config::$BASEURL.''.$FILE_PATH.$FILE_NAME;
          // echo '/'.$FILE_PATH.$FILE_NAME;

          \errlog('$_POST 01');
          \errlog('$targetfile');
          \errlog($targetfile);

          $imageInfo = getimageSize($targetfile);
          $w = $imageInfo[0];//获取宽度
          $h = $imageInfo[1];//获取高度

          if($_POST['resize']){
            $size = (int) $_POST['resize'];
            $pre = "";
            $resizefile = self::imageUpdateSize($targetfile,$size,$size,$pre);
            $FILE_NAME = $pre.$FILE_NAME;
          }



          $this->data([
            'file'=> '/'.$FILE_PATH.$FILE_NAME ,
            'w'=> $w ,
            'h'=> $h ,
            'ajax'=> $_SESSION['ajax'] ,
          ]);

        }
      }
    }
    else
    {
      // echo "非法的文件格式";
      die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
    }

  }



  public function ajax_h5() {
    if(!empty($_FILES['wangEditorH5File'])){
      $_FILES['file'] = $_FILES['wangEditorH5File']; 
      unset($_FILES['wangEditorH5File']);
    }
    // var_dump($_POST);
    // var_dump($_FILES);
    \errlog($_FILES);


    //创建文件夹

    $FOLDER = $_POST['key'];

    $FILE_PATH = 'uploads/'.$FOLDER.'/';
    $FILE_NAME = $_FILES["file"]["name"];

    $temp = explode(".", $FILE_NAME);
    // echo $_FILES["file"]["size"];
    $extension = end($temp);     // 获取文件后缀名

    if(!empty($_POST['rename'])){
      $FILE_NAME = date('YmdHis').'.'.$extension;
    }

    $UPLOAD_DIR = __PUBLIC_DIR__.'/'.$FILE_PATH;

    $this->mkdir_r($UPLOAD_DIR);

    // 允许上传的图片后缀
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    if ((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/x-png")
      || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 204800*40*4000)   // 小于 200 kb
    && in_array($extension, $allowedExts))
    {
      if ($_FILES["file"]["error"] > 0)
      {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
      }
      else
      {
        // echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        // echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
        // echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        // echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
        
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777

        $targetfile = $UPLOAD_DIR."".$FILE_NAME;
        // echo $targetfile;
        if (file_exists($targetfile))
        {
          echo $_FILES["file"]["name"] . " 文件已经存在。 ";
        }
        else
        {
          // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
          move_uploaded_file($_FILES["file"]["tmp_name"], $targetfile);
          // echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];

          // echo \Config::$BASEURL.''.$FILE_PATH.$FILE_NAME;
          echo '/'.$FILE_PATH.$FILE_NAME;
        }
      }
    }
    else
    {
      // echo "非法的文件格式";
      die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
    }

  }













  /**
   * 等比缩放函数（以保存的方式实现）
   * @param string $picName 被缩放的处理图片源
   * @param int $minx 缩放后图片的最大宽度
   * @param int $miny 缩放后图片的最大高度
   * @param string $pre 缩放后图片名的前缀名
   * @return String 返回后的图片名称(带路径)，如a.jpg=>s_a.jpg
   */
  static function imageUpdateSize($picName,$minx=100,$miny=100,$pre=""){
            \errlog('$00000');
            \errlog($picName);

    $imageInfo = getimageSize($picName); //获取图片的基本信息
    
            \errlog('$00001');
            \errlog($imageInfo);

    $w = $imageInfo[0];//获取宽度
    $h = $imageInfo[1];//获取高度
    
    //获取图片的类型并为此创建对应图片资源  
    switch($imageInfo[2]){
      case 1: //gif
        $imageNew = imagecreatefromgif($picName);
        break;
      case 2: //jpg
        $imageNew = imagecreatefromjpeg($picName);
        break;
      case 3: //png
        $imageNew = imagecreatefrompng($picName);
        break;
      default:
        die("图片类型错误！");
    }
    
    //计算缩放比例
    // if(($minx/$w)>($miny/$h)){
    if(($minx/$w)<($miny/$h)){
      $b = $miny/$h;
    }else{
      $b = $minx/$w;
    }
    
    if($b>=1){
      return $picName;
    }

    
            \errlog('$00002');

    //计算出缩放后的尺寸
    $nw = floor($w*$b);
    $nh = floor($h*$b);
    
    //创建一个新的图像源(目标图像)
    $nimageNew = imagecreatetruecolor($nw,$nh);

            \errlog('$00003');      
    //执行等比缩放
    imagecopyresampled($nimageNew,$imageNew,0,0,0,0,$nw,$nh,$w,$h);
    
            \errlog('$00004');

    //输出图像（根据源图像的类型，输出为对应的类型）
    $picimageInfo = pathinfo($picName);//解析源图像的名字和路径信息
    $newpicName= $picimageInfo["dirname"]."/".$pre.$picimageInfo["basename"];

            \errlog('$00005');
            \errlog($newpicName);

    switch($imageInfo[2]){
      case 1:
        imagegif($nimageNew,$newpicName);
        break;
      case 2:
        imagejpeg($nimageNew,$newpicName);
        break;
      case 3:
        imagepng($nimageNew,$newpicName);
        break;
    }
    //释放图片资源
    imagedestroy($imageNew);
    imagedestroy($nimageNew);
    //返回结果
    return $newpicName;
  }

  //调用
  // echo imageUpdateSize("./images/leyangjun.jpg",400,400,"ss_");  //你自己要添加的图片









}


































// php读取和保存base64编码的图片内容


// header('Content-type:text/html;charset=utf-8');
// //读取图片文件，转换成base64编码格式
// $image_file = './4296762_165319032930_2.jpg';
// $image_info = getimagesize($image_file);
// $base64_image_content = "data:{$image_info['mime']};base64," . chunk_split(base64_encode(file_get_contents($image_file)));
  
// //保存base64字符串为图片
// //匹配出图片的格式
// if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
//   $type = $result[2];
//   $new_file = "./test.{$type}";
//   if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
//     echo '新文件保存成功：', $new_file;
//   }
  
// }
  
// <img src="<?php echo $base64_image_content;











