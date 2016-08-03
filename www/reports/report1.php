<?php
	include_once '../php/connect.php' ;
	if (isset($_GET['group_id']))
	{
		$group_id=$_GET['group_id'];
    $group_prefix=$_GET['group_prefix'];
		$query='SELECT C.COGNAC_CODE,C.COGNAC_TITLE, G.GROUP_ID FROM TAST_COGNAC C INNER JOIN TAST_GROUP G ON C.COGNAC_GROUP=G.GROUP_ID WHERE COGNAC_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) AND C.COGNAC_GROUP ='.$group_id;
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
    require_once("dompdf/autoload.inc.php");
    $dompdf = new DOMPDF();// Создаем обьект
    $dompdf->load_html($html); // Загружаем в него наш html код
    $dompdf->render(); // Создаем из HTML PDF
    $dompdf->stream('mypdf.pdf'); // Выводим результат (скачивание)
    echo $dompdf;
  } 
?>