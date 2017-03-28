<!-- 子组件模板 -->
<template id="__v__common_list">

  <div v-if="autoload || firstload">
    <div v-if="!no_more" style="clear:both;width:100%;text-align:center;padding:20px 0 20px 0;color:#999;background:#F1F1F1;zoom:0.6;">
      <div class="loader-inner line-scale-pulse-out"><div></div><div></div><div></div><div></div><div></div></div>
    </div>
    <div v-if="no_more" style="clear:both;width:100%;text-align:center;;height:50px;padding-top:20px;color:#999;">没有更多了</div>
  </div>
</template>

<script type="text/javascript">
var __v__common_list = function(){
  return  {
    el: '#__v__common_list',
    props:['url_','length_','autoload_','page_'],
    EVENT:['REACH_PAGE_END'],

    data: function () {
      return {
        loading: false,
        no_more: false,
        page: 1,
        sending: false,
        firstload: true,
        append: true, // 是重新刷新列表还是继续追加
        ls:[],
      }
    },

    _init: function() {
      // alert('yes')
      if(!this.page_){
        this.page_ = 1
      }
      this.page = parseInt(this.page_) 

      var self = this;
      if(self.autoload_){
        $$.autoload()
        self.loadData()
      }
    },
    
    _change: function(){
      this.no_more = false;
      // this.page = 1;
      this.page = parseInt(this.page_) 
      // alert(this.page)
      this.append = false;
      this.loadData()
    },

    methods: {

      hd_REACH_PAGE_END: function(){
        this.loadData()
      },

      loadData: function(){
        var self = this

        if(self.no_more || self.sending){
          return ;
        }

        self.sending = true
        self.loading = true

        $$.ajax({
          url:self.url_+'&length='+self.length_+'&page='+self.page,
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

            if(data.ls.length<self.length_){
              self.no_more = true
            }
            // self.page = data.page
            self.page +=1
            self.sending = false;
            self.append = true;
          }
        })

      },

    },
   
  }
}
</script>