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
		/*формирование sql запроса к бд*/		
		$query="INSERT INTO ".$table_add." 
		(RATING_MAN,RATING_COGNAC,RATING_CAPTION,RATING_POINT,RATING_OPACITY, 
		RATING_COLOR,RATING_BOUQUET,RATING_TASTE,RATING_TYPICALITY,RATING_NOTE) 
		VALUES (".$fio.",	".$code.",(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION),
		".$grade.",	".$opasity.",	".$color.",	".$buk.",	".$taste.",	".$type.",'".$desc."'	)";
		$stid = oci_parse($conn,$query );		
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	