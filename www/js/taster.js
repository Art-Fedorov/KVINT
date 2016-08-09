	$(function(){
		//изначально скрывается блок с заполнением оценок
		$('.formgroup').hide();
		//активной становится 1ая группа
		$('.cognacgroup ul li:first-child p').addClass('active');
		//кнопка выбрать имя
		$('#start-degustation').click(function(){
			$('.cd-wrapper').show();			
			$('.list p').removeClass('active');
			$('.cancel-tast').show();
			if ($('#hidden input').length>0)
			{
				$('p#'+$('#hidden input').attr('value')).addClass('active');
			}
		});
		//кнопка выхода из выбора имени
		$('#exit').click(function(){
			$('.cd-wrapper').hide();
		});

		//клик по своему имени из списка 
		$('.cd-wrapper div.list p').click(function(){			
			$('.taster-name').text($(this).text()).attr('id',$(this).attr('id'));
			$('.pin').show();
			$('.list').hide();
			$('.cancel-tast').hide();
			$('div.pin input').focus();
		});

		//обработчик для пин-кода
		$('.pin input').keyup(function(event){
			if ($(this).val().length==1) $('span.pin-error').hide();
			if ($(this).val().length==4) enterPin();
			if ($(this).val().length>4) $(this).val($(this).val().substr(0,4));
		}); 

		//функция проверки пинкода и входа в дегустацию
		function enterPin(){
			var id=$('.taster-name').attr('id'); // ID_MAN
			var pin=$('.pin input[type=number]').val(); // введенный пин-код
			$.ajax({
				url:'../php/check-pin.php',
				type:'GET',
				data:{
					'id': id,
					'pin':pin
				},
				success:function(data){
					//1-успешно, 0-неуспешно
					if (data=='1'){
						$('.pin').hide();
						$('.list').show();
						$('#start-degustation').text($('.taster-name').text());
						$('#hidden').html("<input type='hidden' value='"+$('.taster-name').attr('id')+"' name='taster'>");
						$('.vibortext').hide();//скрытие текста "Выберите свое имя"
						$('.formgroup').show();
						$('#exit').click();
						sendTable("A");
						$("#form span").hide();
						$(".pin input").val("");
						$('span.pin-error').hide();
						document.activeElement.blur();
					}
					else {
						$('span.pin-error').show();
						$('input').val("");
					}
				}
			});
			
		};

		//Кнопка закрытия окна ввода пин-кода
		$('.cancel-pin').click(function(){			
			$('.pin').hide();
			$('span.pin-error').hide();
			$('.list').show();
			$('.cancel-tast').show();
		});
			
		//происходит при смене группы
		$('.cognacgroup>ul>li>p').click(function(){
			sendTable($(this).text());
		});

		/*//при отправке группы дегустации
			//сейчас на 197 строке
		$('form#form input.submit-cognac').click(function (){
			var msg   = $('form#form').serialize();
			console.log(msg);
			console.log("asd");
			$.ajax({
				type:'post',
        url:'php/secure-insert.php',
        data:msg,
        response:'text',
        success:function (data) {
				    
          },
        timeout:5000//таймаут запроса
			});
			
		});*/

		//получение группы коньяков
		function sendTable(code) {
		    $.ajax({
		        type:'get',
		        url:'php/group-ajax-create.php',
		        data:{'code':code},
		        response:'text',
		        success:function (data) {
		        		//использование шаблона mustache
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
				  		$('input[name=main'+i+']').val(val.mainpoint);
				  	});
				  	//sum();
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
			/*проверка на мин макс значения*/
			$('#form .rowrate input[type=number]').each(function(key,val){
				if ($(val).val()*1>$(val).attr('max')) 
          {$(val).val($(val).attr('max')); }
        if ($(val).val()*1<$(val).attr('min')) 
          {$(val).val(""); }
			});
				//подсчет суммы для каждого коньяка в группе
		  	var length=$('#form .rowrate input[type=number]').length/5;
		  	for(var i=0;i<length;i++)
		  	{	
		  		var opa=parseFloat($('input[name=opacity'+i+']').val())||0;
		  		if (opa!=0) $('input[name=opacity'+i+']').val(opa);
		  		var col=parseFloat($('input[name=color'+i+']').val())||0;
		  		if (col!=0) $('input[name=color'+i+']').val(col);
		  		var tas=parseFloat($('input[name=taste'+i+']').val())||0;
		  		if (tas!=0) $('input[name=taste'+i+']').val(tas);
		  		var bou=parseFloat($('input[name=bouquet'+i+']').val())||0;
		  		if (bou!=0) $('input[name=bouquet'+i+']').val(bou);
		  		var typ=parseFloat($('input[name=typicality'+i+']').val())||0;
		  		if (typ!=0) $('input[name=typicality'+i+']').val(typ);
		  		var sum=opa+col+tas+bou+typ;
		  		$('input[name=main'+i+']').val(sum.toFixed(2));
		  		$('input[name=mainpoint'+i+']').attr("value",sum.toFixed(2));
		  	}
			};
		//при при отправке формы появляется всплывающее окно, в нем
		//галочка икнопка перехода на следующую группу
		$(document).on('click','.submit-cognac',function(){
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
			$.get('../tmpl/secure-pop.php', function(result) {
			    $('body').append(result);
			  		perehod_text();
			});  

		});
		//переход на следующую группу
		$(document).on('click','input.next',function(){
				perehod_action();
		});
		});
//Добавление текста
function perehod_text(){
	$(".cognacgroup ul li").each(function(key,val){
		if (key + 1 == 	$(".cognacgroup ul li").length){
			$('.content_box span.small_next').text('Дегустация успешно завершена');
		  $('.content_box .next').hide();
		  //console.log($(".cognacgroup ul li").length+" "+key);
		}
		else 
		if ($(val).children().hasClass('active')) {		
		  $('input.next').val($('.cognacgroup ul li:nth-child('+(key+2)+') p').text());
		  $('span.small_next').text('Перейти к группе');
		  $('.content_box .next').show();
		  return false;

		}
		
		
	});
}
//Переход на следующую группу 
//(во всплывающем окне)
function perehod_action(){
	$(".cognacgroup ul li").each(function(key,val){
			if ($(val).children().hasClass('active')) {
				PopUpHideTasting();
				$('.cognacgroup ul li:nth-child('+(key+2)+') p').click();
				 return false;
			}
		});
}