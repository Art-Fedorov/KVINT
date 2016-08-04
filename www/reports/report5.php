<?php
use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
use Dompdf\Exception;
	include_once '../php/connect.php' ;		
		if (isset($_GET['group_id']))
    {
      $group_id = $_GET['group_id'];
		$html=file_get_contents('report5.html');
      $html.='<p>'.$_GET['text'].'</p>';
      $query="select cognac_code, cnt0, avg0, a.prize_title, cnt1, avg1, b.prize_title from ( select count(rating_id) as cnt0, count(rating_id)-2 as cnt1, round(avg(rating_point),2) as avg0, round(((sum(rating_point)-min(rating_point)-max(rating_point))/(count(rating_point)-2)),2) as avg1, rating_cognac, (select cognac_group from tast_cognac where cognac_id=rating_cognac and cognac_caption=(select max(caption_id) from tast_caption)) as cg from tast_rating where rating_caption=(select max(caption_id) from tast_caption) group by rating_cognac) tr, tast_prize a, tast_prize b, tast_cognac where a.prize_group=tr.cg and b.prize_group=tr.cg and avg0>=a.prize_lowrange and avg0<=a.prize_highrange and avg1>=b.prize_lowrange and avg1<=b.prize_highrange and substr(cognac_code,1,2)='".$group_id."' and tr.rating_cognac=tast_cognac.cognac_id order by cognac_code";
        echo $query;
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
    
    $html.= "</div>\n";  
    $html.="</html></body>";    
    file_put_contents('report_5.html', $html);
    echo $html;
  }


/*
SELECT c.COGNAC_CODE, ROUND(AVG(r.RATING_POINT),2), COUNT(r.RATING_MAN),p.PRIZE_TITLE FROM TAST_RATING r, TAST_COGNAC c,TAST_PRIZE p
        WHERE  c.COGNAC_ID = r.RATING_COGNAC 
        AND c.COGNAC_GROUP='.$_GET['group_id'].' 
        AND c.COGNAC_ID IN (SELECT COGNAC_ID FROM TAST_COGNAC WHERE COGNAC_CAPTION = (SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)) 
        AND p.PRIZE_TITLE = 
        (SELECT k.PRIZE_TITLE 
          FROM TAST_PRIZE k 
          WHERE (SELECT AVG(RATING_POINT) FROM TAST_RATING WHERE RATING_COGNAC = c.COGNAC_ID) 
          BETWEEN (SELECT p.PRIZE_LOWRANGE FROM TAST_PRIZE p WHERE p.PRIZE_GROUP = c.COGNAC_GROUP AND p.PRIZE_PLACE = k.PRIZE_PLACE) 
          AND (SELECT pl.PRIZE_HIGHRANGE FROM TAST_PRIZE pl WHERE pl.PRIZE_GROUP = c.COGNAC_GROUP AND pl.PRIZE_PLACE = k.PRIZE_PLACE) 
          AND PRIZE_GROUP = c.COGNAC_GROUP)
          AND p.PRIZE_CAPTION= (SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)
          AND p.PRIZE_GROUP=c.COGNAC_GROUP
        GROUP BY r.RATING_COGNAC, c.COGNAC_CODE, p.PRIZE_TITLE ORDER BY c.COGNAC_CODE*/

?>