
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){

  $( "#search").autocomplete({
    source: function( request, response ) {

      $.ajax({
        url:"/search/products",
        type: 'post',
        dataType: "json",
        data: {
           _token: CSRF_TOKEN,
           search: request.term
        },
        success: function( data ) {
           response( data );
        }
      });
    },
    select: function (event, ui) {
      $('#search').val(ui.item.value);
      if(ui.item.type == 0)
         window.location.replace('/products/' + ui.item.id);

      else 
         window.location.replace('/category/' + ui.item.value);
       return false;
    },
    minLength:1,
  });

});


$("#searchButton").click(function(){
   let txt = $("#search").val();
   if(txt != '')
    window.location.replace("/products/search?s=" + txt );
});
