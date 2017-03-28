<?php
include \view('inc_home_header');
?>



<script type="text/javascript">
  var call_from_native = {
    UPLOAD_SUCCESS: function(msgstr) {
      // alert('in web:'+msgstr)
      var msg = $$.str2js(msgstr)
      $('#upload_files').html("<div class='m-uploadimg' style='clear:none;float:left;margin:0 5px 5px 0;background-image: url("+msg.res.file+");' ></div>")

      v_instance.setState({
        files: [msg.res.file],
        uploading: false,
      })
      
    }
  }
</script>

<div v-choak id="v_main" class="swipe-content content-list" style="width:100%;overflow-x:hidden;">
  <div class="weui_cells weui_cells_form" style="margin-top: 0.4em;">
    <div class="weui_cell"> 
      <div class="weui_cell_hd">   </div> 
      <div class="weui_cell_bd weui_cell_primary"> 
        <input type="text" class="weui_input"
          v-model="title"
          placeholder="标题"
        /> 
      </div> 
      <div class="weui_cell_ft"> <i style="display: none;" class="weui_icon weui_icon_clear"></i>
      </div> 
    </div>
          
      <div class="weui_cell">
          <div class="weui_cell_bd weui_cell_primary">
              <textarea class="weui_textarea"   
                placeholder="请详细描述"
                v-model="content"
                rows="3"
              ></textarea>
              <div class="weui_textarea_counter"><span id="textarea_num">剩余200字</span></div>
          </div>
      </div>

      <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <div class="weui_uploader">
                <div class="weui_uploader_hd weui_cell">
                    <div class="weui_cell_bd weui_cell_primary">关注的人</div>
                </div>
                <div class="weui_uploader_bd">
                    <div id="upload_files" class="weui_uploader_files" style="width:100%;">
                      <div data-ripple-color="#FFF" class="ripple float-container" style="display: inline-block; width:4rem;height:4rem;line-height: 4rem;font-size: 1rem;" v-for="item in relation" @click="removeRelation($index)">{{item.target_name}}</div>
                    </div>
                    <div class="weui_uploader_input_wrp"  @click="popup2">

                    </div>
                </div>
            </div>
        </div>
      </div>

  <div class="p"><a @click="ajaxSave" class="weui_btn weui_btn_primary open-popup " data-target="#popup">提交</a></div>

  <script>
    $(function(){
      $(".weui_textarea").on("input paste" , function(){
            var num_left=200-$(this).val().length;
            if(num_left<0){
              $("#textarea_num").text("超过"+(-num_left)+"字");
              $("#textarea_num").css("color","#E44443");
            }else{
              $("#textarea_num").text("剩余"+(num_left)+"字");
              $("#textarea_num").css("color","#999999");
            }
          });

    })
  </script>   
            
  </div>
<div class="weui_cells_title">子目标</div>
  <div class="weui_cells">
    <div class="weui_cell" v-for="item in sub_targets">
        <div class="weui_cell_bd weui_cell_primary">
            <p>
              <input type="text" class="weui_input" v-bind:id="'p_content_'+$index"
                v-model="item['content']"
                placeholder="子目标标题"
              /> 
            </p>
        </div>
        <div class="weui_cell_ft">
          <a @click="removeSub($index)" class="weui_btn weui_btn_primary open-popup " data-target="#popup">删除</a>
        </div>
        <div class="weui_cell_ft"  style="margin-left: 10px;" >
          <a @click="popup1($index)" class="weui_btn weui_btn_primary open-popup " data-target="#popup">
          {{item['target_name'] ? item['target_name'] : "指派"}}
          </a>
        </div>
    </div>
       <div class="weui_cell">
        <div class="weui_cell_ft">
          <a @click="addSub" class="weui_btn weui_btn_primary open-popup " data-target="#popup">添加子目标</a>
        </div>
    </div>
  </div>


</div>


<script type="text/javascript">

var v_instance = $$.vue({
  el: '#v_main',

  data: function(){
    return {
      title: '',
      content: '',
      relation: [],
      sub_targets: []
    }
  },
  _init: function() {
    <?php if (!empty($__targetId)) {?>
      this.loadData();
    <?php } ?>
  },

  methods: {
    loadData: function() {
      var self = this;
      $$.ajax({
        url: '/target/aj_get_target_info',
        data: {id: '<?=$__targetId?>'},
        succ: function(data){
          // alert('操作成功')
          self.setState({
            title: data.title,            
            content: data.content,            
            relation: data.relation,            
            sub_targets: data.sub_targets,            
          });
        },

        fail: function(msg,code){
          // alert('添加失败 '+$$.js2str(msg))
        },

      })
    },
    removeSub: function(idx) {
      var self = this;
      self.sub_targets.splice(idx, 1)
    },

    popup2: function(){
      call_native('open_win',{url:'/staff/?_pagemark=<?=$__pagemark?>&_event=SELECT_MEMBER2&type=check', title: '目标管理', });
    },

    popup1: function(idx){
      this.select_idx = idx
      call_native('open_win',{url:'/staff/?_pagemark=<?=$__pagemark?>&_event=SELECT_MEMBER1&type=radio', title: '目标管理', });
    },

    addSub: function(){
      var self = this;

      if(self.sub_targets.length > 0) {
        var item = self.sub_targets[self.sub_targets.length - 1];
        if (Object.keys(item).length == 0 || item['content'] == "") {
          return;
        }
      }

      self.sub_targets.push({});
    },
    removeRelation: function(idx) {
      var self = this;
      self.relation.splice(idx, 1)
    },

    ajaxSave: function(){

      var data = {
        id: '<?=$__targetId?>',
        title: this.title,
        content: this.content,
        relation: $$.js2str($$.copy(this.relation)),
        sub_targets: $$.js2str($$.copy(this.sub_targets))
      }
      // alert()

      $$.ajax({
        url: '/target/aj_add',
        data: data,
        succ: function(data){
          // alert('操作成功')
          
          var _event = {
            event_name: 'TO_WEB',
            web_event_name: 'ADD_TARGET_SUCC',
          }
          call_native('event',_event)


          call_native('event',{
            event_name: 'NAV_GO_BACK',
          })


        },

        fail: function(msg,code){
          // alert('添加失败 '+$$.js2str(msg))
        },

      })

    },

  },

})

</script>

<script type="text/javascript">
window.call_from_native = window.call_from_native || {}
window.call_from_native['SELECT_MEMBER1'] = function(msgstr, msg) {
  // alert(v_instance.select_idx)
  var msg = $$.str2js(msgstr)
  var member = msg.member_info[0]
  var sub_targets = v_instance.$data.sub_targets
  sub_targets[v_instance.select_idx].target_name = member.name
  sub_targets[v_instance.select_idx].target_id = member.id
  v_instance.setState({
    sub_targets: sub_targets,
  })
}
window.call_from_native['SELECT_MEMBER2'] = function(msgstr, msg) {
  var msg = $$.str2js(msgstr)

  var relation = v_instance.$data.relation
  for(var i in msg.member_info){
    var mem = msg.member_info[i]
    var find = false
    for(var j in relation){
      if(relation[j].target_id==mem.id){
        find = true
      }
    }
    if(!find){
      relation.push({
        target_id: mem.id,
        target_name: mem.name,
      })
    }
  }

  v_instance.setState({
    relation: relation, 
  })
}
</script>


<?php
include \view('inc_footer');
?>

