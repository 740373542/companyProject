<?php
require_once \view('vue_base');
require_once \view('vue_comm_table');
?>
<template id="v__task_option">
    <i-button type="primary"  @click="selectTaskType(v,idx)" icon="gear-a" v-if="buttons_[idx] != idx">设置权限</i-button>

    <i-button type="primary"  disabled icon="gear-a" v-if="buttons_[idx] == idx">设置权限</i-button>

    <i-button type="error" @click="delTask(v.id)" icon="ios-close">删除</i-button>
</template>

<script type="text/javascript">
  $$.part('v__task_option',$('#v__task_option').html())

  $$.comp('v__tast_list',$$.vCopy(__v__common_table(),{
    el:'#__v__common_table',

    EVENT:['ADD_TASK_SUCC'],

    props_ext:['buttons_'],

    _setup:function(){
      this.manage_ = 'v__task_option'
    },


    methods: {

      hd_ADD_TASK_SUCC:function(){
        var self = this 
        self.loadData()
        self.buttons_ = [];
      },
      
      selectTaskType: function(v,idx){
        var self = this
        self.buttons_ = {};
        self.buttons_[idx] = idx
        $$.event.pub('SELECT_TASK_TYPE',{
          data:v,
        });
      },

      delTask:function(task_id){
        var self = this
        $$.ajax({
          url:'/adm_task/delete_company_task',
          data:{
            id:task_id,
          },
          succ:function(data){
            self.loadData()
            $$.event.pub('DEL_TASK_SUCC')
          },
        })
      },


      succMessage:function(){
        this.$Message.success('任务添加成功');
      },

    },

  }))
</script>




