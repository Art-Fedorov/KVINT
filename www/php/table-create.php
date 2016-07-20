<?php
class Table {
    // объявление свойства
    //public $code = 'SELECT * FROM TAST_COGNAC';

    // объявление метода
    public function filltable($code) {
    	$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
          }    	
      $query='SELECT * FROM ' .$code;
      //$query='SELECT * FROM TAST_COGNAC';
      $stid = oci_parse($conn,$query );
      oci_execute($stid);
      echo "<table class=\"table table-hover table-condensed success\">\n";
      
      // отрисовка шапки таблицы
      for ($i = 1; $i-1 < oci_num_fields($stid); $i++) {
      echo "<th>";
          echo oci_field_name($stid,$i);            
      echo "</th>";
      }
      while ($row = oci_fetch_array($stid)) {
        echo "<tr>";
        for ($i = 0; $i < count($row); $i++) {
          echo '<td>';
          echo $row[$i] !== null ? htmlentities($row[$i], ENT_QUOTES, 'cp1251') : "";
          echo '</td>';
        }
        echo "</tr>\n";
      }
      echo "</table>\n";
    }
}
?>