<?php 
if (!empty($_POST))
	{		
		/*подключение к бд*/
    include('../php/connect.php');
		/*значения, которые необходиом занести в бд*/
		$table_add=$_POST['table_add'];
		$fio=$_POST['fio'];
		$pos=$_POST['pos'];
		/*формирование sql запроса к бд*/		
		$query="INSERT INTO ".$table_add." (MAN_FIO, MAN_CAPTION, MAN_STATUS) VALUES ('".$fio."',(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION),'".$pos."')";
		$stid = oci_parse($conn,$query );		
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	