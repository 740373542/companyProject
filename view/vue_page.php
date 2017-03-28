<script type="text/javascript">
var __v_page__common = function(){
  return  {
    el: '#__v_page__common',
    props:['count_','length_','page_','func_pagechanged_'],
    props_watch:['count_','page_'],

    data: function () {
      return {
        loading: false,
        ls: [],
      }
    },

    _init: function() {
      if(!this.func_pagechanged_){
        this.func_pagechanged_ = function(){}
      }
    },

    methods: {
      gopage: function(idx){
        this.func_pagechanged_(idx)
      },
    },
   
  }
}
</script>


<template id="__v_page__common">

    <ul class="ivu-page">
    
      <li v-if="page_ == 1" title="上一页" class="ivu-page-prev ivu-page-disabled">
        <a>
          <i class="ivu-icon ivu-icon-ios-arrow-left"></i>
        </a>
      </li>

      <li v-if="page_ > 1" title="上一页" class="ivu-page-prev ivu-page-next" @click="gopage(page_-1)">
        <a>
          <i class="ivu-icon ivu-icon-ios-arrow-left"></i>
        </a>
      </li>


      <li  v-bind:class="((v+1)==page_)?'ivu-page-item ivu-page-item-active':'ivu-page-item'" v-for="(v,idx) in count_/length_" @click="gopage(v+1)" >
        <a>{{v+1}}</a>
      </li>
 
      <li v-if="Math.ceil(count_/length_) >= 10" class="ivu-page-item-jump-next">
        <a>
          <i class="ivu-icon ivu-icon-ios-arrow-right"></i>
        </a>
      </li>

      <li v-if="Math.ceil(count_/length_) >= 10" class="ivu-page-item"  @click="gopage(Math.ceil(count_/length_))" >
        <a>{{Math.ceil(count_/length_)}}</a>
      </li>


      <li v-if="page_ > count_/length_" title="下一页" class="ivu-page-prev ivu-page-disabled">
        <a>
          <i class="ivu-icon ivu-icon-ios-arrow-right"></i>
        </a>
      </li>

      <li v-if="page_ <= count_/length_" title="下一页" class="ivu-page-next" @click="gopage(page_+1)">
        <a>
          <i class="ivu-icon ivu-icon-ios-arrow-right"></i>
        </a>
      </li>

    </ul>
</template>



<script type="text/javascript">
$$.comp('v_page', $$.vCopy(__v_page__common(),{
}))
</script>

<style>
  .v_page_style_on{
    cursor:pointer;
    text-decoration:underline;
    color:#FF0000;
    font-size:16px;
    display: inline-block;
    margin-left: 10px;
  }

  .v_page_style_off{
    cursor:pointer;
    color:#000000;
    font-size:16px;
    display: inline-block;
    margin-left: 10px;
  }
</style>
