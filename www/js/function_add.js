var table_add;
  $(document).ready(function(){
    $('tr').click(function(){
        $('tr').removeClass();
        $(this).addClass('selected');
        tr_id = $(this).data('value');        
        });
    $('.button-ok-popup-1').click(function(){
          data_add_1();
    });
    $('.button-ok-popup-2').click(function(){
          data_add_2();
    });
    $('.button-ok-popup-3').click(function(){
          data_add_3();
    });
    $('.button-ok-popup-4').click(function(){
          data_add_4();
    });
    $('.button-ok-popup-5').click(function(){
          data_add_5();
    });
    $('.button-ok-popup-6').click(function(){
          data_add_6();
    });
  });

function Show_float_window(){    
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

function data_add_1(){ 
  var date1 = document.getElementById("popup1-date1").value;
  var date2 = document.getElementById("popup1-date2").value; 
  var desc = document.getElementById("popup1-desc").value;   
  $.ajax({ 
  type:'POST', 
  url:'php/add_popup4.php', 
  data:{   
  'table_add':table_add,
  'date1':date1,
  'date2':date2,
  'desc':desc
  }, 
  response:'text', 
  success:function(data){ }});
  window.location.reload();
}

function data_add_4(){ 
  var fio = document.getElementById("popup4-fio").value;
  var pos = document.getElementById("popup4-pos").value; 
  /*var m = fio + pos + table_add; 
  alert(m);*/
  $.ajax({ 
  type:'POST', 
  url:'php/add_popup4.php', 
  data:{   
  'table_add':table_add,
  'fio':fio,
  'pos':pos
  }, 
  response:'text', 
  success:function(data){ }});
  window.location.reload();
}
