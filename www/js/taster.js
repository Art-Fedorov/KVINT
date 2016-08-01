	$(function(){
		//изначально скрывается блок с заполнением оценок
		$('.formgroup').hide();
		$('.cognacgroup ul li:first-child p').addClass('active');
		//кнопка выхода из выбора имени
		$('#exit').click(function(){
			$('.cd-wrapper').hide();
		});
		//кнопка выбрать имя
		$('#start-degustation').click(function(){
			$('.cd-wrapper').show();
			$('.list p').removeClass('active');
			if ($('#hidden input').length>0)
			{
				$('p#'+$('#hidden input').attr('value')).addClass('active');
			}
		});

		//клик по своему имени из списка 
		$('.cancel-pin').click(function(){			
			$('.pin').hide();
			$('.list').show();
		});
		$('.cd-wrapper div.list p').click(function(){
			
			$('.taster-name').text($(this).text()).attr('id',$(this).attr('id'));
			$('.pin').show();
			$('.list').hide();
			//$('div.pin input:first-of-type').focus();
		});
		$('#pin').pincodeInput()
		/*var numbers=$('div.pin input[type=number]');
		numbers.each(function(key,val){
			if (key!=3)
				$(val).on('keyup',function(){
					$(numbers[key+1]).focus();
					$(val).attr('readonly',true);
				});
			else
				$(val).on('keyup',function(){
					$(val).attr('disabled',true);
				});
		});*/
		$('.btn-enter-pin').click(function(){
			var id=$('.taster-name').attr('id');
			var pin="";
			var flag=false;
			/*$('.pin input[type=number]').each(function(){
				pin+=$(this).val(); 
				if ($(this).val()==""){
					flag=true;
				}
			});*/
			pin=$('#pin').val();
			console.log($('pin').val());
			if (pin.length<4) flag=true;
			if (!flag)
			{
			$.ajax({
				url:'../php/check-pin.php',
				type:'GET',
				data:{
					'id': id,
					'pin':pin
				},
				success:function(data){
					if (data=='1'){
						$('#start-degustation').text($('.taster-name').text());
						$('#hidden').html("<input type='hidden' value='"+$('.taster-name').attr('id')+"' name='taster'>");
						$('.vibortext').hide();
						$('.formgroup').show();
						$('#exit').click();
						sendTable("A");
						$("#form span").hide();
					}
					console.log(data);
				}
			});
		}
			
		});

			
		
		$('.cognacgroup>ul>li>p').click(function(){
			sendTable($(this).text());
		});

		//при отправке группы дегустации
		$('form#form').submit(function (){
			var msg   = $('form#form').serialize();
			$.ajax({
				type:'post',
        url:'php/secure-insert.php',
        data:msg,
        response:'text',
        success:function (data) {
				    
          },
        timeout:5000//таймаут запроса
			});
			return false;
		});

		//получение группы коньяков
		function sendTable(code) {
		    $.ajax({
		        type:'get',
		        url:'php/group-ajax-create.php',
		        data:{'code':code},
		        response:'text',
		        success:function (data) {
		            $.get("tmpl/formgroup.html",function(tmpl){
		            	var q={"data":data};
		            	for (i in data)
   									data[i].index = i;
		            var rendered = Mustache.render(tmpl, q);
    						$('.group').html(rendered);
    						trysearch(code);
		            })            
		          },
		        timeout:5000//таймаут запроса
		    });
		  };	

		  //поиск уже заполненных ранее полей
		  function trysearch(code){
		  	var id=$('#hidden input').val();
		  	$.ajax({
		  		type:'POST',
		  		url:'php/try-search.php',
		  		data:{
		  			'id':id,
		  			'code':code
		  		},
		  		response:'text',
		  		success:function(data){
		  			var opacity=$('#form .rowrate input[type=number]').length/5;
				  	function one(s){
				  		if (s[0]=='.') s[0]='1';
				  		return s;
				  	}
				  	jQuery.each(data, function(i, val) {
				  		$('input[name=color'+i+']').val(val.color);
				  		$('input[name=taste'+i+']').val(val.taste);
				  		$('input[name=opacity'+i+']').val(val.opacity);
				  		$('input[name=bouquet'+i+']').val(val.bouquet);
				  		$('input[name=typicality'+i+']').val(val.typicality);
				  		$('input[name=note'+i+']').val(val.note);
				  	});
				  	sum();
		  		}
		  	});
		  };
			$('#form').on('change', '.rowrate input[type=number]', function(){
		  	sum();
		  });     
		  $('.cognacgroup ul li p').click(function(){
					$('.cognacgroup ul li p').removeClass('active');
					$(this).addClass('active');

			});  

		//функция подсчета общего балла для каждого коньяка
			function sum(){
			var sum=parseFloat(0.00);
		  	var opacity=$('#form .rowrate input[type=number]').length/5;
		  	for(var i=0;i<opacity;i++)
		  	{
		  		/*проверка на мин макс значения*/
		  		var opa=parseFloat($('input[name=opacity'+i+']').val())||0;
		  		if (opa>0.5) opa=0.5;
		  		if (opa<0) opa=0;
		  		$('input[name=opacity'+i+']').val(opa);
		  		var col=parseFloat($('input[name=color'+i+']').val())||0;
		  		if (col>0.5) col=0.5;
		  		if (col<0) col=0;
		  		$('input[name=color'+i+']').val(col);
		  		var tas=parseFloat($('input[name=taste'+i+']').val())||0;
		  		if (tas>3.0) tas=3.0;
		  		if (tas<0) tas=0;
		  		$('input[name=taste'+i+']').val(tas);
		  		var bou=parseFloat($('input[name=bouquet'+i+']').val())||0;
		  		if (bou>5.0) bou=5.0;
		  		if (bou<0) bou=0;
		  		$('input[name=bouquet'+i+']').val(bou);
		  		var typ=parseFloat($('input[name=typicality'+i+']').val())||0;
		  		if (typ>1.0) typ=1.0;
		  		if (typ<0) typ=0;
		  		$('input[name=typicality'+i+']').val(typ);
		  		var sum=opa+col+tas+bou+typ;
		  		$('input[name=main'+i+']').val(sum.toFixed(2));
		  		$('input[name=mainpoint'+i+']').attr("value",sum.toFixed(2));
		  	}
			};
			$(document).on('click','.submit-cognac',function(){
				$.get('../tmpl/secure-pop.php', function(result) {
				    $('body').append(result);
				  		perehod_text();
				});  
			});
			$(document).on('click','span.next',function(){
					perehod_action();
			});
			//$(document)
		});
//Добавление текста
function perehod_text(){
	$(".cognacgroup ul li").each(function(key,val){
		if ($(val).children().hasClass('active')) {		
		  $('span.next').text($('.cognacgroup ul li:nth-child('+(key+2)+') p').text());
		  return false;
		}});
}
//Переход на следующую группу 
//(во всплывающем окне)
function perehod_action(){
	$(".cognacgroup ul li").each(function(key,val){
			if ($(val).children().hasClass('active')) {
				PopUpHide();
				$('.cognacgroup ul li:nth-child('+(key+2)+') p').click();
				 return false;
			}
		});
}