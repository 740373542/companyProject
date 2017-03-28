<?php
require \view("adm_inc__header");
?>

<div id="v_company_culture">
    <div class="example ivu-row">
    <div class="example-demo ivu-col ivu-col-span-14">
      <div class="example-case">
        <h1>设置企业文化</h1>
      <i-form v-ref:form-validate :model="formValidate" :rules="ruleValidate" :label-width="120" style="margin-top:30px;">

        <Form-item label="企业文化地址:" prop="manager_real_name">
            <i-input v-if="!succ" :value.sync="corp_url" placeholder="请输入公司企业文化介绍地址" ></i-input>
            <i-input v-if="succ" :value.sync="corp_url" disabled ></i-input>
        </Form-item>



        <Form-item>
            <i-button type="primary" @click="handleSubmit()" icon="share">提交</i-button>
            <i-button v-if="!succ" type="ghost" @click="handleReset()" style="margin-left: 8px">重置</i-button>
            <i-button v-if="succ" icon="edit" type="warning" @click="handleUpdate" style="margin-left: 8px">修改</i-button>
        </Form-item>
      </i-form>
    </div>
    </div>   
   <!--  <div class="example-demo ivu-col ivu-col-span-10 ivu-col-split-right">
      <div class="example-case" style="margin-top:47px;">
        <i-col offset="2">
            <Card shadow>
                <p slot="title">小提示</p>
                <p>1.所有内容都必须填写完整哦</p>
                <p>2.账号建议是管理员的手机号</p>
                <p>3.公司账号密码就是管理员登陆凭证</p>
                <p>4.公司重名或者账号重复会导致注册失败的</p>
            </Card>
        </i-col>
      </div> 
    </div> -->
  </div>
</div>

<script type="text/javascript">
  $$.vue({
    el:'#v_company_culture',
    data:function(){
      return {
        corp_url:'<?=$__corp_url?>',

        succ:'',

        ruleValidate:{
          corp_url:[
              { required: true, message: '请设定公司企业文化主页', trigger: 'blur' },
          ],
        },
      }
    },

    _init:function(){
      var self = this 
      if(self.corp_url != ''){
        self.succ = true
      }else{
        self.succ = false
      }
    },

    methods:{
      handleUpdate:function(){
        var self = this 
        self.succ = false
      },

      handleSubmit:function(){
        var self = this 
        $$.ajax({
          url:'/adm_company/company_culture_save',
          data:{
            corp_url:self.corp_url,
          },

          succ:function(data){
            self.succ = true
            self.$Notice.success({
              title:"提交成功！"
            })
          },

          fail:function(msg){
            self.$Notice.error({
              title:msg,
            })
          }, 
        })
      },

      handleReset:function(){
        var self = this 
        self.corp_url = '';
      },
    },
  })
</script>


<?php
include \view('adm_inc__footer');
?>



