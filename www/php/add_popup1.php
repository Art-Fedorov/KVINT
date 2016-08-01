<?php 
if (!empty($_POST))
	{		
		/*подключение к бд*/
    include('../php/connect.php');
		/*значения, которые необходиом занести в бд*/		
		$table_add=$_POST['table_add'];
		$date1=$_POST['date1'];
		$date2=$_POST['date2'];
		$desc=$_POST['desc'];
		$ndate1 = date("d/m/Y", strtotime($date1));
		$ndate2 = date("d/m/Y", strtotime($date2));	

		/*данные для изменения*/
		$tr_id=$_POST['id'];
		$id_row=$_POST['row'];
		$action=$_POST['action'];
		
		/*формирование sql запроса к бд*/			
		if ($action == 1){		
			$query="INSERT INTO ".$table_add." (CAPTION_DATEBEG, CAPTION_DATEEND, CAPTION_DESC) VALUES ('".$ndate1."','".$ndate2."','".$desc."')";
		}
		else {						
			$query="UPDATE ".$table_add." SET CAPTION_DATEBEG = '".$ndate1."', CAPTION_DATEEND = '".$ndate2."', CAPTION_DESC = '".$desc."' WHERE ".$id_row."=".$tr_id;
		}
		echo $query;
		$stid = oci_parse($conn,$query );
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	