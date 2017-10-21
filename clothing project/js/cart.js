function add(id){
  var request = $.ajax({
    url: "addToCart.php",
    method: "GET",
    data: { action:'add',id : id },

    success: function(){
      window.location.reload();
    }
  });
}

function remove(id){
  var request = $.ajax({
    url: "addToCart.php",
    method: "GET",
    data: { action:'remove',id : id },

    success: function(){
      window.location.reload();
    }
  });
}

function male(){
  var request = $.ajax({
    url: "approve.php",
    method: "GET",
    data: { action:'male' },

    success: function(){
      window.location.reload();
    }
  });
}

function female(){
  var request = $.ajax({
    url: "home.php",
    method: "GET",
    data: { action:'female'},

    success: function(){
      window.location.reload();
    }
  });
}
