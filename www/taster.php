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
<script src="js/taster.js">
	</script>
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
					<button class="secure-button submit-cognac" type="submit">Закрепить изменения</button>
				</form>
					<?php include_once 'php/secure-insert.php' ?>
				</div><!-- end of col-md-->
			</div>			
		</div>
	</div> <!--конец .bg-->

<div class="cd-wrapper">		
	<div class="container">
		<div class="row">
			<div class="col-md-offset-4 col-md-4 col-sn-offset-4 col-sn-4 list">
				<button class="cancel-tast smoothly" name="Exit" id="exit">&#215;</button>
			</div>
		</div>
			<div class="row">
				<div class="col-md-offset-4 col-md-4 col-sn-offset-4 col-sn-4  list">
						<?php	
					include_once 'php/taster-list.php';
					?>
				</div>
			</div>
		</div>			
</div> <!-- .cd-wrapper -->	
	
</body>
</html>