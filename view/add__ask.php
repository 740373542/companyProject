<script type="text/javascript">
var url_=window.location.href;
var pos_ = url_.indexOf('/',10)
var baseurl_ = url_.substring(0,pos_)
var newurl=baseurl_+"/add/#/";
// history.replaceState(null, "",newurl);
</script>

<?php
include \view('inc_vue_header');
?>

<script src="/public/v_aaa_bundle.js"></script>
<?php include \view('inc_vue_header_js'); ?>



<style type="text/css">
.spinner {
  margin: 20px auto;
  width: 35px;
  height: 35px;
  position: relative;
}
 
.container1 > div, .container2 > div, .container3 > div {
  width: 6px;
  height: 6px;
  background-color: #333;
 
  border-radius: 100%;
  position: absolute;
  -webkit-animation: bouncedelay 1.2s infinite ease-in-out;
  animation: bouncedelay 1.2s infinite ease-in-out;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
 
.spinner .spinner-container {
  position: absolute;
  width: 100%;
  height: 100%;
}
 
.container2 {
  -webkit-transform: rotateZ(45deg);
  transform: rotateZ(45deg);
}
 
.container3 {
  -webkit-transform: rotateZ(90deg);
  transform: rotateZ(90deg);
}
 
.circle1 { top: 0; left: 0; }
.circle2 { top: 0; right: 0; }
.circle3 { right: 0; bottom: 0; }
.circle4 { left: 0; bottom: 0; }
 
.container2 .circle1 {
  -webkit-animation-delay: -1.1s;
  animation-delay: -1.1s;
}
 
.container3 .circle1 {
  -webkit-animation-delay: -1.0s;
  animation-delay: -1.0s;
}
 
.container1 .circle2 {
  -webkit-animation-delay: -0.9s;
  animation-delay: -0.9s;
}
 
.container2 .circle2 {
  -webkit-animation-delay: -0.8s;
  animation-delay: -0.8s;
}
 
.container3 .circle2 {
  -webkit-animation-delay: -0.7s;
  animation-delay: -0.7s;
}
 
.container1 .circle3 {
  -webkit-animation-delay: -0.6s;
  animation-delay: -0.6s;
}
 
.container2 .circle3 {
  -webkit-animation-delay: -0.5s;
  animation-delay: -0.5s;
}
 
.container3 .circle3 {
  -webkit-animation-delay: -0.4s;
  animation-delay: -0.4s;
}
 
.container1 .circle4 {
  -webkit-animation-delay: -0.3s;
  animation-delay: -0.3s;
}
 
.container2 .circle4 {
  -webkit-animation-delay: -0.2s;
  animation-delay: -0.2s;
}
 
.container3 .circle4 {
  -webkit-animation-delay: -0.1s;
  animation-delay: -0.1s;
}
 
@-webkit-keyframes bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0.0) }
  40% { -webkit-transform: scale(1.0) }
}
 
@keyframes bouncedelay {
  0%, 80%, 100% {
    transform: scale(0.0);
    -webkit-transform: scale(0.0);
  } 40% {
    transform: scale(1.0);
    -webkit-transform: scale(1.0);
  }
}



  .m-uploadimg {
/*
    width: 79px;
    height: 79px;
    */
    /*border-radius: 50%;*/
    /*position: absolute;*/
    /*left: 50%;*/
    /*top: 50%;*/
    /*transform: translate(-50%, -50%);*/
    background-image: url(/uploads/bbs/20161229155233.jpg);
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;     
  }

</style>



<div id="v_main" v-cloak class="swipe-content content-list" style="padding-right:10px;overflow-x:hidden;">

  <div style="text-align:center;margin-top:0px;width:100%;">
  <?php 
  if($__type != 'comment'){
  ?>
    <div style="width:100%;">
      <mu-text-field label="标题:" hint-text="请输入标题内容" type="text" label-float icon="comment" full-width input-class="ask_title_input" v-model="title"
        hint-text="最多不超过40个字符"
        :max-length="40"
        style="min-height:50px;height:50px;"
      >
      </mu-text-field>
    </div>

  <?php
  }
  ?>
    <div>
      <mu-text-field label="详情:" hint-text="请详细描述" multi-line :rows="5" :rows-max="5" icon="comment" full-width label-float v-model="content" 
        hint-text="最多不超过400个字符"
        :max-length="400"
        style="min-height:160px;max-height:160px;">
      </mu-text-field>
      <br/>
    </div>


    <div style="text-align:right;margin-right:5px;margin-top:15px;">
      <mu-raised-button class="demo-raised-button" label="提交" icon="add" primary backgroundColor="#00bcd4" style="font-size:16px;" @click="ajaxSave" >
      </mu-raised-button>

      <br />
      <br />

  <?php 
  if($__type != 'comment'){
  ?>
       
      <mu-flat-button class="demo-flat-button" label="上传图片" style="font-size:16px;" @click="uploadPic('<?=$_GET['_uid']?>')" >
      </mu-flat-button>



  <?php 
  }
  ?>
       

    </div>



  <?php 
  if($__type != 'comment'){
  ?>
            
            <div class="weui_cell">
              <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui_uploader">
                        <div class="weui_uploader_hd weui_cell">
                            <!-- <div class="weui_cell_bd weui_cell_primary">图片上传</div> -->
                        </div>
                        <div class="weui_uploader_bd" style="text-align:center;">
                            
                            <div id="upload_files" class="weui_uploader_files" style="width:100%;text-align:center;">
                            </div>

                            <div class="weui_uploader_input_wrp"  @click="uploadPic('<?=$_GET['_uid']?>')">
  

                                <div class="spinner" v-if="uploading">
                                  <div class="spinner-container container1">
                                    <div class="circle1"></div>
                                    <div class="circle2"></div>
                                    <div class="circle3"></div>
                                    <div class="circle4"></div>
                                  </div>
                                  <div class="spinner-container container2">
                                    <div class="circle1"></div>
                                    <div class="circle2"></div>
                                    <div class="circle3"></div>
                                    <div class="circle4"></div>
                                  </div>
                                  <div class="spinner-container container3">
                                    <div class="circle1"></div>
                                    <div class="circle2"></div>
                                    <div class="circle3"></div>
                                    <div class="circle4"></div>
                                  </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
  <?php
  }
  ?>  
            
  </div>


























</div>


<script>
  $(function(){
    $(".weui_textarea").on("input paste" , function(){
          var num_left=200-$(this).val().length;
          if(num_left<0){
            $("#textarea_num").text("超过"+(-num_left)+"字");
            $("#textarea_num").css("color","#E44443");
          }else{
            $("#textarea_num").text("剩余"+(num_left)+"字");
            $("#textarea_num").css("color","#999999");
          }
        });

  })
</script>   


<script type="text/javascript">

var v_instance = new Vue({
  el: '#v_main',

  data: function(){
    return {
      title:'',
      content:'',
      refreshing: true,
      can_save: false,
      files:[],
      uploading: false,
    }
  },

  methods: {

    uploadPic: function(){
      this.uploading = true
      call_native('event',{event_name:'PICK_IMAGE',uid:'<?=$_GET['_uid']?>',folder:'bbs',resize:400,});
    },

    ajaxSave: function(){

      var data = {
        content: this.content,
        type: '<?=$__type_id?>',
      }

      <?php
      if(!empty($_GET['bbs_id'])){
      ?>
      data.cate_id = '<?=$_GET['bbs_id']?>';
      <?php          
      }
      ?>

      if( this.title ){
        data.title = this.title
      }

      if( this.files.length>0 ){
        data.files = this.files
      }

      <?php
      if( !empty($_GET['target_id']) ){
      ?>
        data.target_id = this.target_id
      <?php
      }
      ?>


      <?php 
      if($__type != 'comment'){
      ?>
    
      if(!data.title){
        alert('请输入标题')
        return 
      }

      <?php
      }
      ?>                

      if(!data.content){
        alert('请输入详情')
        return 
      }
      // alert($$.js2str(data))
      // return ;

      $$.ajax({
        url: '<?=$__submit_url?>',
        data: data,
        succ: function(data){
          // alert('操作成功')
          
          var _event = {
            event_name: 'TO_WEB',
            web_event_name: '<?=$__event?>',
            page_mark: '<?=$_GET['_pagemark']?>',
          }

          // alert($$.js2str(_event))
          call_native('event',_event)

          // alert($$.js2str(_event))

          call_native('event',{
            event_name: 'NAV_GO_BACK',
          })


        },

        fail: function(msg,code){
          alert('添加失败 '+$$.js2str(msg))
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
    UPLOAD_SUCCESS: function(msgstr) {
      // alert('in web:'+msgstr)
      var msg = $$.str2js(msgstr)
      // $('#upload_files').html("<div class='m-uploadimg' style='clear:none;float:left;margin:0 5px 5px 0;background-image: url("+msg.res.file+");' ></div>")
      var htm = "<div class='m-uploadimg' style='width: 150px;height: 150px;margin:20px auto 20px auto;background-image: url("+msg.res.file+");' ></div>"
      // alert(htm)
      $('#upload_files').html(htm)

      v_instance.$data.files = [msg.res.file]
      v_instance.$data.uploading = false

      // v_instance.setState({
      //   files: [msg.res.file],
      //   uploading: false,
      // })
      
    },
    UPLOAD_CANCEL: function(){
      v_instance.$data.uploading = false      
    },
  }
</script>



<?php
include \view('inc_vue_footer');

