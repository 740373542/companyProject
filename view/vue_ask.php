<?php
require_once \view('vue_base');
require_once \view('vue_comm_table');
?>

<!-- 问答板块 -->
<template id="v_p__ask_list">
    <div style="text-align:center">
      <i-button type="error" @click="remove(v.id)">删除</i-button>
    </div>
</template>


<script type="text/javascript">
$$.part('v_p__ask_list', $('#v_p__ask_list').html())

$$.comp('v_user__ask_list', $$.vCopy(__v__common_table(),{
  el: '#__v__common_table',

  _setup: function(){
    this.manage_ = 'v_p__ask_list'
  },

  methods: {
    remove: function(id){
        var self = this
        $$.ajax({
          url:'/adm_comment/remove_ask?id='+id,
          succ:function(data){
            self.loadData()
          }
        })

    },
  },

}))
</script>

