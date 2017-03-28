<?php
include \view('inc_home_header');
include \view('vue_company_join');
// print_r($_SESSION['edu_user']);
?>

<script type="text/javascript">
var callBridgeStart = function(){}
</script>



<div v-choak id="v_main">
  
  <vue_company_join></vue_company_join>

  <!-- 
  <div class="slide" id="slide2" style="margin-top:0px;height:170px;background:#FFF;" onclick="javascript: call_native('open_nav',{url: '/test/video', title: '播放视频', }); void(0);"> 
  -->
<!-- 
  <div class="slide" id="slide2" style="margin-top:0px;height:170px;background:#FFF;" onclick="javascript: call_native('open_nav',{url: '/test/video', title: '播放视频', }); void(0);">
   -->
  <div class="slide" id="slide2" style="margin-top:0px;height:170px;background:#FFF;">

      <ul>

        <?php
        $courses = \model\course::finds('where id>0 order by id asc');
        foreach ($courses as $course) {
        ?>

          <li onclick="javascript: call_native('video',{url:'/course/detail?id=<?=$course['id']?>', title: '<?=$course['name']?>', }); void(0);">
                <div style="text-align:center;height:100%;width:100%;background:#F3F3F3;background-image:url(<?=$course['pic']?>);background-repeat:no-repeat;background-position:center;background-size: cover;">
                </div>
          </li>

          <?php
          }
          ?>

          <li>
                <div style="text-align:center;height:100%;width:100%;background:#F3F3F3;background-image:url(/uploads/video/home_1_1.jpg);background-repeat:no-repeat;background-position:center;background-size: cover;">
                </div>
          </li>
      </ul>
      <div class="dot">
          <span></span>
          <span></span>
          <span></span>
      </div>
  </div>




<script type="text/javascript">
var uploadPic = function(){
  var formData = new FormData();
  formData.append('key', 'series');
  formData.append('rename', true);
  formData.append('file', $('#file')[0].files[0]);
  // alert(formData)
  $.ajax({
    url: '/upload/ajax',
    type: 'POST',
    cache: false,
    data: formData,
    processData: false,
    contentType: false
  }).done(function(res) {
    $('#id_series_course_pic').val(res)
    $('#avatar_holder').css('background-image','url('+res+')')
  }).fail(function(res) {
    alert('上传失败，请选择小图，png,jpg,jpeg格式')
    console.dir('fail')
    console.dir(res)
  });
}
</script>



<div class="weui_grids bgwhite" style="padding-top:4px;">
      <a onclick="call_native('event',{event_name:'OPEN_MODAL'});"  class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#63BD77;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-68 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              签到
          </p>
        </div>
      </a>




      <!-- <a onclick="call_native('openwin_with_nav',{nav_url_:'/news/ls',title:'通知'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->


      <a onclick="call_native('open_win',{url:'http://yfny.h5-legend.com/h5/yfny.html?t=1481948135839',title:'企业文化'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#4AC0C1;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-62 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              企业文化
          </p>
        </div>
      </a>



      <a onclick="call_native('open_win',{url:'https://wj.qq.com/s/988862/fd0f',title:'调查问卷'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#4AC0C1;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-62 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              调查问卷
          </p>
        </div>
      </a>





      <!-- <a onclick="call_native('openwin_with_nav',{nav_url_:'/news/ls',title:'通知'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->
      <a onclick="call_native('openwin_with_nav',{nav_url_:'/news/aj_nav_ls',title:'通知'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#4AC0C1;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-62 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              通知
          </p>
        </div>
      </a>

      <a onclick="call_native('open_win',{url:'/task/',title:'学习计划'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
<!-- 
      <a onclick="call_native('openwin_with_nav',{nav_url_:'/plan/aj_nav_ls',title:'学习计划'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
       -->
      <!-- <a onclick="call_native('open_win',{url:'/test/timeline',title:'过关'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#FB6B5B;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-1 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              学习计划
          </p>
        </div>
      </a>


      <!-- <a onclick="call_native('open_win',{url:'/ask/',title:'auto'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->
      <a onclick="call_native('openwin_with_nav',{nav_url_:'/pass/aj_nav_ls',title:'过关'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#FFC332;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-81 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              测评
          </p>
        </div>
      </a>

      <!-- <a onclick="call_native('openwin_with_nav',{nav_url_:'/bschool/aj_nav_ls',title:'商学院'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->
      <a onclick="call_native('event',{event_name:'GO_NAV',tab:'bschool'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#D8A243;width:40px;height:40px;margin:0 auto 5px auto;">
              <!-- <span class="icon icon-81 home-icon" style=""></span> -->
              <span class="icon icon-81 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              商学院
          </p>
        </div>
      </a>


      <a onclick="call_native('event',{event_name:'GO_NAV',tab:'corp'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#A1B508;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-100 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              论坛
          </p>
        </div>
      </a>

      <!-- <a onclick="call_native('event',{event_name:'PICK_IMAGE',tab:'corp'});"  class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->
      <a onclick="call_native('open_win',{url:'/ask/',title:'问答',event_key:'ask_list',});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#FEB700;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-79 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              问答
          </p>
        </div>
      </a>
<!-- 
      <a onclick="call_native('event',{event_name:'PICK_IMAGE',tab:'corp'});"  class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#FEB700;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-3 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              分享
          </p>
        </div>
      </a>
 -->




      <!-- <a onclick="call_native('open_win',{url:'/index/more',title:'auto'});" class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;"> -->

      <a onclick="javascript:alert('联系管理员开通');"  class="js_grid weui_grid-4-noline activable home-nav2" data-id="cell" style="padding:0;">
        <div class="icon-bg">
          <div>
            <div class="home-icon-div" style="background:#F46704;width:40px;height:40px;margin:0 auto 5px auto;">
              <span class="icon icon-93 home-icon" style=""></span>
            </div>
          </div>
          <p class="weui_grid_label">
              更多
          </p>
        </div>
      </a>

  </div>




  <style type="text/css">
  e-title h2{
    padding-bottom: 15px;
  }


  .svg-icon {
      /*background: url(/__assets__/sprite.css.svg) 78.86134% 0px no-repeat;*/
      width: 98px;
      height: 98px;
      bottom: -2px;
      position: relative;
      float: right;
      background-size:120%;
      background-position: bottom right;
      background-attachment: fixed;
  }

  </style>

    <div style="margin-top:0px;">

      <e-row>
        <e-col>

          <e-card data-ripple-color="#189ED6" data-ripple-class="" class="ripple"  onclick="javascript: call_native('open_win',{url:'/ask', title: '问答', }); void(0);">
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/zsk.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>企业知识库</h2>
                      <p>让员工跟随企业共同成长</p>
                  </e-title>
              </e-item>
          </e-card>

          <e-card data-ripple-color="#189ED6" class="ripple" onclick="javascript: call_native('open_win',{url:'/bbs/corp_ls?id=34', title: '员工培训', }); void(0);">
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/ygpx.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>员工培训</h2>
                      <p>提升员工能力，满足企业发展需要</p>
                  </e-title>
              </e-item>
          </e-card>

          <e-card data-ripple-color="#189ED6" class="ripple" onclick="javascript: call_native('open_win',{url:'/bbs/corp_ls?id=35', title: '入职培训', }); void(0);">
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/rzpx.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>入职培训</h2>
                      <p>加快新员工了解、融入企业</p>
                  </e-title>
              </e-item>
          </e-card>

          <e-card data-ripple-color="#189ED6" class="ripple" onclick="javascript: call_native('open_win',{url:'/target/', title: '目标管理', }); void(0);">
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/mbgl.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>目标管理</h2>
                      <p>给每个团队和个人设置目标，实时跟进每个目标的完成情况</p>
                  </e-title>
              </e-item>
          </e-card>


          <e-card data-ripple-color="#189ED6" class="ripple" onclick="javascript: call_native('open_win',{url:'/staff/?_pagemark=<?=$__pagemark?>&_event=SELECT_MEMBER&type=radio', title: '目标管理', }); void(0);">
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/khpb.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>考核评比</h2>
                      <p>根据员工表现和任务完成情况合理奖励，激发员工参与感</p>
                  </e-title>
              </e-item>
          </e-card>



          <e-card>
              <e-item>
                  <div class="svg-icon" style="background: url(/svg/lcyh.svg) no-repeat top 10px right 10px;background-size:60%;"></div>
                  <e-title>
                      <h2>流程优化</h2>
                      <p>简化办公流程</p>
                  </e-title>
              </e-item>
          </e-card>

                
        </e-col>
      </e-row>
    </div>






    </div>

  </div>











  <div style="clear:both;height:40px;"></div>

</div>

<script type="text/javascript">

$$.vue({
  el:'#v_main',
})

$(function(){

  $('#slide2').swipeSlide({
    autoSwipe:true,//自动切换默认是
    speed:3000,//速度默认4000
    continuousScroll:true,//默认否
    transitionType:'cubic-bezier(0.22, 0.69, 0.72, 0.88)',
    //过渡动画linear/ease/ease-in/ease-out/ease-in-out/cubic-bezier
    lazyLoad:true,//懒加载默认否
    firstCallback : function(i,sum,me){
      me.find('.dot').children().first().addClass('cur');
    },
    callback : function(i,sum,me){
      me.find('.dot').children().eq(i).addClass('cur').siblings().removeClass('cur');
    }
  });

}); 
</script>


<script type="text/javascript">
window.call_from_native = window.call_from_native || {}
window.call_from_native['SELECT_MEMBER'] = function(msgstr, msg) {
  alert(msgstr)
  var msg = $$.str2js(msgstr)
}
</script>














<div id="app222">
    <i-button @click="show2">Click me!</i-button>
    <Modal :visible.sync="visible" title="Welcome">欢迎使用 iView</Modal>

    <Row>
        <i-col span="12">col-12</i-col>
        <i-col span="12">col-12</i-col>
    </Row>
    <br>
    <Row>
        <i-col span="8">col-8</i-col>
        <i-col span="8">col-8</i-col>
        <i-col span="8">col-8</i-col>
    </Row>
    <br>
    <Row>
        <i-col span="6">col-6</i-col>
        <i-col span="6">col-6</i-col>
        <i-col span="6">col-6</i-col>
        <i-col span="6">col-6</i-col>
    </Row>


    <p>带描述信息</p>
    <i-button @click="info(false)">消息</i-button>
    <i-button @click="success(false)">成功</i-button>
    <i-button @click="warning(false)">警告</i-button>
    <i-button @click="error(false)">错误</i-button>
    <p>仅标题</p>
    <i-button @click="info(true)">消息</i-button>
    <i-button @click="success(true)">成功</i-button>
    <i-button @click="warning(true)">警告</i-button>
    <i-button @click="error(true)">错误</i-button>

    <Tabs>
        <Tab-pane label="macOS" icon="social-apple">标签一的内容</Tab-pane>
        <Tab-pane label="Windows" icon="social-windows">标签二的内容</Tab-pane>
        <Tab-pane label="Linux" icon="social-tux">标签三的内容</Tab-pane>
    </Tabs>

    <Spin></Spin>

    <Slider :value="value1"></Slider>

    <i-table border :content="self" :columns="columns7" :data="data6"></i-table>

    <mt-button @click.native="handleClick">按钮</mt-button>

</div>
<script>
    new Vue({
        el: '#app222',
        data: {
            visible: false,
            value1: 25,
                self: this,
                columns7: [
                    {
                        title: '姓名',
                        key: 'name',
                        render (row, column, index) {
                            return `<Icon type="person"></Icon> <strong>${row.name}</strong>`;
                        }
                    },
                    {
                        title: '年龄',
                        key: 'age'
                    },
                    {
                        title: '地址',
                        key: 'address'
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 150,
                        align: 'center',
                        render (row, column, index) {
                            return `<i-button type="primary" size="small" @click="show(${index})">查看</i-button> <i-button type="error" size="small" @click="remove(${index})">删除</i-button>`;
                        }
                    }
                ],
                data6: [
                    {
                        name: '王小明',
                        age: 18,
                        address: '北京市朝阳区芍药居'
                    },
                    {
                        name: '张小刚',
                        age: 25,
                        address: '北京市海淀区西二旗'
                    },
                    {
                        name: '李小红',
                        age: 30,
                        address: '上海市浦东新区世纪大道'
                    },
                    {
                        name: '周小伟',
                        age: 26,
                        address: '深圳市南山区深南大道'
                    }
                ]
        },
        methods: {
            handleClick: function() {
              this.$toast('Hello world!')
            },

            show2: function () {
                this.visible = true;
            },

            info: function (nodesc) {
                this.$Notice.info({
                    title: '这是通知标题',
                    desc: nodesc ? '' : '这里是通知描述这里,是通知描述这里是通知描述这里,是通知描述这里,是通知描述这里是通知描述这里是通知描述'
                });
            },
            success: function (nodesc) {
                this.$Notice.success({
                    title: '这是通知标题',
                    desc: nodesc ? '' : '这里是通知描述这里,是通知描述这里是通知描述这里,是通知描述这里,是通知描述这里是通知描述这里是通知描述'
                });
            },
            warning: function (nodesc) {
                this.$Notice.warning({
                    title: '这是通知标题',
                    desc: nodesc ? '' : '这里是通知描述这里,是通知描述这里是通知描述这里,是通知描述这里,是通知描述这里是通知描述这里是通知描述'
                });
            },
            error: function (nodesc) {
                this.$Notice.error({
                    title: '这是通知标题',
                    desc: nodesc ? '' : '这里是通知描述这里,是通知描述这里是通知描述这里,是通知描述这里,是通知描述这里是通知描述这里是通知描述'
                });
            },

            show: function (index) {
                this.$Modal.info({
                    title: '用户信息',
                    content: `姓名：${this.data6[index].name}<br>年龄：${this.data6[index].age}<br>地址：${this.data6[index].address}`
                })
            },
            remove: function (index) {
                this.data6.splice(index, 1);
            },

        }
    })
  </script>



<?php
include \view('inc_home_footer');
?>