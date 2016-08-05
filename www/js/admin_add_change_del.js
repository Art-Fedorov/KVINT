var tr_id;
var tr_help;
var table_add;
var id_row;
var codetable;
var prize_place;
var prize_group;
var action;//Совершаемое действие, 1=добавление, 2=изменение
$(document).ready(function(){

  //Выделение строки таблицы
  $(document).on('click','tr',function(){
      $('tr').removeClass();
      $(this).addClass('selected');
      tr_id = $(this).data('value');
      tr_help = $(this).attr('data-value-help'); 
  });
  // кнопка добавить
  $('#right-column-button-add').click(function(){
        Show_float_window();
        action=1;
      });   
  //кнопка изменить
  $('#right-column-button-re').click(function(){
    if (tr_id !== undefined) { 
      Show_float_window();
      action=2;
    }  
  });
  //кнопка удалить
  $('#right-column-button-del').click(function(){
      Show_delete_window();
  });
  //Вызов нужного всплывающего окна и отмена 
  $('body').on('submit','form', function() {
    switch($(this).attr('id'))
    {
      case "form1":data_add_1(); break;
      case "form2":data_add_2(); break;
      case "form3":data_add_3(); break;
      case "form4":data_add_4(); break;
      case "form5":data_add_5(); break;
      case "form6":data_add_6(); break;
      default:console.log('default'); break;
    }     
    return false;
  });
});


//Функция добавления всплывающего окна в разметку и
//запоминания текущей таблицы
function Show_float_window(){    
    var query = window.location.search.substring(1);
    var vars = query.split("&");     
    var l = vars[0].split("=");
    codetable = l[1];

    if (codetable=='1'){
      $.get('../tmpl/pop1.php', function(result) {
    $('body').append(result);
    if (action==2) change();

    id_row = 'CAPTION_ID';
});
        table_add = 'TAST_CAPTION';
    } else if (codetable=='2'){
      $.get('../tmpl/pop2.php', function(result) {
    $('body').append(result);
    if (action==2) change();
     id_row = 'GROUP_ID';
    
});
        table_add = 'TAST_GROUP';
    } else if (codetable=='3'){
      $.get('../tmpl/pop3.php', function(result) {
    $('body').append(result);
    if (action==2) change();
    id_row = 'PRIZE_GROUP';
});
        table_add = 'TAST_PRIZE';
    } else if (codetable=='4'){
       $.get('../tmpl/pop4.php', function(result) {
    $('body').append(result);
    if (action==2) change();
     id_row = 'MAN_ID';
});
        table_add = 'TAST_MAN';
    } else if (codetable=='5'){
        $.get('../tmpl/pop5.php', function(result) {
    $('body').append(result);
    if (action==2) change();
    else Fill_cipher_cognac();
    id_row = 'COGNAC_ID';
});
        table_add = 'TAST_COGNAC';
    } else if (codetable=='6'){
        $.get('../tmpl/pop6.php', function(result) {
    $('body').append(result);
    if (action==2) change();
    id_row = 'RATING_ID';
});
        table_add = 'TAST_RATING';
    }
    else console.log('bad request');
    
}


//Функции отвечающие за добавление и изменение данных
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
  'action':action,
  'id':tr_id,   
  'row':id_row 
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

        //onsuccess();
      },
  error:function(){
    //onerror();
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
  'action':action,
  'id':tr_id,   
  'row':id_row 
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

    //onsuccess();
  },
  error:function(){
    //onerror();
     }
  });  
}

function data_add_3(){ 
  var place = document.getElementById("popup3-place").value;
  var group = $('#popup3-group option:selected').attr('value');
  var down = document.getElementById("popup3-down").value;
  var up = document.getElementById("popup3-up").value; 
  var medal = document.getElementById("popup3-medal").value;
  
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
  'action':action,
  'id':tr_id ,   
  'row':id_row,
  'prize_place':prize_place,
  'prize_group':prize_group
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
        //onsuccess();
      },
      error:function(){
        //onerror();
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
  'action':action,
  'id':tr_id ,   
  'row':id_row 
  }, 
  response:'text', 
  success:function(data){ 
    $.ajax({ 
      type:'GET', 
      url:'php/fill-table.php', 
      data:{    
      'code': codetable,
      'tr_id':tr_id,
      'tr_id_help':tr_help
      }, 
      response:'text', 
      success:function(data){ 
        
        $('.left-column').html(data);}
      });
    //onsuccess();
  },
  error:function(){
    //onerror();
     }

  });  
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
  'action':action,
  'id':tr_id ,   
  'row':id_row 
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
    //onsuccess();
  },
  error:function(){
    //onerror();
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
  'action':action,
  'id':tr_id ,   
  'row':id_row 
  }, 
  response:'text', 
  success:function(data){ 
    $.ajax({ 
      type:'GET', 
      url:'php/fill-table-rating.php', 
      data:{      
      'selection_condition':selection_condition  
      }, 
      response:'text', 
      success:function(data){ $('.left-column').html(data); }
      });

    //onsuccess();
  },
  error:function(){
    //onerror();
     }
  });  
}

//Вывод Действие успешно завершено
/*function onsuccess(){
      $('span.popup-result:first-child').addClass('ok').show();
    setTimeout(function(){$('span.popup-result.ok').hide();},800);

}*/

//Действие не успешно
/*function onerror(){
  $('span.popup-result:last-child').addClass('false');
    setTimeout(function(){$('span.popup-result.false').hide();},800);
}*/

//Функция для вставки значений изменяемой строки в
//поля всплывающего окна
function change(){
        
        $('tr[data-value='+tr_id+'][data-value-help="'+tr_help+'"]').find('td').each(function(key,val){
          if ($('form *[name=d'+key+'][type=date]').length==1){
            var text = $(val).text();
            var vars = text.split(".");
            var date1=new Date();
            date1 = vars[2]+"-"+vars[1]+"-"+vars[0];
            $('form input[name=d'+key+'][type=date]').val(date1);

          } else 
          if ($('form select[name=d'+key+']').length==1){
              
              if (codetable!=='5')
              {
                $('form select[name=d'+key+'] option')
                  .each(function(k,v){
                    if ($(v).text()==$(val).text()) {
                      $(v).attr('selected',true);
                    }
                });
              }
          } else {

          $('form *[name=d'+key+']').val($(val).text());
          
          }
          //select для 5 таблицы
          if (codetable=='5' && key==1)
            var id=$(this).parent().attr('data-value');
            $.ajax({
                  url: '../php/rating-select.php',
                  type: 'GET',
                  data:{
                    'cognac_id':id
                  },
                  success:function(data){
                    $('form select[name=d6] option').each(function(k,v){
                      
                        if ($(v).attr('value')==data)
                        {
                          $(v).attr('selected',true);
                        }
                    }); 
                  }
            });
            if (codetable=='3') {
              if(key==0) prize_place=$(val).text();
              if(key==1) prize_group=$(val).parent().attr('data-value');
            }
        });
}

//показать всплывающее окно удаления
function Show_delete_window(){
  if(tr_id !== undefined){
    
    $.get('../tmpl/pop7.php', function(result) {
    $('body').append(result);
    });
  }
}
/*Удаление строки во вкладке справочники*/
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
  if (codetable!=6)
  {
  $.ajax({ 
    type:'POST', 
    url:'php/delete-row.php', 
    data:{ 
    'id':tr_id ,
    'table':table,
    'row':id_row
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
        tr_id=undefined;
       },
    error:function(data){    
    }
  });
  $("#popup7").remove();
  }
  else delete_row_rating();
}

//Удалить строку в таблице оценок
function delete_row_rating(){
  table = 'TAST_RATING';
  id_row = 'RATING_ID';  
 
  $.ajax({ 
    type:'POST', 
    url:'php/delete-row.php', 
    data:{ 
    'id':tr_id ,
    'table':table,
    'row':id_row
    }, 
    response:'text', 
    success:function(data){ 
    $.ajax({ 
      type:'GET', 
      url:'php/fill-table-rating.php', 
      data:{
      'selection_condition':selection_condition  
      }, 
      response:'text', 
      success:function(data){$('.left-column').html(data); }
      });
    tr_id=undefined;
       },
    error:function(data){    
    }
  });
  $("#popup7").remove();
}