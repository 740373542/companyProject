
<!-- 子组件模板 -->
<template id="vue_autoload_list">
  <div>

      <div v-for="it in ls" style="margin:0 0 0px 0;">
        
        <div v-bind:onclick="'call_native(\'open_win\',{url:\'/bbs/detail?id='+it.id+'&_type_id=2\',title:\''+it.title+'\'});'" class="mu-card" style="min-height:82px;">

          <div  class="mu-card-title-container">

            <div v-if="it.pic" style="position:absolute;left:16px;top:16px;max-height:62px;overflow:hidden;max-width:110px;"><img v-bind:src="it.pic" width="100%" onerror="this.onerror=null;this.src='/app/empty.png'" /></div>

            <div class="mu-card-title" v-bind:style="'font-size: 18px;line-height: 24px;   padding-left:'+(it.pic?120:0)+'px;'">
              {{it.title}}
            </div>

            <div class="mu-card-sub-title" style="font-size: 12px;line-height: 16px;">
            </div>
          </div>

        </div>

    </div>
  </div>

</template>



<script type="text/javascript">
  $$.comp('vue_autoload_list', {
    el: '#vue_autoload_list',
    props: ['url_','interval_'],
    data: function () {
      return {
        loading: false,
        ls:[],
        laststamp:0,
      }
    },
    _init: function(){
      var self = this
      self.loadData()

      setInterval(function(){
        self.loadData()
      }, self.interval_*1000 )

    },

    methods: {

      loadData: function(){
        var self = this
        self.laststamp = (new Date()).getTime()

        $$.ajax({
          url:self.url_,
          succ:function(data){
            self.loading = false
            self.firstload = false

            var _new = $$.copy(data.ls)
            self.ls = _new

          },
          fail: function(){

          },
        })

      },

    },

  })
</script>

