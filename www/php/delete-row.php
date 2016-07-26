<?php 
if (!empty($_POST))
	{
		$tr_id=$_POST['id'];
		$table=$_POST['table'];
		$id_row=$_POST['row'];

		$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
          }

		$query='DELETE FROM '.$table.' WHERE '.$id_row.'='.$tr_id;
		$stid = oci_parse($conn,$query );
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	