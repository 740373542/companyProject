<?php
include \view('adm_inc__header');
include \view('vue_company');
?>

<script type="text/javascript">
</script>

<div v-cloak  id="v_adm_course__cate" style="background:#FFF;width:100%;height:100%">
    
    <div class="example ivu-row">
      <div class="example-demo ivu-col">
        <div class="example-case">
            
            <h1>课程列表</h1>
            <br/>
            
            <li v-for="course in courses" class="" style="margin:0 0 30px 0;position:relative;font-size:16px;border-bottom:1px solid #DDDDDD;">
              <div style="position:absolute;right:0;top:-7px;font-size:16px;">
                <i-button @click="popAssign(course.id)" type="primary">分配</i-button>
              </div>
              {{course.name}} 
            </li>


        </div>
      </div>

    </div>


</div>


<script>
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
      }
    },

    _init: function() {
      this.loadData()
    },

    methods: {

      loadData: function() {
        var self = this
        $$.ajax({
          url:'/adm_course/aj_course_by_company_v2?',
          data:{
            // name:self.add_name,
          },
          succ:function(data){
            // $$.event.pub('ADD_COURDE_SUCC')
            // self.alert = false
            self.courses = data.ls
          },
        })
      },

      popAssign: function(id) {
          $('#Id_Right_Drawer_Content').html('加载中')

          $$.event.pub('OPEN_DRAWER',{width:550})
          $.get('/adm_company/assign_course?course_id='+id,function(res){
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


<?php
include \view('adm_inc__footer');
