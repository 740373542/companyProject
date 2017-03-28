<?php
include \view('adm_inc__header');
?>

  <div v-cloak  id="v_adm_login__index" style="">
      <h1>登录</h1>
      <p>请输入您的帐号和密码</p>


      <i-form v-ref:form-inline :model="formInline" :rules="ruleInline" inline>
          <Form-item prop="user">
              <i-input type="text" :value.sync="formInline.user" placeholder="Username">
                  <Icon type="ios-person-outline" slot="prepend"></Icon>
              </i-input>
          </Form-item>
          <Form-item prop="password">
              <i-input type="password" :value.sync="formInline.password" placeholder="Password">
                  <Icon type="ios-locked-outline" slot="prepend"></Icon>
              </i-input>
          </Form-item>

          <br />

          <Form-item>
              <i-button type="primary" shape="circle" size="large" @click="handleSubmit">登录</i-button>
          </Form-item>
  
          <br />
      </i-form>



<!-- 

      <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-24">
          <div class="example-case">
              abc
          </div>
        </div>
      </div>






      <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-12">
          <div class="example-case">
              abc
          </div>
        </div>
        <div class="example-split"></div>
        <div class="example-demo ivu-col ivu-col-span-12 ivu-col-split-right">
          <div class="example-case">
              abc
          </div>
        </div>
      </div>






      <div class="example ivu-row">
        <div class="example-demo ivu-col ivu-col-span-12">
          <div class="example-case">
            <div slot="demo">
              abc
            </div>
          </div>
          <header class="example-header">
            <span>行内表单<a href="#行内表单">#</a></span>
          </header>
          <div class="example-desc">
            <div slot="desc">
              <p>设置属性</p></div>
          </div>
        </div>
        <div class="example-split"></div>
        <div class="example-demo ivu-col ivu-col-span-12 ivu-col-split-right">
          <div class="example-case">
              abc
          </div>
          <header class="example-header">
            <span>行内表单<a href="#行内表单">#</a></span>
          </header>
          <div class="example-desc">
            <div slot="desc">
              <p>设置属性</p></div>
          </div>
        </div>
      </div>


 -->




  </div>

  <script>
  	$$.vue({
  		el:'#v_adm_login__index',
  		data:function(){
  			return {
          theuser:'.',
          formInline: {
              user: '',
              password: ''
          },
          ruleInline: {
              user: [
                  { required: true, message: '请填写用户名', trigger: 'blur' }
              ],
              password: [
                  { required: true, message: '请填写密码', trigger: 'blur' },
                  { type: 'string', min: 1, message: '密码长度不能小于1位', trigger: 'blur' }
              ]
          }
  			}
  		},

      _init: function() {
      },

      methods: {

            handleSubmit(name) {
              var self = this
              $$.ajax({
                url:'/adm_auth/login',
                data:{
                  phone:self.formInline.user,
                  password:self.formInline.password,
                },
                succ:function(data){
                  // this.$Message.success('提交成功!')
                  location.href = "/adm_manager/";
                },
                fail:function(msg){
                  // this.$Message.error('表单验证失败!');
                  alert(msg)
                },
              })

            }
      },

      watch: {
        theuser: function(val){
          this.formInline.user = val
          console.log($$.js2str(this.formInline))
        },
      }

  	})
  </script>


<?php
include \view('adm_inc__footer');
