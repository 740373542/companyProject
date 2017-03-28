<?php
include \view('vue_comm_list');
?>

<template id="v_bbs_list">
    
    <section class="m_article list-item list-article  clearfix " id="C67VEK78liu_li" v-for="item in ls">
        <a v-bind:onclick="'call_native(\'open_win\',{url:\'/bbs/detail?id='+item.id+'&_type_id='+this.type_id_+'\',title:\'auto\'});">
            <div data-ripple-color="#999" data-ripple-class="" class="ripple m_article_info -stouchable" style="padding:20px 10px;position:relative;">
                <div class="m_article_title" style="padding-bottom:6px;">
                    <span>
                      {{item.title}}
                    </span>
                </div>
                <div class="m_article_desc clearfix">
                    <div class="m_article_desc_l">
                          <span class="m_article_channel">图</span>
                        <span class="m_article_time">
                          {{item.create_at}}
                        </span>
                    </div>
                        <div class="m_article_desc_r">
                            <div class="left_hands_desc">
                                <span class="iconfont">xxx</span>0
                            </div>
                        </div>
                </div>
            </div>
        </a>
    </section>


</template>



<script type="text/javascript">
var a = __v__common_list()

  $$.comp('v_bbs_list', $$.vCopy(__v__common_list(),{
    el: '#v_bbs_list',
    props_ext:['type_id_'],
  }))

</script>

