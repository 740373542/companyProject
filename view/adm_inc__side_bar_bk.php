<?php
include \view('vue_comm_headline_config');
?>

<template id="__v__common_headline">
  <li v-for="(key,item_config) in col_config">
    <p>{{key}}</p>
    <ul>
      <li v-for="(sub_idx,sub_v) in item_config">
        <a v-bind:style="sub_v == id_selected ? current_color:'' " v-bind:id="sub_idx+''" v-bind:href="sub_v">
          <i v-bind:class=" idx == '超级管理'? 'ivu-icon ivu-icon-ios-compose-outline':'ivu-icon ivu-icon-ios-arrow-right' "></i>
          {{sub_idx}}
        </a>
      </li>
    </ul>
  </li>
</template>



<ul id="v_side_bar">
  <li>
    <ul>

    <v_sider_list>

    </v_sider_list>
      

    </ul>
  </li>
</ul>












<script type="text/javascript">
$$.comp('v_sider_list',{
  el: '#__v__common_headline',
  data: function () {
    return {
      col_headline:null,
      col_subline:null,
      id_selected:'<?php echo $__nav ?>',
      current_color:{color:'#39f'},
      col_config : {
        '超级管理':{
          '创建公司':'/adm_course/establish',
          '公司列表':'/adm_company/ls',
        },
        '课程':{
          '课程列表':'/adm_course/index',
          '视频列表':'/adm_video/ls',
          '习题列表':'/adm_exercises/index',
          '测试列表':'/adm_url_crud/index',
        },
        '基础数据':{
          '部门管理':'/adm_company_role/manage',
          '员工审核':'/adm_invite/ls',
          '修改公司邀请码':'/adm_company_join/index',
        },
        '任务':{
          '分配任务':'/adm_task/',
        },
        '模块管理':{
          '企业大学':'/adm_comm_cate/index?type=<?=\model\comm_cate::$CONF_TYPE['corp']?>',
          '企业通知':'/adm_comm_cate/index?type=<?=\model\comm_cate::$CONF_TYPE['news']?>',
          '问答':'/adm_comment/ask_ls?type=<?=\CONF_TYPE::$TYPE['ASK']?>',
        },
        '其他':{
          '评论管理':'/adm_comment/index',
        },
      }
    }
  },
  _init: function() {
    // alert($$.js2str(this.current_color))
    // alert(__config__head_line__['head_line'])
    // this.col_headline = __config__head_line__['head_line']
    // this.col_subline = __config__head_line__['sub_line']
  },

  methods:{
  },

})


     

  $$.vue({
    el:'#v_side_bar',
    data:function(){
      return {
        company:{},
      }
    },
    _init:function(){
      var self = this
      // self.loadCompany()
    },

  
    methods:{
      loadCompany:function(){
        var self = this
        $$.ajax({
          url:'/department/department_detail',
          succ:function(data){
            self.company = data.company
          },
        })
      },
    },



  })
</script>










