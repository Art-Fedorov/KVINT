/*на старнице находится два селекта
 при переключении которых выводятся только запрпашиваемые данные в таблице оценок
 отбор идет по 2 криетриям: по фамилии и по шифру коньяка
 */
$(document).ready(function(){
    $('select#search-man-rating').change(function(){
      //подгрузить таблицу с данными по фамилии
    	Select_search_rating_fio();
    });       
    $('select#search-cognac-rating').change(function(){
       //подгрузить таблицу с данными по шифру дегустируемого коньяка
    	Select_search_rating_cipher();
    });
    $(document).on('change','#popup6 input[type=number]',function(){
      //посчитать сумму введенных оценок при
      // добавлении новой оценки или просмотре старой
      sum()  
    });     
});
var selection_condition=''; //общая часть запроса
var selection_condition_cipher=''; //шифр
var selection_condition_fio=''; //фамилия

//метод для отбора данных по фамилии 
function Select_search_rating_fio(){	
	var man = $('#search-man-rating option:selected').attr('value');  
  if(man!= 0){
    //дотсраивание sql зарпоса
  	selection_condition_fio = ' AND RATING_MAN = ' + man.toString();  
  	selection_condition=selection_condition_cipher.toString() +
		selection_condition_fio.toString();	
	} else {
    //дотсраивание sql зарпоса
		selection_condition_fio = '';
		selection_condition=selection_condition_cipher.toString() +
		selection_condition_fio.toString();
	}
	$.ajax({ 
  type:'GET', 
  url:'../php/fill-table-rating.php', 
  data:{   
  'selection_condition':selection_condition  
  }, 
  response:'text', 
  success:function(data){ $('.left-column').html(data);} 
	}); 	
};

//метод для отбора данных по шифру коньяка 
function Select_search_rating_cipher(){
	var cipher = $('#search-cognac-rating option:selected').attr('value');
  if(cipher!= 0){
  selection_condition_cipher=' AND RATING_COGNAC = '+cipher.toString();  
  selection_condition=selection_condition_cipher.toString() +
		selection_condition_fio.toString();
	} else {
		selection_condition_cipher='';
		selection_condition=selection_condition_cipher.toString() +
		selection_condition_fio.toString();
	}
	$.ajax({ 
  type:'GET', 
  url:'../php/fill-table-rating.php', 
  data:{   
  'selection_condition':selection_condition  
  }, 
  response:'text', 
  success:function(data){$('.left-column').html(data);}
	}); 
};

//подсчет суммарной оценки коньяка при добавлении и изменении
function sum(){
    var sum=0;
      $('#popup6 input[type=number]').each(function(key,val){
        if ($(val).val()*1>$(val).attr('max')) 
          {$(val).val($(val).attr('max')); }
        if ($(val).val()*1<$(val).attr('min')) 
          {$(val).val($(val).attr('min')); }
        sum+=$(val).val()*1;
        
      });
      $('input.final-grade').val(sum);
};
