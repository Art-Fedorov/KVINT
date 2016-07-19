<?php /*
	$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
					if (!$conn) {
    				$e = oci_error();
    				trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
					}*/
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="windows-1251" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Дигустация</title>
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 	<link rel="stylesheet" href="css/fonts.css" />
	<link rel="stylesheet" href="css/main-page.css" />
	<link rel="stylesheet" href="css/taster-page.css" />
  <script src="libs/jquery/jquery-2.1.4.min.js"></script>	
	<script src="libs/modernizr.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
	$(function(){
		$('#exit').click(function(){
			$('.cd-wrapper').css("display","none");
		})

		$('#start-degustation').click(function(){
			$('.cd-wrapper').css("display","block");
		})
	})


	</script>
</head>
<body>
	<div class="bg">
		<a class="return-main smoothly" href="index.php">Вернуться</a>
		<div class="container">	
			<div class="row header">			
				<div class="col-md-12 col-xs-offset-0 col-xs-12 text-center">
					<h1>Выберите</h1>
					<p>свое имя и фамилию из списка</p>
				</div>
			</div>
			<div class="row degustation">
				<div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 text-center">
					<button class="choose-send smoothly" name="StartDeg" id="start-degustation">
					Начать дегустацию
					</button>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim repellendus aliquam voluptates quam, error corporis deleniti quo tenetur.				
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim repellendus aliquam voluptates quam, error corporis deleniti quo tenetur.				
					</p>
				</div>
			</div>			
		</div>
	</div> <!--конец .bg-->
	

	<div class="cd-wrapper">
		<button class="choose-send smoothly" name="Exit" id="exit">
					Отменить 					</button>
			<?php	/*
					$stid = oci_parse($conn, 'SELECT MAN_FIO FROM tAst_MAN WHERE MAN_CAPTION=63');
					oci_execute($stid);
					echo "<div class=\"list\">\n";
					$i=0;
					while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {

					    echo "<p name=\"p".$i++."\">\n";
					    foreach ($row as $item) {
					        echo $item !== null ? htmlentities($item, ENT_QUOTES, 'cp1251') : "";
					    }
					    echo "</p>\n";
					}
					echo "</div>\n";*/
					?>
	</div> <!-- .cd-wrapper -->	
</body>
</html>