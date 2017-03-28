<?php
 require_once \view('vue_company_course_detail');
 require_once \view('vue_page');
?>

<div v-cloak  id="v_task__add" style="width:100%;background:#FFF;float:right">
    <Row>
        <i-col span="18" v-if="error_text != ''" >
          <Alert type="error" show-icon closable @on-close="closeError">
              错误提示
              <span slot="desc">
                  {{error_text}}
              </span>
          </Alert>  
        </i-col>


        <i-col span="18">
          <h1>添加任务</h1>

          <br/>

          <form class="ivu-form ivu-form-label-right">
            <div class="ivu-form-item ivu-form-item-required">
              <label class="ivu-form-item-label" style="width: 80px;">任务名称</label>
              <div class="ivu-form-item-content" style="margin-left: 80px;">
                <div class="ivu-input-wrapper ivu-input-type">
                  <input class="ivu-input" type="text" placeholder="请输入任务名称" v-model="task_name"></div>
              </div>
            </div>




            <div class="ivu-form-item ivu-form-item-required">
              <label class="ivu-form-item-label" style="width: 80px;">奖励积分</label>
              <div class="ivu-form-item-content" style="margin-left: 80px;">
                <div class="ivu-input-wrapper ivu-input-type">
                  <input class="ivu-input" type="text" placeholder="请输入奖励积分" v-model="score"></div>
              </div>
            </div>




            <div class="ivu-form-item ivu-form-item-required">
              <label class="ivu-form-item-label" style="width: 80px;">任务类型</label>
              <div class="ivu-form-item-content" style="margin-left: 80px;" @click="selectType">
                <div style="width:470px" class="ivu-select ivu-select-single">
                  <div class="ivu-select-selection">
                    <span class="ivu-select-placeholder">{{picked}}</span>
                    <span class="ivu-select-selected-value" style="display: none;"></span>
                    <i class="ivu-select-arrow ivu-icon-ios-close ivu-icon" style="display: none;"></i>
                    <i class="ivu-select-arrow ivu-icon-arrow-down-b ivu-icon"></i>
                  </div>



                  <div  class="ivu-select-dropdown slide-up-transition" v-if="select_type == 'on'">
                    <ul class="ivu-select-not-found" style="display: none;">
                      <li>无匹配数据</li></ul>
                    <ul class="ivu-select-dropdown-list">
                      <li class="ivu-select-item" @click="selectOption('课程')">课程</li>
                      <li class="ivu-select-item" @click="selectOption('帖子')">帖子</li>
                      <li class="ivu-select-item" @click="selectOption('回复')">回复</li></ul>
                  </div>
                </div>
              </div>
            </div>


            <div class="example ivu-row" v-if="picked !='请选择任务类型'">
                <div class="example-demo ivu-col ivu-col-span-24">
                  <div class="example-case">
                      <div class="ivu-table-header">
                        <table style="width:100%">
                          <thead>
                            <tr>
                              <th style="width:40%;">
                                    <i-input icon="android-search" :placeholder="placeholder" style="width:100%;" :value.sync="search" ></i-input>
                              </th>
                              <th style="width:60%;text-align:right;">
                                
                              </th>
                            </tr>
                          </thead>
                        </table>
                      </div>

                      <br/>

                      <v_company_course_detail 
                          v-bind:url_="url"
                          v-bind:col_config_="col_config"
                          v-bind:func_loaded_="func_loaded"
                          v-bind:item_id_="item_id"
                        />

                    <br/>

                    <v_page 
                        v-bind:count_="count"
                        v-bind:length_="length"
                        v-bind:page_="page"
                        v-bind:func_pagechanged_="func_pagechanged"
                      >
                    </v_page>
                  </div>
                </div>
              </div>




            <div class="ivu-form-item">
              <div class="ivu-form-item-content">
                <button class="ivu-btn ivu-btn-primary" type="button" @click="saveTask">
                  <span>提交</span></button>
              </div>
            </div>
          </form>




        </i-col>


    </Row>



</div>




<script>
	$$.vue({
		el:'#v_task__add',
    EVENT:['SELECT_ITEM'],
		data:function(){
			return {
        picked:'请选择任务类型',
        score:null,

        page:1,
        count:0,
        length:10,

        search: '',
        url:null,
        col_config:'',

        id:null,
        idx:null,
        name:'',
        item_id:null,
        task_name:'',

        select_type:'off',
        error_text:'',
        placeholder: '请输入员工昵称'
        
			}
		},

    methods: {

      hd_SELECT_ITEM:function(v){
        var self = this
        self.id = v.data.id
        self.idx = v.idx
      },

      addPage:function(){
        this.url = this.url+'&page='+this.page+'&length='+this.length+'&search='+this.search
      },

      resetUrl:function(val){
        var self = this
        if(val == '课程'){
          self.url = '/adm_company_course/aj_get_courses_list?'
          self.col_config = "course"
          self.addPage()
        }

        //练习用
        if(val == '帖子'){
          self.url = '/adm_invite/aj_ls?'
          self.col_config = "member"
          self.addPage()
        }

      },

      func_loaded: function(data){
        this.count = data.count
      },

      func_pagechanged: function(idx){
          this.page = idx
          this.resetUrl(this.picked)
      },

      saveTask:function(){
        var self = this
        $$.ajax({
          url:'/adm_task/set_company_task',
          data:{
            title:self.task_name,
            target_id:self.id,
            score:self.score,
            type:self.picked,
          },
          succ:function(data){
            $$.event.pub('CLOSE_DRAWER')
            $$.event.pub('ADD_TASK_SUCC')
          },
          fail:function(msg,code){
            self.Notice(msg)
          },
        })
      },


      selectType:function(){
        var self = this
        self.select_type = self.select_type == 'off' ? 'on' : 'off'
      },

      selectOption:function(option){
        var self = this 
        self.picked = option

        if (option == "课程") {
          self.placeholder = "请输入课程名称";
        } else {
          self.placeholder = "请输入员工昵称";
        }
        self.resetUrl(option)
      },

      Notice:function(val){
        var self = this 
        self.error_text = val
      },

      closeError:function(){
        var self = this 
        self.error_text = ''
      }


    },

    watch: {
      search: function(val){
        // alert(val)
        this.page = 1
        this.resetUrl(this.picked)
      },

      picked: function(val){
        this.page = 1
        this.resetUrl(val)
      },


    },

	})
</script>





<style type="text/css">
	.company_course_list{
		width:47%;height:100%;
		margin-top:10px;
		border:1px solid #CDCDCD;
		border-radius:5px;margin-left:10px;
		display: inline-block;
		box-shadow: 0 0 10px #CDCDCD;
	}

	.course_list_div{
		display: inline-block;
		border:1px solid #CDCDCD;
		border-radius:5px;margin-left:6px;
		width:47%;height:100%;
		overflow-y:auto; 
		box-shadow: 0 0 10px #CDCDCD;
	}
</style>



<?php
// include \view('adm_inc__footer');