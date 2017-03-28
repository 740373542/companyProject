<?php
include \view('inc_vue_header');
?>

<script src="/public/v_aaa_bundle.js"></script>

<?php 
include \view('inc_vue_header_js');
 ?>

<div id="v_staff_detail" style="width:100%;height:100%;">
    <div>
      <div class="search_input" style="width:100%;box-shadow:0 3px 5px #CDCDCD">
        <mu-text-field hint-text="搜索员工名称" type="text" icon="find_replace"  style="width:60%;height:3%;" v-model="key"  />
      </div>

      <div style="float:right;margin-top:5px;margin-right:15px">
        <mu-raised-button label="确认添加" class="demo-raised-button" primary style="font-size:16px;border-radius:5px" @click="select_staff"/>
      </div>

      <div id="member_detail" class="member_detail_div">
        <mu-list >
          <div v-for="(v,idx) in search_result"  style="position: relative;">

            <mu-list-item :title="'昵称:'+v.name" :describe-text="'手机号:'+v.phone"  >
              <mu-avatar :src="v.avatar" slot="leftAvatar" :size="30"></mu-avatar>
              <mu-checkbox slot="right" :value="v.checked" v-if="type=='check'"></mu-checkbox>
              <mu-radio slot="right" :native-value="v.id" :value="''+checked_radio" v-if="type=='radio'"></mu-radio>
            </mu-list-item>
            <div @click="chooseMember(v)" style="position: absolute; top: 5px; bottom: 5px; left: 0; right: 0;">
              
            </div>
            <mu-divider ></mu-divider>

          </div>
        </mu-list>
        <mu-infinite-scroll :scroller="scroller" :loading="loading"></mu-infinite-scroll>
      </div>

      <div class="select_staff" style="width:100%;box-shadow:0 3px 5px #CDCDCD;text-align:center" v-if="type == 'check'">
        <mu-raised-button @click="openBottomSheet" label="查看已选择成员" background-color="#8d6e63" />
        <mu-bottom-sheet :open="bottomSheet" @close="closeBottomSheet" >
          <mu-list @itemClick="closeBottomSheet" style="text-align:center">
            <mu-sub-header>
              已选择成员
            </mu-sub-header>

            <div v-for="(v,idx) in staff_info" style="width:100px;height:30px;color:#FFF;background:#212121;margin-left:5px;display:inline-block;border-radius:5px;text-align:center;line-height:30px;font-size:16px;margin-top:5px">
              {{v.name}}
              <mu-icon value="account_box" style="position:relative;top:5px;left:5px" :size="21" />
            </div>
            <div v-if="staff_info == ''">
              <mu-sub-header style="color:#000000">
                尚未选择成员
              </mu-sub-header>
            </div>
          </mu-list>
        </mu-bottom-sheet>
      </div>
    </div>
    <mu-toast v-if="toast" :message="error_msg" @close="hideToast"></mu-toast>
</div>


<script type="text/javascript">

  $$.vue({
    el:'#v_staff_detail',
    data:function(){
      return {
        key:'',        
        url:'',
        type:'<?=$__type?>',
        avatar1:'/uploads/01.png',
        ls:[],
        search_result:[],
        staff_info:null,
        scroller:null,
        loading:false,
        bottomSheet: false,
        staff_ids:'<?=$__staff_ids?>',
        error_msg: '',
        toast: false,
        checked_radio: -1
      }
    },

    _init: function(){
      var self = this
      self.url = '/staff/ls?'
      if(self.type == 'check'){
        self.staff_info = {}
      }
      if(self.url != ''){
        $$
          .then(function(cont){
            self.loadData(cont)
          })
          .then(function(cont){
            self.search()
          })
        }
    },

    methods:{
      showToast: function(msg) {
        this.error_msg = msg;
        this.toast = true
        if (this.toastTimer) clearTimeout(this.toastTimer)
        this.toastTimer = setTimeout( function() { this.toast = false }, 2000)
      },
      hideToast: function() {
        this.toast = false
        if (this.toastTimer) clearTimeout(this.toastTimer)
        this.error_msg = "";
      },

      chooseMember: function(v) {
        var self = this;

        if (self.type == 'check') {
          // checkbox
          v.checked = !v.checked;
          if (v.checked) {
            self.staff_info[''+v.id] = v;
          } else {
            delete self.staff_info[''+v.id];
          }
        } else {
          // radio
          self.checked_radio = v.id;
          self.staff_info = {};
          self.staff_info[''+v.id] = v;
        }
      },

      closeBottomSheet: function () {
        this.bottomSheet = false
      },

      openBottomSheet :function () {
        this.bottomSheet = true
      },


      loadData:function(cont){
        var self = this
        self.loading = true
        $$.ajax({
          url:self.url,
          succ:function(data){
            self.ls = data.ls
            self.loading = false
            cont(null)
          },
        })
      },

      search: function(){
        var self = this
        var count = 0
        self.search_result = []
        var _key = self.key
        if(!_key) _key = ''
        if(_key=='  ') _key = ''
        var _data = self.ls

        for(var i in _data){
          // alert(i)
          var v = _data[i]
          var _text = ''
          if(v.name) _text = v.name
          if(v.title) _text = v.title
          if(v.creat_at) _text = v.creat_at
          var py =''
          py = v.py+""+_text
          if(py.indexOf(_key)>=0){
            var item = {
                name: _text,
                id:v.id,
                company_id:v.company_id,
                phone:v.phone,
                avatar:v.avatar,
                real_name:v.real_name,
                create_at:v.create_at,
                desc:v.desc,
                checked: false
            };

            if (self.staff_ids.indexOf(v.id + ",") >= 0 && self.type=='check') {
              item['checked'] = true;
              self.staff_info[''+item.id] = item;
            } else if (self.staff_ids.indexOf(v.id + ",") >= 0 && self.type == 'radio') {
              self.checked_radio = item.id;
              self.staff_info = {};
              self.staff_info[''+item.id] = item;
            }

            self.search_result.push(item)
          }
        }
      },

      select_staff:function(){
        var self = this
        var ls;
        if(Object.keys(self.staff_info).length == 0){
          self.showToast('未选择员工');
          return;
        }

        if(self.type == 'radio'){
          ls = [self.staff_info]
        }

        if(self.type == 'check'){
          ls = self.staff_info
        }

        call_native('event',{
          event_name: 'NAV_GO_BACK',
        })
        
        var _event = {
          event_name: 'TO_WEB',
          web_event_name: '<?=$_GET['_event']?>',
          page_mark: '<?=$_GET['_pagemark']?>',
          member_info:ls,
        }
        call_native('event',_event)
      },
    },

    watch:{
      key:function(val){
        var self = this
        self.search()
      },

    }

  })
</script>

<style type="text/css">
  #v_staff_detail{
    position: fixed;
    top:0px;
    left:0px;
    right:0px;
    bottom:0px;
  }
  .search_input{
    position: absolute;
    top:0px;
  }

  .member_detail_div{
    width: 98%;
    height: 88%;
    position: absolute;
    top:64px;
    left:1%;
    overflow:auto;

  }
  
  .select_staff{
    position: fixed;
    bottom:0px;
  }
</style>


<?php
include \view('inc_vue_footer');
?>