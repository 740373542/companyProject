 
 <script type="text/javascript">
 	var _vue_loadData = function(){
 		return {
 			el:'',
 			props:['event_key_','should_reload_','url_','extra_data_','input_date','input_info'],
 			props_watch:['should_reload_','url_'],
 			data: function(){
 				return {
 					ls_data: [],
 					loading: false,
          selected: null,
 					key:null,
 					search_result:[],
          id_current:'',
 				}
 			},

 			_init: function(){
 				var self = this

 				self.loadData()
 			},

 			_change: function(){
        // alert('aaa')
 				var self = this
 				self.loadData()
 			},

 			methods: {
 				loadData: function(){
		      var self = this
		      self.loading = true
		      self.ls_data = []
		      self.search_result = []
		      $$
		        .then(
		        	$$.wait({
		            url: self.url_,
		            succ: function(data, cont){
		              self.ls_data = data.ls
		              cont(null)
		            },
		          })
		        )
		          
		        .then(function(cont){
		          self.loading = false
		          self.search()
		        })
	   		},


 				clickItem:function(event,item){
 					var self = this
 					$$.event.pub(event,{
 						item:item,
 					})
 					self.selected = item.id
 				},



 				clickOff:function(event){
 					var self = this
 					$$.event.pub(event)
 					self.selected = null
 				},



 				clickInput: function(event){
 					var self = this
 					var detail ={}
 					detail[self.input_date] = $('#'+self.input_date).val()
 					detail[self.input_info] = $('#'+self.input_info).val()
 					$$.event.pub(event,{
 						item:detail,
 					})
 				},


 				search: function(){
 					var self = this
 					var count = 0
 					self.search_result = []
 					var _key = self.key
 					if(!_key) _key = ''
          if(_key=='  ') _key = ''
 					var _data = self.ls_data
 					for(var i in _data){
 						var v = _data[i]
	 					var _text = ''
	 					if(v.name) _text = v.name
	 					if(v.title) _text = v.title
	 					if(v.creat_at) _text = v.creat_at
	 					var py =''
	 					py = v.py+""+_text
	 					if(py.indexOf(_key)>=0){
	 						self.search_result.push({
	 							name: _text,
	 							id:v.id,
	 							creat_at:v.create_at,
	 						})
	 						count ++
 						}
 					}
 					
 				},



 				saveData: function(url){
					var self = this
					$$
						.then(
							$$.wait({
								method:'get',
								url:url,
								succ: function(data,cont){
									cont(null)
								},
							})
						)
						.then(function(cont){
							self.should_reload_ = $$.getTime()
						})
				},

 			},


 			watch: {
        'key': function(val){
          var self = this
          // console.log('key:'+val)
          self.search()
        },
      },
 		}
 	}
 </script>




 <style type="text/css">
 	.clickstyle{
 		background:#999;
 	}
 </style>