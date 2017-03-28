<?php
include \view('adm_inc__header');
?>

<template id="v_join_str">
  <div style="background:#FFF;">
    <table class="table table-hover">
      <tbody>
        <tr >
          <th>{{name}}</th>
        </tr>
        <tr>
          <th style="width:33.33%;text-align:center">主题</th>
          <th style="width:33.33%;text-align:center">问题</th>
          <th style="width:33.33%;text-align:center">回复</th>
        </tr> 
        <tr v-for="v in commentss">
          <td style="text-align:center">
            {{v.title}}
          </td>
            
          <td style="text-align:center">
            {{v.content}}
          </td>

          <td style="text-align:center">
            <div v-for="l in v.comments">{{l.comment}}</div>
          </td>
          <!-- <td style="text-align:center">
            <div><button @click="save()">确认</button></div>
          </td> -->
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
$$.vue({
    el:'#v_join_str',
    data: function(){
      return {
        commentss: [],
        name:'',
      }
    },
    _init: function (){
      this.loadData()
    },
    methods:{
      loadData: function(){
        var self = this 
        $$.ajax({
          url:'/lh/ajsss',
          succ: function(data){
            self.commentss = data.ls
            self.name = data.name
          },
        })
      },
      save: function(){
        var self = this
        alert(self.comments)
        // var self = this
        // var arr = [];
        // arr = self.join_str.split(" ");
        // if (arr.length != 1) {
        //   alert("邀请码不能存在空格")
        //   return;
        // };
        // if (!self.join_str) {
        //   alert("邀请码不能为空")
        //   return;
        // };
        // if (self.join_str.length > 10) {
        //   alert("邀请码不能超过10个字符")
        //   return;
        // };
        // $$.ajax({
        //   method:'get',
        //   url:'/adm_company_join/save',
        //   data:{
        //     join_str: self.join_str,
        //   },
        //   succ: function(data){
        //     alert("保存成功")
        //   },
        //   fail: function(msg){
        //     alert(msg)
        //   },
        // })
      },
    }
})
</script>




<?php
include \view('adm_inc__footer');
