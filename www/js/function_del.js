$(function(){
  $('#right-column-button-del').click(function(){
      Show_delete_window();
  });
    /*$('#popup7 input.del').click(function(){
      alert('asd');
    });*/
})

function Show_delete_window(){
  if(tr_id !== undefined){
    
    $.get('../tmpl/pop7.php', function(result) {
    $('body').append(result);
    });
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
  //console.log(tr_id+" "+table+" "+id_row);
  $.ajax({ 
    type:'POST', 
    url:'php/delete-row.php', 
    data:{ 
    'id':tr_id ,
    'table':table,
    'row':id_row
    }, 
    response:'text', 
    success:function(data){ $.ajax({ 
      type:'GET', 
      url:'php/fill-table.php', 
      data:{      
      'code': codetable   
      }, 
      response:'text', 
      success:function(data){$('.left-column').html(data); }
      });
       },
    error:function(data){    
    }
  });
  $("#popup7").remove();
}