<?php
?>

<div v-cloak  id="v_adm_task__assign_course<?=$_GET['course_id']?>" style="background:#FFF;width:100%;height:100%">
    
      <v_tags__selector_inline 
        v-bind:tags_="tags"
        v-bind:func_select_="funcSelectTag"
        v-bind:func_unselect_="funcUnSelectTag"
        v-bind:tags_selected_="tags_selected"
      >
      </v_tags__selector_inline>

</div>


<script>
  $$.vue({
    el:'#v_adm_task__assign_course<?=$_GET['course_id']?>',
    data:function(){
      return {
        course_id: '<?=$_GET['course_id']?>',
        companys: [],
        companys_selected:[],
        tags:[],
        tags_selected:[],
        task_id:null,
      }
    },

    _init: function() {
      this.loadData()
    },

    methods: {

      loadData:function() {
        var self = this
        $$.ajax({
          url:'/adm_company_course/v2_get_all_roles?',
          data:{
            course_id:  self.course_id,
          },
          succ:function(data){
            console.log($$.js2str(data))
            for (var i in data.ls) {
              data.ls[i].name = data.ls[i].title
            }
            self.tags = data.ls
            self.task_id = data.task.id

            self.tags_selected = data.selected
          },
        })

        // self.tags = [
        //   {
        //       id: 1,
        //       name: 'beijing2',
        //   },
        //   {
        //       id: 2,
        //       name: 'shanghai2',
        //   },
        // ]

        // self.tags_selected = ['104']

      },

      funcUnSelectTag:function(tag){
        var self = this
        // alert('un:'+$$.js2str(tag))

        $$.ajax({
          url:'/adm_company_task_permission/remove_role_permission?task_id='+self.task_id+'&role_id='+tag.id,
          succ:function(data){
            
          },
        })

      },

      funcSelectTag: function(tag) {
        var self = this
        // alert($$.js2str(tag))

        $$.ajax({
          url:'/adm_company_task_permission/add_role_permission?task_id='+self.task_id+'&role_id='+tag.id,
          succ:function(data){
            
          },
        })
        // var find = false
        // var __ = self.companys_selected
        // // alert($$.js2str(__))
        // for(var i in __){
        //   var v = __[i]
        //   if(v.company_id==select.id) find = true;
        // }

        // if(find) return ;

        // $$.ajax({
        //   url:'/adm_company/aj_assign?',
        //   data:{
        //     course_id:  self.course_id,
        //     company_id: select.id,
        //   },
        //   succ:function(data){
        //     // alert($$.js2str(data))
        //     __.push({company_id:select.id,course_id:self.course_id,name:select.name})
        //     self.setState({
        //       companys_selected: __,
        //     })

        //   },
        // })


      },


    },

  })

</script>

