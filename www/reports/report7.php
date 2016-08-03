<?php
use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
use Dompdf\Exception;
	include_once '../php/connect.php' ;
		
		
		$html=file_get_contents('report7.html');
    $query='SELECT GROUP_ID, GROUP_TITLE FROM TAST_GROUP WHERE GROUP_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)';
    $stid = oci_parse($conn,$query );
    oci_execute($stid);
    $array=array();
    $x=0;
    while ($row = oci_fetch_array($stid)) {
      $array[$x][]=array('id'=>$row[0],'title'=> htmlentities($row[1], ENT_QUOTES, 'cp1251'));
      $x++;
    }
    print_r($array);
    
    

    //echo count($array);
    for ($j=$array[0]['id'];$j<$array[count($array)]['id'];$j++)
    {
      echo $j;
      $query='SELECT a.COGNAC_TITLE, a.COGNAC_MANUF, a.COGNAC_AGE, b.PRIZE_TITLE FROM TAST_COGNAC a, TAST_PRIZE b  WHERE a.COGNAC_GROUP = b.PRIZE_GROUP AND b.PRIZE_TITLE = (SELECT PRIZE_TITLE FROM TAST_PRIZE WHERE (SELECT AVG(RATING_POINT) FROM TAST_RATING WHERE RATING_COGNAC = a.COGNAC_ID) BETWEEN (SELECT PRIZE_LOWRANGE FROM TAST_PRIZE) AND (SELECT PRIZE_HIGHRANGE FROM TAST_PRIZE) AND PRIZE_GROUP = A.COGNAC_GROUP))
          AND COGNAC_GROUP='.$j; 
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
        $html.= "</tr>\n";
      }
      $html.='</table>';
    }           
    
    $html.= "</div>\n";  
    $html.="</html></body>";    
    file_put_contents('report_7.html', $html);
    echo $html;

    ?>