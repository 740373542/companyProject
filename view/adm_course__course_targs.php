<?php
include \view('vue_comm_tag_multi');
?>
<div v-cloak  id="v_adm_course__tags" style="background:#FFF;width:100%;height:100%">
  <div class="example ivu-row">
    <div class="example-demo ivu-col ivu-col-span-24">
      <div class="example-case">

          <h1>选择标签</h1>
          <v_comm_tag_multi
            url_="/adm_comm_tag/get_tags?type=视频分类"
            v-bind:selected_tag_list_="tags"
            event_name_="TAG_CHANGED"
          >
          </v_comm_tag_multi>
      </div>
    </div>
  </div>
</div>


<script>
  var v_course__detail = $$.vue({
    el:'#v_adm_course__tags',

    EVENT: ['ADD_VIDEO_SUCC','TAG_CHANGED'],

    data:function(){
      return {
        url:null,
        loading:false,
        page:1,
        count:0,
        length:10,
        search: '',
        tags:[],
        course_id:'<?=$__course_id?>',
       
      }
    },

    _init: function() {
      var self = this 
      var tags = '<?=$__tags?>'
      if(tags != '') self.tags = JSON.parse('<?=$__tags?>')
      // this.loadVideos()
    },

    methods: {

      hd_TAG_CHANGED: function(tags){
        // alert('hd:'+$$.js2str(tags))

        $$.ajax({
          url: '/adm_course/aj_save_tag',
          data: {
            tags: tags.tags,
            course_id: '<?=$__course_id?>',
          },
          succ: function(data){

          },
          fail: function(msg,code){
          },

        })

      },

    },

    watch: {

      },

  })
</script>










