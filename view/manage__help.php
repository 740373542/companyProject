<!DOCTYPE html>
<html>
<head>
    <title>帮助文档--易学倍增</title>
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
	<link rel="stylesheet" type="text/css" href="/css/normallize.css">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			font-family: 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif;
		}
		.helpcursor{
			cursor: pointer;
		}
		a{
			text-decoration: none;
		}
		hr{
			width: 100%;
			height: 1px;
			border: 0;
			background: #DDDDDD;
			margin-bottom: 16px;
		}
    h1, h2, h3, h4, h5, h6 {
      display: block;
      position: relative;
    }
    /*.name-mark {
      position: absolute;
      top: -120px;
      width:10px;height:10px;
    }*/
		h1{
      border-top: 1px solid #f1f1f1;
			color: #2c3e50;
			font-weight: 500;
			margin:30px 0;
			font-size: 30px;
		}
		h2{
			font-size: 23px;
			color: #2c3e50;
			font-weight: 600;
			margin:16px 0;
		}
		h3{
			margin: 14px 0;
			color: #2c3e50;
			font-weight: 400;
		}
		h4{
			margin:6px 0;
			cursor: pointer;
			font-size: 15px;
			color: #7f8c8d;
			font-weight: 300;
		}
		h4:hover{
			margin:6px 0;
			font-size: 15px;
			color: #7f8c8d;
			font-weight: 300;
			box-sizing: border-box;
			color: #42b983;
		}
		h5{
			cursor: pointer;
			font-size: 13px;
			margin-left: 10px;
			margin-bottom: 5px;
			color: #34495e;
			font-weight: 400;
		}
		h6{
			cursor: pointer;
			margin-left: 20px;
			margin-bottom: 5px;
			color: #34495e;
			font-size: 13px;
			font-weight: 400;
		}
		p{
			font-size: 15px;
			color: #34495e;
			margin-bottom: 15px;
			word-spacing: 2px;
			font-weight: 400;
			font-family: 'Source Sans Pro';
		}
		.help-selectedline{
			border-bottom: 2px solid blue;
		}
		.help-header{
			/*background: green;*/
			background: white;
			position: fixed;
			top: 0;
			display: flex;
			justify-content: center;
			width: 100%;
			height: 61px;
			flex-direction: space-between;
			padding:0 60px; 
			border-bottom: 1px solid #EEEEEE;
      z-index: 999;
		}
		.help-body{
			display: flex;
			justify-content: flex-start;
		}
		.help-leftnav{
			display: flex;
			flex-direction: column;
			justify-content: flex-start;
			align-items: flex-start;
			overflow-y: auto;
			overflow-x: hidden;
			box-sizing: border-box;
			position: fixed;
			top:61px;
			width: 310px;
			height: 100%;
			padding: 60px;
			border-right: 1px solid #eeeeee;
		}
		.help-content{
			display: flex;
			flex-direction: column;
			justify-content: flex-start;
			align-items: flex-start;
			overflow-y: auto;
			overflow-x: hidden;
			margin-top: 61px;
			margin-left: 310px;
			width: 100%;
			height: 100%;
			padding-left:28px;
			box-sizing: border-box;
		}
		.help-content-box{
			flex-direction: column;
			justify-content: flex-start;
			align-items: flex-start;
			max-width: 800px;
		}
		.contentimport{
			margin-bottom: 18px;
			width: 100%;
			display: flex;
			flex-direction: column;
			align-items: flex-start;
			background: #F8F8F8;
			border-radius: 4px;
			padding: 20px 20px 0 20px;
			box-sizing: border-box;

		}
		.contentwarn{
			position: relative;
			margin-bottom: 18px;
			width: 100%;
			display: flex;
			flex-direction: column;
			align-items: flex-start;
			background: #F8F8F8;
			padding: 20px 20px 0 20px;
      margin-bottom: 80px;
			border-left: 5px solid #FF6666;
			box-sizing: border-box;
		}
		.contentwarn-mark{
			border-radius: 100%;
			width: 20px;
			height: 20px;
			background: #FF6666;
			position: absolute;
			left: -13px;
			color: white;
			display: flex;
			justify-content: center;
			align-items: center;
		}
    .maodian{
      padding-top: 80px;
      margin-top: -80px;
      overflow: hidden;
    }

	</style>

</head>
<body>

<div class="help-header">
	<div class="help-headerleft">
		<img src="">
	</div>
	<div class="help-headerright"></div>
</div> 


<div class="help-body">
	<div class="help-leftnav">
		
    <a href="#name_ChaoJiGuanLi"><h3 class="strong">超级管理</h3></a>

      <a href="#name_ChuangJianGongSi"><h4>创建公司</h4></a>
      <!-- <a href="#name_GongSiLieBiao"><h4>公司列表</h4></a> -->
        <!-- <a href="#name_jichu"><h5>独立版本</h5></a>
    		
    		  <h6>CDN</h6>
    		<h5>NNM</h5>
    		  <h6>独立构建vs运行时构建</h6>
  		    <h6>CSP环境</h6>
    		<h5>命令行工具</h5>
    		<h5>开发版本</h5
    		<h5>BOWER</h5>
    		<h5>AMD模块加速器</h5>
      <a href="#name_login"><h4>登录</h4></a> -->


    <a href="#name_KeChengGuanLi"><h3 class="strong">课程管理</h3></a>
      <a href="#name_GongSiKeCheng"><h4>公司课程</h4></a>
      <a href="#name_GongGongKeCheng"><h4>公共课程</h4></a>
      <!-- <h4>注册列表</h4> -->


     <!--    <h5>独立版本</h5>
          <h6>CDN</h6>
        <h5>NNM</h5>
          <h6>独立构建vs运行时构建</h6>
          <h6>CSP环境</h6>
        <h5>命令行工具</h5>
        <h5>开发版本</h5>
        <h5>BOWER</h5>
        <h5>AMD模块加速器</h5> -->
    <a href="#name_JiChuShuJu"><h3 class="strong">基础数据</h3></a>
      <a href="#name_BuMenGuanLi"><h4>部门管理</h4></a>
      <a href="#name_YuanGongShenHe"><h4>员工审核</h4></a>
      <a href="#name_XiuGaiHangYeXinXi"><h4>修改行业信息</h4></a>
      <a href="#name_XiuGaiGongSiYaoQingMa"><h4>修改公司邀请码</h4></a>
  <!--     <h4>自定义指令</h4>
      <h4>混合</h4>
      <h4>单文件组建</h4>
      <h4>生产环境部署</h4>
      <h4>路由</h4>
      <h4>状态管理</h4>
      <h4>单元测试</h4>
      <h4>服务端渲染</h4> -->
    <a href="#name_RenWuGuanLi"><h3 class="strong">任务管理</h3></a>
      <a href="#name_RenWuFenPeiRenWu"><h4>任务分配</h4></a>
      <!-- <h4>过渡效果</h4>
      <h4>Rander函数</h4>
      <h4>自定义指令</h4>
      <h4>混合</h4>
      <h4>单文件组建</h4>
      <h4>生产环境部署</h4>
      <h4>路由</h4>
      <h4>状态管理</h4>
      <h4>单元测试</h4>
      <h4>服务端渲染</h4> -->

    <a href="#name_MoKuaiGuanLi"><h3 class="strong">模块管理</h3></a>
      <a href="#name_LunTan/WenDaGuanLi"><h4>论坛/问答管理</h4></a>
      <a href="#name_PingLunGuanLi"><h4>评论管理</h4></a>
      <!-- <h4>从Vue 0.6.x迁移到 1.0</h4>
      <h3>更多</h3>
      <h4>对比其他框架</h4>
      <h4>加入Vue.js社区</h4> -->
	</div>




  <!-- core content -->
	<div class="help-content">

    

    <div class="help-content-box">
      <div style="height:200px"></div>

      <div style="margin-top:-160px;">

      <a name="name_ChaoJiGuanLi"><h1 class="maodian">超级管理<!-- <div class="name-mark" style="top: -200px;">xxxx</div> --></h1></a>
  
        <a name="name_ChuangJianGongSi"><h2 class="maodian">创建公司<!-- <div class="name-mark"></div> --></h2></a>

        <hr>

        <p>
          <b>公司名称：</b>输入要管理的公司准确名称；
          <b>注册帐号：</b>设置公司管理员默认登陆帐号；
          <b>登陆密码：</b>设置公司管理员默认登陆密码；
          <b>管理员：</b>设置管理员昵称；
        </p>
        

        

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.所有内容都必须填写完整</p>
          <p>2.账号建议是管理员的手机号</p>
          <p>3.公司账号密码就是管理员登陆凭证</p>
          <p>5.点击重置按钮可以重新写入公司信息</p>
          <p>4.公司重名或者账号重复会导致注册失败的</p>
        </div>


      </div>


       <!--  <h2>公司列表<a name="name_GongSiLieBiao"><div class="name-mark"></div></a></h2>
        <hr>
        <p></p>
        

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p></p>
        </div> -->

      <div style="height:100px;"></div>


      <a name="name_KeChengGuanLi"><h1 class="maodian">
        课程管理
        <!-- <div class="name-mark" style="width:10px;height:10px;"> </div> -->
      </h1></a>

        <a href="/adm_course/index" name="name_GongSiKeCheng"><h2 class="maodian"><!-- <div class="name-mark" style="width:10px;height:10px;"> </div> -->公司课程</h2></a>
        <hr>
        <p>
          <b>状态：</b>主要区分课程当前使用状态，打对号的为正在启用状态，没有对号的为禁用状态；
          <b>课程名称：</b>课程的主要标题；
          <b>修改：</b>可以修改课程的名称和主要内容，以及添加课程包含视频； <a href="/adm_course/detail?id=67">查看详情</a>
          <b>删除：</b>删除选中的课程；
        </p>
        

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.搜索输入框请输入课程名称关键字或准确的课程名称</p>
          <p>2.添加课程功能输入的课程名称不要为空</p>
          <p>3.新添加的课程默认是没有内容和视频，需要点击修改为课程添加内容和上传视频</p>
          <p>5.新添加的课程默认状态为禁用，可以点击选择框启用课程</p>
          <p>4.启用课程以前推荐先把课程的详情内容都完善</p>
        </div>


        <!-- <h2><a name="name_GongGongKeCheng"><div class="name-mark" style="width:10px;height:10px;"> </div></a>公共课程</h2>
        <hr>
        <p>Vue 
        在绝大多数情况下使用 <code style="font-weight: 600;">template</code> 来创建你的 HTML。然而在一些场景中，你真的需要 JavaScript 的完全编程的能力，这就是 render 函数，它比 template 更接近编译器。</p>
        
        <div class="contentimport">
          <p>比较醒目</p>
          <p>实打实的跋涉就好大噶手机号给大声疾呼高大上就哈根达斯家会给大声疾呼啊就很伤感的啊就是打开噶金黄色啊上课感觉哈萨克感觉哈说感觉很啊啥的感觉哈说感觉哈说的感觉哈说的感觉哈说的感觉哈说的感觉哈说到结婚噶圣诞节好噶时代感觉哈卡上噶金黄色看看噶金黄色看噶金黄色看噶金黄色</p>
        </div>

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>实打实的跋涉就好大噶手机号给大声疾呼高大上就哈根达斯家会给大声疾呼啊就很伤感的啊就是打开噶金黄色啊上课感觉哈萨克感觉哈说感觉很啊啥的感觉哈说感觉哈说的感觉哈说的感觉哈说的感觉哈说的感觉哈说到结婚噶圣诞节好噶时代感觉哈卡上噶金黄色看看噶金黄色看噶金黄色看噶金黄色</p>
        </div> -->
      <div style="height:100px;"></div>
        




      <a name="name_JiChuShuJu"><h1 class="maodian">
      基础数据
      <!-- <div class="name-mark" style="width:10px;height:10px;"> </div> -->
      </h1></a>

        <a href="/adm_company_role/manage" name="name_BuMenGuanLi"><h2 class="maodian">部门管理<!-- <div class="name-mark" style="width:10px;height:10px;"> </div> --></h2></a>
        <hr>
        <p>
          <b>添加部门：</b>输入要添加的部门名称；
          <b>选择按钮：</b>查看部门现有员工详情和添加员工，移除员工的操作；
          <b>删除按钮：</b>移除所选择的部门；
          <b>蓝色标签：</b>表示当前部门下所有员工，点击叉号可以移除对应员工；
          <b>搜索输入框：</b>搜索公司现有员工名称；
          <b>黄色标签：</b>搜索到的员工列表，点击加号可以把对应员工添加到指定部门；
        </p>


        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.添加部门时所输入的部门名称不能为空，并且不能输入现已存在的部门名称</p>
          <p>2.只有点击选择按钮才能查看当前选中部门的员工详情</p>
          <p>3.搜索添加员工时要输入员工名称关键字或者准确的员工名称</p>
        </div>


        <a href="/adm_invite/ls#top" name="name_YuanGongShenHe"><h2 class="maodian">员工审核<!-- <div class="name-mark" style="width:10px;height:10px;"> </div> --></h2></a>
        <hr>
        <p>
          <b>真实姓名：</b>员工帐号注册时所填的真实姓名；
          <b>邮箱：</b>员工帐号注册时所填的邮箱信息；
          <b>手机：</b>员工帐号注册时所填的手机号码（员工帐号登陆用户名）；
          <b>批准/拒绝：</b>批准按钮可以把申请加入公司的员工帐号变为公司成员，拒绝按钮可以把公司现有员工移除出公司；
        </p>
       

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.搜索输入框要输入员工昵称的关键字或者准确的员工昵称</p>
          <p>2.如果操作列现实管理员按钮表示当前一行信息为管理员信息，无法操作批准和拒绝</p>
          <p>3.如果当前操作列按钮显示为批准，表示该员工未通过审核，点击批准可以使其通过审核加入公司；如果当前操作列按钮显示为拒绝，表示为当前员工是公司已有员工，点击拒绝可以将所选员工移除出公司</p>
        </div>



        <a href="/adm_company/index" name="name_XiuGaiHangYeXinXi"><h2 class="maodian">修改行业信息<!-- <div class="name-mark" style="width:10px;height:10px;"> </div> --></h2></a>
        <hr>
        <p>
          <b>灰色代表已选状态：</b>当前公司所属行业；
          <b>蓝色代表未选状态：</b>尚未添加的公司行业；
          <b>删除（-）/添加（+）：</b>点击已经选中的行业可以删除，点击未选中的可以添加；
          
        </p>
        

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.斟酌考虑贵公司属于的行业类型，添加或者删除之后都会在公司信息中显示</p>
          <p>2.可以不选或者多选，遵循公司的意愿</p>
          <p>3.请勿进行没有意义的点击，以免造成不必要的麻烦</p>
        </div>

        <a href="/adm_company_join/index" name="name_XiuGaiGongSiYaoQingMa"><h2 class="maodian">修改公司邀请码<!-- <div class="name-mark" style="width:10px;height:10px;"> </div> --></h2></a>
        <hr>
        <p>
          <b>公司名称：</b>当前管理员帐号所属的公司名称；
          <b>原邀请码：</b>公司当前的邀请码；
          <b>新邀请码：</b>输入所要修改的公司邀请码；
          
        </p>
        

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.公司的名称个在这里是无法修改的</p>
          <p>2.修改公司邀请码需要慎重，一旦修改客户端申请加入公司时就必须输入心的邀请码</p>
          <p>3.输入新邀请码时不能为空，不能和公司当前邀请码重复</p>
        </div>




        <div style="height:100px;"></div>


      <a name="name_RenWuGuanLi" ><h1 class="maodian">
        任务管理
        <!-- <div class="name-mark" style="width:10px;height:10px;"> -->
      </h1> </a>

        <a href="/adm_task/index#top" name="name_RenWuFenPeiRenWu"><h2 class="maodian">任务分配<!-- <div class="name-mark" style="width:10px;height:10px;"> --> </h2></a>
        <hr>
        <p>
          <b>添加任务：</b>输入要添加的任务标题（主题），完成任务所奖励的积分，选择要添加的任务类型；
          <b>设置权限：</b>可以把当前任务的权限分配给公司已有的部门；
          <b>删除：</b>删除当前选中的任务；
          <b>分配选择框：</b>区分当前部门是否有当前选择任务的权限；
        </p>


        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.任务搜索框需输入已有任务名称的关键字或者准确的任务名称</p>
          <p>2.部门搜索框虚输入公司已有部门名称关键字或者准确的部门名称</p>
          <p>3.点击设置权限按钮可以看到当前选择任务的权限详情</p>
          <p>4.分配列选择框已打对号的为部门有当前选择任务的权限，反之为没有权限；已有权限的部门列表框会变成蓝色，以便区分是否有权限</p>
          <p>5.添加任务时所有信息都不能为空，选择完任务类型以后会有详情列表，例如任务类型为课程时会需要精确选择到某一个课程来针对性创建任务</p>
        </div>

       
      <div style="height:100px;"></div>
        



      <a name="name_MoKuaiGuanLi"><h1 class="maodian">
        模块管理
      <!-- <div class="name-mark" style="width:10px;height:10px;"> </div> -->
      </h1></a>
        <a href="/adm_news/index#top" name="name_LunTan/WenDaGuanLi"><h2 class="maodian">论坛/问答管理<!-- div class="name-mark" style="width:10px;height:10px;"> </div> --></h2></a>
        <hr>
        <p>
          <b>类型选择按钮：</b>用来选择模块的类型，例如论坛和问答；
          <b>添加标题：</b>添加新的主题或者话题以及该主题的详细内容；
          <b>最新：</b>以创建时间来排列所有任务列表；
          <b>精选：</b>当主题被设置为精选时会在该选项列表显示；
          <b>编辑：</b>可以修改当前标题内容，包括标题的名称或者详细内容；
          <b>设置精选：</b>把当前选中的标题设置为精选标题；
          <b>删除：</b>删除当前选中的标题；
        </p>

        

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.搜索输入框请输入标题的关键字或者准确的标题名称，输入是请确认当前所在选项，例如当前所在是最新选项中只能搜索到当前列表下的主题，当切换到精选选项下需要重新输入要查询的主题</p>
          <p>2.添加标题时标题名称以及内容最好不要为空</p>
          <p>3.设置精选需要输入级别，级别以数字大小来区别该主题的精选级别，级别数字越大主题显示就会更靠前</p>
        </div>


        <a href="/adm_comment/index#top" name="name_PingLunGuanLi"><h2 class="maodian">评论管理<!-- <div class="name-mark" style="width:10px;height:10px;"> </div> --></h2></a>
        <hr>
        <p>
          <b>昵称：</b>当前评论人的昵称；
          <b>评论内容：</b>针对某个话题或者某个问题的评论或者回答；
          <b>评论时间：</b>发表回答或者评论回复的时间；
          <b>删除：</b>管理员可以论情况来删除所选评论；
        </p>
        

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.评论列表会根据员工评论的时间来排列</p>
          <p>2.操作删除会把选择的评论内容移除，包括客户端App中的显示</p>
        </div>



    </div>









  </div>












</div>

	
	
	
</body>