<?php 
$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC');
					if (!$conn) {
    				$e = oci_error();
    				trigger_error(($e['message']), E_USER_ERROR);
					}
 ?>
