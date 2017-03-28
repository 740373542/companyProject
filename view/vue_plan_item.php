
<!-- 子组件模板 -->
<template id="tpl_plan_item">
  <div style="padding:10px 8px 10px 8px;">
    <div style="text-align:center;"><h3>{{daterange_}}</h3></div>
    <br>
    <div v-for="k in keys_">
      <b style="color:#999;">{{k}}:</b>
      <br />
      <div v-if="!config_[k]">
        <mu-text-field :hint-text="'请输入 '" multi-line v-model="data[k]" @focus="focus(k)" @input="input" @change="change" full-width :rows="3" :rows-max="6" >
        </mu-text-field>
      </div>

      <div v-if="config_[k] && config_[k].type=='slider'">
        <v_plan_item__radiogroup 
          :key_="k"
          :config_="config_[k]"
          :data_="data[k]"
          :func_changed_="slider_change"
        >
        </v_plan_item__radiogroup>
      </div>

    </div>

    <div v-if="changed">

      <mu-raised-button class="demo-raised-button" label="保存" primary backgroundColor="#00bcd4" style="font-size:16px;" @click="save" >
      </mu-raised-button>
      
    </div>
    <br />
    
    <br />

  </div>
</template>

<script type="text/javascript">
$$.comp('v_plan_item', {
  el: '#tpl_plan_item',
  props:['id_','daterange_','data_','keys_','config_'],

  _init: function() {
    this.data = $$.copy(this.data_)
    if(!this.data){
      this.data = {}
    }
    this.id = this.id_
  },

  data:function () {
    return {
      changed: false,
      data: [],
    }
  },

  methods: {

    focus: function(k) {
      this.selectK = k
    },

    slider_change: function(data,k){
      console.log('changed:slider:data:'+$$.js2str(data))
      this.data[k] = {}
      this.data[k] = $$.copy(data)
      this.changed = true
      console.log('$$.js2str(this.data)')
      console.log($$.js2str(this.data))
    },

    input: function(v) {
      console.log(this.selectK)

      console.log($$.js2str(this.data))
      this.data[this.selectK] = v
      console.log($$.js2str(this.data))
    },

    save: function() {
      var self = this
        $$.ajax({
          method:'post',
          url:'/grow_up/aj_save',
          data:{
            id:self.id, 
            key:self.daterange_, 
            data:$$.js2str(self.data),
            type:'<?=$__type?>',
          },

          succ:function(data){
            console.dir(data)
            self.changed = false
            self.id = data.id
          },
          fail:function(msg,code){
            alert('错误，请重新输入')
            // this.company_join_str:'',
          },
        })

    },
    change: function() {
      var self = this
      this.changed = true
    },
  },

  watch: {
    data:function() {
    }
  }
})
</script>








<!-- 子组件模板 -->
<template id="tpl_plan_item__radiogroup">
  <div style="padding:10px 60px 10px 8px;">
    <!-- {{data}} -->
    <div v-for="tag in config_.values">
      {{tag}} {{getScore(data[tag])}} 分
      <mu-slider v-model="data[tag]" @change="change(tag)" @input="input" :step="10" class="demo-slider"/>
    </div>
  </div>
</template>

<script type="text/javascript">
$$.comp('v_plan_item__radiogroup', {
  el: '#tpl_plan_item__radiogroup',
  props:['key_','config_','data_','func_changed_'],
  props_watch:['data_'],

  _change: function() {
    if(this._inited_) return;

    console.log('$$.js2str(this.data_) this.data_this.data_this.data_this.data_')
    console.log($$.js2str(this.data_))
    // alert($$.js2str(this.data_))
    var data = this.data_
    if(!data){
      data = {}
    }
    try{
      this.data = $$.copy(data)
    }catch(e){
      // alert('nonono')
    }

    // for(var i in this.data){
    //   this.data[i] = 0;
    // }
    console.log('this.data===============')
    console.log(this.data)
    this._inited_ = true

    this.setState({
      data: this.data,
    })
  },

  _init: function() {
    console.log('this.data_this.data_this.data_this.data_')
    console.log(this.data_)
    // alert($$.js2str(this.data_))
    var data = this.data_
    if(!data){
      data = {}
    }
    try{
      this.data = $$.copy(data)
    }catch(e){
      // alert('nonono')
    }

    for(var i in this.data){
      this.data.data[i] = 0;
    }
    console.log('this.data===============')
    console.log(this.data)
    this.id = this.id_
  },

  data:function () {
    return {
      changed: false,
      data: {},
      _inited_: false,
    }
  },

  methods: {
    getScore: function(v){
      if(!v) return 0
      v = v/10
      if(v>9.1) return 10
      return parseInt(v)
    },

    input: function(value) {
      console.log('value:'+value)
      var rate = value
      this.data[this.selectItemK] = rate
      this.setState({
        data: this.data
      })

      this.func_changed_(this.data, this.key_)
    },
    change: function(k) {
      console.log('change:'+k)
      this.selectItemK = k 
    },
  },

  watch: {
    data:function() {
    }
  }
})
</script>












