
<div v-cloak id="v_test__items">
<!-- 
        习题名称
       <i-input :value.sync="titles" placeholder="请输入..." style="width:200px"></i-input> -->

    <i-form v-ref:form-validate label-position="right" :model="formValidate" :rules="ruleValidate" :label-width="80">
        <Form-item label="习题名称" prop="title">
            <i-input :value.sync="formValidate.title" placeholder="请输入习题名称"></i-input>
        </Form-item>
    </i-form>


    <Row>

      <i-col span="3">
      </i-col>

      <i-col span="10">
        <div track-by="$index" v-for="(idx,it) in items" >
          <Row style="margin-bottom:5px">
            <i-col span="2">
              <input type="checkbox" v-bind:value="idx" v-model="correct"></input>
            </i-col>
            <i-col span="16">
              <i-input size="small" :value.sync="items[idx]" ></i-input>
            </i-col>
            <i-col span="6" >
              <i-button type="error" size="small" @click="delet(idx)"> - </i-button>
            </i-col>
          </Row>
        </div>

         <div style="margin-left:15px">
          <i-button size="small" type="success" shape="circle"  @click="add">添加选项</i-button>
        </div>  

      </i-col>

    </Row>

<!--     {{items | json}}
    {{correct | json}}
    {{titles | json}} -->
    <div style="margin:30px 15px 15px 15px;">
      <i-button type="primary" shape="circle" @click="save()">保存</i-button>
    </div>
</div>





<script type="text/javascript">
      // alert($$.js2str(this.items))

var v_test__items = $$.vue({
    el: '#v_test__items',
    data: function(){
        return {
          id: '<?=$id?>',
          title: '<?=$title?>',
          items: $$.str2js('<?=$options?>'),
          correct: $$.str2js('<?=$correct?>'),
          formValidate: {
            title: '<?=$title?>',
          },


          ruleValidate: {
              title: [
                  { required: true, message: '习题名字不能为空', trigger: 'blur' }
              ],
          },
        }
    },
    _init: function (){
      // alert($$.js2str(this.correct))
    },

    methods: {
      delet: function(idx){
        this.items.splice(idx,1);
      },

      save: function(){
        var self = this
        // alert($$.js2str(this.items))
        // alert($$.js2str(this.correct))
        // alert(this.titles)
        // alert(typeof $$.js2str(this.options))
        // if(typeof $$.js2str(this.options) == 'undefined' ){
        //     alert('选项不能为空')
        //     return;
        // }
        // alert($$.js2str(this.items))
        for(var i in self.items){
          if(!self.items[i]){
            alert('请输入内容')
            return
          }
        }

          $$.ajax({
            method:'get',
            url:'/adm_exercises/exercises_save?id='+self.id,
            data: {
              options: $$.js2str(self.items),
              correct: $$.js2str(self.correct),
              title: self.formValidate.title,
            },
            succ: function(res){
              self.$Message.success('修改成功')
              $$.event.pub('CLOSE_DRAWER')
              $$.event.pub('ADD_EXERCISE_SUCC')
            },
            fail:function(msg){
              self.$Message.success(msg)
            },
          })
        
        
      },

      add: function(){
          var items = $$.copy(this.items)
          items.push('')

          this.setState({
              items: items,
          })
          // alert('...:'+$$.js2str(items))
          // console.dir(this.items)
          // console.dir(this.correct)
      }
    }
})
</script>





