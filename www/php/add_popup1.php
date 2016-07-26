<?php 
if (!empty($_POST))
	{				
		$table_add=$_POST['table_add'];
		$date1=$_POST['date1'];
		$date2=$_POST['date2'];
		$desc=$_POST['desc'];

		$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
          }

		$query="INSERT INTO TAST_CAPTION (CAPTION_DATEDEG, CAPTION_DATEEND, CAPTION_DESC) VALUES (TO_DATE('2003/05/03 21:02:44', 'yyyy/mm/dd hh24:mi:ss'),TO_DATE('2003/05/03 21:02:44', 'yyyy/mm/dd hh24:mi:ss'),'RGRG')";
		$stid = oci_parse($conn,$query );
    oci_execute($stid);
    oci_commit($conn);
    oci_close($conn);
}
?>	