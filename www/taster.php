<?php 
	$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
					if (!$conn) {
    				$e = oci_error();
    				trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
					}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="windows-1251" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Дегустация</title>
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
			$('.cd-wrapper').hide();
		});

		$('#start-degustation').click(function(){
			$('.cd-wrapper').show();
		});

		$('div.list p').click(function(){
			$('#start-degustation').text($(this).text());
			$('.vibortext').hide();
			$('#exit').click();
		});
	})
	function getyear(){
		var d = new Date();
		var n = d.getFullYear();
		return n;
	}
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
					
					<form action="taster.php">
					<div class="taster">

					</div>
					
					<nav class="cognacgroup">
						<ul>
							<li><a href="taster.php?code=A">A</a></li>
							<li><a href="taster.php?code=B">B</a></li>
							<li><a href="taster.php?code=C">C</a></li>
							<li><a href="taster.php?code=D">D</a></li>
							<li><a href="taster.php?code=E">E</a></li>
							<li><a href="taster.php?code=F">F</a></li>
							<li><a href="taster.php?code=G">G</a></li>
							<li><a href="taster.php?code=K">K</a></li>
						</ul>
					</nav>


					<?php	
					if (isset($_GET['code']))
					{
						$code=$_GET['code'];
						$query='SELECT COGNAC_CODE,COGNAC_AGE FROM TAST_COGNAC WHERE COGNAC_CAPTION=63 AND COGNAC_CODE like \''.$code.'%\' ORDER BY COGNAC_CODE';
						$stid = oci_parse($conn,$query );
						oci_execute($stid);
						echo "<div class=\"list\">\n";
						$i=0;
						while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
						    echo "<p name=\"p".$i++."\">\n";
						    foreach ($row as $item) {
						        echo $item !== null ? htmlentities($item, ENT_QUOTES, 'cp1251') : "";
						    }
						    echo "</p>\n";
						    echo '<span>Прозрачность</span><input type="number" name="opacity" required min="0" max="0.5 step="0.05">';

					}
					echo "</div>\n";
					}
					
					?>
					</form>

				</div>
			</div>			
		</div>
	</div> <!--конец .bg-->
	

	<div class="cd-wrapper">
		<button class="choose-send smoothly" name="Exit" id="exit">Отменить</button>

			<?php	
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
					echo "</div>\n";
					?>
	</div> <!-- .cd-wrapper -->	
</body>
</html>