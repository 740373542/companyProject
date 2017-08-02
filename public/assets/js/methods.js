var $$ = {}

$$.component = {}

$$.str = function(json){

	return JSON.stringify(json)
} 

$$.json = function(str){

	return JSON.parse(str);

}

$$.ajax = function(args){

	if(!args.url || args.url == ''){
		console.log("error:connot find url")
		return;
	}

	args.type = args.type || "GET"

	args.asycn = args.asycn || true 

	args.data = args.data || {}

	args.succ = args.succ || function(data){} 

	args.error = args.error || function(data){
		alert(data.msg)
		return;
	} 

	var obj = {

		url:args.url,

		type:args.type,

		asycn:args.asycn,

		data:args.data,

		success:function(data){
			var res = $$.json(data)
			if(res.code == 0){
				console.log("request success")
				args.succ(res)
			}else{
				args.error(res)
			}
		},


	}

	$.ajax(obj)

}


$$.event = function(){

	var eventBox = {};

	var setEvent = function(eventName,obj){

		if(typeof eventBox[eventName] == "undefined"){
			eventBox[eventName] = []
		}
		eventBox[eventName].push(obj)

		
	}

	var sendEvent = function(eventName,parmas,toobj){


			if(typeof eventBox[eventName] !== "undefined" && eventBox[eventName].length > 0){

				var objs = eventBox[eventName];

				if(toobj){
					for(var k in objs){
						if(toobj == objs[k]){
							toobj["call_"+eventName](parmas)
						}else{
							console.log("没有找到指定对象")
						}
					}
					return
				}

				for(var i in objs){

					var obj = objs[i]

					obj["call_"+eventName](parmas)

					console.log(eventName+"事件调用成功")

				}

			}else{
				console.log(eventName+"失败")
			}


	}

	var destroyEvent = function(eventName,obj){
		if(eventBox[eventName] !== "undefined" && eventBox[eventName].length>0){
			for (var i=0; i<eventBox[eventName].length; i++){
				if(eventBox[eventName][i] == obj){
					eventBox[eventName].splice(i,1)
				}
			}
		}
	}


	return{
		set:setEvent,
		send:sendEvent,
		del:destroyEvent,
	}

}()

$$.vue = function(params){

	params.init = params.init || function(){}
	params.create =  params.create || function(){}
	params.data = params.data || {} 
	params.methods = params.methods || {}
	params.watch = params.watch || {} 
	params.childs = params.childs || {} 
	params.EVENT = params.EVENT || [] 



	var obj = {

		el:params.el,

		data:function(){
			return params.data
		},


		created:function(){
			params.create.apply(this)
			if(params.EVENT != ''){
				for(var k in params.EVENT){
					$$.event.set(params.EVENT[k],this)
				}
			}
		},

		mounted:function(){
			params.init.apply(this)
		},

		destroyed:function(){
			for(var k in params.EVENT){
				var eventName = params.EVENT[k]
				$$.event.del(eventName,this)

			}
		},

		components:params.childs,
		methods:params.methods,
		watch:params.watch,

	}

	return new Vue(obj)

}


$$.child = function(params){

	if(!params.el || params.el==''){
		console.log("请定义模版")
		return;
	}

	params.init = params.init || function(){}
	params.create =  params.create || function(){}
	params.data = params.data || {} 
	params.methods = params.methods || {}
	params.watch = params.watch || {} 
	params.EVENT = params.EVENT || []
	params.props = params.props || []

	var obj = {

		template:$(params.el).html(),

		props:params.props,

		data:function(){
			return params.data
		},

		created:function(){
			params.create.apply(this)


			if(params.EVENT != ''){
				for(var k in params.EVENT){
					$$.event.set(params.EVENT[k],this)
				}
			}
		},

		mounted:function(){
			params.init.apply(this)
		},

		destroyed:function(){
			for(var k in params.EVENT){
				var eventName = params.EVENT[k]
				$$.event.del(eventName,this)

			}
		},

		methods:params.methods,
		watch:params.watch,

	}

	return obj;
}





$$.comp = function(params){

	var name = params.name || "index"

	if(!params.el || params.el==''){
		console.log("请定义模版")
		return;
	}

	params.init = params.init || function(){}
	params.create =  params.create || function(){}
	params.data = params.data || {} 
	params.methods = params.methods || {}
	params.watch = params.watch || {} 
	params.EVENT = params.EVENT || []
	params.props = params.props || []

	var obj = {

		template:$(params.el).html(),

		props:params.props,

		data:function(){
			return params.data
		},

		created:function(){
			params.create.apply(this)
			if(params.EVENT != ''){
				for(var k in params.EVENT){
					$$.event.set(params.EVENT[k],this)
				}
			}
		},

		mounted:function(){
			params.init.apply(this)
		},

		destroyed:function(){
			for(var k in params.EVENT){
				var eventName = params.EVENT[k]
				$$.event.del(eventName,this)
			}
		},

		methods:params.methods,
		watch:params.watch,

	}

	Vue.component(name,obj)



}


$$.getTime = function(){
  return (new Date()).getTime()
}

$$.parseDate = function(date,strtime){
  Date.prototype.format =function(format){
      var o = {
        "M+" : this.getMonth()+1, //month
        "d+" : this.getDate(), //day
        "h+" : this.getHours(), //hour
        "m+" : this.getMinutes(), //minute
        "s+" : this.getSeconds(), //second
        "q+" : Math.floor((this.getMonth()+3)/3), //quarter
        "S" : this.getMilliseconds() //millisecond
      }
      if(/(y+)/.test(format)) format=format.replace(RegExp.$1,
      (this.getFullYear()+"").substr(4- RegExp.$1.length));
      for(var k in o)if(new RegExp("("+ k +")").test(format))
      format = format.replace(RegExp.$1,
      RegExp.$1.length==1? o[k] : ("00"+ o[k]).substr((""+ o[k]).length));
      return format;
    }
    return date.format(strtime)
}


$$.isEmptyObj = function(obj){
    for(var i in obj){
      return true
    }
    return false
}




