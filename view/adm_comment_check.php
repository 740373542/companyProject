<?php
include \view('adm_inc__header');
include \view('vue_adm_comment');
include \view('vue_page');
?>

<template id="v_adm_comment__check">
  <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-17">
          <div class="example-case">

          <a name="#top"><h1>评论管理</h1></a>

          <br/>

          <v_adm_comment_list
            v-bind:func_loaded_="func_loaded"
            v-bind:url_ = "url"
            col_config_="comment"
            img_="person"
            img_text_="name"

          ></v_adm_comment_list>

          <br/>
          
          <v_page 
              v-bind:count_="count"
              v-bind:length_="length"
              v-bind:page_="page"
              v-bind:func_pagechanged_="func_pagechanged"
            >
          </v_page>


          </div>
        </div>



        <div class="example-split" style="left:71%"></div>
        <div class="example-demo ivu-col ivu-col-span-7 ivu-col-split-right">
          <div class="example-case">
              <h1>提示</h1>
              <br/>
              <br/>

              <Card dis-hover>
                  <p slot="title">功能简介  </p>
                  <p><b>昵称：</b>当前评论人的昵称；</p>

                  <p><b>评论内容：</b>针对某个话题或者某个问题的评论或者回答；</p>
                  <p><b>评论时间：</b>发表回答或者评论回复的时间；</p>
                  <p><b>删除：</b>管理员可以论情况来删除所选评论；</p>
                  <br/>

  <!-- ① ② ③ ④ ⑤ ⑥ ⑦ ⑧ ⑨ ⑩ -->

                   <p style="font-size:14px;color:#e96900;"><Icon type="alert-circled" size="16"></Icon>
                      功能注意事项:
                   </p>
                   <br/>
                    <p><span style="font-size:16px">①: </span>评论列表会根据员工评论的时间来排列</p>
                    <p><span style="font-size:16px">②: </span>操作删除会把选择的评论内容移除，包括客户端App中的显示</p>
                    
                    

              </Card>

          </div>
        </div>
      </div>
</template>


<script>
var url = '/adm_comment/aj_comment?'

$$.vue({
  el:'#v_adm_comment__check',
  data:function () {
    return {
      url:null,
      loading:false,
      page:1,
      count:0,
      length:10,

      search: '',
    }
  },
  _init: function(){
    this.resetUrl()
  },

  methods: {


      resetUrl: function(){
        this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search
      },

      func_loaded: function(data){
        this.count = data.count
        window.location.href = "#top"
      },

      func_pagechanged: function(idx){
        this.page = idx
        this.resetUrl()
      },


  },


  watch: {

      search: function(val){
        this.page = 1
        this.resetUrl()
      },
  }
  
})
</script>


<?php
include \view('adm_inc__footer');
