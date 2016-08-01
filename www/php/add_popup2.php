<?php 
if (!empty($_POST))
	{		
		/*подключение к бд*/
    include('../php/connect.php');
		/*значения, которые необходиом занести в бд*/
		$table_add=$_POST['table_add'];
		$prefix=$_POST['prefix'];
		$group=$_POST['group'];
		$action=$_POST['action'];

		/*данные для изменения*/
		$tr_id=$_POST['id'];
		$id_row=$_POST['row'];
		$action=$_POST['action'];

		/*формирование sql запроса к бд*/		
		if ($action == 1){
			$query="INSERT INTO ".$table_add." (GROUP_TITLE, GROUP_PREFIX, GROUP_CAPTION) VALUES ('".$group."','".$prefix."',(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION))";
		}
		else {		  
			$query="UPDATE ".$table_add." SET GROUP_TITLE = '".$group."', GROUP_PREFIX = '".$prefix."', GROUP_CAPTION = (SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) WHERE ".$id_row."=".$tr_id;
		}
		echo $query;
		$stid = oci_parse($conn,$query);
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
	}
?>	