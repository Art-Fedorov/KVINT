
  $(document).ready(function(){
    $('tr').click(function(){
        $('tr').removeClass();
        $(this).addClass('selected');
        tr_id = $(this).data('value');        
        });
    $('#right-column-button-add').click(function(){
        Show_float_window();
      });   
  });

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
  'desc':desc,
  'action':action
  }, 
  response:'text', 
  success:function(data){    
     $.ajax({ 
      type:'GET', 
      url:'php/fill-table.php', 
      data:{        
        'code': codetable 
      }, 
      response:'text', 
      success:function(data){$('.left-column').html(data); }
      });

      $('#popup1 .b-popup-footer').
      prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
      $('span.popup-result').css("opacity","1").addClass('ok');}, 
    error:function(){
      $('#popup1 .b-popup-footer').
      prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
      $('span.popup-result').css("opacity","1").addClass('false');
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
  'group':group,
  'action':action
  }, 
  response:'text', 
  success:function(data){ 
    /*перезаполнение таблицы*/    
    $.ajax({
      type:'GET', 
      url:'php/fill-table.php', 
      data:{    
      'code': codetable   
      }, 
      response:'text', 
      success:function(data){$('.left-column').html(data); }
      });

    $('#popup2 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1").addClass('ok');}, 
  error:function(){
    $('#popup2 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1").addClass('false');
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
  'medal':medal,
  'action':action
  }, 
  response:'text', 
  success:function(data){ 
    $.ajax({ 
      type:'GET', 
      url:'php/fill-table.php', 
      data:{        
        'code': codetable 
      }, 
      response:'text', 
      success:function(data){$('.left-column').html(data); }
      });

      $('#popup3 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1").addClass('ok');}, 
  error:function(){
    $('#popup3 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1").addClass('false');
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
  'pos':pos,
  'action':action
  }, 
  response:'text', 
  success:function(data){ 
    $.ajax({ 
      type:'GET', 
      url:'php/fill-table.php', 
      data:{    
      'code': codetable     
      }, 
      response:'text', 
      success:function(data){ $('.left-column').html(data);}
      });

      $('#popup4 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1").addClass('ok');}, 
  error:function(){
    $('#popup4 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1").addClass('false');
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
  'sugare':sugare,
  'action':action
  }, 
  response:'text', 
  success:function(data){ 
    $.ajax({ 
      type:'GET', 
      url:'php/fill-table.php', 
      data:{       
      'code': codetable  
      }, 
      response:'text', 
      success:function(data){$('.left-column').html(data); }
      });

      $('#popup5 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1").addClass('ok');}, 
  error:function(){
    $('#popup5 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1").addClass('false');
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
  'grade':grade,
  'action':action
  }, 
  response:'text', 
  success:function(data){ 
    $.ajax({ 
      type:'GET', 
      url:'php/fill-table-rating.php', 
      data:{      
      'code': codetable   
      }, 
      response:'text', 
      success:function(data){ $('.left-column').html(data); }
      });

    $('#popup6 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-check"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1").addClass('ok');}, 
  error:function(){
    $('#popup6 .b-popup-footer').
    prepend('<span class="smoothly popup-result"><i class="fa fa-close"></i>Запись успешно добавлена</span>');
    $('span.popup-result').css("opacity","1").addClass('false');
     }
  });  
}