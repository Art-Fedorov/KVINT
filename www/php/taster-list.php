<?php 
	include_once 'connect.php' ;
	/*Формирование списка дегустаторов*/
	$stid = oci_parse($conn, 'SELECT MAN_FIO,MAN_ID FROM tAst_MAN WHERE MAN_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)');
	oci_execute($stid);
	$i=0;
	while ($row = oci_fetch_array($stid)) {
		echo '<p name="p'.$i.'" id="'.$row[1].'">';
			echo $row[0];
		echo '</p>';
	$i++;
	}
 ?>