
$$.data = $$.data || {}
$$.fun = $$.fun || {}

var __loadDataWithCacheKey_ = function(force){
  return function(f){

  }
}


$$.fun.LoadClients = function(force){
  return function(cont){
    if(force || !$$.data.Clients) {
      $$.data.__Clients__ = {}
      $$.ajax({
        url: '/client/ls',
        succ: function(data){
          $$.data.__Clients__ = data.ls
          cont(null)
        },
      })
    } 
  }
}

$$.fun.LoadProducts = function(force){
  return function(cont){
    if(force || !$$.data.Clients) {
      $$.data.__Products__ = {}
      $$.ajax({
        url: '/product/ls',
        succ: function(data){
          $$.data.__Products__ = data.ls
          cont(null)
        },
      })
    } 
  }
}


