<?php
include \view('adm_inc__header');
include \view('vue_comm_table');
include \view('vue_page');
include \view('vue_comm_tag_sort');
?>

<script type="text/javascript" src="/assets/libs/plupload/moxie.js"></script>
<script type="text/javascript" src="/assets/libs/plupload/plupload.dev.js"></script>
<script type="text/javascript" src="/assets/libs/qiniu.js"></script>
<script type="text/javascript" src="/assets/libs/progressbar.js"></script>



<!-- 邀请模板 -->
<template id="v_p__buttons">
    <i-button type="primary" size="small" @click="modify(v.id)">上传</i-button>
    <i-button type="error" size="small" @click="remove(v.id)">删除</i-button>
</template>

<script type="text/javascript">
$$.part('v_p__buttons', $('#v_p__buttons').html())

$$.comp('v_video__table', $$.vCopy(__v__common_table(),{
  el: '#__v__common_table',

  _setup: function(){
    this.manage_ = 'v_p__buttons'
  },

  methods: {
    remove: function(id){
        var self = this
        $$.ajax({
          url:'/adm_course/aj_deletedcourse?id='+id,
          succ:function(data){
            // self.ls[idx].type = type
            // self.setState({
            //   ls: self.ls,
            // })
          self.loadData()
          }
        })

    },
    modify: function(id){
          $('#Id_Right_Drawer_Content').html('加载中')

          $$.event.pub('OPEN_DRAWER',{width:600
          })
          $.get('/adm_course/adm_course_modify?id='+id,function(res){
            $('#Id_Right_Drawer_Content').html(res)
          })
    },
  },

}))
</script>



  <div v-cloak  id="v_adm_course__detail" style="background:#FFF;width:100%;height:100%">


      <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-18">
          <div class="example-case">

              <div class="ivu-table-header" >
                <table width="100%">
                  <thead>
                    <tr>
                      <th style="width:80%;text-align:left">
                           <h1><?=$__how;?>课程</h1>
                      </th>
                      <th style="width:20%;text-align:right">
                          <i-button type="primary" size="large" @click="add_tag">添加标签</i-button>
                      </th>
                    </tr>
                    <tr>
                      <th style="width:80%;text-align:left">
                        <i-button v-if="tags !='' " icon="close-circled" style='margin: 2px 4px 2px 0' type="primary" v-for="(idx,tag) in tags" @click="delete_tag(idx)">{{tag}}</i-button>
                      </th>
                    </tr>
                  </thead>
                </table>
              </div>
              

              <div style="margin-top:20px">
                <input id="id_news_detail__comm_cate_id" type="hidden" name="name" value="<?php echo $_GET['cate_id'];?>" />
              </div>

              <input id="id_course_name" class="ivu-input" type="text" placeholder="请输入课程标题..." value="<?php echo $__course['name'];?>" style="width: 100%">
              <br />
              <br />

              <div id="id_course_detail_content" style="height:200px;"><?php echo $__course['desc'];?>
              </div>

              <br />

              <div class="pure-controls">
                <i-button type="primary" shape="circle" size="large" onclick="save(<?php echo $__course['id']?>);">保存</i-button>

              </div>



          </div>
        </div>


        <!--v-component-->

        <div class="example-split" style="left: 75%;"></div>

        <div class="example-demo ivu-col ivu-col-span-6 ivu-col-split-right">
          <div class="example-case">
              <h3>添加或修改课程</h3>
              <p>添加或修改课程</p>
          </div>
        </div>

        
      </div>

    



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





      <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-18">
          <div class="example-case">

              <h1>图片</h1>
              
              <br />


              <div class="pure-controls">
                <img id="id_series_course_pic" src="<?php echo $__course['pic'];?>" >
              </div>

              <br />
              <br />

              <div style="">
                <a href="javascript:;" class="a-upload ivu-btn ivu-btn-primary ivu-btn-circle ivu-btn-large">
                  <input id="file" type="file" @change="uploadPic" value="选择文件" name="file" style="max-width:100px;"> 
                  上传图片
                </a>
              </div>

              <br />

          </div>
        </div>


        
      </div>









      <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-18">
          <div class="example-case">

              <h1>包含视频</h1>

              <i-table border :content="self" :columns="video_columns" :data="videos"></i-table>

              <br />

              <div class="pure-controls">
                <i-button type="primary" shape="circle" size="large" @click="showVideoDetail(0)">添加视频</i-button>

              </div>



          </div>
        </div>


        <!--v-component-->

        <div class="example-split" style="left: 75%;"></div>

        <div class="example-demo ivu-col ivu-col-span-6 ivu-col-split-right">
          <div class="example-case">
              <h3>修改课程包含的视频</h3>
          </div>
        </div>

        
      </div>

















  </div>


  <script type="text/javascript">
      var save = function(id){
        // alert(id)
        $$.ajax({
          method:'post',
          url:'/adm_course/save',
          data: {
            id: id,
            name: $('#id_course_name').val(),
            desc: $('#id_course_detail_content').html(),
          },
          succ: function(res){
            // alert(res)
            // window.location.reload();
            // $$.event.pub('CLOSE_DRAWER')

            v_course__detail.$Notice.success({
                title: '修改成功',
                desc: '信息已保存'
            });

          }
        })
      }

  </script>



  <script>
    var url = '/adm_course/get_all_course?'
    // $$.drawer = 
    var v_course__detail = $$.vue({
      el:'#v_adm_course__detail',

      EVENT: ['ADD_VIDEO_SUCC','SAVE_TAGS_SUCC','TAG_CHANGED'],

      data:function(){
        return {
          url:null,
          loading:false,

          page:1,
          count:0,
          length:10,

          search: '',
          tags:'',
          course_id:'<?=$__course_id?>',

          name: '<?=$__course['name']?>',
          desc: '<?=$__course['desc']?>',
          // videos: $$.str2js('<?=\en($__videos)?>'),
          videos: [],

          video_columns: [
              {
                  title: '视频标题',
                  key: 'name',
                  render (row, column, index) {
                      return `<Icon type="social-youtube"></Icon> <strong>${row.name}</strong>`;
                  }
              },
              {
                  title: '时长',
                  key: 'length',
                  width: 76,
                  align: 'center',
                  render (row, column, index) {
                      return `
                        ${row.length}s
                      `;
                  }
              },
              {
                  title: '习题',
                  key: 'action2',
                  width: 76,
                  align: 'center',
                  render (row, column, index) {
                      return `
                        <i-button type="primary" size="small" @click="showVideoDetail(${row.id})">习题</i-button>
                      `;
                  }
              },
              {
                  title: '视频',
                  key: 'action1',
                  width: 76,
                  align: 'center',
                  render (row, column, index) {
                      return `
                        <i-button type="primary" size="small" @click="showVideoDetail(${row.id})">上传</i-button>
                      `;
                  }
              },
              {
                  title: '操作',
                  key: 'action',
                  width: 100,
                  align: 'center',
                  render (row, column, index) {
                      return `
                        <i-button type="primary" icon="arrow-up-a" size="small" @click="move(${index},'up')"></i-button>
                        <i-button type="primary" icon="arrow-down-a" size="small" @click="move(${index},'down')"></i-button>
                        `;
                  }
              },
              {
                  title: '删除',
                  key: 'action3',
                  width: 76,
                  align: 'center',
                  render (row, column, index) {
                      return `
                        <i-button type="error" size="small" @click="move(${index},'del')">删除</i-button>
                        `;
                  }
              }
          ],



        }
      },

      _init: function() {
        // this.resetUrl()
        // alert(this.desc)
        var self = this
        var tags = '<?=$__tags?>'
        if(tags != '') self.tags = JSON.parse('<?=$__tags?>')
        console.log('self.tagsslef.tags'+self.tags)
        console.dir(this.videos)
        this.loadVideos()
      },

      methods: {

        hd_TAG_CHANGED: function(v){
          var tags = [];
          for(var i in v.tags){
            console.log(i)
            tags.push(i)
          }
          this.setState({
            tags: tags,
          })
        },

        uploadPic: function(){
          // alert('upload')
          var self = this

          var formData = new FormData();
          formData.append('key', 'series');
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
            $('#avatar_holder').css('background-image','url('+r.data.file+')')


              $$.ajax({
                url:'/adm_course/aj_save_pic',
                data:{
                  pic:self.pic,
                  course_id:self.course_id
                },
                succ:function(data){
                }
              })

          }).fail(function(res) {
            alert('上传失败，请选择小图，png,jpg,jpeg格式')
            console.dir('fail')
            console.dir(res)
          });

        },

        hd_SAVE_TAGS_SUCC:function(data){
          // alert(typeof data)
          var self = this
          self.tags = [];
          self.tags = data;
          self.save_succ_notice()
        },

        save_succ_notice:function(){
          this.$Notice.success({
            title:"保存成功!",
          })
        },

        del_succ_notice:function(){
          this.$Notice.error({
            title:"删除成功!",
          })
        },

        add_tag:function(){
          var self = this 
          $$.event.pub('OPEN_DRAWER',{
            width:700,
            url:'/adm_course/course_tags?course_id='+self.course_id
          })
        },

        //删除已有标签
        delete_tag:function(idx) {
          var self = this
          console.log(self.tags)
          self.tags.splice(idx,1)
          self.del_succ_notice()
          
          $$.ajax({
            url:'/adm_course/delete_tags_of_course',
            data:{
              tag:self.tags.toString(),
              course_id:self.course_id
            },
            succ:function(data){
            }
          })
        },

        move: function(idx, how) {
          var items  = this.videos
          // alert('==items 1:'+$$.js2str(items))
          if( 'up' == how ){
            if(idx==0) return ;
            var movingitem = items.splice(idx,1)
            items.splice(idx-1,0,movingitem[0])
          }else if( 'down' == how ){
            if(idx== items.length-1 ) return ;
            var movingitem = items.splice(idx,1)
            items.splice(idx+1,0,movingitem[0])
          }else if('del' == how){
            items.splice(idx,1)
          }

          // alert('movingitem :'+$$.js2str(movingitem[0]))
          // alert('==items 2:'+$$.js2str(items))
          // alert($$.js2str(items))
          this.setState({
            videos: items,
          })

          this.saveNewOrder()
        },

        saveNewOrder: function () {
          var self = this
          var ids = []
          for(var i in this.videos){
            var item = this.videos[i]
            // console.log($$.js2str(item))
            ids.push(item.id)
          }

          $$
            .then($$.wait({
              url: '/adm_course/aj_save_videos_to_course',
              method:'post',
              data: {
                course_id: '<?=$__course['id']?>',
                ids: ids,
              },
              succ: function(data,cont){

                cont(null,data)
              },
              fail: function(msg,code,cont){
                // alert($$.js2str(msg))
              },
            }))
            .then(function(cont, data){
              // self.func_loaded_(data)
            })

        },


        hd_ADD_VIDEO_SUCC: function(){
          this.loadVideos()
        },

        resetUrl: function(){
          this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search
        },

        loadVideos: function() {
          var self = this

          $$
            .then($$.wait({
              url: '/adm_course/aj_videos?id=<?=$__course['id']?>',
              succ: function(data,cont){
                // alert($$.js2str(data))
                self.videos = data.videos
                cont(null,data)
              },
              fail: function(msg,code,cont){
                // alert($$.js2str(msg))
              },
            }))
            .then(function(cont, data){
              // self.search()
              // self.func_loaded_(data)
            })

        },

        func_loaded: function(data){
          this.count = data.count
        },

        func_pagechanged: function(idx){
          this.page = idx
          this.resetUrl()
        },

        showVideoDetail:function (id){
          // $('#Id_Right_Drawer_Content').html('<Spin fix><div class="loader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10" v-pre></svg></div></Spin>')

          // $$.event.pub('OPEN_DRAWER',{width:800})
          // $.get('/adm_course/video_detail?course_id=<?=$__course['id']?>&id='+id,function(res){
          //   $('#Id_Right_Drawer_Content').html(res)
          // })

          $('#Id_Right_Drawer_Content').html('加载中')

          $$.event.pub('OPEN_DRAWER',{width:600})
          $.get('/adm_course/video_detail?course_id=<?=$__course['id']?>&id='+id,function(res){
            $('#Id_Right_Drawer_Content').html(res)
          })
        },



      },

      watch: {
        search: function(val){
          this.page = 1
          this.resetUrl()
        },
      }

    })
  </script>





<script type="text/javascript">
    var editor = new wangEditor('id_course_detail_content');

    editor.config.uploadImgUrl = '/upload/ajax_h5';

    editor.config.hideLinkImg = true;

    editor.config.menus = ["source", "|", "bold", "underline", "italic", "strikethrough", "eraser", "forecolor", "bgcolor", "|", "quote", "fontfamily", "fontsize", "head", "unorderlist", "orderlist", "alignleft", "aligncenter", "alignright", "|", "link", "unlink", "table", "|", "img", "|", "undo", "redo", "fullscreen"];


    editor.create();
</script>






<style type="text/css">
  .add_option_button{
    background:#33CC66;
    padding:5px 20px;
    border-radius:5px;
    color:#FFF;
    /*margin-left:30px;*/
    cursor:pointer;
  }

  .del_option_button{
    background:#FF3333;
    padding:5px 20px;
    border-radius:5px;
    color:#FFF;
    /*margin-left:10px;*/
    cursor:pointer;
  }
</style>

<?php
include \view('adm_inc__footer');
