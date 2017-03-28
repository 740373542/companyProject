
<!-- 子组件模板 -->
<template id="v_invite_list">

  <div v-for="(idx,item) in ls">
    <li class="pl-date">
      {{item.name}}
      

      <span v-if="item.type==0" class="add_option_button" @click="selectType(item,1,idx)">批准</span>

      <span v-if="item.type==1" class="del_option_button" @click="selectType(item,0,idx)">拒绝</span>

      
    </li>
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

  $$.comp('v_invite_list', {
    el: '#v_invite_list',
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
        users:{},
      }
    },
    _init: function(){
      var self = this

      var findFromCache = false

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
        self.loadData()
      },

      loadData: function(){
        var self = this

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

            for(var i in data.users){
              self.users[i] = data.users[i]
            }

            self.ls = _new

            if(data.ls.length<self.length){
              self.no_more = true
            }
            self.page = data.page
            self.sending = false;
            self.append = true;
            

          }
        })

      },

      selectType(user, type, idx){
        // alert($$.js2str(user))
        var self = this
        $$.ajax({
          url:'/adm_invite/aj_settype?id='+user.id+'&type='+type,
          succ:function(data){
            self.ls[idx].type = type
            self.setState({
              ls: self.ls,
            })
          }
        })

      },

    },

  }) // panel-wait
</script>




 <style>
  .add_option_button{
    background:#33CC66;
    padding:5px 20px;
    border-radius:5px;
    color:#FFF;
    margin-left:30px;
    cursor:pointer;
  }

  .del_option_button{
    background:#FF3333;
    padding:5px 20px;
    border-radius:5px;
    color:#FFF;
    margin-left:10px;
    cursor:pointer;
  }
 </style>
