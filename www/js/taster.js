	$(function(){
		$('.formgroup').hide();
		$('#exit').click(function(){
			$('.cd-wrapper').hide();
		});

		$('#start-degustation').click(function(){
			$('.cd-wrapper').show();
		});

		$('.cd-wrapper div.list p').click(function(){
			$('#start-degustation').text($(this).text());
			$('#hidden').html("<input type='hidden' value='"+$(this).attr('id')+"' name='taster'>");
			$('.vibortext').hide();
			$('.formgroup').show();
			$('#exit').click();
			sendTable("A");
			$("#form span").hide();
		});
		$('.cognacgroup>ul>li>p').click(function(){
			sendTable($(this).text());

		});

		
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
		            })            
		          },
		        timeout:5000//таймаут запроса
		    });
		  };	
		  function trysearch(data,code){
		  	var id=$('#hidden input').val();
		  	$.ajax({
		  		type:'get',
		  		url:'php/try-search.php',
		  		data:{
		  			'id':id,
		  			'code':code
		  		},
		  		response:'text',
		  		success:function(data){
		  			
		  		}
		  	});
		  }
		    $('#form').on('change', '.rowrate input[type=number]', function(){
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
  		$('span[name=main'+i+']').text(sum.toFixed(2));
  		$('input[name=mainpoint'+i+']').attr("value",sum.toFixed(2));
  	}
  });
  $.ajax({
      type:'get',
      url:'php/taster-list.php',
      response:'text',
      success:function (data) {
          $.get("tmpl/listtasters.html",function(tmpl){
          	var q={"data":data};
          	for (i in data)
								data[i].index = i;
          var rendered = Mustache.render(tmpl, q);
					$('.list').html(rendered);
          })            
        },
      timeout:5000//таймаут запроса
  });         
})
