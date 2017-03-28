<?php
include \view('inc_header');
$_SESSION['idx'] ++;
?>

<div v-choak id="v_main" class="copyr23" style="font-size:10.1rem;">


<div class="articles" style="font-size:1rem;">



<?php
// print_r($__tests);

$testIds = [];

foreach ($__tests as $test) {
  $testIds[''.$test['id']] = $test['id'];
  $options = \de($test['options']);
  $options_map = [];
  $options_key = [];
  foreach ($options as $k => $v) {
    $options_map['k_'.$k] = $v;
    $options_key['k_'.$k] = $k;
  }
  $shuffle_options = [];

  shuffle($options_key);

  // print_r($options_key);
?>

  <article class=" first">
    <div class="artHeader">
      <a class="artTitle"><?=$test['title']?></a>
    </div>

    <p class="artSub" style="line-height:3rem;padding-top:2rem;padding-bottom:2rem;">
    <?php
    foreach ($options_key as $_ => $idx) {
      $label = $test['id'].'_'.$idx;
      ?>
      <input type="checkbox" id="<?=$label?>" v-model="answers" value="<?=$label?>" /> <label for="<?=$label?>"><?=$options_map['k_'.$idx]?> </label> <br />
      <?php
    }
    ?>

    </p>


    <div class="thumbnails"></div>

  </article>

<?php
}
?>




  <style type="text/css">
    .pagination .pg a {
      font-size: 1.5rem;
      margin-left:-2rem;
      margin-bottom:4rem;
      padding-top:1.2rem;
    }
  </style>



  <div style="background:#-FFFF00;padding:10px;margin-top:1.5rem;">
      <div style="margin:0px;color:#FFF;background:#00A7F7;text-align:center;height:4.7rem;font-size:2.5rem;line-height:4.7rem;"
        @click="ajaxSave">
        提交
      </div>
      <div style="clear:both;width:100%;"></div>
  </div>


  <div id="mask" style="display: none; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>

</div>


<script type="text/javascript">

$$.vue({
  el: '#v_main',
  data: function(){
    return {
      can_save: false,
      answers: [],
      asks: $$.str2js('<?=\en(array_keys($testIds))?>'),
    }
  },

  methods: {

    ajaxGoBack: function(){

      $$.ajax({
        url: '/video/aj_test_submit?uid=',
        type: 'POST',
        data: {
          asks: this.asks,
          answers: this.answers,
          video_id: '<?=$_GET['id']?>',
          course_id: '<?=$_GET['course_id']?>',
        },
        succ: function(data){
          // alert($$.js2str(data))
          if(data.pass==='false'){
            alert('过关失败，请再接再厉')
            console.log('过关失败，请再接再厉')
          }else{
            alert('恭喜您过关成功！')
            console.log('恭喜您过关成功！')
            call_native('event',{
              event_name: 'TASK_DONE',
            })

            call_native('event',{
              event_name: 'TO_WEB',
              web_event_name: 'TASK_DONE',
            })

            call_native('event',{
              event_name: 'NAV_GO_BACK',
            })

          }



        },
        fail: function(msg,code){
          alert('提交失败 '+$$.js2str(msg))
        },

      })

    },

    ajaxSave: function(){

      // alert($$.js2str(this.answers))

      $$.ajax({
        url: '/video/aj_test_submit?uid=',
        type: 'POST',
        data: {
          asks: this.asks,
          answers: this.answers,
          video_id: '<?=$_GET['id']?>',
          course_id: '<?=$_GET['course_id']?>',
        },
        succ: function(data){
          // alert($$.js2str(data))
          if(data.pass==='false'){
            alert('过关失败，请再接再厉')
            console.log('过关失败，请再接再厉')
          }else{
            alert('恭喜您过关成功！')
            console.log('恭喜您过关成功！')
            call_native('event',{
              event_name: 'TASK_DONE',
            })

            call_native('event',{
              event_name: 'TO_WEB',
              web_event_name: 'TASK_DONE',
            })

            call_native('event',{
              event_name: 'NAV_GO_BACK',
            })

          }



        },
        fail: function(msg,code){
          alert('提交失败 '+$$.js2str(msg))
        },

      })

    },

  },

  watch: {
    title: function(){
      this.can_save = true
    },
    content: function(){
      this.can_save = true
    },
  },

})

</script>



</body></html>