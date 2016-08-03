<?php
use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
use Dompdf\Exception;
	include_once '../php/connect.php' ;
	if (isset($_GET['group_id']))
	{
		$group_id=$_GET['group_id'];
    $group_prefix=$_GET['group_prefix'];
		$query='SELECT C.COGNAC_CODE,C.COGNAC_TITLE, G.GROUP_ID FROM TAST_COGNAC C INNER JOIN TAST_GROUP G ON C.COGNAC_GROUP=G.GROUP_ID WHERE COGNAC_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) AND C.COGNAC_GROUP ='.$group_id;
		$stid = oci_parse($conn,$query );
		oci_execute($stid);
		$html=file_get_contents('report1.html');
    /*$html='<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8">
  <title>Список образцов</title><link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css"><!--<link rel="stylesheet" type="text/css" href="../css/report-page.css">--><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"><script src="../libs/jquery/jquery-2.1.4.min.js"></script></head><body><header> <div style="width:600px; margin:0 auto; text-align: center;"><p><span>СПИСОК ОБРАЗЦОВ</span><br>представленных на Международном Конкурсе коньяков<br> "KVINT 2017" г. Тирасполь</p></div>  </header>';*/
    
    for ($i = 2; $i-1 < oci_num_fields($stid); $i++) {
    $html.= "<th>";
         $html.= oci_field_name($stid,$i);            
     $html.= "</th>";
    }
    while ($row = oci_fetch_array($stid)) {
       $html.= "<tr>";
      for ($i = 1; $i < oci_num_fields($stid); $i++) {
         $html.= '<td>';
         $html.=  htmlentities($row[$i], ENT_QUOTES, 'cp1251');
         $html.= '</td>';
      }
       $html.= "</tr>\n";
    }
    $html.= "</table></div>\n";  
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
    

  } 
?>