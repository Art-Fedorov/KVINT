$(function(){
  $('.del').click(function(){
          delete_row();
        });
})

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
  console.log(tr_id+" "+table+" "+id_row);
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
  success:function(data){  },
  error:function(data){
    
  }
});
  window.location.reload();
}