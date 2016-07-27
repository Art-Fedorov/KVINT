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
    $('.button-ok').click(function(){
          delete_row();
        });
    $('#right-column-button-re').click(function(){
          //delete_row();
          Show_float_window();
          $('tr[data-value='+tr_id+']').find('td').each(function(key,val){
            alert(key+" "+$(val).text());
            
          });
          //alert(action);
          //alert(tr_id+" "+tr_help);
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
function Show_tr_id(){
  alert(tr_id);
}

function Show_delete_window(){
  if(tr_id !== undefined){
  $("#popup7").show();
  }
}

function delete_row(){  
  var query = window.location.search.substring(1);
  var vars = query.split("&");     
  var l = vars[0].split("=");
  var codetable = l[1];
  if (codetable=='1'){
      table = 'TAST_CAPTION';
      id_row = 'CAPTION_ID';
  } else if (codetable=='2'){
      table = 'TAST_GROUP';
      id_row = 'GROUP_ID';
  } else if (codetable=='3'){
      table = 'TAST_PRIZE';
      id_row = 'PRIZE_GROUP';
  } else if (codetable=='4'){
      table = 'TAST_MAN';
      id_row = 'MAN_ID';
  } else if (codetable=='5'){
      table = 'TAST_COGNAC';
      id_row = 'COGNAC_ID';
  } else if (codetable=='6'){
      table = 'TAST_RATING';
      id_row = 'RATING_ID';
  }
  $(".b-popup").hide();
  $.ajax({ 
  type:'POST', 
  url:'php/delete-row.php', 
  data:{ 
  'id':tr_id ,
  'table':table,
  'row':id_row 
  }, 
  response:'text', 
  success:function(data){ }});
  window.location.reload();
}