<?php
include \view('adm_inc__header');
?>

<template id="v_join_str">
  <div  class="example ivu-row">
    <div class="example-demo ivu-col ivu-col-span-17">
      <div class="example-case">
        <h1>修改企业邀请码</h1>
        <i-form v-ref:form-custom :model="formCustom" :rules="ruleValidate" :label-width="80">
          <Form-item label="公司名称">
              <i-input disabled :value="company_name" style="max-width:300px;"></i-input>
          </Form-item>
          <Form-item label="原邀请码">
              <i-input disabled :value="join_str" style="max-width:300px;"></i-input>
          </Form-item>
          <Form-item label="新邀请码" prop="join">
              <i-input :value.sync="formCustom.join" style="max-width:300px;"></i-input>
          </Form-item>
          <Form-item>
              <i-button type="primary" @click="handleSubmit('formCustom')" icon="share">提交</i-button>
              <i-button type="ghost" @click="handleReset('formCustom')" style="margin-left: 8px">重置</i-button>
          </Form-item>
        </i-form>
      </div>
    </div>

    <div class="example-split" style="left: 71%;"></div>
    <div class="example-demo ivu-col ivu-col-span-7 ivu-col-split-right">
      <div class="example-case" >
             <h1>提示</h1>
              <br/>
              <br/>

              <Card dis-hover>
                  <p slot="title">功能简介  </p>
                  <p><b>公司名称：</b>当前管理员帐号所属的公司名称；</p>

                  <p><b>原邀请码：</b>公司当前的邀请码；</p>
                  <p><b>新邀请码：</b>输入所要修改的公司邀请码；</p>
                  <br/>

  <!-- ① ② ③ ④ ⑤ ⑥ ⑦ ⑧ ⑨ ⑩ -->

                   <p style="font-size:14px;color:#e96900;"><Icon type="alert-circled" size="16"></Icon>
                      功能注意事项:
                   </p>
                   <br/>
                    <p><span style="font-size:16px">①: </span>公司的名称个在这里是无法修改的</p>
                    <p><span style="font-size:16px">②: </span>修改公司邀请码需要慎重，一旦修改客户端申请加入公司时就必须输入心的邀请码</p>
                    <p><span style="font-size:16px">③: </span>输入新邀请码时不能为空，不能和公司当前邀请码重复</p>
                    

              </Card>
      </div> 
    </div>   
  </div>
</template>


<script>
$$.vue({
    el:'#v_join_str',
    data: function(){
      return {
        join_str: '<?=$join_str?>',
        company_name: '<?=$company_name?>',

        formCustom: {
            join: '',
        },
        ruleValidate:{
            join: [
                { required: true, message: '新邀请码不能为空', trigger: 'blur' }

            ]

        },

      }
    },
    methods:{
     handleSubmit (name) {
        var self = this
        var arr = [];
        // alert(self.formCustom['join'])
        self.$refs[name].validate((valid) => {
          arr = self.formCustom['join'].split(" ");
          if (arr.length != 1) {
            self.$Message.error('邀请码不能存在空格!');
            return;
          };
          if (!self.formCustom['join']) {
            self.$Message.error('邀请码不能为空!');
            return;
          };
          if (self.formCustom['join'].length > 10) {
            self.$Message.error('邀请码不能超过10个字符!');
            return;
          };
          if (valid) {
            $$.ajax({
              method:'get',
              url:'/adm_company_join/save',
              data:{
                join_str: self.formCustom['join'],
              },
              succ: function(data){
                self.$Message.success('提交成功!');
                self.join_str = self.formCustom['join']
              },
              fail: function(msg){
                self.$Message.error(msg);
              },
            })
            
          }
        })
      },
      handleReset (name) {
        var self = this
        self.$refs[name].resetFields();
      },
      // save: function(){
      //   var self = this
      //   var arr = [];
      //   arr = self.join_str.split(" ");
      //   if (arr.length != 1) {
      //     alert("邀请码不能存在空格")
      //     return;
      //   };
      //   if (!self.join_str) {
      //     alert("邀请码不能为空")
      //     return;
      //   };
      //   if (self.join_str.length > 10) {
      //     alert("邀请码不能超过10个字符")
      //     return;
      //   };
      //   $$.ajax({
      //     method:'get',
      //     url:'/adm_company_join/save',
      //     data:{
      //       join_str: self.join_str,
      //     },
      //     succ: function(data){
      //       alert("保存成功")
      //     },
      //     fail: function(msg){
      //       alert(msg)
      //     },
      //   })
      // },
    }
})
</script>


<?php
include \view('adm_inc__footer');
