<?php
require \view('adm_inc__header') 
?>

<div id="vue">
  <input v-model="key"></inpurt>
  <div v-for="v in search_result">{{v.name}}</div>
</div>

<script type="text/javascript">
  $$.vue({
    el:'#vue',
    data:function(){
      return {
        ls:[
        {'name':'ls',id:1},
        {'name':'lh',id:2},
        {'name':'ccc',id:3},
        {'name':'vue',id:4},
        ],

        key:'',

        search_result:[],
      }
    },

    _init:function(){
      this.search()
    },

    methods:{
      search:function(){
        var key = this.key
        var datas = this.ls
        this.search_result = []
        for(var k in datas){
          var v = datas[k]
          if( v.name.indexOf(key) >= 0){
            this.search_result.push(v)
          }
        }

        this.setState({
          search_result:this.search_result
        })
      },
    },

    watch:{
      key:function(){
        this.search()
      },
    }
  })
</script>