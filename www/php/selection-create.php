<?php
class Select {    
    public function fillselect_1() {
      include('connect.php');
      $query='SELECT GROUP_ID, GROUP_TITLE, GROUP_PREFIX FROM TAST_GROUP where GROUP_CAPTION =(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) ORDER BY GROUP_ID';
      $stid = oci_parse($conn,$query);
      oci_execute($stid);
      while ($row = oci_fetch_array($stid)) {
        echo "<option value='$row[0]' data-value='$row[2]'>";        
          echo $row[1] !== null ? ($row[1]) : "";
          echo '</option>';
        }
     oci_close($conn);
     oci_free_statement($stid);
    }
 
    public function fillselect_2() {    
      include('connect.php');
      $query='SELECT MAN_ID, MAN_FIO FROM TAST_MAN where MAN_CAPTION = (SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) ORDER BY MAN_ID';
      $stid = oci_parse($conn,$query);
      oci_execute($stid);
      while ($row = oci_fetch_array($stid)) {
        echo "<option value='$row[0]'>";
          echo $row[1] !== null ? ($row[1]) : "";
          echo '</option>';
        }
     oci_close($conn);
     oci_free_statement($stid);
    }

   public function fillselect_3() {
      include('connect.php');
      $query='SELECT COGNAC_ID, COGNAC_CODE FROM TAST_COGNAC  where COGNAC_CAPTION = (SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) order by COGNAC_CODE';
      $stid = oci_parse($conn,$query);
      oci_execute($stid);
      while ($row = oci_fetch_array($stid)) {
        echo "<option value='$row[0]'>";
          echo $row[1] !== null ? ($row[1]) : "";
          echo '</option>';
        }      
        oci_close($conn);
        oci_free_statement($stid);
    }
}
?>