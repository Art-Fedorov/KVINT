$(function(){
    $('#right-column-button-re').click(function(){
          //delete_row();
          if (tr_id!==undefined) Show_float_window();
           $('tr[data-value='+tr_id+'][data-value-help="'+tr_help+'"]')
           .find('td').each(function(key,val){
            //console.log(key+" "+$(val).text());
            $('form *[name=d'+key+']').val($(val).text());
            if ($('form select[name=d'+key+']').length==1) {
              
            }
            //$('form *[name]')
          });
        });
    $('form').submit(function(event) {
      return false;
    });
  });
//$.ajax