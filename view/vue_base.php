 <script type="text/javascript">
  var _vue_loadData = function(){
    return {
      el:'',
      props:['event_key_','should_reload_','url_','extra_data_','input_date','input_info'],
      props_watch:['should_reload_','url_'],
      data: function(){
        return {
          ls: [],
          loading: false,
          role_name:'',
        }
      },

      _init: function(){
        var self = this
        self.loadData()
      },

      _change: function(){
        var self = this
        self.loadData()
      },

      methods: {
        loadData: function(){
          var self = this
          self.loading = true
          $$
            .then(
              $$.wait({
                url: self.url_,
                succ: function(data, cont){
                  self.ls = data.ls
                  cont(null)
                },
              })
            )
              
            .then(function(cont){
              self.loading = false
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
    }
  }
 </script>


 <style>
/*  .add_option_button{
    background:#33CC66;
    padding:5px 20px;
    border-radius:5px;
    color:#FFF;
    margin-left:62px;
    cursor:pointer;
  }

  .del_option_button{
    background:#FF3333;
    padding:5px 20px;
    border-radius:5px;
    color:#FFF;
    margin-left:10px;
    cursor:pointer;
  }*/
 </style>

