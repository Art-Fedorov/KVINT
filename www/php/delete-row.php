<?php 
if (!empty($_POST))
	{
		$tr_id=$_POST['id'];
		$table=$_POST['table'];
		$id_row=$_POST['row'];

		/*подключение к бд*/
    include('../php/connect.php');

		$query='DELETE FROM '.$table.' WHERE '.$id_row.'='.$tr_id;
		$stid = oci_parse($conn,$query );
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	