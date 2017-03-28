<?php
  // include \view('vue_url_branch');
?>
<div v-cloak id="v_test__items">


    <div track-by="$index"  >
        <input type="text" v-bind:value="titles" v-model="titles" >
        <br />
        <input type="text" v-bind:value="items" v-model="items" >
    </div>

   <!--  <select v-model="resolution">
      <option v-for="(idx,v) in ls">{{v.type}}</option>
    </select>
    <span>Selected: {{ resolution }}</span>
 -->


  <div >
    <div track-by="$index" v-for="(idx,v) in ls" >
      <label for="v.id">{{v.title}}</label>
      <input type="radio" v-bind:value="v.id" v-model="correct">
    </div>
  </div>
  

    <!-- {{items | json}} -->
    <!-- {{correct | json}} -->
    <!-- {{titles | json}} -->


    <div style="margin-top:10px;">
    <span class="del_option_button" @click="save()">保存</span>
    </div>

</div>





<script type="text/javascript">
      // alert($$.js2str(this.items))

var v_test__items = $$.vue({
    el: '#v_test__items',
    data: function(){
        return {
            id: '<?=$id?>',
            titles: '<?=$title?>',
            items: '<?=$url?>',
            correct: '<?=$cate_id?>',
            resolution: 2,
            ls: [],
        }
    },
    //  _init: function (){
    //   this.loadData()
    // },
    _init: function (){
      this.loadData()
    },

    methods: {

      loadData: function (){
        var self = this
        $$.ajax({
          method:'get',
          url:'/adm_url_crud/comm_cate_check',
          data:{
            type: self.resolution,
          },
          succ: function (data){
            self.ls = data.ls
          },
        })
      },

      save: function(){
        if (!this.titles || !this.items) {
            alert('请填写完整')
            return;
        };
          $$.ajax({
            method:'get',
            url:'/adm_url_crud/checkurl?id='+this.id,
            data: {
              title: this.titles,
              urls: this.items,
              cate_id: this.correct,
            },
            succ: function(res){
              $$.event.pub('CLOSE_DRAWER')
              $$.event.pub('ADD_URL_SUCC')
            },
            fail:function(msg){
              alert(msg)
            },
          })
      },

      // add: function(){
      //     var items = $$.copy(this.items)
      //     items.push('')

      //     this.setState({
      //         items: items,
      //     })
          // alert('...:'+$$.js2str(items))
          // console.dir(this.items)
          // console.dir(this.correct)
      // }
    }
})
</script>





