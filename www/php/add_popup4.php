<?php 
if (!empty($_POST))
	{		
		$table_add=$_POST['table_add'];
		$fio=$_POST['fio'];
		$pos=$_POST['pos'];

		$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
          }

		$query="INSERT INTO ".$table_add." (MAN_FIO, MAN_CAPTION, MAN_STATUS) VALUES ('".$fio."',(SELECT CAPTION_ID FROM TAST_CAPTION where CAPTION_ID = (SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)),'".$pos."')";
		$stid = oci_parse($conn,$query );		
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	