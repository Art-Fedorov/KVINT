<?php
use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
use Dompdf\Exception;
	include_once '../php/connect.php' ;
		
		
		$html=file_get_contents('report2.html');
      /*$query='SELECT 
          COGNAC_CODE as "Шифр",
          (SELECT MAN_FIO FROM TAST_MAN WHERE MAN_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) ORDER BY MAN_FIO)
          FROM TAST_COGNAC,TAST_RATING
          WHERE COGNAC_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)
          AND COGNAC_ID=RATING_COGNAC
          ORDER BY COGNAC_CODE'; */

      $query ='SELECT * from (
select COGNAC_CODE AS "Шифр", MAN_FIO
from TAST_COGNAC, TAST_MAN
)pivot(
RATING_POINT
for RATING_MAN in (SELECT MAN_ID FROM TAST_MAN WHERE MAN_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) ORDER BY MAN_FIO)
)
order by 1';
      $stid = oci_parse($conn,$query );
      oci_execute($stid);
      $html.='<table border="1" style="width:100%;">';
      for ($i = 1; $i-1 < oci_num_fields($stid); $i++) {
        $html.= "<th>";
        $html.= oci_field_name($stid,$i);            
        $html.= "</th>";
      }
      while ($row = oci_fetch_array($stid)) {
        $html.= "<tr>";
        for ($i = 0; $i < oci_num_fields($stid); $i++) {
           $html.= '<td>';
           $html.=  htmlentities($row[$i], ENT_QUOTES, 'cp1251');
           $html.= '</td>';
        }
        $html.= "</tr>";
      }
      $html.='</table>';          
    
    $html.= "</div>\n";  
    $html.="</html></body>";
    echo $html;
    file_put_contents('report_2.html', $html);
    ?>