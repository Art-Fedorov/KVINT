<?php
use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
use Dompdf\Exception;
	include_once '../php/connect.php' ;
		
		
		$html=file_get_contents('report6.html');
     $query='SELECT GROUP_ID, GROUP_TITLE FROM TAST_GROUP WHERE GROUP_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)';
    $stid = oci_parse($conn,$query );
    oci_execute($stid);
    $array=array();
    $x=0;
    while ($row = oci_fetch_array($stid)) {
      $array[$x]=array('id'=>$row[0],'title'=> htmlentities($row[1], ENT_QUOTES, 'cp1251'));
      $x++;
    }

    for ($j=$array[0]['id'],$k=0;$j<=$array[count($array)-1]['id'];$j++,$k++)
    {
      $html.='<p>'.$array[$k]['title'].'</p>';
      //echo $j;
      $query='SELECT a.COGNAC_CODE as "Шифр", a.COGNAC_TITLE as "Наименование", a.COGNAC_MANUF as "Изготовитель", a.COGNAC_AGE as "Возраст, г.", b.PRIZE_TITLE as "Награждение"
					FROM TAST_COGNAC a, TAST_PRIZE b  
					WHERE a.COGNAC_GROUP = b.PRIZE_GROUP AND b.PRIZE_TITLE = (SELECT k.PRIZE_TITLE FROM TAST_PRIZE k WHERE (SELECT AVG(RATING_POINT) FROM TAST_RATING WHERE RATING_COGNAC = a.COGNAC_ID) BETWEEN (SELECT p.PRIZE_LOWRANGE FROM TAST_PRIZE p WHERE p.PRIZE_GROUP = a.COGNAC_GROUP AND p.PRIZE_PLACE = k.PRIZE_PLACE) AND (SELECT pl.PRIZE_HIGHRANGE FROM TAST_PRIZE pl WHERE pl.PRIZE_GROUP = a.COGNAC_GROUP AND pl.PRIZE_PLACE = k.PRIZE_PLACE) AND PRIZE_GROUP = a.COGNAC_GROUP)
         AND a.COGNAC_GROUP='.$j.' order by a.COGNAC_CODE'; 
      $stid = oci_parse($conn,$query );
      oci_execute($stid);
      $html.='<table border="1" style="width:100%;">';
      $html.='<th>№</th>';
      for ($i = 1; $i-1 < oci_num_fields($stid); $i++) {
        $html.= "<th>";
        $html.= oci_field_name($stid,$i);            
        $html.= "</th>";
      }
      $m=1;
      while ($row = oci_fetch_array($stid)) {

        $html.= "<tr>";
        $html.="<td>".$m++."</td>";
        for ($i = 0; $i < oci_num_fields($stid); $i++) {
           $html.= '<td>';
           $html.=  htmlentities($row[$i], ENT_QUOTES, 'cp1251');
           $html.= '</td>';
        }
        $html.= "</tr>";
      }
      $html.='</table>';
    }           
    
    $html.= "</div>\n";  
    $html.="</html></body>";    
    file_put_contents('report_6.html', $html);
    echo $html;

    ?>