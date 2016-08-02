<?php include_once 'php/connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="windows-1251" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Дегустация</title>
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/main-page.css" />
	<link rel="stylesheet" href="css/taster-page.css" />
	<link rel="stylesheet" href="css/admin-float-window.css" />
  <script src="libs/jquery/jquery-2.1.4.min.js"></script>
	<script src="libs/modernizr.js"></script>
	<script src="libs/mustache.min.js"></script>
	<script src="js/admin-catalog-float-window.js"></script>
	<script src="js/taster.js"></script>
</head>
<body>
	<div class="bg">
		<a class="return-main smoothly" href="index.php">Вернуться</a>
		<div class="container">	
			<div class="row header">			
				<div class="col-md-12 col-xs-12 text-center">					
				</div>
			</div>
			<div class="row degustation">
				<div class="col-md-offset-2 col-md-8 text-center">
					<div class="vibortext"><h1>CHOOSE YOUR NAME</h1><br><br>
					<!--<p>свое имя и фамилию из списка</p>-->
					</div>
					<button class="choose-send smoothly" name="StartDeg" id="start-degustation">
					Выбрать имя
					</button>
					<form method="POST" action="php/secure-insert.php" class="formgroup" id="form">
					<div id="hidden">
					</div>
					<div class="taster">
					</div>
					<nav class="cognacgroup">
						<ul>
							<?php 
								include_once('php/group-ul-create.php');
							 ?>							
					</ul>
					</nav>					
					<div id="group" class="group">
					</div>
					<button class="secure-button submit-cognac" type="submit">Закрепить изменения</button>
				</form>
					<?php //require 'php/secure-insert.php';
					//secure(); ?>
				</div><!-- end of col-md-->
			</div>			
		</div>
	</div> <!--конец .bg-->

<div class="cd-wrapper">
				<button class="cancel-tast smoothly" name="Exit" id="exit">&#215;</button>		
	<div class="container list-pin-panel">

			<div class="row row-pin">
				<div class="col-sm-12 col-md-4 col-md-offset-4 list">
						<?php	
						include_once 'php/taster-list.php';
					
					?>
				</div>				
				<div class="col-sm-12 col-md-4 col-md-offset-4 pin" style="display: none;">
				<div class="text-center">
					<button class="cancel-pin"><i class="fa fa-chevron-left "></i></button><br><br><br><br>
					<p class="taster-name"></p><hr><br>
					<span class="text-info">Введите уникальный PIN код, выданный при проведении дегустации</span><br><br><br>
					<p class="pin-code">PIN</p>
					<div class="text-center text-pin">
						<input type="number" min='1000' max ='9999' step='1'>
					</div><br>
					<span class="pin-error text-info" style="display:none;">Вы ввели неправильный PIN</span>
				</div>
			</div>
			</div>
		</div>			
</div> <!-- .cd-wrapper -->	
	
</body>
</html>