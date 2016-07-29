var tr_id;
var tr_help;
var table_add;
var id_row;
$(document).ready(function(){
  //Выделение строки таблицы
  $('tr').click(function(){
      $('tr').removeClass();
      $(this).addClass('selected');
      tr_id = $(this).data('value');
      tr_help = $(this).attr('data-value-help');

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
    var codetable = l[1];
    if (codetable=='1'){
      $.get('../tmpl/pop1.php', function(result) {
    $('body').append(result);
});
        table_add = 'TAST_CAPTION';
    } else if (codetable=='2'){
      $.get('../tmpl/pop2.php', function(result) {
    $('body').append(result);
});
        table_add = 'TAST_GROUP';
    } else if (codetable=='3'){
      $.get('../tmpl/pop3.php', function(result) {
    $('body').append(result);
});
        table_add = 'TAST_PRIZE';
    } else if (codetable=='4'){
       $.get('../tmpl/pop4.php', function(result) {
    $('body').append(result);
});
        table_add = 'TAST_MAN';
    } else if (codetable=='5'){
        $.get('../tmpl/pop5.php', function(result) {
    $('body').append(result);
});
        table_add = 'TAST_COGNAC';
    } else if (codetable=='6'){
        $.get('../tmpl/pop6.php', function(result) {
    $('body').append(result);
});
        table_add = 'TAST_RATING';
    }
    else console.log('bad request');
    console.log(action);
    
}