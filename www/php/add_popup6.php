<?php 
if (!empty($_POST))
	{		
		/*подключение к бд*/
    include('../php/connect.php');
		/*значения, которые необходиом занести в бд*/
		$table_add=$_POST['table_add'];
		$fio=$_POST['fio'];
		$code=$_POST['code'];
		$opasity=$_POST['opasity'];
		$color=$_POST['color'];
		$buk=$_POST['buk'];
		$taste=$_POST['taste'];
		$type=$_POST['type'];
		$desc=$_POST['desc'];
		$grade=$_POST['grade'];

		/*данные для изменения*/
		$tr_id=$_POST['id'];
		$id_row=$_POST['row'];
		$action=$_POST['action'];

		/*формирование sql запроса к бд*/		
		if ($action == 1){
			$query="INSERT INTO ".$table_add." (RATING_MAN, RATING_COGNAC, RATING_CAPTION, RATING_POINT, RATING_OPACITY, RATING_COLOR, RATING_BOUQUET, RATING_TASTE, RATING_TYPICALITY, RATING_NOTE) VALUES (".$fio.",	".$code.",(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION), ".$grade.",	".$opasity.",	".$color.",	".$buk.",	".$taste.",	".$type.",'".$desc."'	)";
		}
		else {
			$query="UPDATE ".$table_add." SET RATING_MAN = ".$fio.", RATING_COGNAC = ".$code.", RATING_CAPTION = (SELECT MAX(CAPTION_ID) FROM TAST_CAPTION), RATING_POINT = ".$grade.", RATING_OPACITY = ".$opasity.", RATING_COLOR = ".$color.", RATING_BOUQUET = ".$buk.", RATING_TASTE = ".$taste.", RATING_TYPICALITY = ".$type.", RATING_NOTE = '".$desc."' WHERE ".$id_row."=".$tr_id;
		}
		echo $query;
		$stid = oci_parse($conn,$query );		
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	