<!-- 子组件模板 -->
<template id="vue_company_join">
 
  <div style="text-align:center;padding:0;">
    
    <div v-if="'1_input_joinstr'==state">

        <div style="margin-top:0px;">


                      <div style="box-sizing: border-box;width: 100%;display: flex;justify-content: space-between;padding: 0 10px;padding-bottom: 10px">
                        <div style="display: flex;
                        margin-right: 20px;
                        margin-top:5px;
                        align-content: center;
                        border: 1px solid #999999;
                        width: 100%;
                        padding:8px 5px;
                        border-radius: 4px;"><input type="text" type="text" @click="corp_str=''" v-model="corp_str" style="border: none;outline: none;font-size: 16px;color: #999999;font-weight: 300;"></div>


                        <div class="weui_btn weui_btn_primary"  @click="applyJoinCompany"
                         style="display: flex;
                        justify-content: center;
                        align-items: center;
                        width: 80px;
                        height: 49px;
                        border-radius: 4px;                        
                        font-size: 16px;
                        margin-top: 5px;
                        color:#FFF;
                        background: #4083F8">加入</div>
                      </div>
        </div>

    </div>

    
    <div v-if=" '3_joined'==state || '2_waiting'==state ">

      <e-row>
        <e-col>
          <e-card data-ripple-color="#FFF" class="ripple">
              <e-item>
                  <e-title>
                   <div style="text-align:center;font-size:16px;font-weight: 700;padding:20px 0 13px 0;">{{company_name}}</div>
                  </e-title>
              </e-item>
          </e-card>
        </e-col>
      </e-row>

    </div>
    
  </div>

</template>



<script type="text/javascript">

  $$.comp('vue_company_join', {
    el: '#vue_company_join',
    props: ['should_reload_'],

    data: function () {
      var state = '1_input_joinstr'
      var company_name = ''
      <?php if($__company){?>
        state = '3_joined'
        company_name = '<?=$__company['name']?>'
      <?php }else if( $this->di['UserService']->waitingForRatify() ) {?>
        state = '2_waiting'
        company_name = '已申请，待批准'
      <?php }?>

      return {
        //1_input_joinstr 待申请
        //2_waiting 待批准
        //3_joined 已加入
        state: state,
        corp_str:'请输入公司邀请码',
        company_name:company_name,
      }
    },

    _init: function(){
      var self = this

    },

    _change: function() {
    },

    methods: {
      applyJoinCompany: function(){
        var self = this
        $$.ajax({
          url:'/user/aj_join?join_str='+self.corp_str,
          succ:function(data){
            // alert(data)
            if(data=='need_login'){
              
              call_native('event',{
                event_name: 'ALERT',
                str: '请先登录您的帐号',
              })

              call_native('event',{
                event_name: 'NEED_LOGIN',
              })

            }else{
              self.state = '2_waiting'
              self.company_name = '已申请，待批准'
              window.location.reload()
            }

          },
          fail:function(msg,code){
            alert('邀请码错误，请重新输入')
            // this.company_join_str:'',
          },
        })
      },



    },

  }) // panel-wait
</script>

