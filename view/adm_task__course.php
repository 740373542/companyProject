<?php
include \view('adm_inc__header');
include \view('vue_company');
include \view('vue_tags');
?>

<script type="text/javascript">
</script>

<div v-cloak  id="v_adm_course__cate" style="background:#FFF;width:100%;height:100%">
    
    <div class="example ivu-row">
      <div class="example-demo ivu-col">
        <div class="example-case">
            
            <h1>分配课程</h1>
            <br/>

            <table>
              <tr>
                <td>
            <h4><b>商学院</b></h4>
            <br/>
            <Radio-group :model.sync="selectTag"  type="button" size="large">
                <Radio value="必备技能"></Radio>
                <Radio value="辅助技能"></Radio>
                <Radio value="岗位技能"></Radio>
            </Radio-group>

                </td>
                <td style="width:50px;"> 
                </td>
                <td>
            <h4><b>企业课堂</b></h4>
            <br/>
            <Radio-group :model.sync="selectTag"  type="button" size="large">
                <Radio value="必修课程"></Radio>
                <Radio value="岗位课程"></Radio>
                <Radio value="辅助课程"></Radio>
            </Radio-group>
                    
                </td>

                <td width="200" style="text-align:right">
                  <i-button type="info" style="font-size:14px;font-weight:bold;margin-top:22px" @click="resetOption">撤销选项</i-button>
                </td>
              </tr>
            </table>


            <br/>
            
            <div class="ivu-table-header">
                    <table style="width:100%">
                      <thead>
                        <tr>
                          <th style="width:50%;">
                                <i-input icon="android-search" placeholder="请输入课程名称" style="width:100%;" :value.sync="search" ></i-input>
                          </th>
                          <th style="width:50%;">
                            
                          </th>
                        </tr>
                      </thead>
                    </table>
                  </div>

            <br>
            


            <div v-for="course in courses" class="" style="margin:10px 0 30px 0px;position:relative;font-size:16px;border:1px solid #DDDDDD;padding:10px 30px 30px 20px;">
              <!-- 
              <div style="position:absolute;right:10px;top:10px;font-size:16px;">
                <i-button @click="popAssign(course.id)" type="primary">分配部门或角色</i-button>
              </div>
 -->

              <div style="font-size:20px;font-weight:bold;">{{course.name}}</div>

              <div v-bind:id="'details_'+course.id">权限加载中</div>

              <div style="font-size:9px;">{{{course.desc}}}</div>

            </div>

            <div class="ivu-table-tip" v-if="loading">
              <table cellspacing="0" cellpadding="0" border="0">
                <tbody>
                  <tr >
                    <td >
                      <i-col class="demo-spin-col" span="50">
                          <Spin fix>
                              <div class="loader">
                                  <svg class="circular" viewBox="25 25 50 50">
                                      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="5" stroke-miterlimit="10" v-pre>
                                  </svg>
                              </div>
                          </Spin>
                      </i-col>
                    </td>
                  </tr>
                </tbody>
              </table>
              <br/>
          </div>
          
          <div v-show="display_page === 'on'">
            <Page :total="count" :page-size="length"  @on-change="changePage"></Page>
          </div>
            


        </div>
      </div>

    </div>


</div>


<script>

var loadDetail = function(id){
  $.get('/adm_task/assign_role_inline?course_id='+id,function(res){
    $('#details_'+id).html(res)
  })
}

var url = '/adm_company_course/aj_get_courses_list?'

  $$.vue({
    el:'#v_adm_course__cate',
    data:function(){
      return {
        alert:false,
        url:null,
        loading:false,
        add_name:'',
        page:1,
        count:0,
        length:10,
        search: '',
        courses: [],
        selectTag:'',
        display_page:'on',
      }
    },

    _init: function() {
      this.resetUrl()
    },

    methods: {


      resetUrl:function(){
        var self = this 
        self.url = url + '&page='+self.page + '&length='+self.length +'&search='+self.search
        self.loadData()
      },


      loadData: function() {
        var self = this
        self.courses = []
        self.loading = true
        $$.ajax({
          url:self.url,
          succ:function(data){
            self.courses_all = data.course_all
            self.courses = data.ls
            self.count = data.count
            self.loading = false
            self.display_page = 'on'
            for(var i in self.courses){
              loadDetail(self.courses[i].id)
            }

          },
        })
      },

      popAssign: function(id) {
          $('#Id_Right_Drawer_Content').html('加载中')

          $$.event.pub('OPEN_DRAWER',{width:550})
          $.get('/adm_task/assign_role?course_id='+id,function(res){
            $('#Id_Right_Drawer_Content').html(res)
          })
      },

      filterTag: function() {
        var self = this
        self.display_page = 'off'
        var all = self.courses_all
        var filterResult = []
        for(var i in all){
          var tags = []
          // alert(all[i].tags)
          try{
            tags = $$.str2js(all[i].tags)
          }catch(e){
            tags = []
          }
          // console.dir(tags)
          for(var j in tags){
            if(tags[j]==self.selectTag){
              filterResult.push(all[i])
            }
          }
        }
        self.courses = filterResult
        
        for(var i in self.courses){
          loadDetail(self.courses[i].id)
        }
      },

      changePage:function(page){
        var self = this 
        self.page = page 
        self.resetUrl()
      },

      resetOption:function(){
        var self = this 

        self.setState({
          courses:[],
          selectTag:'',
          page:1,
        })

        
         self.resetUrl()
      },

    },



    watch: {
      search: function(val){
        this.page = 1
        this.resetUrl()
      },
      selectTag:function(val){
        // alert(val)
        this.filterTag()
      },
    }

  })

</script>


<?php
include \view('adm_inc__footer');
