<?php 
	include_once 'connect.php' ;
	$stid = oci_parse($conn, 'SELECT MAN_FIO FROM tAst_MAN WHERE MAN_CAPTION=63');
					oci_execute($stid);
					$output=array();
					while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {

					    echo "<p name=\"p".$i++."\">\n";
					    foreach ($row as $item) {
					        echo $item !== null ? htmlentities($item, ENT_QUOTES, 'cp1251') : "";
					    }
					    echo "</p>\n";
					}
					echo "</div>\n";
 ?>