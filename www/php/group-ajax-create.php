<?php	
	include_once 'connect.php' ;
	$output=array();
	/*Берутся значения возраста шифра и id конька для определенной группы*/
	if (isset($_GET['code']))
	{
		$code=$_GET['code'];
		$query='SELECT COGNAC_CODE,COGNAC_AGE, COGNAC_ID FROM TAST_COGNAC WHERE COGNAC_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) AND COGNAC_CODE like \''.$code.'%\' ORDER BY COGNAC_CODE';
		$stid = oci_parse($conn,$query );
		oci_execute($stid);

			while ($row = oci_fetch_array($stid)) {
		    $output[]= array(
		    	'code'=>($row[0]),
		    	'age'=>($row[1]),
		    	'id'=>($row[2]));
		  }
	header('Content-Type: application/json');
	echo json_encode($output);
}//endif
?>