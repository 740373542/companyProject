<?php
include \view('vue_company');
include \view('v_company__list_with_checkbox');
?>

<div v-cloak  id="v_company__assign_course" style="background:#FFF;width:100%;height:100%">
    
  <div class="example-case">
      <h1>选择公司</h1>
      <v_company__selector v-bind:func_select_="funcSelectCompany"></v_company__selector>
  </div>

  <br />
  <br />

  <div class="example-case">
    <v_company__list_with_checkbox 
      v-bind:selected_="companys_selected"
      v-bind:fun_unselect_="funUnSelectComapnyCheckbox"
    >
    </v_company__list_with_checkbox>
  </div>

</div>


<script>
  $$.vue({
    el:'#v_company__assign_course',
    data:function(){
      return {
        course_id: '<?=$_GET['course_id']?>',
        companys: [],
        companys_selected:[],
      }
    },

    _init: function() {
      this.loadData()
    },

    methods: {

      loadData:function() {
        var self = this
        $$.ajax({
          url:'/adm_company/aj_get_rel_company?',
          data:{
            course_id:  self.course_id,
          },
          succ:function(data){
            // alert($$.js2str(data))
            self.companys_selected = data.ls
          },
        })

      },

      funcSelectCompany: function(select) {
        var self = this

        var find = false
        var __ = self.companys_selected
        // alert($$.js2str(__))
        for(var i in __){
          var v = __[i]
          if(v.company_id==select.id) find = true;
        }

        if(find) return ;

        $$.ajax({
          url:'/adm_company/aj_assign?',
          data:{
            course_id:  self.course_id,
            company_id: select.id,
          },
          succ:function(data){
            // alert($$.js2str(data))
            __.push({company_id:select.id,course_id:self.course_id,name:select.name})
            self.setState({
              companys_selected: __,
            })

          },
        })


      },

      funUnSelectComapnyCheckbox: function(select,selectes) {
        var self = this
        var __ = $$.copy(self.companys_selected)

        // alert($$.js2str(select))

        for(var i=__.length-1;i>=0;i--){
          console.log('i:'+i)
          var v = __[i]
          if(v.company_id==select.company_id){
            __.splice(i,1)
          }
        }


        $$.ajax({
          url:'/adm_company/aj_unassign?',
          data:{
            course_id:  self.course_id,
            company_id: select.company_id,
          },
          succ:function(data){
            // alert($$.js2str(data))
            self.setState({
              companys_selected: __,
            })
          },
        })


      },

    },

  })

</script>

