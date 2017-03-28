<!-- 子组件模板 -->
<template id="__v_user__common">

</template>

<script type="text/javascript">
var __v_user__common = function(){
  return  {
    el: '#__v_user__common',
    props:['event_key_','id_key_','url_','func_loaded_','cols_'],
    props_watch:['search_key_','url_'],

    data: function () {
      return {
        loading: false,
        ls: [],
        col_ids:null,
        col_texts:null,
      }
    },

    _init: function() {
      var config = {
        id: 'ID',
        real_name: '姓名',
        phone: '手机',
        name: '昵称',
        mail: '邮件',
      }
      this.col_ids = []
      this.col_texts = []
      var cols = this.cols_.split(',')
      for(var i in cols){
        var col = cols[i]
        if(config[col]){
          this.col_ids.push(cols[i])
          this.col_texts.push( config[col] ) 
        }
      }
      if(!this.func_loaded_){
        this.func_loaded_ = function(){}
      }
      this.loadData()
    },
    
    _change: function(){
      this.loadData()
    },

    methods: {

      loadData: function(){
        var self = this

        self.loading = true
        $$
          .then($$.wait({
            url: self.url_,
            succ: function(data,cont){
              // alert($$.js2str(data))

              self.loading = false
              self.ls = data.ls

              cont(null,data)
            },
            fail: function(msg,code,cont){
              alert($$.js2str(msg))
            },
          }))
          .then(function(cont, data){
            // self.search()
            self.func_loaded_(data)
          })
      },

    },
   
  }
}
</script>





<!-- 子组件模板 -->
<template id="tpl_user__list">
  <table class="table table-hover">
    <tbody>
    <tr >
      <td v-for="col in col_texts">
        {{col}}
      </td>
      <td>操作</td>
    </tr>
    </tbody>
    <tr v-for="(idx,v) in ls">
      <td v-for="col in col_ids">
        {{v[col]}}
      </td>
      
      <td>
        <partial v-if="manage_" v-bind:name="manage_"></partial>
      </td>

    </tr>
  </table>
</template>



<script type="text/javascript">
$$.comp('v_user__list', $$.vCopy(__v_user__common(),{
  el: '#tpl_user__list',
}))
</script>







