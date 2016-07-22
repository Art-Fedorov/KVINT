<?php include_once 'php/connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Дегустация</title>
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 	<link rel="stylesheet" href="css/fonts.css" />
	<link rel="stylesheet" href="css/main-page.css" />
	<link rel="stylesheet" href="css/taster-page.css" />
  <script src="libs/jquery/jquery-2.1.4.min.js"></script>	
	<script src="libs/modernizr.js"></script>
	<script src="libs/mustache.min.js"></script>
	<script type="text/javascript">
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
})
</script>
</head>
<body>
	<div class="bg">
		<a class="return-main smoothly" href="index.php">Вернуться</a>
		<div class="container">	
			<div class="row header">			
				<div class="col-md-12 col-xs-offset-0 col-xs-12 text-center">					
				</div>
			</div>
			<div class="row degustation">
				<div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 text-center">
					<div class="vibortext"><h1>CHOOSE YOUR NAME</h1>
					<!--<p>свое имя и фамилию из списка</p>-->
					</div>
					<button class="choose-send smoothly" name="StartDeg" id="start-degustation">
					Выбрать имя
					</button>
					<form method="POST" action="taster.php" class="formgroup" id="form">
					<div id="hidden">
					</div>
					<div class="taster">
					</div>
					<nav class="cognacgroup">
						<ul>
							<li><p>A</p></li>
							<li><p>B</p></li>
							<li><p>C</p></li>
							<li><p>D</p></li>
							<li><p>E</p></li>
							<li><p>F</p></li>
							<li><p>G</p></li>
							<li><p>K</p></li>
					</ul>
					</nav>					
					<div id="group" class="group">
					</div>
					<button type="submit">Закрепить изменения</button>
				</form>
					<?php include_once 'php/secure-insert.php' ?>
				</div><!-- end of col-md-->
			</div>			
		</div>
	</div> <!--конец .bg-->
	<div class="cd-wrapper">
		<button class="choose-send smoothly" name="Exit" id="exit">Отменить</button>
			<?php	
					include_once 'php/taster-list.php';
					?>
	</div> <!-- .cd-wrapper -->	
	<script type="text/javascript">
	 $(function(){

	 function getsum()
	 {

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
 })
		
	</script><?php 
	
	echo $array[0]['taster']; ?>
</body>
</html>