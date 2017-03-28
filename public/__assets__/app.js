
var __init_touchevent____done = false
var __touch__is_move = false

var __init_touchevent__ = function(){
  if(__init_touchevent____done) return 
  __init_touchevent____done = true
      // alert('000')
      var rippleEffects = function (event,obj,xy) {
        // event.preventDefault();
        // console.dir('001')
        // alert(obj)
        var self = this
        if(obj) self = obj
        
        var ripple_delay = $(self).data("ripple-delay")
        ripple_delay = parseInt(ripple_delay) || 0

        var ripple_color = $(self).data("ripple-color")
        if(!ripple_color){
          ripple_color = '#F1F1F1'
        }

        var ripple_class = 'ripple-effect'
        var customClass = $(self).data("ripple-class")
        if(customClass) ripple_class += ('-'+customClass)
        // alert(ripple_class)
      // 
        var $ripple = $('<div id="ripple_obj" class="'+ripple_class+'"><div style="-webkit-border-radius: 50%;width:200px;height:200px;position:absolute;left:-100px;top:-100px;overflow: hidden;background:'+ripple_color+';"></div></div>'),
            btnOffset = $(self).offset(),
            xPos = event.pageX - btnOffset.left,
            yPos = event.pageY - btnOffset.top;
        if(xy){
          xPos = xy.x
          yPos = xy.y
        }

        var containter_id = $(self).attr('id')
        var ripple_color = $(self).data("ripple-color")
        // console.dir(ripple_color)

        var effect_args = {
          top: yPos,
          left: xPos,
          // background: ripple_color,
          // zIndex:9999999,
          // position:'absolute',
        }

        // alert($$.js2str(effect_args))

        if(ripple_delay>0){
          window.setTimeout(function(){
            $ripple
              .css(effect_args)
              .appendTo($('#'+containter_id));

          },ripple_delay)
        }else{
          console.log('....................'+$$.js2str(effect_args))
            $ripple
              .css(effect_args)
              .appendTo($(self));
        }
        window.setTimeout(function(){
          $ripple.hide()
          $ripple.remove();
        }, 900);
      }

      // ripple
      // $('.ripple').on('touchstart', rippleEffect);
      // $('.ripple').on('click', rippleEffect);
      // $('.ripple-delay').on('click', rippleEffect);



      //按钮点击效果
      $(document).on("touchstart", ".ripple", function (event) {
        __touch__is_move = false

        console.log('0')
        var self = this;
        event = event.targetTouches[0]
          // console.dir(event)
        var btnOffset = $(self).offset(),
            xPos = event.pageX - btnOffset.left,
            yPos = event.pageY - btnOffset.top;
        var xy = {x:xPos,y:yPos}
        console.log(event.pageX)
        console.log(event.pageY)
        console.log($$.js2str(xy))
          rippleEffects(event,this,xy)
      });


      // //按钮点击效果
      // $(document).on("touchstart", ".stouchable:not(.disable)", function (e) {
      //   // alert('0')
      //     var $this = $(this);
      //     var flag = true;
      //     //遍历子类
      //     $this.find("*").each(function () {
      //         //查看有没有子类触发过active动作
      //         if ($(this).hasClass("touch_active")) flag = false;
      //     });
      //     //如果子类已经触发了active动作，父类则取消active触发操作
      //     if (flag) $this.addClass("touch_active");

      //     setTimeout(function(){
      //       $this.removeClass("touch_active");
      //     },1000)
      // });

      // $(document).on("touchmove", ".stouchable:not(.disable)", function (e) {
      //     if ($(this).hasClass("touch_active")) $(this).removeClass("touch_active");
      // });

      $(document).on("touchmove", function (e) {
        __touch__is_move = true
        $('#ripple_obj').remove()
      });

      $(document).on("touchend", function (e) {
        if(__touch__is_move){
          // alert('done')
        }
        __touch__is_move = false
      });



}

$(function(){
  __init_touchevent__()
})

var IS_IN_APP = true
// try{
  callBridgeStartList.push(__init_touchevent__)
// }catch(e){
//   IS_IN_APP = false
//   alert('not in app')
// }



