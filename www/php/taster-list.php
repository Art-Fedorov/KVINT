<?php 
	include_once 'connect.php' ;

					$stid = oci_parse($conn, 'SELECT MAN_FIO,MAN_ID FROM tAst_MAN WHERE MAN_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)');
					oci_execute($stid);
					$i=0;
					while ($row = oci_fetch_array($stid)) {
						echo '<p name="p'.$i.'" id="'.htmlentities($row[1], ENT_QUOTES, 'cp1251').'">';
							echo htmlentities($row[0], ENT_QUOTES, 'cp1251');
						echo '</p>';
					$i++;
					}
					/*$array=array();
					while ($row = oci_fetch_array($stid)) {
					    $array[]=array(
					    	'fio'=> htmlentities($row[0], ENT_QUOTES, 'cp1251'),
					    	'id'=>htmlentities($row[1], ENT_QUOTES, 'cp1251'));
					}
					header('Content-Type: application/json');
					echo json_encode($array);*/
 ?>