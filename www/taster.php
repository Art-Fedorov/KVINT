<?php include_once 'connect.php' ?>
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
	<script src="js/main.js"></script>
	<script type="text/javascript">
	$(function(){
		//$('.cognacgroup').hide();
		$('#exit').click(function(){
			$('.cd-wrapper').hide();
		});

		$('#start-degustation').click(function(){
			$('.cd-wrapper').show();
		});

		$('.cd-wrapper div.list p').click(function(){
			$('#start-degustation').text($(this).text());
			$('#hidden').html("<input type='hidden' value='"+$(this).text()+"'>");
			$('.vibortext').hide();
			$('.cognacgroup').show();
			$('#exit').click();
		});
		$('.cognacgroup>ul>li>p').click(function(){
			sendTable($(this).text());
		});
		function sendTable(code) {
		    $.ajax({
		        type:'get',
		        url:'ajaxTable.php',
		        data:{'code':code},
		        response:'text',
		        success:function (data) {//возвращаемый результат от сервера
		            $(".group").html(data);
		        },
		        timeout:5000//таймаут запроса
		    });
		  };
		  function sendRow(){
		  	alert("a");
		  	return false;
		  };
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
					<form method="POST" action="taster.php">
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
					<div class="group">
						
					<?php	
					if (isset($_GET['code']))
					{
						$code=$_GET['code'];
						$query='SELECT COGNAC_CODE,COGNAC_AGE FROM TAST_COGNAC WHERE COGNAC_CAPTION=63 AND COGNAC_CODE like \''.$code.'%\' ORDER BY COGNAC_CODE';
						$stid = oci_parse($conn,$query );
						oci_execute($stid);
						//echo "<div class=\"group\">\n";
						$i=0;
						while ($row = oci_fetch_array($stid)) {
							echo "<div class=\"rowrate\">";
						    echo "<p code=\"p".$i."\">\nКод коньяка: ";
						    /*foreach ($row as $item) {
						        echo $item !== null ? htmlentities($item, ENT_QUOTES, 'cp1251') : "";
						    }*/
						    echo $row[0] !== null ? htmlentities($row[0], ENT_QUOTES, 'cp1251') : "";
						    echo "</p>\n";
						    echo "<p name=\"age".$i."\">\nВозраст коньяка: ";
						    echo $row[1] !== null ? htmlentities($row[1], ENT_QUOTES, 'cp1251') : "";
						    echo "</p>\n";
						    echo '<div class="cellrate"><span>Прозрачность</span><input type="number" name="opacity" required min="0" max="0.5" step="0.05"></div>';
						    echo '<div class="cellrate"><span>Цвет</span><input type="number" name="opacity" required min="0" max="0.5" step="0.05"></div>';
						    echo '<div class="cellrate"><span>Букет</span><input type="number" name="opacity" required min="0" max="3.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>Вкус</span><input type="number" name="opacity" required min="0" max="5.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>Типичность</span><input type="number" name="opacity" required min="0" max="1.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>Общий балл</span><input type="number" name="opacity" required min="0" max="10.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>Примечания</span><input type="text" name="opacity"></div>';
						    echo '<button type="submit" class="secure" name="submit">Закрепить</button>';
						    echo "</div>";
					}
					//echo "</div>\n";
					}
					
					?>
					</div>
					<button type="submit" class="secure" name="submit">Закрепить изменения</button>
				</form>
				<?php 
					if (!empty($_POST))
					{				
							$array=array();
							$i=0;	
							while (isset($_POST['code'.$i]))
							{
								$array[$i]= array('code'=>$_POST['code'.$i],
									'opacity'=>$_POST['opacity'.$i],
								'age'=>$_POST['opacity'.$i],
'color'=>$_POST['color'.$i],
'taste'=>$_POST['taste'.$i],
'bouquet'=>$_POST['bouquet'.$i],
'mainpoint'=>$_POST['mainpoint'.$i],
'note'=>$_POST['note'.$i],
'typicality'=>$_POST['typicality'.$i]);

								
								$i++;
							}
							print_r($array);
					}
					
				 ?>
				</div><!-- end of col-md-->
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