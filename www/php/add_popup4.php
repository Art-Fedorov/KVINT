<?php 
if (!empty($_POST))
	{		
		/*подключение к бд*/
    include('../php/connect.php');
		/*значения, которые необходиом занести в бд*/
		$table_add=$_POST['table_add'];
		$fio=$_POST['fio'];
		$pos=$_POST['pos'];
		/*данные для изменения*/
		$tr_id=$_POST['id'];
		$id_row=$_POST['row'];
		$action=$_POST['action'];

		/*формирование sql запроса к бд*/		
		if ($action == 1){
		$query="INSERT INTO ".$table_add." (MAN_FIO, MAN_CAPTION, MAN_STATUS) VALUES ('".$fio."',(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION),'".$pos."')";	
		}
		else {
		$query="UPDATE ".$table_add." SET MAN_FIO = '".$fio."', MAN_CAPTION = (SELECT MAX(CAPTION_ID) FROM TAST_CAPTION), MAN_STATUS ='".$pos."' WHERE ".$id_row."=".$tr_id;
		}
		$stid = oci_parse($conn,$query );		
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	