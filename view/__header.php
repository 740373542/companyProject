<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <title>管理面板</title> 
  <!-- Tell the browser to be responsive to screen width --> 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" /> 

  <script type="text/javascript" src="/libs/vue.js"></script> 
  

  <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet" type="text/css">
  <script src="https://unpkg.com/vuetify/dist/vuetify.min.js"></script>


<div class="content-wrapper" style="">
  <!-- 内容请写在下面⬇ -->

<div id="app">
</div>



<script type="text/javascript">
  var app = new Vue({
    el: '#app',
    template: '<v-breadcrumbs divider="/"><v-breadcrumbs-item v-for(item in items) v-bind:item="item"></v-breadcrumbs-item></v-breadcrumbs>',
    data: function(){
      return {
        items: [{ href: '#!', text: 'Dashboard', disabled: false}]
      }
    }
  })

</script>