
<!-- 子组件模板 -->
<template id="vue_comment_list">

  <div v-for="item in ls" class="pinglun" id="pid19608394">
    <img src="" class="avatar" onerror="this.onerror=null;this.src='/app/noavatar_big.gif'" />

    <div class="pl-content">
        <div class="pl-head">
            <div class="pl-date">{{item.username}} &nbsp;{{item.create_at}}</div>
            <div class="pl-floor">                                
              <div class="first">沙发</div>   
            </div>
        </div>
        <div class="pl-body">
        {{item.comment}}
        </div>
    </div>
  </div>

  <div v-if="autoload || firstload">
    <div v-if="!no_more || firstload">

      <div class="">
            
        <div class="dropload-down">
          <div class="ball-pulse"><div></div><div></div><div></div></div>
        </div>
      </div>

    </div>
    <div v-if="no_more" style="clear:both;width:100%;text-align:center;;height:50px;padding-top:20px;color:#999;font-size:1.7rem;">没有更多了</div>
  </div>

</template>



<script type="text/javascript">

  $$.comp('vue_comment_list', {
    el: '#vue_comment_list',
    props: ['url','length','autoload','cache','should_reload_'],
    EVENT:['SCROLL_TO_PAGE_END'],
    data: function () {
      return {
        loading: false,
        no_more: false,
        page: 0,
        sending:false,
        firstload:true,
        append: true, // 是重新刷新列表还是继续追加
        ls:[],
      }
    },
    _init: function(){
      var self = this

      var findFromCache = false

      // if(self.cache){
      //   var _data = store.get(self.cache)
      //   if(_data){
      //     // alert('read.cache:'+self.cache)
      //     // alert('data:'+$$.js2str(_data))
      //     for(var i in _data){
      //       self[i] = _data[i]
      //     }
      //     findFromCache = true
      //   }else{
      //     // alert('not found:'+self.cache)
      //   }
      // }

      if(!findFromCache){
        self.loadData()
      }

      if(self.autoload=="false"){
        self.autoload = false
      }
      if(!self.autoload){
        $$.event.fire(self)
      }


    },
    _change: function() {
      this.no_more = false;
      this.page = 0;
      this.append = false;
      this.loadData();
    },

    methods: {

      hd_SCROLL_TO_PAGE_END: function(){
        var self = this
        // console.log('0000000000000000000000000 1')
        // alert('0000000000000000000000000 1')
        self.loadData()
      },

      loadData: function(){
        var self = this

        // alert('001')

        
        if(self.no_more){
          // alert('no_more')
          return ;
        }


        if(self.no_more || self.sending){
          // alert('sending')
          return ;
        }

        self.sending = true
        self.loading = true

        $$.ajax({
          url:self.url+'&length='+self.length+'&page='+self.page,
          succ:function(data){
            self.loading = false
            self.firstload = false

            var _new = $$.copy(self.ls)
            // 是重新刷新列表还是继续追加
            if (!self.append) {
              _new = []
            }
            for(var i in data.ls){
              _new.push(data.ls[i])
            }

            self.ls = _new

            if(data.ls.length<self.length){
              self.no_more = true
            }
            self.page = data.page
            self.sending = false;
            self.append = true;
            
            // if(self.cache){
            //   // alert('write cache:'+self.cache)
            //   store.set(self.cache, $$.copy(self.$data))
            // }

            // window.setTimeout(function(){
            //   $$.atPageEnd(function(){
            //     self.loadData()
            //   })
            // },10)

          }
        })

      },

    },

  }) // panel-wait
</script>

