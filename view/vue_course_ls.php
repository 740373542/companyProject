<?php
include \view('vue_comm_table_config');
?>

<!-- 子组件模板 -->
<template id="__v__course_table">
  <div class="ivu-article">
    <article>
      <div class="ivu-table-wrapper">
        <div class="ivu-table ivu-table-border">
          <div class="ivu-table-header">
            <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">

            <colgroup v-if="th_width_" >
              <col v-for="v in th_width_" :width="v">
            </colgroup>
  
              <thead>
                <tr>
                  <th v-for="col in col_texts">
                    <div class="ivu-table-cell">{{col}}</div>
                  </th>

                  <th class="ivu-table-column-center">
                      <div class="ivu-table-cell">操作</div>
                  </th>
                </tr>
              </thead>

            </table>
          </div>

          <div class="ivu-table-body">
            <table cellspacing="0" cellpadding="0" border="0" style="width: 100%;">

            <colgroup v-if="th_width_" >
              <col v-for="v in th_width_" :width="v">
            </colgroup>

              <tbody class="ivu-table-tbody">
                <tr class="ivu-table-row" v-if="!loading" v-for="(idx,v) in ls">
                  <td class="ivu-table-column-center">
                    <Checkbox :checked.sync="show_box(v)" @change="modify(v)"></Checkbox>
                  </td>
                  <td>
                    <div class="ivu-table-cell">
                      {{v.name}}
                    </div>
                  </td>
                  <td class="ivu-table-column-center">
                    <div class="ivu-table-cell">
                      <div>
                        <partial v-if="manage_" v-bind:name="manage_"></partial>
                      </div>
                    </div>
                  </td>

                </tr>
              </tbody>
            </table>
          </div>

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


          <div class="ivu-table-tip" v-if="ls == '' && !loading">
            <table cellspacing="0" cellpadding="0" border="0">
              <tbody>
                <tr>
                  <td>暂无筛选结果</td></tr>
              </tbody>
            </table>
          </div>


        </div>
      </div>

    </article>
  </div>
</template>

<script type="text/javascript">
var __v__course_table = function(){
  return  {
    el: '#__v__course_table',
    props:['event_key_','id_key_','url_','func_loaded_','cols_','col_config_','keep_data_when_loading_','should_reload_','img_','img_text_','th_width_','form_','check_box_'],
    props_watch:['search_key_','url_','should_reload_','col_config_'],

    data: function () {
      return {
        loading: false,
        ls: [],
        col_ids:null,
        col_texts:null,
      }
    },

    _init: function() {
      var self = this
      self.col_texts = self.form_
      if(!this.func_loaded_){
        this.func_loaded_ = function(){}
      }
      this.loadData()
    },
    
    _change: function(){
      var self = this
      self.col_texts = self.form_
      self.col_ids = self.col_str_
      if(!this.func_loaded_){
        this.func_loaded_ = function(){}
      }
      this.loadData()
    },

    methods: {

      loadData: function(){
        var self = this
        // alert('yes')
        self.loading = true
        // alert(typeof this.empty_when_loading_)
        if( (typeof this.keep_data_when_loading_)+'' === 'undefined'){
          this.keep_data_when_loading_ = 'false'
        }
        if(this.keep_data_when_loading_==='false') self.ls = []

        // alert('第一次=='+self.url_)
        if(!self.url_) return ;

        $$
          .then($$.wait({
            url: self.url_,
            succ: function(data,cont){
              // alert($$.js2str(data))
              // alert('里面=='+url)

              self.loading = false
              self.ls = data.ls

              cont(null,data)
            },
            fail: function(msg,code,cont){
              // alert($$.js2str(msg))
            },
          }))
          .then(function(cont, data){
            // self.search()
            self.func_loaded_(data)
          })
      },

      modify:function(v,checked) {
        // alert(checked)
        $$.ajax({
          url:'/adm_course/modify_state',
          data:{
            id:v.id,
          },
          succ:function(data){

          },
        })
      },

      show_box:function(v){
        if(v.state == 1){
          return true
        }
        return false
      }

    },
   
  }
}
</script>















<style type="text/css">
 .demo-spin-col{
    height: 100px;
    position: relative;
    border: 1px solid #eee;
  }


  .demo-spin-container{
        display: inline-block;
        width: 200px;
        height: 100px;
        position: relative;
        border: 1px solid #eee;
  }
  .ivu-table:after {
    width: 0px; 
    height: 100%;
    position: absolute;
    top: 0;
    right: 0;
    z-index: 3;
  }
  </style>




