<?php
include \view('adm_inc__header');
include \view('vue_course_ls');
include \view('vue_page');
?>
<script type="text/javascript">
$$.comp('v_course__table', $$.vCopy(__v__common_table(),{
  el: '#__v__common_table',
  EVENT:['ADD_COURDE_SUCC'],


  methods: {
    remove: function(id){
        var self = this
        $$.ajax({
          url:'/adm_course/aj_deletedcourse?id='+id,
          succ:function(data){
          self.loadData()
          }
        })

    },

    hd_ADD_COURDE_SUCC:function(){
      var self = this
      self.loadData()
    },

  },

}))
</script>




  <div v-cloak  id="v_adm_comment__ls" style="background:#FFF;width:100%;height:100%">

      
      <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-18">
          <div class="example-case">



              
              <h1>公共课程列表</h1>
              <br/>
              <div class="ivu-table-header">
                <table >
                  <thead>
                    <tr>
                      <th >
                        <i-input icon="android-search" placeholder="请输入课程名称"  :value.sync="search" ></i-input>
                      </th>
                    </tr>
                  </thead>
                </table>
              </div>


              <div class="box" >
                <div class="box-header">
                    
                  <div class="box-tools" style="
                  margin-right:1300px;margin-top:5px">
                  </div>
                </div>
                <div v-if="loading"><i class="fa zfa-refresh fa-spin"></i>Loading....</div>
                <div class="box-body table-responsive no-padding">
                    <v_course__table 
                      v-bind:func_loaded_="func_loaded"
                      v-bind:url_="url"
                      col_config_="course"
                      v-bind:th_width_="['50','200','200']"
                      v-bind:form_= "['状态','课程名称']"
                      check_box_=true
                    >
                    </v_course__table>
                </div>
              </div>

              <br />

              <v_page 
                v-bind:count_="count"
                v-bind:length_="length"
                v-bind:page_="page"
                v-bind:func_pagechanged_="func_pagechanged"
              >
              </v_page>

          </div>
        </div>

  

        <div class="example-split" style="left: 75%;"></div>

        <div class="example-demo ivu-col ivu-col-span-6 ivu-col-split-right">
          <div class="example-case">
              管理课程
          </div>
        </div>
      </div>



  </div>
  <script>
    var url = '/adm_company_course/get_pub_course?'
    $$.vue({
      el:'#v_adm_comment__ls',
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
        }
      },

      _init: function() {
        this.resetUrl()
      },

      methods: {

        resetUrl: function(){
          this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search
        },

        func_loaded: function(data){
          this.count = data.count
        },

        func_pagechanged: function(idx){
          this.page = idx
          this.resetUrl()
        },
        // add:function (){
        //   $('#Id_Right_Drawer_Content').html('加载中')

        //   $$.event.pub('OPEN_DRAWER',{width:600})
        //   $.get('/adm_course/add_course_modify',function(res){
        //     $('#Id_Right_Drawer_Content').html(res)
        //   })
        // },
        add:function() {
          var self = this
          self.alert = true
        },

        add_course:function() {
          var self = this
          $$.ajax({
            url:'/adm_course/add_course',
            data:{
              name:self.add_name,
            },
            succ:function(data){
              $$.event.pub('ADD_COURDE_SUCC')
              self.alert = false
            },
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
