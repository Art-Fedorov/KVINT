<?php	
	include_once 'connect.php' ;
	if (isset($_GET['id'])&&isset($_GET['pin']))
	{
		$id=$_GET['id'];
		$pin=$_GET['pin'];
		
		$query='SELECT * FROM TAST_MAN WHERE MAN_ID='.$id.' AND MAN_PIN='.$pin;
		$stid = oci_parse($conn,$query );
		oci_execute($stid);
		$i=0;
			while ($row = oci_fetch_array($stid)) {
		    $i++;
		  }
		  echo $i;
}//endif
?>