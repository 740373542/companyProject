<?php
include \view('inc_vue_header');
?>

<script src="/public/v_aaa_bundle.js"></script>

<?php 
include \view('inc_vue_header_js');
 ?>

<div id="v_target_detail" style="width:100%;height:100%;">
   <div style="margin: 0 auto; width: 90%; padding-bottom: 3px;">
    <mu-toast v-if="toast" :message="error_msg" @close="hideToast"></mu-toast>
    <mu-text-field hint-text="标题" :errorText="title_error_text" @textOverflow="handleInputOverflow" :max-length="20" full-width v-model="title"></mu-text-field>
    <mu-text-field hint-text="描述" :errorText="desc_error_text" @textOverflow="handleMultiLineOverflow" multi-line :rows="3" :rows-max="6" :max-length="200" full-width v-model="desc"></mu-text-field>

    <mu-list>
      <mu-list-item @click="chooseRelation">
        <div slot="title">
          <span>关注</span>
          <mu-avatar :src="v.avatar" :size="30"  style="float: right;" v-for="v in relation"></mu-avatar>
        </div>
        <mu-icon slot="right" value="keyboard_arrow_right"></mu-icon>
      </mu-list-item>
      <mu-divider ></mu-divider>




      <mu-list-item disable-ripple v-for="(v,idx) in sub_targets">
        <mu-checkbox slot="left" v-model="v.status"></mu-checkbox>
        <div slot="title" @click="handleCheck(v)">
          <mu-flexbox>
            <mu-flexbox-item >
              <p>{{v.content}}</p>
            </mu-flexbox-item>
            <mu-chip @delete="handleClose(idx)" style="float:right;" show-delete  @click="chooseSubTarget(idx)">
              <mu-avatar :size="30" :src="v.avatar"></mu-avatar> {{v.target_name}}
            </mu-chip>
          </mu-flexbox>
        </div>
      </mu-list-item> 






      <mu-list-item disabled id="edit">
        <div slot="title">
          <mu-flexbox>
            <mu-flexbox-item >
              <mu-text-field v-model="sub_txt" full-width hint-text="添加子目标"></mu-text-field>
            </mu-flexbox-item>
            <mu-avatar :src="sub_target['target_avatar']" :size="30" style="float: right;" @click="chooseSubTarget(-1)" v-if="sub_target['target_avatar'] != ''"></mu-avatar>
            <mu-icon-button icon="person_add" @click="chooseSubTarget(-1)" v-else style="padding-top: 10px; margin-top: 1px;"></mu-icon-button>
            <mu-icon-button icon="add" @click="save_sub_target"></mu-icon-button>
          </mu-flexbox>          
        </div>
      </mu-list-item>
    </mu-list>
    <mu-raised-button label="保存" full-width primary @click="save"/>
  </div>

</div>


<script type="text/javascript">

  $$.vue({
    el:'#v_target_detail',
    data:function(){
      return {
        id: '<?=$__id?>',
        title: "",
        desc: "",
        title_error_text: '',
        desc_error_text: '',
        relation:[],
        sub_targets:[],
        sub_txt: "",
        sub_target: {
          'target_avatar': ''
        },
        toast: false,
        error_msg: ''
      }
    },

    _init: function(){
      var self = this;
      if (this.id != 0) {
        this.loadData();
      }

      window.call_from_native = window.call_from_native || {}
      window.call_from_native['CHOOSE_RELATION'] = function(msgstr, msg) {
        var msg = $$.str2js(msgstr)
        var res = [];

        for(var idx in msg.member_info) {
          var item = msg.member_info[idx];
          res.push({
            target_id: item.id,
            target_name: item.name,
            avatar: item.avatar
          })
        }

        self.relation = res;
      }

      window.call_from_native['CHOOSE_SUB_TARGET_PERSON'] = function(msgstr, msg) {
        var msg = $$.str2js(msgstr)
        var members = msg.member_info[0]
        for(var key in members) {
          var member = members[key];
            // create
          if (self.select_idx == -1) {
            self.sub_target = {
              'target_name': member.name,
              'target_id': member.id,
              'target_avatar': member.avatar,
            };
          } else {
            var item = self.sub_targets[self.select_idx];
            item['target_name'] = member.name;
            item['target_id'] = member.id;
            item['target_avatar'] = member.avatar;
            self.sub_targets[self.select_idx] = item;
          }
        }
      }
    },

    methods:{
      resetData: function() {
        this.title = "";
        this.desc = "";
        this.title_error_text = '';
        this.desc_error_text = '';
        this.relation = [];
        this.sub_targets = [];
        this.sub_txt= "";
        this.sub_target= {
          'target_avatar': ''
        };
        this.toast= false;
      },
      chooseRelation : function() {
        var self = this;
        var relation_str = "";
        for(var idx in self.relation) {
          var item = self.relation[idx];
          relation_str += item['target_id'] + ",";
        }

        call_native('open_win',{url:'/staff/?_event=CHOOSE_RELATION&type=check&staff_ids='+relation_str, title: '目标管理', });
      },

      chooseSubTarget: function(idx) {
        var self = this;
        this.select_idx = idx;
        var sel_id = "";
        if(idx >= 0) {
          sel_id = self.sub_targets[idx]['target_id']+",";
        }

        call_native('open_win',{url:'/staff/?_event=CHOOSE_SUB_TARGET_PERSON&type=radio&staff_ids='+sel_id, title: '目标管理', });
      },
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

      loadData: function(v) {
        var self = this;
        $$.ajax({
          url: '/target/aj_get_target_info?id=' + self.id,
          succ:function(data){
            self.title = data.title;
            self.desc = data.content;
            self.sub_targets = data.sub_targets;
            self.relation = data.relation;
          },
        })
      },

      handleInputOverflow: function () {
        this.title_error_text = isOverflow ? '标题最长为20字符长度' : ''
      },

      handleMultiLineOverflow :function () {
        this.desc_error_text = isOverflow ? '描述最长为200字符长度' : ''
      },

      handleCheck:function(v){
        v.status = !v.status;
      },

      handleClose: function(idx){
        this.sub_targets.splice(idx, 1);
      },

      save_sub_target:function(){
        var self = this;

        if (self.sub_txt == "") {
          self.showToast('子目标内容不能为空');
          return;
        }

        if (Object.keys(self.sub_target).length == 1 && self.sub_target['target_avatar'] == '') {
          self.showToast('请为子目标分配人员');
          return; 
        }

        var targets = this.sub_targets;
        targets.push({
          content: self.sub_txt,
          status: false,
          target_name: self.sub_target['target_name'],
          target_id: self.sub_target['target_id'],
          target_avatar: self.sub_target['target_avatar'],
        });
        this.sub_txt = "";
        this.sub_targets = targets;
        this.sub_target= {
          'target_avatar': ''
        };
      },

      save: function() {
        var self = this
        var filter_result = self.filterStatus()
        var status = filter_result == true ? 1 : 0
        var params = {
          id: this.id,
          title: this.title,
          content: this.desc,
          relation: $$.js2str($$.copy(this.relation)),
          sub_targets: $$.js2str($$.copy(this.sub_targets)),
          status:status,
        };

        $$.ajax({
          url: '/target/aj_add',
          data: params,
          succ: function(data){
            call_native('event',{
              event_name: 'NAV_GO_BACK',
            })
            
            var _event = {
              event_name: 'TO_WEB',
              web_event_name: 'REFRESH_TARGET_PAGE',
            }
            
            call_native('event',_event)
          },

          fail: function(msg,code){

          },

        })
      },

      filterStatus:function(){
        var self = this;
        var ls = self.sub_targets
        for(var i in ls){
          var v = ls[i]
          if(v.status == false){
            return false;
          }else{
            return true;
          }
        }



      },

    }
  })
</script>
<style>
#edit .mu-item {
  padding-right: 0px;
}
</style>
<?php
include \view('inc_vue_footer');
?>