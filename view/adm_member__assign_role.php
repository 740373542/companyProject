<?php
  require \view("vue_tags");
?>

<div v-cloak  id="v_adm_member__assign_role" style="background:#FFF;width:100%;height:100%">
    
  <div class="example-case">
      <h1>选择部门或角色</h1>
      <v_tags__selector 
        v-bind:tags_="tags"
        v-bind:func_select_="funcSelectTag"
        v-bind:func_unselect_="funcUnSelectTag"
        v-bind:tags_selected_="tags_selected"
      >
      </v_tags__selector>

  </div>

</div>


<script>
  $$.vue({
    el:'#v_adm_member__assign_role',
    data:function(){
      return {
        course_id: '<?=$_GET['course_id']?>',
        companys: [],
        companys_selected:[],
        tags:[],
        tags_selected:[],
        member_id:<?=$__member_id?>,
      }
    },

    _init: function() {
      this.loadData()
    },

    methods: {

      loadData:function() {
        var self = this
        $$.ajax({
          url:'/adm_company_role/member_by_role?',
          data:{
            member_id:self.member_id,
          },
          succ:function(data){
            console.log($$.js2str(data))
            for (var i in data.ls) {
              data.ls[i].name = data.ls[i].title
            }
            self.tags = data.ls

            self.tags_selected = data.selected

          },
        })

      },

      funcUnSelectTag:function(tag){
        var self = this

        $$.ajax({
          url:'/adm_company_role/remove_member_role?member_id='+self.member_id+'&role_id='+tag.id,
          succ:function(data){
            $$.event.pub('SELECT_ITEM')
          },
        })

      },

      funcSelectTag: function(tag) {
        var self = this

        $$.ajax({
          url:'/adm_company_role/set_member_role?member_id='+self.member_id+'&role_id='+tag.id,
          succ:function(data){
            $$.event.pub('SELECT_ITEM')
          },
        })


      },


    },

  })

</script>

