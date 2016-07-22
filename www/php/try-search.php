<?php 
$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
					if (!$conn) {
    				$e = oci_error();
    				trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
					}
					$output=array();
					if (isset($_GET['caption']))
					{
						$code=$_GET['code'];
						$id=$_GET['id'];
						$caption=$_GET['caption'];
						$query='SELECT RATING_MAN,RATING_COGNAC,RATING_CAPTION,RATING_POINT,RATING_OPACITY,RATING_COLOR,RATING_BOUQUET,RATING_TASTE,RATING_TYPICALITY,RATING_NOTE FROM TAST_RATING WHERE RATING_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) AND RATING_MAN='.$id.' AND RATING_COGNAC IN (SELECT COGNAC_ID FROM TAST_COGNAC WHERE COGNAC_CAPTION='.$caption' AND COGNAC_CODE LIKE COGNAC_CODE like \''.$code.'%\')';
						$stid = oci_parse($conn,$query );
						oci_execute($stid);

							while ($row = oci_fetch_array($stid)) {
						    $output[]= array(
						    	'cognac_id'=>htmlentities($row[0], ENT_QUOTES, 'cp1251'),
						    	'mainpoint'=>htmlentities($row[3], ENT_QUOTES, 'cp1251'),
						    	'opacity'=>htmlentities($row[4], ENT_QUOTES, 'cp1251'),
						    	'color'=>htmlentities($row[5], ENT_QUOTES, 'cp1251'),
						    	'bouquet'=>htmlentities($row[6], ENT_QUOTES, 'cp1251'),
						    	'taste'=>htmlentities($row[7], ENT_QUOTES, 'cp1251'),
						    	'typicality'=>htmlentities($row[8], ENT_QUOTES, 'cp1251'),
						    	'note'=>htmlentities($row[9], ENT_QUOTES, 'cp1251');
						  }
					header('Content-Type: application/json');
					echo json_encode($output);

 ?>