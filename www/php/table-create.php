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
        if($id!=NULL&&$id_help!=NULL)
        {

            if ($id==$row[0]&&$id_help==($row[1])){

                echo "<tr class='selected' data-value='$row[0]' data-value-help=".($row[1])." >";
            }
            else{
                echo "<tr data-value='$row[0]' data-value-help=".($row[1]).">";
            }
        }
        else{
            echo "<tr data-value='$row[0]' data-value-help=".($row[1]).">";
        }
      for ($i = 1; $i < oci_num_fields($stid); $i++) {
        echo '<td>';
        echo $row[$i] !== null ? ($row[$i]) : "";
        echo '</td>';
      }
      echo "</tr>\n";
    }
    echo "</table>\n";   
    oci_close($conn);          
    }
}
?>