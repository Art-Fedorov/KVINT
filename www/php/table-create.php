<?php
class Table {    
    public function filltable($code,$id=NULL,$id_help=NULL) {
    /*подключение к бд*/
    include('connect.php');
    
    $query=$code;
    $stid = oci_parse($conn,$query );
    oci_execute($stid);
    echo "<table class=\"table table-hover table-condensed success\">\n";

    for ($i = 2; $i-1 < oci_num_fields($stid); $i++) {
    echo "<th>";
        echo oci_field_name($stid,$i);            
    echo "</th>";
    }
    while ($row = oci_fetch_array($stid)) {
      echo "<tr data-value='$row[0]' data-value-help='$row[1]'>";
      for ($i = 1; $i < oci_num_fields($stid); $i++) {
        echo '<td>';
        echo $row[$i] !== null ? htmlentities($row[$i], ENT_QUOTES, 'cp1251') : "";
        echo '</td>';
      }
      echo "</tr>\n";
    }
    echo "</table>\n";   
    oci_close($conn);          
    }
}
?>