<?php
use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
use Dompdf\Exception;
	include_once '../php/connect.php' ;
		
		
		$html=file_get_contents('report2.html');
          $query='SELECT CAPTION_DESC FROM TAST_CAPTION WHERE CAPTION_ID=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)';
    $stid = oci_parse($conn,$query );
    oci_execute($stid);
    $title="";
    while ($row = oci_fetch_array($stid)) {
      $title=htmlentities($row[0], ENT_QUOTES, 'cp1251');
    }
    $html.='<p>'.$title.'</p>';
      $query='SELECT MAN_ID,MAN_FIO from TAST_MAN WHERE MAN_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)';
      $array=array();
      $stid = oci_parse($conn,$query );
      oci_execute($stid);
      $x=0;
      $point="";
      while ($row = oci_fetch_array($stid)) {
        $array[$x++]=array('id'=>$row[0],'title'=> htmlentities($row[1], ENT_QUOTES, 'cp1251'));
        //echo $array[$x-1][$row[0]];
      }
      print_r ($array);
      echo $point;
      $query ='SELECT *
      from (
        select man_id,cognac_code,point
        from (
            select rating_man man_id, man_fio, rating_cognac cognac_id, cognac_code, rating_point point
            from (
                select r.*
                  ,(select cognac_code from tast_cognac where cognac_id=r.rating_cognac and cognac_caption=r.rating_caption) cognac_code
                  ,(select man_fio from tast_man where man_id=r.rating_man and man_caption=r.rating_caption) man_fio
                from tast_rating r
                where rating_caption=63
            ) r
        )
     ) pivot (
              max(point)
              for man_id in (61,62,63,64,65,66,67,68,69,70,71)
             )
      order by 1';
      $stid = oci_parse($conn,$query );
      oci_execute($stid);
      $html.='<table border="1" style="width:100%;"><tr><th></th><th colspan="'.count($array).'">ЖЮРИ КОНКУРСА</th></tr>';
      for ($i = 1; $i-1 < oci_num_fields($stid); $i++) {
        $html.= "<th>";
        if($i>1)
        {
          $f=oci_field_name($stid,$i);
        $html.= $array[$i-2]['title'];
        //echo $f." ".strval($f)." ";
        var_dump($array[$i-2]['title']);
        }
        else  {$html.=oci_field_name($stid,$i);}
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
    file_put_contents('report_2.html', $html);
    ?>