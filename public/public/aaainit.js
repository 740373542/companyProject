var $$ = {
  model:{}
}
$$.sql = alasql
$$.math = math
// $$.Math = Math

$$.query_count = 0;

$$.trim = function (str){   
    str = str.replace(/^(\s|\u00A0)+/,'');   
    for(var i=str.length-1; i>=0; i--){   
        if(/\S/.test(str.charAt(i))){
            str = str.substring(0, i+1);   
            break;   
        }   
    }   
    return str;   
}  

$$.map2sql = function(map){
  var  str = ''
  var  arr = []
  for(var key in map){
    arr.push("`"+key+"`="+map[key]+"")
  }
  str = arr.join(',')
  // alert(str)
  return str
}

$$.find = function(sql,cb){
  sql = $$.trim(sql)
  var add = ';'
  if(sql.substring(sql.length-1)==';') add = ''
  // alert(sql+'______________  add '+add)
  // alert(sql.substring(sql.length-1))
  sql = sql+add+'--'+(++$$.query_count)+';'
  // alert(sql)
  $$.log(sql)
  alasql(sql,cb)
  if($$.query_count>=9999999) $$.query_count=0
}
$$.sql.promise = alasql.promise

alasql.options.errorlog = function(err){console.error(err)};
$$.log = function(str){
  if($('#debug')[0]){
    $('#debug').html(str+'<hr />'+$('#debug').html());
  }else{
    console.log($$.js2str(str))
  }
}
$$.obj2map = function(obj, func){
  var res = []
  for(var i in obj){
    // res.push($$.js2str(obj[i]))
    if(func){
      res.push(func($$.copy(obj[i])))
    }else{
      res.push($$.copy(obj[i]))
    }
  }
  console.dir('res')
  console.dir(res)
  return res
}

$$.getTime = function(){
  return (new Date()).getTime()
}












      var __scrollbar_width__ = 0
      $(document).ready(function () {
          var getScrollBarWidth = function () {
              var inner = document.createElement('p');
              inner.style.width = "100%";
              inner.style.height = "200px";

              var outer = document.createElement('div');
              outer.style.position = "absolute";
              outer.style.top = "0px";
              outer.style.left = "0px";
              outer.style.visibility = "hidden";
              outer.style.width = "200px";
              outer.style.height = "150px";
              outer.style.overflow = "hidden";
              outer.appendChild(inner);

              document.body.appendChild(outer);
              var w1 = inner.offsetWidth;
              outer.style.overflow = 'scroll';
              var w2 = inner.offsetWidth;
              if (w1 == w2) w2 = outer.clientWidth;

              document.body.removeChild(outer);

              return (w1 - w2);
          };
          __scrollbar_width__ = getScrollBarWidth()

          // $('#Id_global_loading').fadeOut()

          // $$.event.pub('OPEN_DRAWER')


          var rippleEffect = function (event) {
            // event.preventDefault();
            
            var ripple_delay = $(this).data("ripple-delay")
            ripple_delay = parseInt(ripple_delay) || 0

            var ripple_color = $(this).data("ripple-color")

            var ripple_class = 'ripple-effect'
            var customClass = $(this).data("ripple-class")
            if(customClass) ripple_class += ('-'+customClass)
            // alert(ripple_class)
            var $ripple = $('<div class="'+ripple_class+'" />'),
                btnOffset = $(this).offset(),
                xPos = event.pageX - btnOffset.left,
                yPos = event.pageY - btnOffset.top;

            var containter_id = $(this).attr('id')
            var ripple_color = $(this).data("ripple-color")
            // alert(ripple_color)

            if(ripple_delay>0){
              window.setTimeout(function(){
                $ripple
                  .css({
                    top: yPos,
                    left: xPos,
                    background: ripple_color
                  }) 
                  .appendTo($('#'+containter_id));

              },ripple_delay)
            }else{
                $ripple
                  .css({
                    top: yPos,
                    left: xPos,
                    background: ripple_color
                  }) 
                  .appendTo($(this));
            }
            window.setTimeout(function(){
              $ripple.remove();
            }, 1100);
          }

          // ripple
          $('.ripple').live('click', rippleEffect);
          $('.ripple-delay').live('click', rippleEffect);
          

          // setInterval(function(){
          //   var data = $$.copy({
          //       a: 'a',
          //     })
          //   ipc.send('ipc', {
          //     type: 'ADD_SKU_TO_CART',
          //     data: data,
          //   })
          //   console.log('ipc:ADD_SKU_TO_CART:'+$$.js2str(data))
          // },2000)

      })
