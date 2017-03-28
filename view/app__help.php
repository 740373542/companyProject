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
    .name-mark {
      position: absolute;
      top: -120px;
      width:10px;height:10px;
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
      padding-top: 78px;
      margin-top: -78px;
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

    <a href="#name_zhucedenglu"><h3 class="strong">注册/登陆</h3></a>

      <a href="#name_zhuce"><h4>注册</h4></a>
      <a href="#name_denglu"><h4>登陆</h4></a>
    
    <a href="#name_faxian"><h3 class="strong">发现</h3></a>

      <a href="#name_shuaxin"><h4>刷新/更多</h4></a>
      <a href="#name_bofangzanting"><h4>播放/暂停</h4></a>

    <a href="#name_wenda"><h3  class="strong">问答</h3></a>
      <a href="#name_shuaxingengduo"><h4>刷新/更多</h4></a>
      <a href="#name_wenda"><h4>问答</h4></a>
        <a href="#name_chakanxiangqing"><h5>查看详情</h5></a>
          <a href="#name_waixiedaan"><h6>写答案</h6></a>
          <a href="#name_fanhui"><h6>返回</h6></a>
        <a href="#name_lixiedaan"><h5>写答案</h5></a>
          <a href="#name_quxiao"><h6>取消</h6></a>
          <a href="#name_baocun"><h6>保存</h6></a>

      <a href="#name_weihuifu"><h4>未回复</h4></a>
        <a href="#name_chakanxiangqing2"><h5>查看详情</h5></a>
          <a href="#name_waixiedaan2"><h6>写答案</h6></a>
          <a href="#name_fanhui2"><h6>返回</h6></a>
        <a href="#name_lixiedaan2"><h5>写答案</h5></a>
          <a href="#name_weiquxiao2"><h6>取消</h6></a>
          <a href="#name_weibaocun2"><h6>保存</h6></a>

      <a href="#name_jingxuan"><h4>精选</h4></a>
        <a href="#name_chakanxiangqing3"><h5>查看详情</h5></a>
          <a href="#name_waixiedaan3"><h6>写答案</h6></a>
          <a href="#name_fanhui3"><h6>返回</h6></a>
        <a href="#name_lixiedaan3"><h5>写答案</h5></a>
          <a href="#name_jingquxiao"><h6>取消</h6></a>
          <a href="#name_jingbaocun"><h6>保存</h6></a>
    <a href="#name_wode"><h3 class="strong">我的</h3></a>
      <a href="#name_xiugaixinxi"><h4>修改信息</h4></a>
      <a href="#name_tuichuxitong"><h4>退出系统</h4></a>
  </div>


  
  <div class="help-content">

    

    <div class="help-content-box">
      <div style="height:30px"></div>
        <a name="name_zhucedenglu"><h1 style="padding-top: 80px;margin-top: 80px">注册/登陆</h1></a>
        <a name="name_zhuce"><h2 class="maodian">注册</h2></a>
        <hr>
        <p> 
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">注册</code>
          依次填写 “手机号”，“密码”，“确认密码”，点击“注册”按钮，完成注册。
        </p>

        <a name="name_denglu"><h2 class="maodian">登陆</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">登陆</code>
          如果您已有账号，请输入“手机号”和“密码”，点击“登陆”按钮，完成登陆
        </p>
        <div style="height:100px;"></div>

        <a name="name_faxian"><h1 class="maodian">发现</h1></a>
        <a name="name_shuaxin"><h2 class="maodian">刷新/更多</h2></a>
        <hr>
        <p> 
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">刷新/更多</code>
          下拉刷新页面，上滑获取更多视频。
        </p>

        <a name="name_bofangzanting"><h2 class="maodian">播放/暂停</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">播放/暂停</code>
          轻触播放界面执行播放/暂停。
        </p>
        <div style="height:100px;"></div>


        <a name="name_wenda"><h1 class="maodian">
          问答
          
        </h1></a>

        <a name="name_shuaxingengduo"><h2 class="maodian">刷新/更多</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">刷新/更多</code>
          下拉刷新页面，上滑获取更多问答。
        </p>    

        <a name="name_chakanxiangqing"><h2 class="maodian">查看详情</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">查看详情</code>
          点击问答内容进入详情界面
        </p>
    
        <a name="name_waixiedaan"><h2 class="maodian">写答案</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">写答案</code>
          在详情界面，点击"写答案"按钮，进入书写界面。
        </p>

        <a name="name_fanhui"><h2 class="maodian">返回</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">返回</code>
          在问答详情界面，点击"<"返回上一级。
        </p>

        <a name="name_lixiedaan"><h2 class="maodian">写答案</h2></a>
        <hr>
        <p>
          <code style="color: #e96899;background: #f8f8f8; padding:2px;">写答案</code>
          写答案界面，有"取消"按钮，"保存"按钮和输入框。 
        </p>

        <a name="name_quxiao"><h2 class="maodian">取消</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">取消</code>
          写答案界面，有"取消"按钮，点击"取消"按钮可以返回上一级。 
        </p>
        <a name="name_baocun"><h2 class="maodian">保存</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">保存</code>
          写答案界面，有"保存"按钮，点击"保存"按钮上传您的答案。 
        </p>

      <div style="height:100px;"></div>


        <a name="name_weihuifu"><h1 class="maodian">
          未回复
          
        </h1></a>

        <a name="name_shuaxingengduo2"><h2 class="maodian">刷新/更多</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">刷新/更多</code>
          下拉刷新页面，上滑获取更多问答。
        </p>    

        <a name="name_chakanxiangqing2"><h2 class="maodian">查看详情</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">查看详情</code>
          点击问答内容进入详情界面
        </p>
    
        <a name="name_waixiedaan2"><h2 class="maodian">写答案</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">写答案</code>
          在详情界面，点击"写答案"按钮，进入书写界面。
        </p>

        <a name="name_fanhui2"><h2 class="maodian">返回</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">返回</code>
          在问答详情界面，点击"<"返回上一级。
        </p>

        <a name="name_lixiedaan2"><h2 class="maodian">写答案</h2></a>
        <hr>
        <p>
          <code style="color: #e96899.9;background: #f8f8f8; padding:2px;">写答案</code>
          写答案界面，有"取消"按钮，"保存"按钮和输入框。 
        </p>

        <a name="name_weiquxiao2"><h2 class="maodian">取消</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">取消</code>
          写答案界面，有"取消"按钮，点击"取消"按钮可以返回上一级。 
        </p>
        <a name="name_weibaocun2"><h2 class="maodian">保存</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">保存</code>
          写答案界面，有"保存"按钮，点击"保存"按钮上传您的答案。 
        </p>
        <div style="height:100px;"></div>


        <a name="name_jingxuan"><h1 class="maodian">
          精选
        
        </h1></a>

        <a name="name_shuaxingengduo3"><h2 class="maodian">刷新/更多</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">刷新/更多</code>
          下拉刷新页面，上滑获取更多问答。
        </p>    

        <a name="name_chakanxiangqing3"><h2 class="maodian">查看详情</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">查看详情</code>
          点击问答内容进入详情界面
        </p>
    
        <a name="name_waixiedaan3"><h2 class="maodian">写答案</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">写答案</code>
          在详情界面，点击"写答案"按钮，进入书写界面。
        </p>

        <a name="name_fanhui3"><h2 class="maodian">返回</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">返回</code>
          在问答详情界面，点击"<"返回上一级。
        </p>

        <a name="name_lixiedaan3"><h2 class="maodian">写答案</h2></a>
        <hr>
        <p>
          <code style="color: #e96899.9;background: #f8f8f8; padding:2px;">写答案</code>
          写答案界面，有"取消"按钮，"保存"按钮和输入框。 
        </p>

        <a name="name_jingquxiao"><h2 class="maodian">取消</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">取消</code>
          写答案界面，有"取消"按钮，点击"取消"按钮可以返回上一级。 
        </p>
        <a name="name_jingbaocun"><h2 class="maodian">保存</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">保存</code>
          写答案界面，有"保存"按钮，点击"保存"按钮上传您的答案。 
        </p>
        <div style="height:100px;"></div>


        <a name="name_wode"><h1 class="maodian">
          我的
        
        </h1></a>

        <a name="name_xiugaixinxi"><h2 class="maodian">修改信息</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">修改信息</code>
          输入您的”姓名“，”昵称“，“状态”，点击“修改按钮”，即可完成个人信息修改操作。
        </p>

        <a name="name_tuichuxitong"><h2 class="maodian">退出系统</h2></a>
        <hr>
        <p>
          <code style="color: #e96900;background: #f8f8f8; padding:2px;">退出系统</code>
          点击“退出”，退出当前账号。
        </p>    

        <div style="height:100px;"></div>



 














<!-- 
      <h1>登录</h1><a name="name_login2"></a>
        <h2>基础</h2>
        <hr>
        <p>Vue 
        <code style="color: #e96900;background: #f8f8f8; padding:2px;">推荐使用</code>
        在绝大多数情况下使用 <code style="font-weight: 600;">template</code> 来创建你的 HTML。然而在一些场景中，你真的需要 JavaScript 的完全编程的能力，这就是 render 函数，它比 template 更接近编译器。</p>

        <div class="contentimport">
          <p>比较醒目</p>
          <p>实打实的跋涉就好大噶手机号给大声疾呼高大上就哈根达斯家会给大声疾呼啊就很伤感的啊就是打开噶金黄色啊上课感觉哈萨克感觉哈说感觉很啊啥的感觉哈说感觉哈说的感觉哈说的感觉哈说的感觉哈说的感觉哈说到结婚噶圣诞节好噶时代感觉哈卡上噶金黄色看看噶金黄色看噶金黄色看噶金黄色</p>
        </div>

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <p>很醒目</p>
          <p>实打实的跋涉就好大噶手机号给大声疾呼高大上就哈根达斯家会给大声疾呼啊就很伤感的啊就是打开噶金黄色啊上课感觉哈萨克感觉哈说感觉很啊啥的感觉哈说感觉哈说的感觉哈说的感觉哈说的感觉哈说的感觉哈说到结婚噶圣诞节好噶时代感觉哈卡上噶金黄色看看噶金黄色看噶金黄色看噶金黄色</p>
        </div>
        <h2>基础</h2>
        <hr>
        <p>Vue 
        <code style="color: #e96900;background: #f8f8f8; padding:2px;">推荐使用</code>
        在绝大多数情况下使用 <code style="font-weight: 600;">template</code> 来创建你的 HTML。然而在一些场景中，你真的需要 JavaScript 的完全编程的能力，这就是 render 函数，它比 template 更接近编译器。</p>
        
        <div class="contentimport">
          <p>比较醒目</p>
          <p>实打实的跋涉就好大噶手机号给大声疾呼高大上就哈根达斯家会给大声疾呼啊就很伤感的啊就是打开噶金黄色啊上课感觉哈萨克感觉哈说感觉很啊啥的感觉哈说感觉哈说的感觉哈说的感觉哈说的感觉哈说的感觉哈说到结婚噶圣诞节好噶时代感觉哈卡上噶金黄色看看噶金黄色看噶金黄色看噶金黄色</p>
        </div>

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <p>很醒目</p>
          <p>实打实的跋涉就好大噶手机号给大声疾呼高大上就哈根达斯家会给大声疾呼啊就很伤感的啊就是打开噶金黄色啊上课感觉哈萨克感觉哈说感觉很啊啥的感觉哈说感觉哈说的感觉哈说的感觉哈说的感觉哈说的感觉哈说到结婚噶圣诞节好噶时代感觉哈卡上噶金黄色看看噶金黄色看噶金黄色看噶金黄色</p>
        </div>
        <h2>基础</h2>
        <hr>
        <p>Vue 
        <code style="color: #e96900;background: #f8f8f8; padding:2px;">推荐使用</code>
        在绝大多数情况下使用 <code style="font-weight: 600;">template</code> 来创建你的 HTML。然而在一些场景中，你真的需要 JavaScript 的完全编程的能力，这就是 render 函数，它比 template 更接近编译器。</p>
        
        <div class="contentimport">
          <p>比较醒目</p>
          <p>实打实的跋涉就好大噶手机号给大声疾呼高大上就哈根达斯家会给大声疾呼啊就很伤感的啊就是打开噶金黄色啊上课感觉哈萨克感觉哈说感觉很啊啥的感觉哈说感觉哈说的感觉哈说的感觉哈说的感觉哈说的感觉哈说到结婚噶圣诞节好噶时代感觉哈卡上噶金黄色看看噶金黄色看噶金黄色看噶金黄色</p>
        </div>

        <div class="contentwarn"><div class="contentwarn-mark">!</div>
          <p>很醒目</p>
          <p>实打实的跋涉就好大噶手机号给大声疾呼高大上就哈根达斯家会给大声疾呼啊就很伤感的啊就是打开噶金黄色啊上课感觉哈萨克感觉哈说感觉很啊啥的感觉哈说感觉哈说的感觉哈说的感觉哈说的感觉哈说的感觉哈说到结婚噶圣诞节好噶时代感觉哈卡上噶金黄色看看噶金黄色看噶金黄色看噶金黄色</p>
        </div> -->




























    </div>









  </div>












</div>

  
  
  
</body>