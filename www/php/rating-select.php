<?php	
	include_once 'connect.php' ;
	$output=array();
	if (isset($_GET['cognac_id']))
	{
		$code=$_GET['cognac_id'];
		$query='SELECT GROUP_ID FROM TAST_GROUP WHERE GROUP_ID = (SELECT COGNAC_GROUP FROM TAST_COGNAC WHERE COGNAC_ID='.$code.')';
		$stid = oci_parse($conn,$query );
		oci_execute($stid);

			while ($row = oci_fetch_array($stid)) {
		    echo	htmlentities($row[0], ENT_QUOTES, 'cp1251');}
		  
	//header('Content-Type: application/json');
	//echo json_encode($output);
	}  //endif
?>