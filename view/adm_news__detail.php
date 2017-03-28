

<div id="v_add_news_detail">
    <Row>
           <!--      <i-col span="18" >
                  <Alert type="error" show-icon closable @on-close="closeError">
                      错误提示
                      <span slot="desc">
                          {{error_text}}
                      </span>
                  </Alert>  
                </i-col> -->


        <i-col span="18">
          <input id="id_news_detail__comm_cate_id" type="hidden" name="name" value="<?php echo $_GET['cate_id'];?>" />

          <h1><?=$__how;?>内容:</h1>

          <br/>

          <form class="ivu-form ivu-form-label-right">
            <div class="ivu-form-item ivu-form-item-required">
              <label class="ivu-form-item-label" style="">标题名</label>
              <div class="ivu-form-item-content" style="margin-left: 60px;">
                <div class="ivu-input-wrapper ivu-input-type">
                  <input id="id_news_detail_title" class="ivu-input" type="text" placeholder="请输入任务名称" v-model="new_title"></div>
              </div>
            </div>

             <div class="ivu-form-item" v-if="type==1">
              <div class="ivu-form-item ivu-form-item-required">
                <label class="ivu-form-item-label">所属模块</label>
                <i-input style="width:479px" disabled :value="cate_str"></i-input>
              </div>
              

            </div>

            <div id="id_news_detail_content" style="height:400px;"><?php echo $__news_content;?>
            </div>

            <br/>

            <div class="example ivu-row" v-if="type==0">
              <div class="example-demo ivu-col ivu-col-span-18">
                <div class="example-case">
                  <h1>背景图片</h1>
                  <br />
                  <div class="pure-controls">
                    <img id="id_series_course_pic" src="<?=$__pic?>" >
                  </div>
                  <br />
                  <br />


  <style type="text/css">
.a-upload {
    position: relative;
    display: inline-block;
    /*background: #D0EEFF;*/
    /*border: 1px solid #99D3F5;*/
    border-radius: 4px;
    padding: 4px 12px;
    overflow: hidden;
    color: #FFF;
    text-decoration: none;
    text-indent: 0;
    line-height: 20px;
}
.a-upload input {
    position: absolute;
    font-size: 100px;
    right: 0;
    top: 0;
    opacity: 0;
}
.a-upload:hover {
    /*background: #AADFFD;*/
    /*border-color: #78C3F3;*/
    color: #FFF;
    text-decoration: none;
}
  </style>



                  <div style="">
                    <a href="javascript:;" class="a-upload ivu-btn ivu-btn-primary ivu-btn-circle ivu-btn-large">
                      <input id="file" type="file" @change="uploadPic" value="选择文件" name="file" style="max-width:90px;"> 
                      上传图片
                    </a>
                  </div>
                  <br />
                </div>
              </div>
            </div>

            <div class="ivu-form-item">
              <div class="ivu-form-item-content">
                <button class="ivu-btn ivu-btn-primary" type="button" @click="save">
                  <span>保存</span></button>
                <button style="margin-left: 8px" class="ivu-btn ivu-btn-ghost" type="button">
                  <span>重置</span></button>
              </div>
            </div>
          </form>




        </i-col>


    </Row>
</div>

<script type="text/javascript">
    $$.vue({
        el:'#v_add_news_detail',
        data:function(){
          return{
            type:'<?=$__type?>',
            pic: '',
            cate_id:'<?=$__cate_id?>',
            cate_str: '<?=$__cate_name?>',
            new_title:'<?=$__new_title?>',
          }
        },

        _init:function(){
        },

        methods:{
          save:function(){
            var self = this;
            $$.ajax({
              method:'post',
              url:'/adm_news/aj_news_save',
              data: {
                id:'<?=$_GET['id']?>',
                content: $('#id_news_detail_content').html(),
                title: this.new_title,
                cate_id: self.cate_id,
                type: self.type,
                pic: self.pic,
              },
              succ: function(res){
                $$.event.pub('CLOSE_DRAWER')
                $$.event.pub('SAVENEWS_SUCC')
              },

              fail:function(msg){
                  alert(msg)
              }
            })
          },

          uploadPic: function(){
            // alert('upload')
            var self = this

            var formData = new FormData();
            formData.append('key', 'news/<?=date('Ymd')?>');
            formData.append('rename', true);
            formData.append('file', $('#file')[0].files[0]);
            $.ajax({
              url: '/upload/ajax',
              type: 'POST',
              cache: false,
              data: formData,
              processData: false,
              contentType: false
            }).done(function(res) {
              // alert(res)
              console.dir(res)
              var r = $$.str2js(res)
              // alert(r.data.file)
              self.pic = r.data.file

              $('#id_series_course_pic').attr('src',r.data.file)

                // $$.ajax({
                //   url:'/adm_course/aj_save_pic',
                //   data:{
                //     pic:self.pic,
                //     course_id:self.course_id
                //   },
                //   succ:function(data){
                //   }
                // })

            }).fail(function(res) {
              alert('上传失败，请选择小图，png,jpg,jpeg格式')
              console.dir('fail')
              console.dir(res)
            });

          },


          
        },
    })
</script>

<script type="text/javascript">
    var editor = new wangEditor('id_news_detail_content');

    editor.config.uploadImgUrl = '/upload/ajax_h5';

    editor.config.uploadParams = {
        key: 'editor',
        // user: 'wangfupeng1988'
    };

    // 自定义load事件
    editor.config.uploadImgFns.onload = function (resultText, xhr) {
        // resultText 服务器端返回的text
        // xhr 是 xmlHttpRequest 对象，IE8、9中不支持

        // 上传图片时，已经将图片的名字存在 editor.uploadImgOriginalName
        var originalName = editor.uploadImgOriginalName || '';  

        // 如果 resultText 是图片的url地址，可以这样插入图片：
        editor.command(null, 'insertHtml', '<img src="' + resultText + '" alt="' + originalName + '" style="max-width:100%;"/>');
        // 如果不想要 img 的 max-width 样式，也可以这样插入：
        // editor.command(null, 'InsertImage', resultText);
    };

    // 自定义timeout事件
    editor.config.uploadImgFns.ontimeout = function (xhr) {
        alert('上传超时');
    };

    // 自定义error事件
    editor.config.uploadImgFns.onerror = function (xhr) {
        alert('上传错误');
    };

    // // 设置 headers（举例）
    // editor.config.uploadHeaders = {
    //     'Accept' : 'text/x-json'
    // };
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