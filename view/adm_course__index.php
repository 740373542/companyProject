<?php
include \view('adm_inc__header');
include \view('vue_course_ls');
include \view('vue_page');
?>
<!-- 邀请模板 -->
<template id="v_p__comment_list">
    <i-button type="primary" @click="update(v.id)" icon="ios-compose">修改</i-button>

    <i-button type="error" @click="remove(v.id)" icon="ios-close">删除</i-button>
</template>

<script type="text/javascript">
$$.part('v_p__comment_list', $('#v_p__comment_list').html())


$$.comp('v_course__table', $$.vCopy(__v__course_table(),{
  el: '#__v__course_table',
  EVENT:['ADD_COURDE_SUCC'],
  _setup: function(){
    this.manage_ = 'v_p__comment_list'
  },

  methods: {
    update:function(id){
      window.open('/adm_course/detail?id='+id);
    },

    remove: function(id){
        var self = this
        $$.ajax({
          url:'/adm_course/aj_deletedcourse?id='+id,
          succ:function(data){
          self.loadData()
          }
        })

    },

    hd_ADD_COURDE_SUCC:function(){
      var self = this
      self.loadData()
    },

  },

}))
</script>




  <div v-cloak  id="v_adm_comment__ls" style="background:#FFF;width:100%;height:100%">

      
      <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-17">
          <div class="example-case">



              
              <h1>课程列表</h1>
              <br/>
              <div class="ivu-table-header">
                <table style="width:100%">
                  <thead>
                    <tr>
                      <th style="width:30%;">
                        <i-input icon="android-search" placeholder="请输入课程名称"  :value.sync="search" ></i-input>
                      </th>
                      <th style="width:60%;text-align:right;">
                        <i-button type="success" @click="add" icon="android-add-circle">添加新课程</i-button>
                      </th>
                    </tr>
                  </thead>
                </table>
              </div>


              <div class="box" >
                <div class="box-header">
                  <div class="box-tools" style="
                  margin-right:1300px;margin-top:5px">
                  </div>
                </div>
                <div v-if="loading"><i class="fa zfa-refresh fa-spin"></i>Loading....</div>
                <div class="box-body table-responsive no-padding">
                    <v_course__table 
                      v-bind:func_loaded_="func_loaded"
                      v-bind:url_="url"
                      col_config_="course"
                      v-bind:th_width_="['50','200','200']"
                      v-bind:form_= "['发布','课程名称']"
                      check_box_=true
                    >
                    </v_course__table>
                </div>
              </div>

              <br />

              <v_page 
                v-bind:count_="count"
                v-bind:length_="length"
                v-bind:page_="page"
                v-bind:func_pagechanged_="func_pagechanged"
              >
              </v_page>

          </div>
        </div>

        <Modal :visible.sync="alert" width="360">
            <p slot="header" style="color:#464c5b;text-align:center">
                <Icon type="compose"></Icon>
                <span>添加课程</span>
            </p>
            <div style="text-align:center">
              <h3>课程名:<h3><i-input  placeholder="请输入课程名称" style="width: 200px" :value.sync="add_name"></i-input>
            </div>
            <div slot="footer">
                <i-button type="success" size="large" long  @click="add_course">保存</i-button>
            </div>
        </Modal>

        <div class="example-split" style="left: 71%;"></div>

        <div class="example-demo ivu-col ivu-col-span-7 ivu-col-split-right">
          <div class="example-case">
            <h1>提示</h1>
            <br/>
            <br/>

            <Card dis-hover>
                <p slot="title">功能简介  </p>
                <p><b>状态：</b>主要区分课程当前使用状态，打对号的为正在启用状态，没有对号的为禁用状态；</p>

                <p><b>课程名称：</b>课程的主要标题；</p>
                <p><b>修改：</b>可以修改课程的名称和主要内容，以及添加课程包含视频；</p>
                 <p><b>删除：</b>删除选中的课程；</p><br/>

<!-- ① ② ③ ④ ⑤ ⑥ ⑦ ⑧ ⑨ ⑩ -->

                 <p style="font-size:14px;color:#e96900;"><Icon type="alert-circled" size="16"></Icon>
                    功能注意事项:
                 </p>
                 <br/>
                  <p><span style="font-size:16px">①: </span>搜索输入框请输入课程名称关键字或准确的课程名称</p>
                  <p><span style="font-size:16px">②: </span>添加课程功能输入的课程名称不要为空</p>
                  <p><span style="font-size:16px">③: </span>新添加的课程默认是没有内容和视频，需要点击修改为课程添加内容和上传视频</p>
                  <p><span style="font-size:16px">④: </span>新添加的课程默认状态为禁用，可以点击选择框启用课程</p>
                  <p><span style="font-size:16px">⑤: </span>启用课程以前推荐先把课程的详情内容都完善</p>

            </Card>



          </div>
        </div>
      </div>



  </div>
  <script>
    var url = '/adm_course/get_all_course?'
    $$.vue({
      el:'#v_adm_comment__ls',
      data:function(){
        return {
          alert:false,
          url:null,
          loading:false,
          add_name:'',
          page:1,
          count:0,
          length:10,
          search: '',
        }
      },

      _init: function() {
        this.resetUrl()
      },

      methods: {

        resetUrl: function(){
          this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search
        },

        func_loaded: function(data){
          this.count = data.count
        },

        func_pagechanged: function(idx){
          this.page = idx
          this.resetUrl()
        },
        // add:function (){
        //   $('#Id_Right_Drawer_Content').html('加载中')

        //   $$.event.pub('OPEN_DRAWER',{width:600})
        //   $.get('/adm_course/add_course_modify',function(res){
        //     $('#Id_Right_Drawer_Content').html(res)
        //   })
        // },
        add:function() {
          var self = this
          self.alert = true
        },

        add_course:function() {
          var self = this
          $$.ajax({
            url:'/adm_course/add_course',
            data:{
              name:self.add_name,
            },
            succ:function(data){
              $$.event.pub('ADD_COURDE_SUCC')
              self.alert = false
            },
          })
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


  <style type="text/css">
    .add_option_button{
      background:#33CC66;
      padding:5px 20px;
      border-radius:5px;
      color:#FFF;
      /*margin-left:30px;*/
      cursor:pointer;
    }

    .del_option_button{
      background:#FF3333;
      padding:5px 20px;
      border-radius:5px;
      color:#FFF;
      /*margin-left:10px;*/
      cursor:pointer;
    }
  </style>

<?php
include \view('adm_inc__footer');
