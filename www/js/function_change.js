//Админ
//Заполнение полей по кнопки изменить
$(function(){
    $('#right-column-button-re').click(function(){
        if (tr_id!==undefined) { Show_float_window();
          $('.b-popup').text("123");
        $('tr[data-value='+tr_id+'][data-value-help="'+tr_help+'"]')
         .find('td').each(function(key,val){
            console.log($('form').attr('id'));
          /*if ($('form *[name=d'+key+'][type=date]').length==1){
            alert('asd');
            var text = $(val).text();
            var vars = text.split(".");
            var date1=new Date();
            date1 = vars[2]+"-"+vars[1]+"-"+vars[0];
            $('form input[name=d'+key+'][type=date]').val(date1);
             //console.log($(val).text()+" "+key);
          } else 
          if($('form select[name=d'+key+']').length==1){
            $('form select[name=d'+key+'] option')
                .each(function(k,v){
                  if ($(v).text()==$(val).text()) {
                    //alert($(v).text());
                  }
              })
          } else {*/

          $('form *[name=d'+key+']').val($(val).text());
          
          //}
        });
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
//$.ajax