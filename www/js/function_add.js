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
  var m = table_add + date1 + date2 + desc;   
  $.ajax({ 
  type:'POST', 
  url:'php/add_popup1.php', 
  data:{   
  'table_add':table_add,
  'date1':date1,
  'date2':date2,
  'desc':desc
  }, 
  response:'text', 
  success:function(data){ }});  
}

function data_add_2(){ 
  var prefix = document.getElementById("popup2-prefix").value;
  var group = document.getElementById("popup2-group").value; 
  /*var m = fio + pos + table_add; 
  alert(m);*/
  $.ajax({ 
  type:'POST', 
  url:'php/add_popup2.php', 
  data:{   
  'table_add':table_add,
  'fio':prefix,
  'pos':group
  }, 
  response:'text', 
  success:function(data){ }});  
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
}

function data_add_5(){ 
  var e = document.getElementById("popup5-group");
  var group = e.options[e.selectedIndex].text;
  var code = document.getElementById("popup5-code").value;
  var age = document.getElementById("popup5-age").value; 
  var name = document.getElementById("popup5-name").value;
  var cond = document.getElementById("popup5-cond").value; 
  var sugare = document.getElementById("popup5-sugare").value; 
  /*var m = fio + pos + table_add; 
  alert(m);*/
  $.ajax({ 
  type:'POST', 
  url:'php/add_popup5.php', 
  data:{   
  'table_add':table_add,
  'group':group,
  'code':code,
  'age':age,
  'name':name,
  'cond':cond,
  'sugare':sugare
  }, 
  response:'text', 
  success:function(data){ }});  
}

function data_add_6(){ 
  var e = document.getElementById("popup6-fio");
  var fio = e.options[e.selectedIndex].value;
  var e = document.getElementById("popup6-code");
  var code = e.options[e.selectedIndex].value;
  var opasity = document.getElementById("popup6-opacity").value;
  var color = document.getElementById("popup6-color").value; 
  var buk = document.getElementById("popup6-buk").value;
  var taste = document.getElementById("popup6-taste").value; 
  var type = document.getElementById("popup6-type").value; 
  var desc = document.getElementById("popup6-desc").value; 
  var garde = document.getElementById("popup6-grade").value; 
  /*var m = fio + pos + table_add; 
  alert(m);*/
  $.ajax({ 
  type:'POST', 
  url:'php/add_popup6.php', 
  data:{   
  'table_add':table_add,
  'fio':fio,
  'code':code,
  'opasity':opasity,
  'color':color,
  'buk':buk,
  'taste':taste,
  'type':type,
  'desc':desc,
  'garde':garde
  }, 
  response:'text', 
  success:function(data){ }});  
}