

<template v-cloak id="v_url__branch">
  <div >
    <div track-by="$index" v-for="(idx,v) in ls" >
      <label for="v.id">{{v.title}}</label>
      <input type="radio" v-bind:value="v.id" v-model="correct">
    </div>
  </div>
  {{id | json}}
</template>

<script type="text/javascript">
$$.comp('v_url__branch',{
    el: '#v_url__branch',
    props:['ls_','correct_'],
    EVENT: ['ADDDD_URL_SUCC'],
    data: function (){
      return {
        id:[],
      }

    },
    methods: {
      hd_ADDDD_URL_SUCC: function (){
        var self = this
        $$.ajax({
          method:'get',
          url:'/adm_url_crud/checkurl',
          data:{
            id: self.id_,
            cate_id: self.id,
          },
          succ: function(){

          },
        })
      },
    }
})
</script>





