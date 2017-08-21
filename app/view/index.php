<template id="vue_page_index">

		<div class="container-fluid" style="background:#E2E2E0;">

			<div class ="row" style="height:90px;box-shadow:0px 0px 10px #202020;position:fixed;top:0;left:0;width:100%;margin:0;z-index:999">
				<div class="col-md-4 col-xs-3" style="background:#202020;height:90px;display:flex;align-items:center;">
					<div style="width:0.6rem;height:0.6rem;background-image:url('/assets/images/svg/list.svg');background-size:cover;background-position:center center">
					</div>
				</div>

				<div class="col-md-4 col-xs-6" style="background:#202020;height:90px;display:flex;justify-content:center;align-items:center;color:#FFF;font-size:20px;font-weight:bold">
					Last Hope
				</div>

				<div class="col-md-4 col-xs-3" style="background:#202020;height:90px;display:flex;justify-content:flex-end;align-items:center;">
					<div style="width:1.1rem;height:1.1rem;background:#FFF;border-radius:100%;display:flex;justify-content:center;align-items:center">
					 	<div style="width:1.05rem;height:1.05rem;border-radius:100%;background-image:url('/assets/images/icons/header.jpeg');background-size:cover;background-position:center center"></div>
					</div>
				</div>
			</div>


			<div class="row" style="height:150px"></div>


			<div class ="row" >
				<div class="col-xs-10 col-xs-offset-1 col-sm-10  col-sm-offset-1 col-md-8 col-md-offset-2">

					<div class ="row">
						<div class="col-md-12 col-xs-12 col-sm-12 padding-null" style="height:300px;background:#FFF">
							
							<div style="width:100%;height:13%;display:flex">
								<div style="width:85%;height:100%;"></div>

								<div style="width:15%;height:100%;display:flex;justify-content:flex-end;align-items:center;">
									<div style="width:0.666667rem;height:0.666667rem;margin-right:0.133333rem;background-image:url('/assets/images/svg/love.svg');background-size:cover;background-position:center center"></div>
								</div>
							</div>

							<div style="width:100%;height:15%;-background:red;display:flex;justify-content:center;align-items:center;font-size:22px;color:#030303">
								My Mood
							</div>


							<div style="width:100%;height:6%;"></div>

							<div style="width:100%;height:40%;display:flex;justify-content:center;align-items:center;">
								<div style="width:80%;height:100%;font-size:16px;color:#696969">
									<p>&nbsp&nbsp&nbsp&nbsp不知道要如何努力才能到达自己渴望的目标，但每天都在努力的往上爬，可能就是为了一个梦想，踏过了很多不可思议的困难，也愿留下自己一些点滴来记录浅薄的理念。</p>
								</div>
							</div>

							<div style="width:100%;height:15%;"></div>

							<div style="width:100%;height:2%;background:#000000;"></div>
						</div>
					</div>

					<div class ="row" style="height:1.066667rem"></div>


					<div class="row">
						<div class="padding-null"></div>
					</div>






					<div class="row">
						<div class="col-sm-4 col-xs-6 padding-null" style="height:5.333333rem;margin-bottom:5px;display:flex;justify-content:center;align-items:center;"
							v-for="v in cates"
						>

							<div style="width:90%;height:94%;background:#FFF;display:flex;flex-direction:column;box-shadow:0 4px 6px 0 rgba(0,0,0,0.2), 0 3px 10px 0 rgba(0,0,0,0.19);cursor:pointer">
								<div style="height:68%;">
									<img :src="v.bg_img"  style="width:100%;height:100%" />
								</div>

								<div style="height:15%;display:flex;justify-content:center;align-items:center;font-size:14px;font-weight:bold;color:#616161">
									{{v.name}}
								</div>
							</div>


						</div>

					</div>

				</div>
			</div>

		</div>


		
</template>

<script type="text/javascript">
	$$.component.index = $$.child({

		el:"#vue_page_index",

		EVENT:['init_data'],

		data:{
			cates:"",
		},


		methods:{
			call_init_data:function(datas){
				var self = this 
				self.cates = datas.cates
			},

		},

	})
</script>

