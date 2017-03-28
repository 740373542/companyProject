
<template id="v_company__selector">  
  <i-select ref="selector" :model.sync="selected" filterable clearable>
      <i-option v-for="(idx,company) in companys" :value="idx">{{ company.name }} </i-option>
  </i-select>

</template>


<script>
  $$.comp('v_company__selector', {
    el:'#v_company__selector',
    props:['func_select_'],

    data:function(){
      return {
        selected: '',
        companys: [
            // {
            //     id: 1,
            //     name: 'beijing',
            // },
            // {
            //     id: 2,
            //     name: 'shanghai',
            // },
        ],
      }
    },

    _init: function() {
      this.loadData()
    },

    methods: {

      loadData: function() {
        var self = this
        $$.ajax({
          url:'/adm_company/aj_all_list?',
          data:{
            // name:self.add_name,
          },
          succ:function(data){
            // $$.event.pub('ADD_COURDE_SUCC')
            // self.alert = false
            self.companys = data.ls
          },
        })
      },


    },

    watch: {
      selected: function(val){
        if(typeof val === "number"){
          // alert( this.companys[val] )
          this.func_select_(this.companys[val] ) 
          console.dir(this.$children)
          this.$children[0].clearSingleSelect()
        }
      },
    }

  })

</script>



<!-- 子组件模板 -->
<template id="vue_company__list">
 
  <div style="text-align:center;padding:0;">
    <li v-for="v in ls" >
    </li>
  </div>

</template>

<script type="text/javascript">

  $$.comp('vue_company__list', {
    el: '#vue_company__list',
    props: ['selects_','fun_select_'],

    data: function () {
      return {
        companys: [],
      }
    },

    _init: function(){
      var self = this
      self.loadData()
    },

    methods: {
      loadData: function(){
        var self = this
        $$.ajax({
          url:'/adm_company/aj_lsall?',
          succ:function(data){
            self.companys = data.ls
          },
          fail:function(msg,code){
            alert('['+code+']'+msg+'')
          },
        })
      },

    },

  }) // panel-wait
</script>


