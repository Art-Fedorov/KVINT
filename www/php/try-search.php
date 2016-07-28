<?php 
	include_once 'connect.php' ;
					$output=array();
					if (isset($_POST['code']))
					{
						$code=$_POST['code'];
						$id=$_POST['id'];
						//$caption=$_POST['caption'];
						$query='SELECT RATING_MAN,RATING_COGNAC,RATING_CAPTION,RATING_POINT,RATING_OPACITY,RATING_COLOR,RATING_BOUQUET,RATING_TASTE,RATING_TYPICALITY,RATING_NOTE FROM TAST_RATING WHERE RATING_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) AND RATING_MAN='.$id.' AND RATING_COGNAC IN (SELECT COGNAC_ID FROM TAST_COGNAC WHERE COGNAC_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) AND COGNAC_CODE LIKE \''.$code.'%\') ORDER BY RATING_COGNAC';
						$stid = oci_parse($conn,$query );
						oci_execute($stid);

							while ($row = oci_fetch_array($stid)) {
						    $output[]= array(
						    	'man_id'=>floatval(htmlentities($row[0], ENT_QUOTES, 'cp1251')),
						    	'cognac_id'=>floatval(htmlentities($row[1], ENT_QUOTES, 'cp1251')),
						    	'mainpoint'=>floatval(htmlentities($row[3], ENT_QUOTES, 'cp1251')),
						    	'opacity'=>floatval(htmlentities($row[4], ENT_QUOTES, 'cp1251')),
						    	'color'=>floatval(htmlentities($row[5], ENT_QUOTES, 'cp1251')),
						    	'bouquet'=>floatval(htmlentities($row[6], ENT_QUOTES, 'cp1251')),
						    	'taste'=>floatval(htmlentities($row[7], ENT_QUOTES, 'cp1251')),
						    	'typicality'=>floatval(htmlentities($row[8], ENT_QUOTES, 'cp1251')),
						    	'note'=>htmlentities($row[9], ENT_QUOTES, 'cp1251'));
						  }
					header('Content-Type: application/json');
					echo json_encode($output);
				}

 ?>