<?php 
	include_once 'connect.php' ;
	/*Поиск уже заполненных полей*/
					$output=array();
					if (isset($_POST['code']))
					{
						$code=$_POST['code'];//COGNAC_CODE
						$id=$_POST['id'];//MAN_ID
						$query='SELECT RATING_MAN,RATING_COGNAC,RATING_CAPTION,RATING_POINT,RATING_OPACITY,RATING_COLOR,RATING_BOUQUET,RATING_TASTE,RATING_TYPICALITY,RATING_NOTE FROM TAST_RATING WHERE RATING_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) AND RATING_MAN='.$id.' AND RATING_COGNAC IN (SELECT COGNAC_ID FROM TAST_COGNAC WHERE COGNAC_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) AND COGNAC_CODE LIKE \''.$code.'%\') ORDER BY RATING_COGNAC';
						$stid = oci_parse($conn,$query );
						oci_execute($stid);

							while ($row = oci_fetch_array($stid)) {
						    $output[]= array(
						    	'man_id'=>floatval($row[0]),
						    	'cognac_id'=>floatval($row[1]),
						    	'mainpoint'=>floatval($row[3]),
						    	'opacity'=>floatval($row[4]),
						    	'color'=>floatval($row[5]),
						    	'bouquet'=>floatval($row[6]),
						    	'taste'=>floatval($row[7]),
						    	'typicality'=>floatval($row[8]),
						    	'note'=>$row[9]);
						  }
					header('Content-Type: application/json');
					echo json_encode($output);
				}

 ?>