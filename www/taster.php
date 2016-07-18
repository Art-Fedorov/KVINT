<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="windows-1251" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Главная</title>
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 	<link rel="stylesheet" href="css/fonts.css" />
	<link rel="stylesheet" href="css/main-page.css" />
  <script src="libs/jquery/jquery-2.1.4.min.js"></script>
	<script src="libs/angular.js"></script>
	<script src="js/common.js"></script>
</head>
<body>	
	
	<div class="bg">			
		<div class="container">		
		<a href="index.php">Вернуться</a>
		<div class="vertical-align"	>
			<div class="row header">			
				<div class="col-md-12 col-xs-offset-0 col-xs-12 text-center">					
					<h1>Выберите</h1>

					<p>свое имя и фамилию из списка</p>
				</div>
			</div>
			<div class="row degustation">
				<div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 text-center">
					<p>список типа					
					</p>
					<button class="start-btn smoothly action" name="StartDeg">
					Начать дегустацию
					</button>
					<?php
					echo"smth";
					//phpinfo();
					//echo system("/home/oracle/u01/app/oracle/product/12.2.0/dbhome_1/bin/tnsping ORAS1");
					$db = "(ADDRESS = (PROTOCOL = TCP)(HOST = ora2.kvint.md/UNIACC)(PORT = 1521))" ;
					$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
					if (!$conn) {
    				$e = oci_error();
    				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
					}
					else{
echo'DGDFs';
					}
					
					$stid = oci_parse($conn, 'SELECT * FROM tAst_COGNAC');
					oci_execute($stid);

					echo "<table border='1'>\n";
					while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
					    echo "<tr>\n";
					    foreach ($row as $item) {
					        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "</td>\n";
					    }
					    echo "</tr>\n";
					}
					echo "</table>\n";

?>

				</div>
			</div>		
		</div>	
		</div>
	</div>
</body>
</html>