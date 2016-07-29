<?php
class Select {    
    public function fillselect_1() {
      include('connect.php');
      $query='SELECT GROUP_ID, GROUP_TITLE FROM TAST_GROUP where GROUP_CAPTION = (SELECT MAX(GROUP_CAPTION) FROM TAST_GROUP)';
      $stid = oci_parse($conn,$query);
      oci_execute($stid);
      while ($row = oci_fetch_array($stid)) {
        echo "<option value='$row[0]'>";        
          echo $row[1] !== null ? htmlentities($row[1], ENT_QUOTES, 'cp1251') : "";
          echo '</option>';
        }
     oci_close($conn);
     oci_free_statement($stid);
    }
 
    public function fillselect_2() {    
      include('connect.php');
      $query='SELECT MAN_ID, MAN_FIO FROM TAST_MAN where MAN_CAPTION = (SELECT MAX(MAN_CAPTION) FROM TAST_MAN)';
      $stid = oci_parse($conn,$query);
      oci_execute($stid);
      while ($row = oci_fetch_array($stid)) {
        echo "<option value='$row[0]'>";
          echo $row[1] !== null ? htmlentities($row[1], ENT_QUOTES, 'cp1251') : "";
          echo '</option>';
        }
     oci_close($conn);
     oci_free_statement($stid);
    }

   public function fillselect_3() {
      include('connect.php');
      $query='SELECT COGNAC_ID, COGNAC_CODE FROM TAST_COGNAC  where COGNAC_CAPTION = (SELECT MAX(COGNAC_CAPTION) FROM TAST_COGNAC) order by COGNAC_CODE';
      $stid = oci_parse($conn,$query);
      oci_execute($stid);
      while ($row = oci_fetch_array($stid)) {
        echo "<option value='$row[0]'>";
          echo $row[1] !== null ? htmlentities($row[1], ENT_QUOTES, 'cp1251') : "";
          echo '</option>';
        }      
        oci_close($conn);
        oci_free_statement($stid);
    }
}
?>