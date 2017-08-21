<?php 
	require \view("header");	
?>

<div id="page_english" v-cloak>

	<br/>
	<br/>

	英文:<input type="text" v-model="english" />
	中文:<input type="text" v-model="chinese" />
	<input type="button" value="提交" @click="onSubmit()" />

	<br/>
	<br/>
	<br/>
	<hr/>

	<div v-if="container==''">还未添加单词</div>
	<div v-if="container!=''">
		<div v-for="(v,k) in container">
			{{k+1}}:{{v}}
		</div>
	</div>


	<br/>
	<br/>
	<br/>
	<hr/>

	<div v-if="!ready">
		<br/>
		<br/>

		<Date-picker type="date" placeholder="选择日期" style="width: 200px" @on-change="changeDate"></Date-picker>

		<div v-if="englishs_by_date != ''">
			<div v-for="(v,k) in englishs_by_date">
				{{k}}:{{v.english}}
			</div>
		</div>

		<br/>
		<br/>
		<input type="button" value="开始答题" @click="onReady()"/>
	</div>

	<br/>
	<br/>
	<br/>
	<hr/>


	<div v-if="question_box != ''">
			
		<div style="color:red;font-weight:bold">{{question_current}}:</div>
		<br/>
		答案:<input type="text" v-model="answer" />
		<input type="submit" value="提交" @click="onDone" />	

	</div>

	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>

</div>

<script type="text/javascript">
	$$.vue({
		el:"#page_english",

		data:{

			english:"",

			chinese:"",

			container:[],

			ready:false,

			datetime:"",

			englishs_by_date:[],

			question_box:[],

			question_index:0,

			question_current:"",

			answer_current:"",

			answer:"",



		},

		methods:{

			onSubmit:function(){

				var self = this

				$e = self.english

				$c = self.chinese

				$$.ajax({

					type:"POST",

					url:"/english/addEnglish",

					data:{

						english:$e,

						chinese:$c,

					},

					succ:function(res){

						self.container.push(self.english);

						self.english = ""
						self.chinese = ""

					},

					error:function(res){

						alert(res.msg)

						self.english = ""
						self.chinese = ""

					}
				})

				
			},

			changeDate:function(date){
				var self = this 
				self.datetime = date
				$$.ajax({
					url:"/english/ls",
					data:{
						datetime:date,
					},
					succ:function(res){
						self.englishs_by_date = res.ls
											},
				})
			},

			onReady:function(){

				var self = this 

				if(self.datetime == ""){
					alert("请选择时间")
					return
				}

				$$.ajax({
					url:"/english/getQuestions",
					data:{
						datetime:self.datetime,
					},
					succ:function(res){
						self.question_box = res.ls
						self.question_current = self.question_box[self.question_index].question;
						self.answer_current = self.question_box[self.question_index].answer;

					}

				})

			},

			onDone:function(){

				var self = this

				self.question_index += 1;

				if(self.answer_current != self.answer){
					alert("答案错误!")
					return
				}

				if(self.question_index >= self.question_box.length){
					alert("恭喜闯关成功")
					self.question_current = "";
					self.answer_current = "";
					self.answer = "";
					return
				}

				self.answer = "";
				self.question_current = self.question_box[self.question_index].question;
				self.answer_current = self.question_box[self.question_index].answer;
			},



		}
	})
</script>


<style type="text/css">
	[v-cloak]{
　　　　display:none;
　　}
</style>