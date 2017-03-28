<?php
include \view('adm_inc__header');
include \view('vue_comm_table');
include \view('vue_comm_table_config');
include \view('vue_page');
?>

  <div v-cloak  id="v_adm_url__ls" style="background:#FFF;">
      <div class="box" >
        <div class="box-header">
          <h3 class="box-title" style="font-size:25px;font-weight:bold;color:#000000">xxx
            <!-- <input type="text" v-model="search"> -->
          </h3>
            <span class="del_option_button" @click="save()">添加</span>
          <div class="box-tools" style="
          margin-right:1300px;margin-top:5px">
          </div>
        </div>
        <div v-if="loading"><i class="fa zfa-refresh fa-spin"></i>Loading....</div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody>
              <tr >
                <td  v-for="col in col_texts">
                  {{col}}
                </td>
                <td style="text-align:center;">操作</td>
              </tr>
              </tbody>
              <tr v-for="(idx,v) in ls">
                <td  v-for="col in col_texts">
                  <input placeholder="{{v[col]}}">
                </td>
              </tr>
            </table>
        </div>
      </div>
      <div>
        <v_page 
          v-bind:count_="count"
          v-bind:length_="length"
          v-bind:page_="page"
          v-bind:func_pagechanged_="func_pagechanged"
        >
        </v_page>
      </div>
  </div>
  <script>
    var url = '/adm_url_crud/ls?'
    $$.vue({
      el:'#v_adm_url__ls',
      data:function(){
        return {
          url_ls: {
            title: 'title',
            url: 'url',
            cate_id: 'cate_id',
          },

          ls: [],
          col_texts:null,

          url:null,
          loading:false,

          page:1,
          count:0,
          length:10,

          search: '',
        }
      },

      _init: function() {
        var config = this.url_ls
        this.col_ids = []
        this.col_texts = []
        for(var col in config){
          this.col_texts.push(config[col])
        }

        $$
          .then(
            this.resetUrl()
          )
          .then(
            this.loadData()
          )
      },

      methods: {

        loadData: function (){
          var self = this
          $$
            .then($$.wait({
              url:this.url,
              succ: function (data,cont){
                self.ls = data.ls
                cont(null,data)
              },

            }))
            .then(function(cont,data){
              self.count = data.count
            })

        },

        save: function(){
          var self = this
           $('#Id_Right_Drawer_Content').html('加载中')

            $$.event.pub('OPEN_DRAWER',{width:600})
            $.get('/adm_url_crud/check',function(res){
              $('#Id_Right_Drawer_Content').html(res)
            })  
        },

        resetUrl: function(){
          this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search
        },

        func_pagechanged: function(idx){
          this.page = idx
          this.resetUrl()
        },
      },

      // watch: {
      //   search: function(val){
      //     this.page = 1
      //     this.resetUrl()
      //   },
      // }

    })
  </script>


  <style type="text/css">
    .add_option_button{
      background:#33CC66;
      padding:5px 20px;
      border-radius:5px;
      color:#FFF;
      /*margin-left:30px;*/
      cursor:pointer;
    }

    .del_option_button{
      background:#FF3333;
      padding:5px 20px;
      border-radius:5px;
      color:#FFF;
      /*margin-left:10px;*/
      cursor:pointer;
    }
  </style>

<?php
include \view('adm_inc__footer');
