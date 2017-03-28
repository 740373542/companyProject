<!-- 子组件模板 -->
<template id="__v_task__common">
</template>

<script type="text/javascript">
var __v_task__common = function(){
  return  {
    el: '#__v_task__common',
    props:['ls_','title_','icon_','color_'],
    // props_watch:[''],

    data: function () {
      return {
        loading: false,
        ls: false,
      }
    },

    _init: function() {
      alert('yes')
    },
    
    _change: function(){
      // this.loadData()
    },

    methods: {
      getIcon: function(it){
        return 'play_circle_filled'
      },
    },
   
  }
}
</script>




<!-- 子组件模板 -->
<template id="tpl_task__list">
  <div>
    <div  v-for="it in ls_" v-bind:onclick="'javascript: call_native(\'open_win\',{url:\'/course/detail?id='+it.target_id+'&task_id='+it.id+'\', title: \''+it.title+'\', }); void(0);'" style="margin:0 0 10px 0;">
      
      <div class="mu-card">
        <div class="mu-card-media">
          <img v-bind:src="it.pic">
        </div>

        <div class="mu-card-title-container">
          <div class="mu-card-title" style="font-size: 18px;line-height: 24px;">
            {{it.name}}
          </div>
        </div>

      </div>

    </div>
  </div>

</template>



<script type="text/javascript">
$$.comp('v_task__list', $$.vCopy(__v_task__common(),{
  el: '#tpl_task__list',
}))
</script>







