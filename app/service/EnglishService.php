<?php 
namespace service;

class EnglishService extends \module\service{

	function AddEnglish($data){

		$english = $data["english"];
		$chinese = $data["chinese"];
		$datetime = date('Y-m-d H:i:s');


		$res = \model\english::finds("where english = '".$english."'");

		if(count($res) > 0){
			\error(-1,"单词已经存在!");
		}else{
			$oEnglish = new \model\english;
			$oEnglish->data = [
				"english" => $english,
				"chinese" => $chinese,
				"create_time"=>$datetime,
			];
			$oEnglish->save();
		}

	}

	function AddEnglishQuestion($data){

		$english = $data["english"];
		$chinese = $data["chinese"];
		$types = \model\english::$QUESTION_TYPE;
		$datetime = date('Y-m-d H:i:s');

		$englishModel = \model\english::loadObj($english,"english");
		// \vd($obj,"$oEnglish");
		if($englishModel){

			$englishInfo = $englishModel->data;

			foreach ($types as $k => $v) {
				
				$oQuestion = new \model\english_question;

				$oQuestion->data = [
					'english' => $englishInfo['english'],
					'english_id' => $englishInfo['id'],
					'create_time' => $datetime,
				];


				switch ($k) {
					case "question_by_english":
						$oQuestion->data['question'] = '请写出("'.$englishInfo['english'].'")中文释义';
						$oQuestion->data['answer'] =  $englishInfo['chinese'];
						$oQuestion->data['type'] = $v;
						break;

					case "question_by_chinese":
						$oQuestion->data['question'] = '请写出("'.$englishInfo['chinese'].'")英文释义';
						$oQuestion->data['answer'] =  $englishInfo['english'];
						$oQuestion->data['type'] = $v;
						break;
				}

				$oQuestion->save();
			}

		}else{
			\error(-1,"添加问题异常");
		}


	}


	function getEnglishLs($params){

		$sql = "";

		if($params['datetime'] && !empty($params['datetime'])){
			$sql = "where create_time like '%".$params['datetime']."%'";			
		}

		$res = \model\english::finds($sql);

		return $res;


	}


	function getQuestionLs($params){

		$sql = "";

		if($params['datetime'] && !empty($params['datetime'])){
			$sql = "where create_time like '%".$params['datetime']."%'";			
		}

		$res = \model\english_question::finds($sql,'question,answer');

		return $res;

	}















}