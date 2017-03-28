<div style="font-size:24px;"><?=$__how;?>内容:</div>


<div style="margin-top:20px">
  <input id="id_news_detail__comm_cate_id" type="hidden" name="name" value="<?php echo $_GET['cate_id'];?>" />
</div>

<form >
    <fieldset>

        <div >
            <label for="name" style="font-size:18px">课程名称：<input id="add_new_name"/></label>
          
        </div>

    </fieldset>
</form>

<div id="id_add_desc_new" style="height:400px;"></div>

<div class="pure-controls">
    <span class="add_option_button" onclick="save();">保存</span>
</div>


<script type="text/javascript">
    var save = function(){
      
      if ($('#id_add_desc_new').html() == "<p><br></p>" || !$('#add_new_name').val()) {
        alert("课程名称或简介不能为空");
        return;
      };
      $$.ajax({
        method:'post',
        url:'/adm_course/aj_add_course_save',
        data: {
          name: $('#add_new_name').val(),
          desc: $('#id_add_desc_new').html(),
        },
        succ: function(res){
          // alert(res)
          // window.location.reload();
          $$.event.pub('CLOSE_DRAWER')
        }
      })
    }

</script>



<script type="text/javascript">
    var editor = new wangEditor('id_add_desc_new');

    editor.config.uploadImgUrl = '/upload/ajax';

    editor.config.hideLinkImg = true;

    editor.config.menus = ["source", "|", "bold", "underline", "italic", "strikethrough", "eraser", "forecolor", "bgcolor", "|", "quote", "fontfamily", "fontsize", "head", "unorderlist", "orderlist", "alignleft", "aligncenter", "alignright", "|", "link", "unlink", "table", "|", "img", "|", "undo", "redo", "fullscreen"];
    editor.create();
</script>


<style type="text/css">
  .add_option_button{
    background:#33CC66;
    padding:7px 50px;
    border-radius:5px;
    color:#FFF;
    margin-left:30px;
    cursor:pointer;
    float: right;
    font-size: 20px;
    margin-top: 5px;
    box-shadow: 2px 2px 5px #CDCDCD;
  }
</style>