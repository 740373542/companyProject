<script type="text/javascript">
var url_=window.location.href;
var pos_ = url_.indexOf('/',10)
var baseurl_ = url_.substring(0,pos_)
var newurl=baseurl_+"/add/#/";
// history.replaceState(null, "",newurl);
</script>

<?php
include \view('inc_vue_header');

    // <div style="position:relative;margin-top:0px;">
    //   <mu-refresh-control :refreshing="refreshing" :trigger="trigger" @refresh="refresh">
    //   </mu-refresh-control>
    // </div>

    
?>

<script src="/public/v_aaa_bundle.js"></script>
<script type="text/javascript" src="/__assets__/libs/aaa_init.js?"></script>
<?php include \view('inc_vue_header_js'); ?>

<?php
include \view('vue_task_list');
?>

<style type="text/css">

</style>


<div id="v_main" v-cloak class="swipe-content content-list" style="padding-right:0px;overflow-x:hidden;min-height:400px;">


  <div id="refresh-container" style="position: relative;min-height:400px;">


    <v_task__list title_="进行中的任务" :ls_="ls_ing" icon_="alarm" color_="red">
    </v_task__list>

    <v_task__list title_="未开始的任务" :ls_="ls_null" icon_="alarm_add" color_="orange">
    </v_task__list>

    <v_task__list title_="已完成的任务" :ls_="ls_done" icon_="alarm_on" color_="green">
    </v_task__list>

    <div v-if="ls_ing && ls_ing.length==0 && ls_done && ls_done.length==0 && ls_null && ls_null.length==0 && 1" style="text-align:center;padding-top:50px;">
      
      <img src="/app/empty2.png" style="max-width:40%;" >

      <p style="color:#999;">目前还没有任务</p>

    </div>

  </div>
</div>





</div>



<script type="text/javascript">

var v_instance = new Vue({
  el: '#v_main',

  data: function(){
    return {
      refreshing: false,
      num: 10,
      trigger: null,
      ls_ing:null,
      ls_null:null,
      ls_done:null,
    }
  },


  mounted: function(){
    // this.trigger = this.$el
    // this.scroller = document.getElementById('refresh-container')

    // this.trigger = document.getElementById('refresh-container')
    this.loadData()
  },

  methods: {
    refresh: function(){
      // alert('yes')
      this.loadData()
    },

    loadData: function(){
      var self = this
      self.ls_done = null
      self.ls_ing = null
      self.ls_null = null

      $$.ajax({
        url:'/task/aj_all?from=<?=$_GET['from']?>&tag=<?=$_GET['tag']?>',
        succ:function(data){
          // alert($$.js2str(data))
          self.ls_done = data.ls.done
          self.ls_ing = data.ls.ing
          self.ls_null = data.ls['null']
        },
        fail:function(msg,code){
          alert('发生错误')
        },
      })
    },

  },

  watch: {
    title: function(){
      this.can_save = true
    },
    content: function(){
      this.can_save = true
    },
  },

})

</script>

<script type="text/javascript">
  var call_from_native = {
    // UPLOAD_SUCCESS: function(msgstr) {

    // },
    // UPLOAD_CANCEL: function(){
    //   v_instance.$data.uploading = false      
    // },
  }
</script>


<?php
include \view('inc_vue_footer');

