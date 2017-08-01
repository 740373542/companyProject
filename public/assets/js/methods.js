var $$ = {}

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
		eventBox[eventName] = []
		eventBox[eventName].push(obj)

	}

	var sendEvent = function(eventName,parmas,toobj){

		var box = eventBox

		for(var k in box){
			var event = k
			var objs = box[k]

			if((toobj && typeof toobj == "object") && eventName == event){
					toobj['call_'+event](parmas)
					return
			}
			if(typeof eventName == "string" && event == eventName){
				for(var i in objs){
					var obj = objs[i]
					obj["call_"+event](parmas)
				}
			}else{
				console.log("error:event异常")
			}

		}

	}

	var destroyEvent = function(){

		for(var event in eventBox){

			var objs = eventBox[event]

			for(var i=0;i<objs.length;i++){
				objs.splice(i,1)
			}
		}

		eventBox = {}
	}


	return{
		set:setEvent,
		send:sendEvent,
		del:destroyEvent,
	}

}()

$$.vue = function(parmas){

	parmas.init = parmas.init || function(){}
	parmas.create =  parmas.create || function(){}
	parmas.data = parmas.data || {} 
	parmas.methods = parmas.methods || {}
	parmas.watch = parmas.watch || {} 
	parmas.EVENT = parmas.EVENT || [] 

	var obj = {

		el:parmas.el,

		data:function(){
			return parmas.data
		},

		created:function(){
			parmas.create.apply(this)
			if(parmas.EVENT != ''){
				for(var k in parmas.EVENT){
					$$.event.set(parmas.EVENT[k],this)
				}
			}
		},

		mounted:function(){
			parmas.init.apply(this)
		},

		destroyed:function(){
			$$.event.del()
		},

		methods:parmas.methods,
		watch:parmas.watch,

	}

	return new Vue(obj)

}

$$.comp = function(parmas){

}




