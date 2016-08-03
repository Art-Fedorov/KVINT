<?php
use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
use Dompdf\Exception;
	include_once '../php/connect.php' ;
		
		
		$html=file_get_contents('report1.html');
    $query='SELECT GROUP_ID, GROUP_TITLE FROM TAST_GROUP WHERE GROUP_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)';
    $stid = oci_parse($conn,$query );
    oci_execute($stid);
    $array=array();
    $x=0;
    while ($row = oci_fetch_array($stid)) {
      $array[$x]=array('id'=>$row[0],'title'=> htmlentities($row[1], ENT_QUOTES, 'cp1251'));
      $x++;
    }

    for ($j=$array[0]['id'],$k=0;$j<$array[count($array)-1]['id'];$j++,$k++)
    {
      $html.='<p>'.$array[$k]['title'].'</p>';
      //echo $j;
      $query='SELECT G.GROUP_TITLE as "Категория", 
          C.COGNAC_CODE as "Шифр",C.COGNAC_TITLE as "Наименование", 
          C.COGNAC_MANUF as "Производитель", 
          C.COGNAC_AGE as "Возраст", 
          C.COGNAC_CONDALC as "Спирт,<br> %",
          C.COGNAC_CONDSUG as "Сахар,<br> г/дм3", 
          C.COGNAC_DESC as "Примечание" 
          FROM TAST_COGNAC C 
          INNER JOIN TAST_GROUP G
          ON C.COGNAC_GROUP=G.GROUP_ID
          WHERE COGNAC_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)
          AND COGNAC_GROUP='.$j.'
          ORDER BY C.COGNAC_CODE'; 
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
    //$html=iconv("ISO-8859-1","windows-1251",$html);
    /*iconv_set_encoding("internal_encoding", "UTF-8");
    iconv_set_encoding("input_encoding", "UTF-8");
    iconv_set_encoding("output_encoding", "UTF-8");*/
    /*require_once("dompdf/autoload.inc.php");
    $dompdf = new DOMPDF();// Создаем обьект
    $dompdf->load_html($html); // Загружаем в него наш html код
    $dompdf->set_paper('A4','album');
    $dompdf->render(); // Создаем из HTML PDF
    //$dompdf->stream('mypdf.pdf'); // Выводим результат (скачивание)
    $output = $dompdf->output();*/
    //file_put_contents('Brochure.pdf', $output);
    file_put_contents('Brochure.html', $html);

    //echo var_dump(iconv_get_encoding('all'));
    
    echo $html;

    ?>