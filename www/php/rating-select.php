<?php	
	include_once 'connect.php' ;
	/*При нажатии на кнопку изменить в справочнике коньяков
	для корректного значения выпадающего списка*/
	$output=array();
	if (isset($_GET['cognac_id']))
	{
		$code=$_GET['cognac_id'];
		$query='SELECT GROUP_ID FROM TAST_GROUP WHERE GROUP_ID = (SELECT COGNAC_GROUP FROM TAST_COGNAC WHERE COGNAC_ID='.$code.')';
		$stid = oci_parse($conn,$query );
		oci_execute($stid);

			while ($row = oci_fetch_array($stid)) {
		    echo	($row[0]);}

	}  //endif
?>