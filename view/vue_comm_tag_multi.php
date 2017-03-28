<!-- 标签组件 -->
<template v-cloak  id="__v__comm_tag_multi">

  <div style="margin-top:15px;display:flex" v-for="item in ls" v-if="!loading">
    <div style="flex-basis:30%;">
      <i-button type="ghost" shape="circle" >{{item.title}}</i-button>
    </div>

    <div style="flex-basis:70%;">
      <div v-for="tag in item.tags" style="display:inline-block">
        <i-button  style='margin: 2px 4px 2px 0' icon="close-circled" v-if="selected_tag_map[tag]==1" type="primary" @click="switch(tag)">{{tag}}</i-button>

        <i-button  style='margin: 2px 4px 2px 0' icon="plus-circled" v-if="selected_tag_map[tag]!=1" type="default" @click="switch(tag)">{{tag}}</i-button>
      </div>
    </div>  
      
  </div>

  <div v-if="loading">
    <br/>
    <h2>Loading....</h2>
    <br/>
  </div>


  <!-- <i-button type="primary" shape="circle" size="large" @click="save">保存</i-button> -->

</template>

<script type="text/javascript">
var __v__comm_tag_multi = function(){
  return  {
    el: '#__v__comm_tag_multi',
    EVENT:['ADD_TAG_SUCC'],
    props:['url_','selected_tag_list_','event_name_'],
    data: function () {
      return {
        ls:[],
        selected_tag_map: {},
        loading:false,
      }
    },

    _init: function() {
      var self = this
      self.selected_tag_map = {}
      self.loadData()
    },
    
    methods: {

      loadData: function(){
        var self = this;
        self.loading = true
        $$.ajax({
          url: self.url_,
          succ: function(data){
            self.loading = false
            self.setState({
              ls: data.ls,            
            });

            self.parseSelected()
          },

          fail: function(msg,code){
          },

        })
      },

      parseSelected: function() {
        var self = this
        self.selected_tag_map = {}
        for(var i in self.selected_tag_list_){
          var v = self.selected_tag_list_[i]
          self.selected_tag_map[v] = 1
        }
        self.setState({
          selected_tag_map: self.selected_tag_map,
        })
      },

      switch: function(tag) {
        var self = this
        if( self.selected_tag_map[tag] ){
          delete self.selected_tag_map[tag]
        }else{
          self.selected_tag_map[tag] = 1
        }
        self.setState({
          selected_tag_map: self.selected_tag_map,
        })

        $$.event.pub(self.event_name_,{tags:self.selected_tag_map})
      },

    },
   
  }
}
</script>

<!-- 课程标签选择器 -->
<script type="text/javascript">
  $$.comp('v_comm_tag_multi',$$.vCopy(__v__comm_tag_multi(),{
    el:'#__v__comm_tag_multi',
    methods:{
    },
  }))
</script>


