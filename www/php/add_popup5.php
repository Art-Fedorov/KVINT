<?php 
if (!empty($_POST))
	{		
		/*подключение к бд*/
    include('../php/connect.php');
		/*значения, которые необходиом занести в бд*/
		$table_add=$_POST['table_add'];
		$manuf=$_POST['manuf'];
		$group=$_POST['group'];
		$code=$_POST['code'];
		$age=$_POST['age'];
		$name=$_POST['name'];
		$cond=$_POST['cond'];
		$sugare=$_POST['sugare'];

		/*данные для изменения*/
		$tr_id=$_POST['id'];
		$id_row=$_POST['row'];
		$action=$_POST['action'];

	/*формирование sql запроса к бд*/
	if ($action == 1){		
		$query="INSERT INTO ".$table_add." (COGNAC_CODE, COGNAC_CAPTION, COGNAC_TITLE, COGNAC_MANUF, COGNAC_GROUP, COGNAC_AGE, COGNAC_CONDALC, COGNAC_CONDSUG) VALUES ('".$code."',(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION),'".$name."','".$manuf."',".$group.",'".$age."',".$cond.",".$sugare.")";		
	} else {
		$query="UPDATE ".$table_add." SET COGNAC_CODE = '".$code."', COGNAC_CAPTION = (SELECT MAX(CAPTION_ID) FROM TAST_CAPTION), COGNAC_TITLE = '".$name."', COGNAC_MANUF = '".$manuf."', COGNAC_GROUP = ".$group.", COGNAC_AGE = '".$age."', COGNAC_CONDALC = ".$cond.", COGNAC_CONDSUG = ".$sugare." WHERE ".$id_row."=".$tr_id;		
	}
		$stid = oci_parse($conn,$query );
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	