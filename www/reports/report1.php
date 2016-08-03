<?php
	include_once 'connect.php' ;
	if (isset($_GET['code']))
	{
		$code=$_GET['code'];
		$query='SELECT COGNAC_CODE,COGNAC_AGE, COGNAC_ID FROM TAST_COGNAC WHERE COGNAC_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) AND COGNAC_CODE like \''.$code.'%\' ORDER BY COGNAC_CODE';
		$stid = oci_parse($conn,$query );
		oci_execute($stid);
		$html=file_get_contents('report1.html');
		$html.= "<table class=\"table table-hover table-condensed success\">\n";
    for ($i = 2; $i-1 < oci_num_fields($stid); $i++) {
    $html.= "<th>";
         $html.= oci_field_name($stid,$i);            
     $html.= "</th>";
    }
    while ($row = oci_fetch_array($stid)) {
       $html.= "<tr>";
      for ($i = 1; $i < oci_num_fields($stid); $i++) {
         $html.= '<td>';
         $html.= $row[$i] !== null ? htmlentities($row[$i], ENT_QUOTES, 'cp1251') : "";
         $html.= '</td>';
      }
       $html.= "</tr>\n";
    }
     $html.= "</table>\n";  
      $html.="</html></body>";
      echo $html;
?>