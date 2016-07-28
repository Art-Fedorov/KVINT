$(function(){
    $('#right-column-button-re').click(function(){
        //delete_row();
        if (tr_id!==undefined) Show_float_window();
         $('tr[data-value='+tr_id+'][data-value-help="'+tr_help+'"]')
         .find('td').each(function(key,val){
          if ($('form *[name=d'+key+'][type=date]').length==1){
            var text = $(val).text();
            var vars = text.split(".");
            var date1=new Date();
            date1 = vars[2]+"-"+vars[1]+"-"+vars[0];
            $('form input[name=d'+key+'][type=date]').val(date1);
             //console.log($(val).text()+" "+key);
          } else 
          if($('form select[name=d'+key+']').length==1){
            //console.log($(val).text()+" "+key);
              $('form select[name=d'+key+'] option')
                .each(function(k,v){
                  if ($(v).text()==$(val).text()) {
                    //alert($(v).text());
                  }
              })
          } else {
          $('form *[name=d'+key+']').val($(val).text());
          
          }
        });
      });
    /*$('#right-column-button-re').click(function(){
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
        });*/
    $('form').submit(function(event) {
      return false;
    });
  });
//$.ajax