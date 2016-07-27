<?php 
if (!empty($_POST))
	{		
		$table_add=$_POST['table_add'];
		$prefix=$_POST['prefix'];
		$group=$_POST['group'];

		$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
          }

		$query="INSERT INTO ".$table_add." (GROUP_PREFIX, GROUP_TITLE) VALUES ('".$prefix."','".$group."')";
		$stid = oci_parse($conn,$query );
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	