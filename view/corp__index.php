<?php
include \view('inc_home_header');
?>

<div>
    <div v-cloak- id="v_nav" class="weui_tab" style="">
      <div class="weui_navbar" style="position:fixed;">

        <div v-bind:class="selected=='tab_plan'?'tab_on':null" class="weui_navbar_item " @click="selected='tab_find'" style="">
          学习计划
        </div>

        <div v-bind:class="selected=='tab_level'?'tab_on':null" @click="selected='tab_my'" class="weui_navbar_item" style="">
          能力测评
        </div>

        <div v-bind:class="selected=='tab_share'?'tab_on':null" class="weui_navbar_item " @click="selected='tab_corp'" style="">
          内部分享
        </div>

        <div v-bind:class="selected=='tab_book'?'tab_on':null" class="weui_navbar_item " @click="selected='tab_book'" style="">
          读书会
        </div>




      </div>

      <div style="padding-top:35px;">

        <div v-if="selected=='tab_book'">
            <div id="panel_product_list" class="weui_cells weui_cells_access m-lr-5" style="padding-bottom:0px;">


              <div class="weui_panel_bd weui_cells weui_cells_form">

                <v_book_list url="/vds/aj_list2?" length="10" autoload="true"></v_book_list>


              </div>
              
            </div>


        </div>
        

      </div>

    </div>

</div>


<script type="text/javascript">


///////////////////  panel-me

$$.data.user = $$.data.user || {}


//////////////////////////////////////////////////////////////////
<?php
$tab = 'tab_book';
if(!empty($_GET['tab'])){$tab = $_GET['tab'];}
?>
var v_nav = $$.vue({
  el: '#v_nav',
  data: {
    selected: '<?=$tab?>',
  },
  EVENT: ['CHANGE_TAB'],
  watch: {
    'selected': function(val){
      // alert(val)
      $$.event.pub('CHANGE_TAB',val)
    }
  },
  methods: {
    hd_CHANGE_TAB: function(tab){
      // alert(tab+'2')
    },


  }
});

window.setTimeout(function(){
  console.log('...')
},1000)

</script>

<?php
include \view('inc_home_footer');
?>