<?php 
if (!empty($_POST))
	{		
		/*подключение к бд*/
    include('../php/connect.php');
		/*значения, которые необходиом занести в бд*/
		$table_add=$_POST['table_add'];
		$prefix=$_POST['prefix'];
		$group=$_POST['group'];
		/*формирование sql запроса к бд*/		
		$query="INSERT INTO ".$table_add." ( GROUP_TITLE, GROUP_PREFIX, GROUP_CAPTION) VALUES ('".$group."','".$prefix."',(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION))";		
		$stid = oci_parse($conn,$query);
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	