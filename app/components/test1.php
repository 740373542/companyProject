<template id="test1">
	

	<div class="test_container">
		<input type="radio" name="radio_set" checked="checked" id="radio_1">
		<a href="#st_1">clip剪裁</a>
		<input type="radio" name="radio_set" id="radio_2">
		<a href="#st_2">duration持续</a>

		<input type="radio" name="radio_set" id="radio_3">
		<a href="#st_3">delay延迟</a>

		<input type="radio" name="radio_set" id="radio_4">
		<a href="#st_4">memory内存</a>

		<input type="radio" name="radio_set" id="radio_5">
		<a href="#st_5">record记录</a>


		<div class="test_scroll">

			<div class="test_panel" id="st_1">
				<div class="test_box_header">
					<div class="sanjiao"></div>
				</div>

			
				<div class="title_font" style="font-size:20px;width:100%;text-align:center">clip剪裁</div>
				<div style="width:100%;text-align:center;font-family:'SA';font-size:50px;color:red">last hope</div>
			</div>

			<div class="test_panel" id="st_2">
				<div ></div>
				<div class="title_font" style="font-size:20px;width:100%;text-align:center">duration持续</div>
				<div style="width:100%;text-align:center;font-family:'SA';font-size:50px;color:red">asdasdasdasdasdasdasasdasdasdasdasdasdasdas</div>
			</div>

			<div class="test_panel" id="st_3">
				<div ></div>
				<div class="title_font" style="font-size:20px;width:100%;text-align:center">delay延迟</div>
				<div style="width:100%;text-align:center;font-family:'SA';font-size:50px;color:red">asdasdasdasdasdasdasasdasdasdasdasdasdasdas</div>
			</div>

			<div class="test_panel" id="st_4">
				<div ></div>
				<div class="title_font" style="font-size:20px;width:100%;text-align:center">memory内存</div>
				<div style="width:100%;text-align:center;font-family:'SA';font-size:50px;color:red">asdasdasdasdasdasdasasdasdasdasdasdasdasdas</p>
			</div>

			<div class="test_panel" id="st_5">
				<div ></div>
				<div class="title_font" style="font-size:20px;width:100%;text-align:center">record记录</div>
				<div style="width:100%;text-align:center;font-family:'SA';font-size:50px;color:red">asdasdasdasdasdasdasasdasdasdasdasdasdasdas</p>
			</div>
			
		</div>


	</div>	


</template>

<script type="text/javascript">
	$$.comp({
		name:'test1',
		el:"#test1",
	})
</script>


<style type="text/css">

	.test_container{
		position:absolute;
		width:100%;
		height:100%;
		left:0;
		top:0;
		overflow: hidden;
	}



	.test_container > input,
	.test_container > a{
		width:20%;
		height:34px;
		line-height: 34px;
		position:fixed;
		bottom: 0;
		z-index: 10;

	}

	.test_container > input{
		opacity:0;
		z-index: 999;
	}

	.test_container > a{
		font-weight: bold;
		font-size:16px;
		background:#e23a6e;
		text-align:center;
		color:#FFF;
	}

	#radio_1,#radio_1 + a{
		left:0%;
	}

	#radio_2,#radio_2 + a{
		left:20%;
	}

	#radio_3,#radio_3 + a{
		left:40%;
	}

	#radio_4,#radio_4 + a{
		left:60%;
	}

	#radio_5,#radio_5 + a{
		left:80%;
	}

	.test_container input:checked:hover + a,
	.test_container input:checked + a{
		background:red;
	}

	.test_container input:checked + a:after{
		content:"";
		width:0;
		height:0;
		border:20px solid transparent;
		border-bottom-color: red;
		position:absolute;
		bottom: 100%; 
		left:50%;
		margin-left: -20px;
	}

	.test_container input:hover + a{
		background:#616161;
	}

	/*content*/

	.test_scroll,
	.test_panel{
		width: 100%;
		height: 100%;
		position: relative;
	}


	.test_scroll{
		left:0;
		top:0;
		transform:translate3d(0,0,0);
		backface-visibility:hidden;
		transition:all 0.6s ease-in-out;
	}


	#radio_1:checked ~ .test_scroll{
		transform:translateY(0%);
	}

	#radio_2:checked ~ .test_scroll{
		transform:translateY(-100%);
	}

	#radio_3:checked ~ .test_scroll{
		transform:translateY(-200%);
	}

	#radio_4:checked ~ .test_scroll{
		transform:translateY(-300%);
	}

	#radio_5:checked ~ .test_scroll{
		transform:translateY(-400%);
	}

	.test_box_header{
		width:100%;
		height:200px;
		display: flex;
		justify-content: center;
	}

	.sanjiao{
		width:200px;
		height:200px;
		background:#000000;
		transform:translateY(-50%) rotate(45deg);
	}

	#radio_1:checked ~ .test_scroll #st_1 .title_font,
	#radio_2:checked ~ .test_scroll #st_2 .title_font,
	#radio_3:checked ~ .test_scroll #st_3 .title_font,
	#radio_4:checked ~ .test_scroll #st_4 .title_font,
	#radio_5:checked ~ .test_scroll #st_5 .title_font{
		animation-name:Test_one;
		animation-duration: 2s;
		animation-fill-mode:forwards;
		animation-delay:0.3s;
	}

	@keyframes Test_one{
		from{
			opacity: 0;
			transform:translateY(-30px);
		}

		to{
			opacity: 1;
			transform:translateY(0px);
		}
	}

	@media screen and (max-width: 520px){

	}





</style>
