<?php
include \view('vue_exercise');
include \view('vue_comm_tag');
?>

<h1><?=$__type;?>视频</h1>


<div v-cloak  id="v_adm_course__video_detail" style="background:#FFF;width:100%;">

  <div style="margin-top:20px">
    <input id="id_news_detail__comm_cate_id" type="hidden" name="name" value="<?php echo $_GET['cate_id'];?>" />
  </div>

    <i-form v-ref:form-validate label-position="right" :model="formValidate" :rules="ruleValidate" :label-width="80">
        <Form-item label="视频标题" prop="name">
            <i-input :value.sync="formValidate.name" placeholder="请输入视频标题"></i-input>
        </Form-item>
        <Form-item label="时长 / 秒" prop="length">
            <i-input :value.sync="formValidate.length" placeholder="请输入时长（秒）"></i-input>
        </Form-item>


  <br />

  
  <div class="pure-controls">
    <button class="ivu-btn ivu-btn-primary ivu-btn-circle ivu-btn-large" type="button" onclick="save_video(<?php echo $_ls['id']?>);">   <span>保存</span> </button>
  </div>


  <div v-show="id!='0'">

    <br />
    <br />
    <br />

    <h1>视频</h1>
    
    <br />
    <br />

    <div id="container" style="display: -none;">

      <div class="pure-controls">
        <button id="pickfiles" class="ivu-btn ivu-btn-primary ivu-btn-circle" type="button">   <i class="ivu-icon ivu-icon-android-upload" style="font-size:18px" ></i> </button>
      </div>

      <br />
      <table>
        <tbody id="fsUploadProgress">
        </tbody>
      </table>

    </div>


    <br />
    <br />

    <h1>习题</h1>
    
    <br />
    <br />

    <v_exercise__of_video video_id_="<?=$__video['id']?>"></v_exercise__of_video>
    <br />
    <br />

    <v_exercise__selector></v_exercise__selector>

<!-- 
      <div class="pure-controls">
        <button class="ivu-btn ivu-btn-primary ivu-btn-circle ivu-btn-large" type="button">   <span>添加选项</span> </button>
      </div>
     -->

    <br />
    <br />


  </div>



</div>





<script type="text/javascript">
    var save_video = function(){
      // alert(id)
      $$.ajax({
        method:'post',
        url:'/adm_course/aj_video_save',
        data: {
          id: v_ins.$data.id,
          course_id:'<?=$__course_id?>',
          name: v_ins.$data.formValidate.name,
          length: v_ins.$data.formValidate['length'],
        },
        succ: function(res){
          // alert(res)
          // window.location.reload();
          // $$.event.pub('CLOSE_DRAWER')
          if( v_ins.$data.id == 0 ){
            alert('添加成功')
            $$.event.pub('ADD_VIDEO_SUCC')
          }else{
            alert('修改成功')
          }
          v_ins.$data.id = res.video.id
          createUploader()
        }
      })
    }

    var save_video_path = function(path){
      // alert(id)
      $$.ajax({
        method:'post',
        url:'/adm_course/aj_video_save',
        data: {
          id: v_ins.$data.id,
          course_id:'<?=$__course_id?>',
          path: path,
        },
        succ: function(res){
          // alert(res)
          // window.location.reload();
          // $$.event.pub('CLOSE_DRAWER')
          alert('修改成功')
        }
      })
    }

</script>




<script type="text/javascript">



var uploader = null
var createUploader = function(){

  uploader = Qiniu.uploader({
      runtimes: 'html5,flash,html4',      // 上传模式，依次退化
      browse_button: 'pickfiles',         // 上传选择的点选按钮，必需
      log_level: 5,
      // 在初始化时，uptoken，uptoken_url，uptoken_func三个参数中必须有一个被设置
      // 切如果提供了多个，其优先级为uptoken > uptoken_url > uptoken_func
      // 其中uptoken是直接提供上传凭证，uptoken_url是提供了获取上传凭证的地址，如果需要定制获取uptoken的过程则可以设置uptoken_func
      // uptoken : '$this->di['QiniuService']->getToken()', // uptoken是上传凭证，由其他程序生成
      uptoken_url : '/qiniu/token', // uptoken是上传凭证，由其他程序生成
      // uptoken_url: '/uptoken',         // Ajax请求uptoken的Url，强烈建议设置（服务端提供）
      // uptoken_func: function(file){    // 在需要获取uptoken时，该方法会被调用
      //    // do something
      //    return uptoken;
      // },
      get_new_uptoken: false,             // 设置上传文件的时候是否每次都重新获取新的uptoken
      // downtoken_url: '/downtoken',
      // Ajax请求downToken的Url，私有空间时使用，JS-SDK将向该地址POST文件的key和domain，服务端返回的JSON必须包含url字段，url值为该文件的下载地址
      unique_names: true,              // 默认false，key为文件名。若开启该选项，JS-SDK会为每个文件自动生成key（文件名）
      // save_key: true,                  // 默认false。若在服务端生成uptoken的上传策略中指定了sava_key，则开启，SDK在前端将不对key进行任何处理
      domain: 'http://ofsw6535s.bkt.clouddn.com/',     // bucket域名，下载资源时用到，必需
      container: 'container',             // 上传区域DOM ID，默认是browser_button的父元素
      max_file_size: '1000mb',             // 最大文件体积限制
      flash_swf_url: '../../assets/libs/plupload/Moxie.swf',  //引入flash，相对路径
      max_retries: 3,                     // 上传失败最大重试次数
      dragdrop: true,                     // 开启可拖曳上传
      drop_element: 'container',          // 拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
      chunk_size: '4mb',                  // 分块上传时，每块的体积
      auto_start: true,                   // 选择文件后自动上传，若关闭需要自己绑定事件触发上传
      //x_vars : {
      //    查看自定义变量
      //    'time' : function(up,file) {
      //        var time = (new Date()).getTime();
                // do something with 'time'
      //        return time;
      //    },
      //    'size' : function(up,file) {
      //        var size = file.size;
                // do something with 'size'
      //        return size;
      //    }
      //},

      init: {
          'FilesAdded': function(up, files) {
              plupload.each(files, function(file) {
                var progress = new FileProgress(file, 'fsUploadProgress');
                progress.setStatus("等待...");
              });
          },
          'BeforeUpload': function(up, file) {
                 // 每个文件上传前，处理相关的事情
            var progress = new FileProgress(file, 'fsUploadProgress');
            var chunk_size = plupload.parseSize(this.getOption('chunk_size'));
            if (up.runtime === 'html5' && chunk_size) {
                progress.setChunkProgess(chunk_size);
            }
          },
          'UploadProgress': function(up, file) {
                 // 每个文件上传时，处理相关的事情
            var progress = new FileProgress(file, 'fsUploadProgress');
            var chunk_size = plupload.parseSize(this.getOption('chunk_size'));

            progress.setProgress(file.percent + "%", file.speed, chunk_size);
          },
          'FileUploaded': function(up, file, info) {
             // 每个文件上传成功后，处理相关的事情
             // 其中info是文件上传成功后，服务端返回的json，形式如：
             // {
             //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
             //    "key": "gogopher.jpg"
             //  }
             // 查看简单反馈
             var domain = up.getOption('domain');
             console.dir(info)
             var res = $$.str2js(info);
             var sourceLink = domain +''+ res.key; //获取上传成功后的文件的Url
             // alert('上传成功'+sourceLink)
             save_video_path(sourceLink)
            // var progress = new FileProgress(file, 'fsUploadProgress');
            // progress.setComplete(up, info);
          },
          'Error': function(up, err, errTip) {
                 //上传出错时，处理相关的事情
            var progress = new FileProgress(err.file, 'fsUploadProgress');
            progress.setError();
            progress.setStatus(errTip);
          },
          'UploadComplete': function() {
            //队列文件处理完毕后，处理相关的事情
          },
          'Key': function(up, file) {
              // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
              // 该配置必须要在unique_names: false，save_key: false时才生效

              var key = "";
              // do something with key here
              return key
          }
      }


  });

}





// domain为七牛空间对应的域名，选择某个空间后，可通过 空间设置->基本设置->域名设置 查看获取
// uploader为一个plupload对象，继承了所有plupload的方法
</script>


<script type="text/javascript">
  
    var v_ins = $$.vue({
      el:'#v_adm_course__video_detail',

      _init: function(){
        createUploader()
      },

      data:function(){
        return {
          course_id:'<?=$__course_id?>',
          id:'<?=$__id?>',
          video: null,


          formValidate: {
              name: '<?=$__video['name']?>',
              length: '<?=$__video['length']?>',
          },

          ruleValidate: {
              name: [
                  { required: true, message: '标题不能为空', trigger: 'blur' }
              ],
              length: [
                  { required: true, message: '时长不能为空', trigger: 'blur' },
                  // { type: 'number', message: '时长只能是数字', trigger: 'blur' }
              ]
          },


        }
      },
    })

    $$.drawer = v_ins

</script>




<style type="text/css">
table td div.text-left {
  display: inline-block;
}

</style>


