<?php 
	include_once 'connect.php' ;

	/*Вставляет названия групп коньяков в меню taster.php*/
					$stid = oci_parse($conn, 'SELECT GROUP_PREFIX FROM TAST_GROUP WHERE GROUP_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) ORDER BY GROUP_PREFIX');
					oci_execute($stid);
					$i=0;
					while ($row = oci_fetch_array($stid)) {
						echo '<li><p>';
							echo ($row[0]);
						echo '</p></li>';
					$i++;
					}
 ?>