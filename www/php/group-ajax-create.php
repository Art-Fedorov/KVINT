<?php	
$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
					if (!$conn) {
    				$e = oci_error();
    				trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
					}
					$output=array();
					if (isset($_GET['code']))
					{
						$code=$_GET['code'];
						$query='SELECT COGNAC_CODE,COGNAC_AGE, COGNAC_ID FROM TAST_COGNAC WHERE COGNAC_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) AND COGNAC_CODE like \''.$code.'%\' ORDER BY COGNAC_CODE';
						$stid = oci_parse($conn,$query );
						oci_execute($stid);

							while ($row = oci_fetch_array($stid)) {
						    $output[]= array(
						    	'code'=>htmlentities($row[0], ENT_QUOTES, 'cp1251'),
						    	'age'=>htmlentities($row[1], ENT_QUOTES, 'cp1251'),
						    	'id'=>htmlentities($row[2], ENT_QUOTES, 'cp1251'));
						  }
					header('Content-Type: application/json');
					echo json_encode($output);
				}//endif
										/*$stid = oci_parse($conn, 'SELECT MAN_FIO FROM tAst_MAN WHERE MAN_CAPTION=63');
					oci_execute($stid);
					echo "<div class=\"list\">\n";
					$i=0;
					while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {

					    echo "<p name=\"p".$i++."\">\n";
					    foreach ($row as $item) {
					        echo $item !== null ? htmlentities($item, ENT_QUOTES, 'cp1251') : "";
					    }
					    echo "</p>\n";
					}
					echo "</div>\n";*/
					?>