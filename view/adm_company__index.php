<?php
include \view('adm_inc__header');
?>

<template id="v_company_industry">
  <div  class="example ivu-row">
    <div class="example-demo ivu-col ivu-col-span-17">
      <div class="example-case">
        <h1>行业信息</h1>
          <div class="ivu-table-header" >
            <table width="100%">
              <thead>
                <tr>
                  <th style="width:80%;text-align:left">
                    <div v-for="item in all_industry" style="display:inline-block">
                      <i-button  icon="close-circled" style="margin: 2px 4px 2px 0" type="primary"  v-if="industry[item]" @click="addOrDelete(item)">{{item}}</i-button>

                      <i-button  icon="plus-circled" style="margin: 2px 4px 2px 0" type="default" v-if="!industry[item]" @click="addOrDelete(item)">{{item}}</i-button>
                    </div>
                  </th>
                </tr>
              </thead>
            </table>
          </div>
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
              <p><b>标签状态：</b>灰色代表已经添加的行业标签，蓝色代表尚未添加的行业标签；</p>
              <p><b>添加标签：</b>点击蓝色标签，自动添加行业标签，颜色变成灰色代表成功添加；</p>
              <p><b>移除标签：</b>点击灰色标签，自动移除行业标签，颜色变成蓝色代表移除成功；</p>
            </Card>
      </div> 
    </div>   
  </div>
</template>


<script>
$$.vue({
    el:'#v_company_industry',
    data: function(){
      return {
        industry:{},
        all_industry:'',
        tags:[],
      }
    },

    _init: function() {
      // console.log($$.js2str(this.industry))
      var self = this
      var industry = '<?=$__industry?>'
      // alert(typeof '<?=$__industry?>')
      if(industry != ''){
       self.industry = JSON.parse('<?=$__industry?>')
      // alert(typeof industry)
      }

      $$.ajax({
        url:'/adm_comm_tag/get_industry_tags',
        data:{

        },
        succ:function(data){
          // alert($$.js2str(data.ls))
          self.all_industry = data.ls
          // alert(self.industry)
        }
      })
    },
    
    methods:{
      addOrDelete:function(item) {
        var self = this
        if(self.industry[item]){
          delete self.industry[item]
          
         if( !$$.isEmptyObj(self.industry) ){
             self.industry = {}
         } 
          self.deleteTags()
          self.setState({
            industry:self.industry,
          })
        }else{
          self.addTags(item)
        }
      },

      addTags:function(item) {
        var self = this
        self.industry[item] = item
        // alert($$.js2str(self.industry))
        self.setState({
          industry:self.industry,
        })
        // alert($$.js2str(self.industry))
        self.$Notice.success({
          title: '添加成功!',
        });
        $$.ajax({
          url:'/adm_company/add_tag_of_industry',
          data:{
            tag:self.industry,
            company_id:'<?=$__company['id']?>'
          },
          succ:function(data){
            
          }
        })
      },

      deleteTags:function() {
        var self = this
        console.log('删除'+self.industry)
        self.$Notice.error({
          title: '删除成功!',
        });

        $$.ajax({
          url:'/adm_company/delete_tag_of_industry',
          data:{
            tag:self.industry,
            company_id:'<?=$__company['id']?>'
          },
          succ:function(data){

          }
        })
      },
  }
})
</script>


<?php
include \view('adm_inc__footer');
