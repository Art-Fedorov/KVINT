<?php 

/*ОТЧЕТ Список образцов*/ 
include_once '../php/connect.php' ; 

/*Подключение библиотек для генерации pdf*/ 
/*use Dompdf\Adapter\CPDF; 
use Dompdf\Dompdf; 
use Dompdf\Exception;*/ 

/*Кусок со стилями и т.п берется из html файла*/ 
$html=file_get_contents('report1.html'); 
/*Запрос для получения KVINT 2012 (2017...)*/ 
$query='SELECT CAPTION_DESC FROM TAST_CAPTION WHERE CAPTION_ID=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)'; 
$stid = oci_parse($conn,$query ); 
oci_execute($stid); 
$title="";//хранится KVINT 2012... 
while ($row = oci_fetch_array($stid)) { 
$title=$row[0]; 
} 
/*Добавление шапки отчета*/ 
$html.='<header> 
<div style="width:600px; margin:0 auto; text-align: center;"><p><span>СПИСОК ОБРАЗЦОВ</span><br>представленных на Международном Конкурсе коньяков<br> "'.$title.'" г. Тирасполь</p></div> 
</header><div class="simple_table">'; 

/*Запрос на получение списка групп*/ 
$query='SELECT GROUP_ID, GROUP_TITLE FROM TAST_GROUP WHERE GROUP_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)'; 
$stid = oci_parse($conn,$query ); 
oci_execute($stid); 
$array=array(); 
$x=0; 
/*Добавляем список групп в массив*/ 
while ($row = oci_fetch_array($stid)) { 
  $array[$x]=array('id'=>$row[0],'title'=> $row[1]); 
  $x++; 
} 
/*Проходим по списку групп, $k для номера прохода*/ 
for ($j=$array[0]['id'],$k=0;$j<=$array[count($array)-1]['id'];$j++,$k++)
{ 
/*Перед таблицей для каждой группы вставляем название группы*/ 
  $html.='<p>'.$array[$k]['title'].'</p>'; 

  /*Заполнение таблиц*/ 
  $query='SELECT G.GROUP_TITLE as "Категория", 
  C.COGNAC_CODE as "Шифр",C.COGNAC_TITLE as "Наименование", 
  C.COGNAC_MANUF as "Предприятие - изготовитель", 
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
      $html.= $row[$i]; 
      $html.= '</td>'; 
    } 
    $html.= "</tr>"; 
  } 
  $html.='</table>'; 
} 

$html.= "</div>\n"; 
$html.="</html></body>"; 
/*Генерация пдф (не работает) на хабре советовали 
wkhtmltopdf */ 
/*require_once("dompdf/autoload.inc.php"); 
$dompdf = new DOMPDF(); // Создаем обьект 
$dompdf->load_html($html); // Загружаем в него наш html код 
$dompdf->render(); // Создаем из HTML PDF 
//$dompdf->stream('mypdf.pdf'); // Выводим результат (скачивание) 
$output = $dompdf->output(); 
file_put_contents('report_1.pdf', $output);*/ 
/*Генерация html документа*/ 
file_put_contents('report_1.html', $html); 
?>