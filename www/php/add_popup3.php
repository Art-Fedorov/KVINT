<?php 
if (!empty($_POST))
	{		
		$table_add=$_POST['table_add'];
		$place=$_POST['place'];
		$group=$_POST['group'];
		$down=$_POST['down'];
		$up=$_POST['up'];
		$medal=$_POST['medal'];

		$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
    if (!$conn) {
      $e = oci_error();
      trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
    }

	$query="INSERT INTO ".$table_add." (PRIZE_PLACE, PRIZE_GROUP, PRIZE_LOWRANGE, PRIZE_HIGHRANGE, PRIZE_TITLE, PRIZE_CAPTION) VALUES (".$place.",".$group.",".$down.",".$up.",'".$medal."',(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION))";
	echo $query;
		$stid = oci_parse($conn,$query );
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	