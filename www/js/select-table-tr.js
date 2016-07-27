var tr_id;
var tr_help;
var table;
var id_row;
$(document).ready(function(){
  $('tr').click(function(){
      $('tr').removeClass();
      $(this).addClass('selected');
      tr_id = $(this).data('value');
      tr_help = $(this).attr('data-value-help');        
  });
  $('#right-column-button-re').click(function(){
        //delete_row();
        if (tr_id!==undefined) Show_float_window();
         $('tr[data-value='+tr_id+'][data-value-help="'+tr_help+'"]').find('td').each(function(key,val){
          //console.log(key+" "+$(val).text());
          //var date = $('form *[name=d'+key+'][type=date]';         
          if ($('form *[name=d'+key+'][type=date]').length==1){
            
            var text = $(val).text();

            var vars = text.split(".");
            var date1=new Date();
            date1 = vars[2]+"-"+vars[1]+"-"+vars[0];
            // var xxx=new Date(date1);
            console.log(date1); 
            $('form *[name=d'+key+'][type=date]').val(date1);
          }   
          /*if ($('form select[name=d'+key+']').length==1){

            var text = $(val).text();
            var vars = text.split(".");
            var date = vars[2]+"-"+vars[1]+"-"+vars[0];

            $('form select[name=d'+key+']').text(date);
          }   */
          $('form *[name=d'+key+']').val($(val).text());

        });
      });
  $('form').submit(function(event) {
    return false;
  });
});
function Show(){    
    var query = window.location.search.substring(1);
    var vars = query.split("&");     
    var l = vars[0].split("=");
    var codetable = l[1];
    if (codetable=='1'){
        $("#popup1").show();
        table_add = 'TAST_CAPTION';
    } else if (codetable=='2'){
        $("#popup2").show();
        table_add = 'TAST_GROUP';
    } else if (codetable=='3'){
        $("#popup3").show();
        table_add = 'TAST_PRIZE';
    } else if (codetable=='4'){
        $("#popup4").show();
        table_add = 'TAST_MAN';
    } else if (codetable=='5'){
        $("#popup5").show();
        table_add = 'TAST_COGNAC';
    } else if (codetable=='6'){
        $("#popup6").show();
        table_add = 'TAST_RATING';
    }
    else  $("#popup1").show(); 
}