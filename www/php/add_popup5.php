<?php 
if (!empty($_POST))
	{		
		$table_add=$_POST['table_add'];
		$manuf=$_POST['manuf'];
		$group=$_POST['group'];
		$code=$_POST['code'];
		$age=$_POST['age'];
		$name=$_POST['name'];
		$cond=$_POST['cond'];
		$sugare=$_POST['sugare'];

		$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
          }
		$query="INSERT INTO ".$table_add." (COGNAC_CODE, COGNAC_CAPTION, COGNAC_TITLE, COGNAC_MANUF, COGNAC_GROUP, COGNAC_AGE, COGNAC_CONDALC, COGNAC_CONDSUG) VALUES ('".$code."',(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION),'"$name"','".$manuf."',".$group.",".$age.",".$cond.",".$sugare.")";
		$stid = oci_parse($conn,$query );
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	