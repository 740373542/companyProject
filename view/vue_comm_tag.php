


  <template v-cloak  id="__v__comm_tag">

      <i-select :model.sync="model1" style="width:251px">
          <i-option v-for="(idx,item) in ls" :value="item.title" @click="select(idx)">{{ item.title }}</i-option>
      </i-select>

  </template>

<script type="text/javascript">
var __v__comm_tag = function(){
  return  {
    el: '#__v__comm_tag',
    EVENT:['ADD_TAG_SUCC'],
    props:['url_'],
    data: function () {
      return {
        ls:[],
        model1:'',
      }
    },

    _init: function() {
      // alert('2122')
      var self = this
      self.loadData()
    },
    
    _change: function(){

    },

    methods: {
      loadData: function(){
        var self = this;
        // alert(self.url_)
        $$.ajax({
          url: self.url_,
          succ: function(data){
            self.setState({
              ls: data.ls,            
            });
            // alert($$.js2str(self.ls))
          },
          fail: function(msg,code){
          },

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


<script type="text/javascript">
  $$.comp('v_company_course_tag',$$.vCopy(__v__comm_tag(),{
    el:'#__v__comm_tag',
    methods:{
    },
  }))
</script>


