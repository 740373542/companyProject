<?php
include \view('vue_loadData');
?>

<template id="v_comm_cate_type">
    <div class="ivu-table-header">
    <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">

      <thead>
        <tr>
          <th style="width:50%;">
              <i-input  placeholder="请输入标题名称" size="large"  :value.sync="title_name_" ></i-input>
          </th>

          <th style="width:50%;">
            <div >
              <i-button type="primary" :loading="button_loading" icon="plus-round"
              style="font-size:16px;font-weight:bold;box-shadow:0 0 7px #999;"

              @click="saveData('/adm_comm_cate/update_comm_cate?title='+title_name_+'&type='+type_)">
                  <span v-if="!button_loading">添加标题</span>
                  <span v-else>执行中</span>
              </i-button>
            </div>
          </th>
        </tr>
      </thead>
    </table>
  </div>
  <br/>
   <div class="ivu-article">
    <article>
      <div class="ivu-table-wrapper">
        <div class="ivu-table ivu-table-border">

          <div class="ivu-table-body">
            <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">


              <thead>
                <tr>
                  <th>
                    <div class="ivu-table-cell">标题名称</div>
                  </th>
                  <th>
                    <div class="ivu-table-cell">操作</div>
                  </th>
                </tr>
              </thead>
              <tbody class="ivu-table-tbody">
                <tr class="ivu-table-row" v-for="(idx,v) in search_result">
                    <td >
                      <div class="ivu-table-cell">{{v.title}}</div>
                    </td>
                    <td class="ivu-table-column-center">
                      <div >
                        <i-button v-bind:id="v.id+'cate'" type="primary" @click="commCateInfo(v)">内容</i-button>
                        <i-button type="error" @click="saveData('/adm_comm_cate/del_comm_cate?id='+v.id)">删除</i-button>
                      </div>
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      <article>
    </div>
 </template>

<script type="text/javascript">
  $$.comp('v_comm_cate_type',$$.vCopy(_vue_loadData(),{
    el:'#v_comm_cate_type',
    props_ext:['type_','title_name_','idx_'],

    methods:{

        saveData: function(url){
          var self = this
          $$
            .then(
              $$.wait({
                method:'get',
                url:url,
                succ: function(data,cont){
                  cont(null)
                },
                fail:function(msg,cont){
                  alert(msg)
                  cont(null)
                },
              })
            )
            .then(function(cont){
              self.title_name_ = ''
              self.should_reload_ = $$.getTime()
            })
        },

        updateData: function(url,idx,title){
          var self = this
          $$
            .then(
              $$.wait({
                method:'get',
                url:url,
                succ: function(data,cont){
                  cont(null)
                },
                fail:function(msg,code){
                  alert(msg)
                  self.should_reload_ = $$.getTime()
                  self.idx_ = null
                },
              })
            )
            .then(function(cont){
              if(self.search_result[idx].title == title){
                  $('#'+idx+'_input').css({
                  'color':'#FFF',
                  'background':'#33CC66',
                })
              }

              self.idx_ = null
            })
        },

        commCateInfo:function(v){
          var self = this
          $('#'+self.id_current+'cate').removeAttr('disabled')
          self.id_current = v.id
          $('#'+v.id+'cate').attr('disabled','true')
          $$.event.pub('COMMCATE_INFO',{
            data:v,
          })
        },

        updateTitleInput:function(idx){
          var self = this 
          $('#'+idx+'_input').css({
            'background':'yellow',
            'color':'#000000',
          });
          self.idx_ = idx
        },


        search: function(){
          var self = this
          var count = 0
          self.search_result = []
          var _key = self.key
          if(!_key) _key = ''
          if(_key=='  ') _key = ''
          var _data = self.ls_data
          for(var i in _data){
            var v = _data[i]
            var _text = ''
            if(v.name) _text = v.name
            if(v.title) _text = v.title
            if(v.creat_at) _text = v.creat_at
            var py =''
            py = v.py+""+_text
            if(py.indexOf(_key)>=0){
              self.search_result.push({
                title: _text,
                id:v.id,
                creat_at:v.create_at,
              })
              count ++
              // console.log('@@@:'+count)
            }
          }
        },
    },
  }))
</script>






 <style>
  .info_option_button{
    background:#996666;
    padding:5px 20px;
    border-radius:5px;
    color:#FFF;
    margin-left:10px;
    cursor:pointer;
  }

  .add_option_button{
    background:#33CC66;
    padding:5px 20px;
    border-radius:5px;
    color:#FFF;
    margin-left:30px;
    cursor:pointer;
  }

  .del_option_button{
    background:#FF3333;
    padding:5px 20px;
    border-radius:5px;
    color:#FFF;
    margin-left:10px;
    cursor:pointer;
  }
 </style>