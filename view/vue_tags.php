<template id="v_tags__selector">
    <div v-for="v in tags_">

        <i-button  style='margin: 2px 4px 2px 0' icon="close-circled" v-if="selected_tag_map[v.id]==1" type="primary" @click="unSelectItem(v)">{{v.name}}</i-button>

        <i-button  style='margin: 2px 4px 2px 0' icon="plus-circled" v-if="selected_tag_map[v.id]!=1" type="default" @click="selectItem(v)">{{v.name}}</i-button>

    </div>
</template>


<script>
  $$.comp('v_tags__selector', {
    el:'#v_tags__selector',
    props:['func_select_','func_unselect_','tags_selected_','tags_'],
    props_watch:['tags_selected_'],

    data:function(){
      return {
        selected_tag_map: {},
        // tags: [
        //   {
        //       id: 1,
        //       name: 'beijing',
        //   },
        //   {
        //       id: 2,
        //       name: 'shanghai',
        //   },
        // ],
      }
    },

    _init: function() {
    },

    _change: function() {
      this.selected_tag_map = {}
      for(var i in this.tags_selected_){
        this.selected_tag_map[this.tags_selected_[i]] = 1
      }
      // alert($$.js2str(this.tags_selected_))
      // alert($$.js2str(this.selected_tag_map))
    },

    methods: {

      selectItem: function(tag){
        // alert(tag.id)
        this.selected_tag_map[tag.id] = 1
        this.setState({
          selected_tag_map: this.selected_tag_map,
        })
        this.func_select_(tag)
      },

      unSelectItem: function(tag){
        this.selected_tag_map[tag.id] = null
        delete this.selected_tag_map[tag.id]
        this.setState({
          selected_tag_map: this.selected_tag_map,
        })
        this.func_unselect_(tag)
      },

    },

  })

</script>


<template id="v_tags__selector_inline">
    <span v-for="v in tags_">

        <i-button  style='margin: 2px 4px 2px 0' icon="close-circled" v-if="selected_tag_map[v.id]==1" type="primary" size="small" @click="unSelectItem(v)">{{v.name}}</i-button>

        <i-button  style='margin: 2px 4px 2px 0' icon="plus-circled" v-if="selected_tag_map[v.id]!=1" type="default" size="small" @click="selectItem(v)">{{v.name}}</i-button>

    </span>
    <span v-if="tags_.length==0">加载中...</span>

</template>

<script>
  $$.comp('v_tags__selector_inline',  {
    el:'#v_tags__selector_inline',
    props:['func_select_','func_unselect_','tags_selected_','tags_'],
    props_watch:['tags_selected_'],

    data:function(){
      return {
        selected_tag_map: {},
      }
    },

    _init: function() {
    },

    _change: function() {
      this.selected_tag_map = {}
      for(var i in this.tags_selected_){
        this.selected_tag_map[this.tags_selected_[i]] = 1
      }
    },

    methods: {
      selectItem: function(tag){
        this.selected_tag_map[tag.id] = 1
        this.setState({
          selected_tag_map: this.selected_tag_map,
        })
        this.func_select_(tag)
      },

      unSelectItem: function(tag){
        this.selected_tag_map[tag.id] = null
        delete this.selected_tag_map[tag.id]
        this.setState({
          selected_tag_map: this.selected_tag_map,
        })
        this.func_unselect_(tag)
      },

    },

  })

</script>



