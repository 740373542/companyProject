<!DOCTYPE html>
<html>
<head>
    <title>易学倍增--管理员如何操作</title>
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
	<link rel="stylesheet" type="text/css" href="/css/normallize.css">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			font-family: 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif;
		}
    img {
      border:1px solid #999;
    }
		.helpcursor{
			cursor: pointer;
		}
		a{
			text-decoration: none;
		}
    a:link { 
    font-size: 15px; 
    color: #4A81F8; 
    text-decoration: none; 
    } 
    a:visited { 
    font-size: 15px; 
    color: #4A81F8; 
    text-decoration: none; 
    } 
    a:hover { 
    font-size: 15px; 
    color: #4A81F8; 
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
      /*background: blue;*/
    }

    .name-mark {
      position: absolute;
      top: -140px;
      width:10px;height:10px;
      /*background:#FF0000;*/
    }

		h1{
			color: #2c3e50;
			font-weight: 500;
			margin:30px 0;
			font-size: 30px;
		}
		h2{
			font-size: 23px;
			color: #2c3e50;
			font-weight: 600;
			/*margin:16px 0;*/
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
      position: relative;
    }
    .maodian2{
      position: absolute;
      top: -80px;
      background: black;
    }

	</style>

</head>
<body>

<div class="help-header" style="opacity:1;">
	<div class="help-headerleft">
		<img src="">
	</div>
	<div class="help-headerright"></div>
</div> 


<div class="help-body">
	<div class="help-leftnav">
		

    <a href="/adm_login/" target="_blank"><h3 class="strong">登录后台</h3></a>

    <a href="#name_QiYeGuanLi"><h3 class="strong">企业管理</h3></a>

      <a href="#name_SheZhiQiYeXinXi"><h4>设置企业信息</h4></a>
      <a href="#name_XiuGaiYaoQingMa"><h4>修改企业邀请码</h4></a>

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


    <a href="#name_YuanGongGuanLi"><h3 class="strong">员工管理</h3></a>
      <a href="#name_GuanLiFenZu"><h4>管理分组</h4></a>
      <a href="#name_GuanLiYuanGong"><h4>管理员工</h4></a>

    <a href="#name_KeChengGuanLi"><h3 class="strong">课程管理</h3></a>
      <a href="#name_GouMaiKeCheng"><h4>购买课程</h4></a>
      <a href="#name_GongSiKeCheng"><h4>公司课程</h4></a>
      <a href="#name_XiTiLieBiao"><h4>习题列表</h4></a>

    <a href="#name_RenWuGuanLi"><h3 class="strong">任务管理</h3></a>
      <a href="#name_XinJianRenWu"><h4>新建任务</h4></a>
      <a href="#name_FenPeiRenWuGeiYuanGong"><h4>分配任务给员工</h4></a>

    <a href="#name_MoKuaiGuanLi"><h3 class="strong">模块管理</h3></a>
      <a href="#name_PingLunGuanLi"><h4>评论管理</h4></a>
      <a href="#name_LunTanWenDa"><h4>论坛/问答管理</h4></a>


    <a href="#name_RenWuGuanLi"><h3 class="strong">其他</h3></a>
      <a href="#name_YuanGongShenHe"><h4>发布企业文化</h4></a>
      <a href="#name_RenWuFenPeiRenWu"><h4>进行员工调查</h4></a>
      <a href="#name_RenWuFenPeiRenWu"><h4>发布行业信息</h4></a>
      <a href="#name_RenWuFenPeiRenWu"><h4>更多功能正在添加</h4></a>



	</div>




  <!-- core content -->
	<div class="help-content">

<!-- 
    <div class="contentimport">
        <p>请按照</p>
        <p>实打实的跋涉就好大噶手机号给大声疾呼高大上就哈根达斯家会给大声疾呼啊就很伤感的啊就是打开噶金黄色啊上课感觉哈萨克感觉哈说感觉很啊啥的感觉哈说感觉哈说的感觉哈说的感觉哈说的感觉哈说的感觉哈说到结婚噶圣诞节好噶时代感觉哈卡上噶金黄色看看噶金黄色看噶金黄色看噶金黄色</p>
      </div>
 -->

    <div class="help-content-box">
      <div style="height:200px"></div>

      <div style="margin-top:-160px;">


      <h1 class="maodian"><div id="name_QiYeGuanLi" class="maodian2"></div>企业管理</h1>

        <h2 class="maodian"><div id="name_SheZhiQiYeXinXi" class="maodian2"></div>设置企业信息</h2>
        <hr>
        
        <p>
          <a href="/adm_company/index" target="_blank">点这里进入</a>
        </p>
          
        <p>
          <b>取消选中状态：</b>点击已选转态的标签，可以切换到未选状态；
          <b>设置选中状态：</b>点击未选状态的按钮，可以切换到已选状态；
        </p>
      
        <p>
          <img src="/help-assets/行业信息.png" >
        </p>

<!--         <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.所有内容都必须填写完整</p>
          <p>2.账号建议是管理员的手机号</p>
          <p>3.公司账号密码就是管理员登陆凭证</p>
          <p>5.点击重置按钮可以重新写入公司信息</p>
          <p>4.公司重名或者账号重复会导致注册失败的</p>
        </div> -->

        <br /><br /><br />


        <h2 class="maodian"><div id="name_XiuGaiYaoQingMa" class="maodian2"></div>修改企业邀请码</h2>
        <hr>

        <p>
          <a href="/adm_company_join/index" target="_blank">点这里进入</a>
        </p>
                  
        <p>
          <b>提交：</b>填写新的邀请码，确认无误后提交，执行修改；
          <b>重置：</b>清空所输入的邀请码；
        </p>
      
        <p>
          <img src="/help-assets/01.png" >
        </p>

        

        
<!-- 
        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.所有内容都必须填写完整</p>
          <p>2.账号建议是管理员的手机号</p>
          <p>3.公司账号密码就是管理员登陆凭证</p>
          <p>5.点击重置按钮可以重新写入公司信息</p>
          <p>4.公司重名或者账号重复会导致注册失败的</p>
        </div> -->

        <br /><br /><br />


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


      <h1 class="maodian"><div id="name_YuanGongGuanLi" class="maodian2"></div>员工管理</h1>

        <h2 class="maodian"><div id="name_GuanLiFenZu" class="maodian2"></div>管理分组</h2>
        <hr>

        <p>
          <a href="/adm_company_role/manage" target="_blank">点这里进入</a>
        </p>

        <p>
          <b>搜索框：</b>帮助筛选指定员工，快速查看；
          <b>拒绝：</b>从公司移除该员工；
          <b>批准：</b>审核之后，批准该员工进入公司；
        </p>
              
        <p>
          <img src="/help-assets/管理分组.png" >
        </p>

        <br /><br /><br />


<!--         <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">功能注意事项</code>
          <br/>
          <p>1.搜索输入框请输入课程名称关键字或准确的课程名称</p>
          <p>2.添加课程功能输入的课程名称不要为空</p>
          <p>3.新添加的课程默认是没有内容和视频，需要点击修改为课程添加内容和上传视频</p>
          <p>5.新添加的课程默认状态为禁用，可以点击选择框启用课程</p>
          <p>4.启用课程以前推荐先把课程的详情内容都完善</p>
        </div> -->



        <h2 class="maodian"><div id="name_GuanLiYuanGong" class="maodian2"></div>管理员工</h2>
        <hr>

        <p>
          <a href="/adm_invite/ls#top" target="_blank">点这里进入</a>
        </p>

        <p>
          <b>添加部门：</b>输入框输入部门名称点击“添加部门”，执行添加；
          <b>选择部门：</b>选择部门，显示部门下的员工；
          <b>删除部门：</b>删除选中的部门，同事也会删除所属这个部门的所有员工；
        </p>
              
        <p>
          <img src="/help-assets/管理员工.png" >
        </p>

        <br /><br /><br />
        </div>
      <div style="height:100px;"></div>
        


      <h1 class="maodian"><div id="name_KeChengGuanLi" class="maodian2"></div>课程管理</h1>
      
        <h2 class="maodian"><div id="name_GongSiKeCheng" class="maodian2"></div>公司课程</h2>
        <hr>

        <p>
          <a href="/adm_course/index" target="_blank">点这里进入</a>
        </p>

        <p>
          <b>输入框：</b>输入课程名字，筛选指定课程；
          <b>状态栏：</b>被选中是会展示给客户的，未选中状态是不希望展示给客户的；
          <b>删除按钮：</b>删除本条课程信息；
        </p>

        <p>
          <img src="/help-assets/课程列表.png" >
        </p>

        <p>
          <b>添加新课程按钮：</b>会出现一个小的弹窗，输入您要添加的课程名字即可；
        </p>

        <p>
          <img src="/help-assets/添加新课程.png" >
        </p>

        <p>
          <b>修改按钮：</b>点击修改按钮会跳转到新的页面；
        </p>

        <p>
          <img src="/help-assets/修改课程.png" >
        </p>
        <p>
          <img src="/help-assets/包含视频.png" >
        </p>

        <p>
          <b>添加标签按钮：</b>点击添加标签按钮右侧会出现弹窗，列出供你选择的所有标签；
        </p>
        <p>
          <img src="/help-assets/添加标签.png" >
        </p>

        <p>
          <b>标签状态说明：</b>灰色代表已经被选的标签或者是已经拥有的标签，蓝色代表可供选择的标签；
        </p>
        <p>
          <img src="/help-assets/标签状态.png" >
        </p>
        <p>
          <b>删除标签：</b>点击添加标签按钮右侧会出现弹窗，列出供你选择的所有标签；
        </p>
        <p>
          <img src="/help-assets/删除标签.png" >
        </p>
        <br /><br /><br />


        <h2 class="maodian"><div id="name_XiTiLieBiao" class="maodian2"></div>习题列表</h2>
        <hr>
        <p>
          <b>输入框：</b>输入指定的题目名称进行筛选；
          <b>删除按钮：</b>删除这条习题；
        </p>
        <p>
          <img src="/help-assets/习题列表.png" >
        </p>

        <p>
          <b>添加习题按钮：</b>点击添加习题，右侧会出现一个弹窗，可供添加新的习题；
        </p>
        <p>
          <img src="/help-assets/添加习题.png" >
        </p>

        <p>
          <b>修改按钮：</b>点击修改，右侧会出现一个弹窗，可供编辑习题选项内容和答案选项；
        </p>
        <p>
          <img src="/help-assets/修改习题.png" >
        </p>

        <div style="height:100px;"></div>


      <h1 class="maodian"><div id="name_RenWuGuanLi" class="maodian2"></div>任务管理</h1>
      
        <h2 class="maodian"><div id="name_XinJianRenWu" class="maodian2"></div>新建任务</h2>
        <hr>

        <p>
          <a href="/adm_task/index#top" target="_blank">点这里进入</a>
        </p>

        <p>
          <b>添加任务按钮：</b>在弹窗中按照指引添加新任务；；
        </p>

        <p>
          <img src="/help-assets/建任务.png" >
        </p>

        <br /><br /><br />
        <h2 class="maodian"><div id="name_FenPeiRenWuGeiYuanGong" class="maodian2"></div>分配任务给员工</h2>
        <hr>

        <p>
          <a href="/adm_task/index#top" target="_blank">点这里进入</a>
        </p>

        <p>
          <b>设置权限：</b>查看此任务下的部门；
          <b>选中状态：</b>“公司大联欢”任务下的部门是--管理组；
          <b>未选中状态：</b>该部门不在“公司大联欢”任务下；
        </p>
        <p>
          <img src="/help-assets/分配任务.png" >
        </p>

        <div style="height:100px;"></div>


      <h1 class="maodian"><div id="name_MoKuaiGuanLi" class="maodian2"></div>模块管理</h1>
      
        <h2 class="maodian"><div id="name_PingLunGuanLi" class="maodian2"></div>评论管理</h2>
        <hr>

        <p>
          <a href="/adm_comment/index#top" target="_blank">点这里进入</a>
        </p>

        <p>
          <b>删除按钮：</b>删除指定评论；
        </p>

        <p>
          <img src="/help-assets/评论管理.png" >
        </p>

        <br /><br /><br />
        <h2 class="maodian"><div id="name_FenPeiRenWuGeiYuanGong" class="maodian2"></div>论坛/问答管理</h2>
        <hr>

        <p>
          <a href="/adm_news/index#top" target="_blank">点这里进入</a>
        </p>

        <p>
          <b>论坛下拉框：</b>鼠标悬停在“问答”处，可供选择问答或者论坛；
          <b>输入框：</b>在选中的话题下，输入标题筛选出指定的话题；
        </p>
        <p>
          <img src="/help-assets/话题管理.png" >
        </p>
        <p>
          <b>添加话题按钮：</b>添加论坛或者问答下的话题，点击添加话题，右侧会出现弹窗，可供添加；
        </p>
        <p>
          <img src="/help-assets/添加话题.png" >
        </p>

        <p>
          <b>问答管理：</b>在论坛下拉框选中问答后，问答分为“最新”和”精选“，点击可进行切换；
        </p>
        <p>
          <img src="/help-assets/问答管理.png" >
        </p>
        <p>
          <b>编辑按钮：</b>点击编辑按钮，右侧出现弹窗，修改话题的标题和内容；
        </p>
        <p>
          <img src="/help-assets/话题编辑.png" >
        </p>
        <p>
          <b>设置精选按钮：</b>点击设置精选，可以把最新的的话题添加到精选分类中；
        </p>
        <p>
          <img src="/help-assets/设置精选.png" >
        </p>

        <div style="height:100px;"></div>

    </div>
  </div>
</div>

	
	
</body>