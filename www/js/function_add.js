var table_add;
  $(document).ready(function(){
    $('tr').click(function(){
        $('tr').removeClass();
        $(this).addClass('selected');
        tr_id = $(this).data('value');        
        });
    $('.apply1').click(function(){
          data_add_1();
    });
    $('.apply2').click(function(){
          data_add_2();
    });
    $('.apply3').click(function(){
          data_add_3();
    });
    $('.apply4').click(function(){
          data_add_4();
    });
    $('.apply5').click(function(){
          data_add_5();
    });
    $('.apply6').click(function(){
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
  location.reload(); 
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
  success:function(data){ 
    $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
    $('span.popup-result.ok').css("opacity","1");
     }, 
  error:function(){
    $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
    $('span.popup-result.false').css("opacity","1");
     }
  });
}

function data_add_2(){ 
  var prefix = document.getElementById("popup2-prefix").value;
  var group = document.getElementById("popup2-group").value; 
  /*var m = table_add + prefix + group;
  alert(m);*/
  $.ajax({ 
  type:'POST', 
  url:'php/add_popup2.php', 
  data:{   
  'table_add':table_add,
  'prefix':prefix,
  'group':group
  }, 
  response:'text', 
  success:function(data){     $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1");  }, 
  error:function(){
    $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
    $('span.popup-result.false').css("opacity","1");
     }
  });  
}

function data_add_3(){ 
  var place = document.getElementById("popup3-place").value;
  var group = $('#popup3-group option:selected').attr('value');
  var down = document.getElementById("popup3-down").value;
  var up = document.getElementById("popup3-up").value; 
  var medal = document.getElementById("popup3-medal").value;

  var m = table_add +"|" + place +"|" + group
   +"|" + down +"|" + up +"|" + medal;
  
  console.log(m);
  $.ajax({ 
  type:'POST', 
  url:'php/add_popup3.php', 
  data:{   
  'table_add':table_add,
  'place':place,
  'group':group,
  'down':down,
  'up':up,
  'medal':medal
  }, 
  response:'text', 
  success:function(data){ 
      $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1");}, 
  error:function(){
    $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
    $('span.popup-result.false').css("opacity","1");
     }
  });  
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
  success:function(data){ 
      $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1");}, 
  error:function(){
    $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
    $('span.popup-result.false').css("opacity","1");
     }
  });  
  //return false;
}

function data_add_5(){   
  var group = $('#popup5-group option:selected').attr('value');
  var code = document.getElementById("popup5-code").value;
  var age = document.getElementById("popup5-age").value; 
  var name = document.getElementById("popup5-name").value;
  var cond = document.getElementById("popup5-cond").value; 
  var sugare = document.getElementById("popup5-sugare").value; 
  var manuf = document.getElementById("popup5-manuf").value; 
  var m = group + code + age + name + cond + sugare; 
  console.log(m);
  $.ajax({ 
  type:'POST', 
  url:'php/add_popup5.php', 
  data:{   
  'table_add':table_add,
  'group':group,
  'code':code,
  'age':age,
  'name':name,
  'manuf':manuf,    
  'cond':cond,
  'sugare':sugare
  }, 
  response:'text', 
  success:function(data){ 
      $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1");}, 
  error:function(){
    $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
    $('span.popup-result.false').css("opacity","1");
     }
  });  
}

function data_add_6(){ 
  var fio = $('#popup6-fio option:selected').attr('value');
  var code = $('#popup6-code option:selected').attr('value');
  var opasity = document.getElementById("popup6-opacity").value;
  var color = document.getElementById("popup6-color").value; 
  var buk = document.getElementById("popup6-buk").value;
  var taste = document.getElementById("popup6-taste").value; 
  var type = document.getElementById("popup6-type").value; 
  var desc = document.getElementById("popup6-desc").value; 
  var grade = document.getElementById("popup6-grade").value;   
  var m = fio +"|" + code+"|"  + opasity +"|" + color + +"|" 
  buk+"|"  + taste +"|" + type+"|"  + desc+"|"  + grade; 
  console.log(m);
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
  'grade':grade
  }, 
  response:'text', 
  success:function(data){ 
      $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1");}, 
  error:function(){
    $('#popup1 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
    $('span.popup-result.false').css("opacity","1");
     }
  }); 
}