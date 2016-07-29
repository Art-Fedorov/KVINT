$(document).ready(function(){
    $('select#search-man-rating').change(function(){
    	Select_search_rating_fio();
    });       
    $('select#search-cognac-rating').change(function(){
    	Select_search_rating_cipher();
    });       
});
var selection_condition='';
var selection_condition_cipher='';
var selection_condition_fio='';
function Select_search_rating_fio(){	
	var man = $('#search-man-rating option:selected').attr('value');  
  if(man!= 0){
  	selection_condition_fio = ' AND RATING_MAN = ' + man.toString();  
  	selection_condition=selection_condition_cipher.toString() +
		selection_condition_fio.toString();	
	} else {
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
