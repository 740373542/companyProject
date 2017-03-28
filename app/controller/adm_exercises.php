<?php
namespace controller;

class adm_exercises extends adm_controller
{
	function index(){
    $__nav = "/adm_exercises/index";
		include \view('adm_exercises_index');
	}

	function ls (){
		$data = $_GET;
		if(empty($data['page'])) $data['page'] = 1;
		if(empty($data['length'])) $data['length'] = 10;
		$count = 0; 
    $search = $data['search'];
		$ls = $this->di['CommExercisesService']->getls($search,$count,[
			'page' => $data['page'],
			'length' => $data['length'],
			]);
		\vd($ls,'++++');
		$this->data([
			'ls' => $ls,
			'count' => $count,
			]);
 	}

 	function modify_exercises(){
 		$data = $_GET;
 		if ($data['id']) {
 			$oCourseTest = \model\course_test::loadObj($data['id']);
 			// \vd($oCourseTest,'++++');
 			// \vd($oCourseTest->data,'-----');
	 		$__ls = $oCourseTest->data;
	 		$options = $__ls['options'];
	 		\vd($options,'optionsoptions');
	 		$correct = $__ls['answers'];
	 		\vd($correct,'$correct$correct');
	 		$title = $__ls['title'];
	 		$id = $__ls['id'];
	 		include \view('adm_exercises');
 		}else{
 			$options = '[]';
	 		$correct = '[]';
	 		\vd($options,'optionsoptions');
	 		\vd($correct,'correctcorrect');
			include \view('adm_exercises');
 		}

	 	
 		
 	}
 	function exercises_save(){
 		$data = $_GET;
 		// $data['options'] = str_replace("\\", "",$data['options']);	
 			if (empty($data['title'])) {
	      \except(-1,'标题为空');
	 		}




	 		$options = \de($data['options']);

	 		// $options = $data['options'];
	 		\vd($options,'答案选项');
	 		foreach ($options as $v) {
	 			if(empty($v)){
	      	\except(-1,'有空内容');
	 			}
	 		}

	 		$correct = \de($data['correct']);
	 		\vd($correct,'######');
	 		if(!is_array($correct)){
	      \except(-1,'没有答案');
	 		}


			if($data['id']) {
					$user_id = $_SESSION['user']['id'];
	 				$this->di['CheckService']->CheckData($data['id'],$user_id,'course_test');
		 			$newexercises = \model\course_test::loadObj($data['id']);
		 			$newexercises->data=[
		 				'title' => $data['title'],
		 				'options' => $data['options'],
		 				'answers' => $data['correct'],
            'company_id' => $_SESSION['user']['company_id'],
		 			];
		 			$newexercises->save();
		 			$this->data(['ok']);
	 		}else{
	 				$newexercises = new \model\course_test;
	 				$newexercises->data=[
		 				'title' => $data['title'],
		 				'options' => $data['options'],
		 				'answers' => $data['correct'],
            'company_id' => $_SESSION['user']['company_id'],
		 			];
		 			$newexercises->save();
		 			$this->data(['ok']);
	 		}

 	}

 	function aj_deletedcourse(){
 		$data = $_GET;
 		$user_id = $_SESSION['user']['id'];
	 		$this->di['CheckService']->CheckData($data['id'],$user_id,'course_test');
 		\model\course_test::deleteById($data['id']);
 		$this->data(true);
 	}


}