<?php 
function view($fileName){

	$viewDir = __VIEW__ . '/' . $fileName . '.php';

	if(file_exists($viewDir)){
		return $viewDir;
	}else{
		echo "error:没有找到view文件!";
	}

}


function component($fileName){
	$viewDir = __APP__ . '/components/' . $fileName . '.php';

	if(file_exists($viewDir)){
		return $viewDir;
	}else{
		echo "error:没有找到组件!";
	}
}


function error($code,$msg="脚本异常"){

    if(!is_int($code)){
        echo "错误代码必须是整数!";
        return;
    }

    if(!is_string($msg)){
    	echo "错误详情用字符串表述";
    	return;
    }

    throw new \Exception($msg,$code);

}




$_idx = 0;

function vd($v, $str = '', $printobject = false)
{
    global $_idx;
    // if (__MODE__ !== 'dev') {
    //     return;
    // }
    if (!isset($_GET['debug'])) {
        return;
    }

    ++$_idx;
    if ($_idx < 2) {
        echo '<style>
        *{
            // font-size:36px;
        }
        xmp, pre, plaintext {
          display: block;
          font-family: -moz-fixed;
          white-space: pre;
          margin: 1em 0;

          white-space: pre-wrap;
          word-wrap: break-word;

        }
        table
        {
            border-color: #600;
            border-width: 0 0 1px 1px;
            border-style: solid;
        }

        td
        {
            border-color: #600;
            border-width: 1px 1px 0 0;
            border-style: solid;
            margin: 0;
            padding: 4px;
            background-color: #FFC;
        }

        </style>';
        echo '
        <script>
        var onoff = function(idx){
            // alert(idx)
            // $("#"+idx).toggle()
          if( document.getElementById(""+idx).style.display == "none" ){
            document.getElementById(""+idx).style.display = "";
          }else{
            document.getElementById(""+idx).style.display = "none";
          }
        }
        </script>
        ';
    }

    // if( empty($_GET['debug']) ) return;
//    if(!isset($_GET['debug'])) return ;
    global $application_folder;
    $trace = $backtrace = debug_backtrace();
    $line = 0;
    $file = '';
    $filepath = null;

   // echo '<pre>';print_r($trace);echo '</pre>';
    $his = [];
    $tmp_file = null;
    $tmp_line = null;
    foreach ($trace as $a => $b) {
        if (!empty($b['file'])) {
            $file = $b['file'];
            if (!$filepath) {
                $filepath = $file;
            }
        }
            // if( isset($b['line']) && !$line ) $line = $b['line'];

        $trace[$a]['file'] = $file;
        if (isset($b['file']) && strrpos($b['file'].',', 'index.php,') > 0) {
            // $file = $b['file'];
            array_shift($trace);
        } else {
            if (isset($b['line']) && !$line) {
                $line = $b['line'];
            }
        }
        unset($trace[$a]['args']);
        if (!$printobject) {
            unset($trace[$a]['object']);
        }
        unset($b['args']);
        unset($b['object']);
        // echo '<br>'.print_r($b,true).'<br>';

        if ($tmp_file) {
            if(empty($b['class'])) $b['class'] = '-';
            $his[] = [
                'file' => $tmp_file,
                'line' => $tmp_line,
                'class' => $b['class'],
                'function' => $b['function'],
            ];
        }

        $tmp_file = $b['file'];
        $tmp_line = $b['line'];
    }

    if (empty($trace[0]['class'])) {
        $trace[0]['class'] = '';
    }
    if (empty($trace[1]['class'])) {
        $trace[1]['class'] = '';
    }
    if (empty($trace[0]['function'])) {
        $trace[0]['function'] = '';
    }
    if (empty($trace[2]['class'])) {
        $trace[2]['class'] = '';
    }

    echo '<pre style="text-align: left;clear:both;width:100%;">';
    echo '<p onClick="onoff(\'idx_'.$_idx.'\')">'.substr($filepath, strlen(__PROJECT__) + 4).':<font color="red">'.$line.'</font> '.$trace[0]['class'].'::'.$trace[0]['function'].' <b style="font-size:bold;color:blue;"> '.$str.'</b></p>';

    $__content_v__ = $v;

    echo '<table id="idx_'.$_idx.'" style="display:none;margin-top:2px;margin-bottom:10px;"><tr><td>file</td><td>class</td><td>function</td><td>line</td></tr>';
    foreach ($his as $k => $v) {
        $filepath = $v['file'];
        echo '
        <tr>
            
            <td>'.$v['class'].'</td>
            <td>'.$v['function'].'</td>
            <td>'.$v['line'].'</td>
        </tr>
        ';
    }
    echo '</table>';

    print_r($__content_v__);

    echo '<br></pre><hr />';
}