<?php
include \view('inc_home_header');
?>

<style type="text/css">

</style>


<script type="text/javascript">
  var call_from_native = {
    UPLOAD_SUCCESS: function(msgstr) {
      // alert('in web:'+msgstr)
      var msg = $$.str2js(msgstr)
      $('#upload_files').html("<div class='m-uploadimg' style='clear:none;float:left;margin:0 5px 5px 0;background-image: url("+msg.res.file+");' ></div>")

      v_instance.setState({
        files: [msg.res.file]
      })
      
    }
  }
</script>

<div v-choak id="v_main" class="swipe-content content-list" style="width:100%;overflow-x:hidden;">



  <div class="weui_cells weui_cells_form">

          <div class="weui_cell"> 
            <div class="weui_cell_hd">   </div> 
            <div class="weui_cell_bd weui_cell_primary"> 
              <input type="text" class="weui_input"
                v-model="title"
                placeholder="标题"
              /> 
            </div> 
            <div class="weui_cell_ft"> <i style="display: none;" class="weui_icon weui_icon_clear"></i>
            </div> 
          </div>
            
          <div class="weui_cell">
              <div class="weui_cell_bd weui_cell_primary">
                  <textarea class="weui_textarea"   
                    placeholder="请详细描述"
                    v-model="content"
                    rows="3"
                  ></textarea>
                  <div class="weui_textarea_counter"><span id="textarea_num">剩余200字</span></div>
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


            
            <div class="weui_cell">
              <div class="weui_cell_bd weui_cell_primary">
                    <div class="weui_uploader">
                        <div class="weui_uploader_hd weui_cell">
                            <div class="weui_cell_bd weui_cell_primary">图片上传</div>
                        </div>
                        <div class="weui_uploader_bd">
                            <div id="upload_files" class="weui_uploader_files" style="width:100%;">

                            </dov>
                            <div class="weui_uploader_input_wrp"  onclick="call_native('event',{event_name:'PICK_IMAGE',uid:'<?=$_GET['_uid']?>',folder:'bbs',resize:400,});">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            
  </div>


























  <div class="p"><a @click="ajaxSave" class="weui_btn weui_btn_primary open-popup " data-target="#popup">提交</a></div>




</div>


<script type="text/javascript">

var v_instance = $$.vue({
  el: '#v_main',

  data: function(){
    return {
      can_save: false,
      files:[],
    }
  },

  methods: {

    ajaxSave: function(){

      $$.ajax({
        url: '<?=$__submit_url?>',
        data: {
          title: this.title,
          content: this.content,
          cate_id: '<?=$_GET['bbs_id']?>',
          files: this.files,
        },
        succ: function(data){
          // alert('添加成功')
          <?php
          if($__type=='ask'){
          ?>
          call_native('event',{
            event_name: 'RELOAD_ROUTE',
            event_key: 'ask_list',
          })
          <?php
          }else{
          ?>

  
          call_native('event',{
            event_name: 'TO_WEB',
            web_event_name: '<?=$__event?>',
            page_mark: '<?=$_GET['_pagemark']?>',
          })

          <?php
          }
          ?>


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


<?php
include \view('inc_footer');
?>

