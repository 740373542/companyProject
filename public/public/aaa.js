$$ = {}
$$.Vue = Vue
Vue.config.debug = true
Vue.config.unsafeDelimiters = ['{{{', '}}}']
Vue.config.async = false
Vue.config.devtools = true

Vue.use(MuseUI)

$$.timestr = function(nS) {
  return new Date(parseInt(nS)).toLocaleString().replace(/:\d{1,2}$/,' ');
}

String.prototype.gblen = function() {    
    var len = 0;    
    for (var i=0; i<this.length; i++) {    
        if (this.charCodeAt(i)>127 || this.charCodeAt(i)==94) {    
             len += 2;    
         } else {    
             len ++;    
         }    
     }    
    return len;    
}

$$.data = {TREEDATA:{},cache:{}}
$$.data.loading = true
$$.TREE = {
  app: null
}

try{
  // $$.ok = function(data){
  //   return new Promise((resolve, reject) => {
  //     resolve(data)
  //   })
  // }

  // $$.fail = function(err){
  //   return new Promise((resolve, reject) => {
  //     throw err;
  //     // reject(err)
  //   })
  // }
}catch(e){
  console.log('no es6')
}

$$.time = function () {
  return (new Date()).getTime()
};
$$.getTime = $$.time

var __secs__ = {}
$$.waitSecsLater = function (func,key,secs) {
  secs=secs*1000
  if(!__secs__[key]) __secs__[key] = 0
  var now = $$.time()
  console.log(now - __secs__[key])
  if(now > __secs__[key]){
    __secs__[key] = now + secs
    func()
  }
};

$$.timestr = function(nS) {
  return new Date(parseInt(nS)).toLocaleString().replace(/:\d{1,2}$/,' ');     
}

$$.servertime = function () {
  return (new Date()).getTime()
};
$$.jsonToString = function (json) {
  return JSON.stringify(json)
};
$$.stringToJSON = function (str) {
  // console.log('str:')
  // console.log(str)
  return JSON.parse(str)
};
$$.js2str = $$.jsonToString
$$.str2js = $$.stringToJSON
$$.copy = function(v) {
  return  $$.str2js($$.js2str(v))
}

$$.then = Thenjs



$$.ajax = function(args_){
  if(!args_.url){
    return;
  }
  args_.success = args_.success || args_.succ || function(data,cont){
    cont = cont || function(){}
    cont(null)
  };
  // args_.fail = args_.fail || function(message) {alert(message);};
  args_.error = function(message) {  
    //alert(message); 
  };

  if(args_.type) args_.method = args_.type;

  args_.cont_ = args_.cont_ || function(){}

  var _fail = args_.fail;
  var _success = args_.success;
  args_.success = function(data_){
    // alert(data_)
    var res = $$.str2js(data_);
    var code = res.code;
    var message = res.message;
    if(res.msg) message = res.msg;
    var result = res.data;

    if (code == -2) {
      // $.removeCookie('client');
      window.location.href="/user";
      return;
    } else if (code != 0) {
      _fail(message,code, args_.cont_)
      return;
    } 

    _success(result, args_.cont_)
  };

  $.ajax(args_)

};

$$.wait = function(args_){
  return function(cont){
    args_.cont_ = cont
    $$.ajax(args_)
  }
}

$$.getTime = function(){
  return (new Date()).getTime()
}


$$.autoload = function(){
  var sHeight = 0; //滚动距离总长(注意不是滚动条的长度)
  $(document).scroll(function(){

    var wHeight=document.documentElement.clientHeight;//window 
    var dHeight=document.documentElement.offsetHeight;//整个文档高度
    var sHeight=document.documentElement.scrollTop||document.body.scrollTop;//滚动高度

    console.log('dHeight-(sHeight+wHeight)'+(dHeight-(sHeight+wHeight)))

    if(dHeight-(sHeight+wHeight)<100)
    {
      $$.event.pub('SCROLL_TO_PAGE_END')
    }

  });
}
$$.autoload()


$$.Aaa = function(opt) {
  // alert('AAA')
  opt.data = opt.data || function(){return {}}
  opt._init = opt._init || function(){return {}}
  opt._change = opt._change || function(){return {}}
  opt._unmount = opt._unmount || function(){return {}}
  
  opt._created = opt._created || function(){return {}}
  opt.methods = opt.methods || {}

  for(var i in opt){
    var v = opt[i]
  }

  if(opt.props){
    // console.log($$.js2str(opt.props))
  }

  opt.created = function() {
    opt._created()
  }

  opt.mounted = function() {
    var self = this

    // self.$nextTick(function () {
    //   doSomething()
    // })

    if (opt.APP) {
      $$.TREE.app = this
    }
    if (opt.EVENT) {
      for (var i in opt.EVENT) {
        $$.event.sub(opt.EVENT[i], this)
      }
    }

    // alert('_init:'+$$.js2str(this.$data))
    if(this._setup){
      // console.dir(this)
      // alert('setup')
      this._setup.apply(this) 
    }else{
      opt._init.apply(this) 
    }

    if(this._render){
      this._render.apply(this) 
    }else if(this._change){
      this._change.apply(this) 
    }else{
      opt._change.apply(this) 
    }
    // opt._change.apply(this)


    if (opt.props) {
      for (var i in opt.props) {
        self.$watch(i,function(val){
          // alert('change...'+i+ ' to:'+val)
          // if(self._render){
          //   console.log('_render')
          //   self._render.apply(self) 
          // }else 
          if(self._change){
            console.log('_change')
            self._change.apply(self) 
          }else{
            console.log('opt _change')
            opt._change.apply(self) 
          }     
        })
      }
    }
  }

  // opt.watch = function(){
  //   console.log('watchwatchwatchwatch')
  //   opt._change.apply(this)
  // }

  opt.beforeDestroy = function(){
    // alert('beforeDestroy:'+$$.js2str(this.$data))
  }

  opt.destroyed = function() {
    // alert('detached')
    console.log('aaa destroyed')
    if(opt.TAG){
      $$.data.TREEDATA[opt.TAG] = $$.copy(this.$data)
    }
    $$.event.fire(this)
    opt._unmount.apply(this)
  }

  return opt
}


Vue.prototype.setState = function(data){
  for(var i in data){
    Vue.set(this,i,$$.copy(data[i]))
  }
}



$$.vue = function(opts){

  if( !opts._init ) opts._init = function(){}

  var opt = {
    el: opts.el,
    data: opts.data,
    mounted: function(){
      if(opts.EVENT){
        for(var i in opts.EVENT){
          var event = opts.EVENT[i]
          $$.event.sub(event,this)
        }
      }
      if(opts._init_before) opts._init_before.apply(this)
      opts._init.apply(this)
      if(opts._setup) opts._setup.apply(this)
      if(opts._init_after) opts._init_after.apply(this)
    },
    destroyed: function(){
      console.log('vue destroyed')
      $$.event.fire(this)
    },
    watch: opts.watch,
    methods: opts.methods,
  }

  return new Vue(opt)
}

$$.__debug__ = true

$$.log = function( str ){
  if($$.__debug__) console.log(str)
}

$$.dir = function( obj ){
  if($$.__debug__) console.dir(obj)
}


$$.comp = function(name,opt){
  var _attached = function(){}
  var _detached = function(){}
  if( opt.attached ) _attached = opt.attached
  if( opt.detached ) _detached = opt.detached
  if( !opt._init ) opt._init = function(){}
  if( !opt.watch ) opt.watch = {}

  if( !opt.props ) opt.props = []
  if( !opt.props_watch ) opt.props_watch = opt.props
  if( !opt.props_ext ) opt.props_ext = []
  if( !opt.props_watch_ext ) opt.props_watch_ext = []

  if( opt.el ) opt.template = $(''+opt.el).html()
  delete opt.el

  opt.mounted = function(){
    var self = this
    _attached.apply(this)
    if(opt._init_before) opt._init_before.apply(this)
    opt._init.apply(this)
    if(opt._init_after) opt._init_after.apply(this)
    if(opt._setup) opt._setup.apply(this)

    if(opt.EVENT){
      for(var i in opt.EVENT){
        var event = opt.EVENT[i]
        $$.event.sub(event,this)
      }
    }

    var find = false
    // console.dir(opt.props_watch)

    for (var i in opt.props_watch) {
      var k = opt.props_watch[i]
      // $$.dir('k:'+k)

      // alert('watch_k:'+k)

      ;(function(watchkey){

          // $$.log('watchkey:'+watchkey)

          self.$watch(watchkey,function(){
            // alert(watchkey)
            // $$.dir('watch----------------------'+'_change_'+watchkey)
            if(opt['_change_'+watchkey]){
              opt['_change_'+watchkey].apply(self)
            }else if(opt._change){
              opt._change.apply(self) 
            }
          })          
      })(k)

    }


  }

  opt.destroyed = function(){
    console.log('comp destroyed')
    $$.event.fire(this)
    _detached.apply(this)
  }

  // Vue.component(name,Vue.extend(opt))
  Vue.component(name,opt)
}






////////////// $$.event

;(function ($) {
  $.event = $.event || function () {
      var _observer = {};
      var subscribe = function (eventName_, obj_, args_) {
        args_ = args_ || {};

        var fireOthers_ = args_.fireOthers || false;
        if (fireOthers_) {
          _observer[eventName_] = [];
        }
        _observer[eventName_] = _observer[eventName_] || [];

        if (_observer[eventName_].length > 0) {
          $.event.remove(eventName_, obj_);
        }

        _observer[eventName_].push(obj_);
        return true;
      };

      var publish = function (eventName_, data_, data2_, from_) { 
        // data_ = data_ || {};
        from_ = from_ || null

        var handlers = _observer[eventName_] || [];
        
        var l = handlers.length;
        
        var _stop = false;
        if (from_) {
          from_['hd_' + eventName_](data_, data2_);
          return
        }

        for (var _i = l - 1; _i >= 0; _i--) {
          if (!_stop) {
            var obj = handlers[_i];
            if (typeof obj === 'string') {
              if (!obj) {
                console.log('........fire')
                $.event.fire(obj)
              }
            }

            if (obj && obj['hd_' + eventName_]) {
              var res = obj['hd_' + eventName_](data_, data2_);
              if(res && res.stop){
                _stop = true 
              }
              // _stop = obj['hd_' + eventName_](data_, data2_);
            }
          }
        }
      };

      var remove = function (eventName_, obj_) {
        var handlers = _observer[eventName_];
        var l = handlers.length;
        for (var i = l - 1; i >= 0; i--) {
          if (handlers[i] === obj_) {
            handlers.splice(i, 1);
            break;
          }
        }
      };

      var removeEvent = function (eventName_) {
        _observer[eventName_] = [];
      };

      var fire = function (obj_) {
        for (var eventName in _observer) {
          var handlers;
          if (_observer.hasOwnProperty(eventName)) {
            handlers = _observer[eventName];
          }
          var length = handlers.length;
          for (var i = length; i > -1; i--) {
            if (handlers[i] === obj_) {
              handlers.splice(i, 1);
            }
          }
        }
      };

      var fireAll = function () {
        _observer = {};
      };

      return {
        nodes: _observer,
        sub: subscribe,
        pub: publish,
        remove: remove,
        fire: fire,
        fireAll: fireAll
      };
    }();
})($$);





