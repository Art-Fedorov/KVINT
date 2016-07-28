<?php 
if (!empty($_POST))
	{				
		$table_add=$_POST['table_add'];
		$date1=$_POST['date1'];
		$date2=$_POST['date2'];
		$desc=$_POST['desc'];
		
		$ndate1 = date("d/m/Y", strtotime($date1));
		$ndate2 = date("d/m/Y", strtotime($date2));

		$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
    if (!$conn) {
      $e = oci_error();
      trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
    }
		$query="INSERT INTO ".$table_add." (CAPTION_DATEBEG, CAPTION_DATEEND, CAPTION_DESC) VALUES ('".$ndate1."','".$ndate2."','".$desc."')";

		$stid = oci_parse($conn,$query );
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	