<?php
// require_once \view('vue_base');
require_once \view('vue_comm_table');
include_once \view('vue_page');
?>

<template id="v__exercise_buttons">
    <i-button type="primary"  @click="selectItem(v)">选中</i-button>
</template>

<script type="text/javascript">
  $$.part('v__exercise_buttons',$('#v__exercise_buttons').html())

  $$.comp('v__exercise_list',$$.vCopy(__v__common_table(),{
    el:'#__v__common_table',

    EVENT:[],

    _setup:function(){
      this.manage_ = 'v__exercise_buttons'
    },

    methods: {
      selectItem: function(v){
        var self = this
        // alert($$.js2str(v))
        $$.event.pub('SELECT_EXERCISE',{
          data:v,
        });
      },

    },

  }))
</script>











<script type="text/javascript">
var __v_exercise__common = function(){
  return  {
    el: '#__v_exercise__common',
    props:[],
    props_watch:[''],

    data: function () {
      return {
        loading: false,
        ls: [],
      }
    },

    _init: function() {
      this.loadData()
    },

    methods: {
    },
   
  }
}
</script>


<template id="__v_exercise__common">
  <div style="width:100%;">
    
    <div style="display:flex;">
      <div style="flex:1;">
        <i-input :value.sync="search">
            <i-button slot="append" icon="ios-search"></i-button>
        </i-input>  
      </div>
      <div style="width:20px;"></div>
      <div>
        <i-button type="success" @click="add">
          <span>刷新</span>
        </i-button>
      </div>
    </div>

    <br />
    

    <v__exercise_list 
      v-bind:func_loaded_="func_loaded"
      v-bind:url_="url"
      col_config_="exercise_only_title"
      img_="android-clipboard"
      img_text_="title"
    >
    </v__exercise_list>

    <v_page 
      v-bind:count_="count"
      v-bind:length_="length"
      v-bind:page_="page"
      v-bind:func_pagechanged_="func_pagechanged"
    >
    </v_page>

  </div>
</template>



<script type="text/javascript">
$$.comp('v_exercise__selector', $$.vCopy(__v_exercise__common(),{

  data: function () {
    return {
      search: '',
      count: 0,
      length: 0,
      page: 0,
      url:'',

      selected: {},
    }
  },

  _init: function() {
    var self = this
    self.resetUrl()
  },

  methods: {
    resetUrl: function () {
      this.url = '/adm_course/aj_ls_exercise?search='+this.search
    },

    func_loaded: function(){},
    func_pagechanged: function(){},
  },

  watch: {
    search: function () {
      this.resetUrl()
    },
  },

}))
</script>










<template id="v_exercise__of_video">
  <div style="width:100%;">


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
          </div>

    <i-table border :content="self" :columns="columns" :data="exercises"></i-table>

  </div>
</template>



<script type="text/javascript">
$$.comp('v_exercise__of_video', {
  el:'#v_exercise__of_video',

  props: ['video_id_'],

  EVENT: ['SELECT_EXERCISE'],

  _init: function(){
    this.video_id_ = parseInt(this.video_id_)
    // alert(this.video_id_)
    if(this.video_id_) {
      this.loadData()
    }
  },

  data: function () {
    return {
      loading: false,
      exercises: [],
      // exercises: [{"id":"52","title":"xx2","options":"[\"001\",\"002\"]","answers":"[0]","score":"0","target":"0","tags":"","deleted":"0","update_at":"2017-02-15 22:28:24","create_at":"2017-02-15 22:28:24","company_id":"0"}],


      columns: [
          {
              title: '问题',
              key: 'name',
              render (row, column, index) {
                  return `<Icon type="social-youtube"></Icon> <strong>${row.title}</strong>`;
              }
          },
          {
              title: '操作',
              key: 'action',
              width: 100,
              align: 'center',
              render (row, column, index) {
                  return `
                    <i-button type="primary" icon="arrow-up-a" size="small" @click="move(${index},'up')"></i-button>
                    <i-button type="primary" icon="arrow-down-a" size="small" @click="move(${index},'down')"></i-button>
                    `;
              }
          },
          {
              title: '删除',
              key: 'action3',
              width: 76,
              align: 'center',
              render (row, column, index) {
                  return `
                    <i-button type="error" size="small" @click="move(${index},'del')">删除</i-button>
                    `;
              }
          }
      ],

    }
  },




  methods: {
    hd_SELECT_EXERCISE: function(v){
      var self = this
      // var exercises = self.exercises
      // exercises.push(v.data)
      // self.setState({
      //   exercises: exercises,
      // })
      
      // alert($$.js2str(v))
      $$
        .then($$.wait({
          url: '/adm_course/aj_add_test_to_video?video_id='+this.video_id_+'&test_id='+v.data.id,
          succ: function(data,cont){

            self.loading = false
            self.exercises = data.ls

            cont(null,data)
          },
          fail: function(msg,code,cont){
            // alert($$.js2str(msg))
          },
        }))
        .then(function(cont, data){
          // self.func_loaded_(data)
        })

      

    },

    move: function(idx, how) {
      var items  = this.exercises
      // alert('==items 1:'+$$.js2str(items))
      if( 'up' == how ){
        if(idx==0) return ;
        var movingitem = items.splice(idx,1)
        items.splice(idx-1,0,movingitem[0])
      }else if( 'down' == how ){
        if(idx== items.length-1 ) return ;
        var movingitem = items.splice(idx,1)
        items.splice(idx+1,0,movingitem[0])
      }else if('del' == how){
        items.splice(idx,1)
      }

      // alert('movingitem :'+$$.js2str(movingitem[0]))
      // alert('==items 2:'+$$.js2str(items))
      // alert($$.js2str(items))
      this.setState({
        exercises: items,
      })

      this.saveNewOrder()
    },

    saveNewOrder: function () {
      var self = this
      var ids = []
      for(var i in this.exercises){
        var item = this.exercises[i]
        // console.log($$.js2str(item))
        ids.push(item.id)
      }

      $$
        .then($$.wait({
          url: '/adm_course/aj_save_testids_to_video',
          method:'post',
          data: {
            video_id: this.video_id_,
            ids: ids,
          },
          succ: function(data,cont){

            cont(null,data)
          },
          fail: function(msg,code,cont){
            // alert($$.js2str(msg))
          },
        }))
        .then(function(cont, data){
          // self.func_loaded_(data)
        })

    },

    loadData: function () {
      var self = this
      self.loading = true
      $$
        .then($$.wait({
          url: '/adm_course/aj_ls_exercise_by_videoid?id='+this.video_id_,
          succ: function(data,cont){

            self.loading = false
            self.exercises = data.ls

            cont(null,data)
          },
          fail: function(msg,code,cont){
            // alert($$.js2str(msg))
          },
        }))
        .then(function(cont, data){
          // self.func_loaded_(data)
        })

    },

    // func_loaded: function(){},
    // func_pagechanged: function(){},
  },

  watch: {
    // search: function () {
    //   this.resetUrl()
    // },
  },

})
</script>



