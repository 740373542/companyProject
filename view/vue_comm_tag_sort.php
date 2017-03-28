
<!-- 标签组件 -->

  <template v-cloak  id="__v__comm_tag_sort">


    <div style="margin-top:15px;display:flex" v-for="item in ls" v-if="!loading">
      <div style="flex-basis:30%;">
        <i-button type="ghost" shape="circle" >{{item.title}}</i-button>
      </div>

      
      <div style="flex-basis:70%;">

      <div v-for="tag in item.tags" style="display:inline-block">
        <i-button  style='margin: 2px 4px 2px 0' icon="plus-circled" type="primary" v-if="filterTags(tag) == false" @click="course_add_tag(tag)">{{tag}}</i-button>

        <i-button  style='margin: 2px 4px 2px 0' type="success" @click="course_add_tag(tag)" v-if="filterTags(tag) == true" icon="checkmark-circled" >{{tag}}</i-button>
      </div>

      </div>  
      
    </div>

    <div v-if="loading">
      <br/>
      <h2>Loading....</h2>
      <br/>
    </div>

  </div>
    <i-button type="primary" shape="circle" size="large" @click="save">保存</i-button>
  </template>

<script type="text/javascript">
var __v__comm_tag_sort = function(){
  return  {
    el: '#__v__comm_tag_sort',
    EVENT:['ADD_TAG_SUCC'],
    props:['url_','tags_','course_id_'],
    data: function () {
      return {
        ls:[],
        model1:'',
        status:0,
        loading:false,
      }
    },

    _init: function() {
      var self = this
      
      self.loadData()
    },
    
    _change: function(){

    },

    methods: {
      loadData: function(){
        var self = this;
        // alert(self.url_)
        self.loading = true
        $$.ajax({
          url: self.url_,
          succ: function(data){
            self.loading = false
            self.setState({
              ls: data.ls,            
            });
          },
          fail: function(msg,code){
          },

        })
      },

      filterTags:function(tag){
        var self = this
        var tags = self.tags_ 

        for(var i in tags){
          var v = tags[i]
          if(v == tag){
            return true
          }

        }

        return false

      },

      course_add_tag:function(tag){
        var self = this 
        self.tags_.push(tag)
        self.setState({
          tags_:self.tags_,
        })
      },

      save:function(){
        var self = this
        var tmp_tags = self.tags_.toString()
        $$.ajax({
          url:'/adm_course/add_tags_to_course',
          data:{
            tag:tmp_tags,
            course_id:self.course_id_
          },
          succ:function(data){
            // alert('succ')
            $$.event.pub('SAVE_TAGS_SUCC',self.tags_)
            $$.event.pub('CLOSE_DRAWER')
          }
        })
      },

      select:function(idx){
        // alert(idx)
        var self = this
        var tag = self.ls[idx].tags
        // alert($$.js2str(tag))
        $$.event.pub('SELECT_TAG_SUCC',tag)
      },

      hd_ADD_TAG_SUCC:function(){
        var self = this
        self.ls = ''
      }

    },
   
  }
}
</script>

<!-- 课程标签选择器 -->
<script type="text/javascript">
  $$.comp('v_company_course_tag',$$.vCopy(__v__comm_tag_sort(),{
    el:'#__v__comm_tag_sort',
    methods:{
    },
  }))
</script>


