<!--  -->

<!DOCTYPE html>
<html lang="zh-CN">
  
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>易学倍增后台管理</title>
    <link rel="stylesheet" href="/iview/iview.css">

    <link rel="stylesheet" href="/iview/layout.css"></head>
  
    <script type="text/javascript" src="/libs/jquery.min.js"></script> 
    <script type="text/javascript" src="/libs/jquery.cookie.js"></script> 

    <script type="text/javascript" src="/libs/vue.js"></script> 
    <script type="text/javascript" src="/libs/then.js"></script> 

    <script type="text/javascript" src="/__assets__/libs/aaa_init.js"></script> 
   
    <script type="text/javascript" src="/libs/editor/js/wangEditor.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/libs/editor/css/wangEditor.min.css">

    <link rel="stylesheet" href="/iview/iview.css">
    <script type="text/javascript" src="/iview/iview.min.js"></script>
    
    <style type="text/css">
    html {
      /*overflow-x: hidden;*/
      background: #EEEEEE;
    }
    .ivu-col-split-right {
      margin-top:-3px;
    }
    </style>

  <body>
    <div id="app">

      <div class="wrapper">
        <div class="wrapper-header">
          <div class="wrapper-header-logo">
<!-- 
            <a href="/adm_manager/" class="v-link-active">
              <img src="/iview/76ecb6e76d2c438065f90cd7f8fa7371.png"></a>
               -->
          </div>
        </div>
        <div class="wrapper-container" style="position:relative;">

          <div style="position:absolute;top:-100px;left:0px;width:100%;background:#F10000;border-bottom-right-radius:8px;border-bottom-left-radius:8px;">
            <a href="/adm_manager/" class="v-link-active" style="padding-left:8px;">
              <img src="/iview/logo.png" width="78">
            </a>
            <a href="/adm_auth/logout">
              <div style="position:absolute;right:108px;bottom:32px;color:#FFF;font-size:16px">退出</div>
            </a>
            <a href="/manage/help" target="_blank">
              <div style="position:absolute;right:50px;bottom:32px;color:#FFF;font-size:16px">帮助</div>
            </a>
          </div>

          <div class="ivu-row">
            <div class="wrapper-navigate ivu-col ivu-col-span-4" style="border-right:1px solid #F1F1F1;">
              <div class="navigate">

<?php
include \view('adm_inc__side_bar');
?>


              
              </div>
            </div>
            <!--v-component-->
            <div class="ivu-col ivu-col-span-20" style="border-left:1px solid #F1F1F1;left:-1px;">
              <div class="wrapper-content ivu-article">
                <article>
