<?php 
if (!empty($_POST))
	{		
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

		$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
          }

		$query="INSERT INTO ".$table_add." (RATING_MAN, RATING_COGNAC, RATING_POINT,RATING_OPACITY,RATING_COLOR,RATING_BOUQUET,RATING_TASTE,RATING_TYPICALITY,RATING_NOTE) VALUES ('".$fio."','"$code"','".$grade."','".$opasity."','".$color."','".$buk."','".$taste."','".$type."','".$desc."')";
		$stid = oci_parse($conn,$query );
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	