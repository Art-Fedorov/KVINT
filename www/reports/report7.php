<?php
/*Подключение библиотек для генерации pdf*/
use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
use Dompdf\Exception;
	
include_once '../php/connect.php' ;
/*Кусок со стилями и т.п берется из html файла*/
$html=file_get_contents('report7.html');

$html.='<div class="simple_table">';
/*Запрос для получения KVINT 2012 (2017...)*/
 $query='SELECT CAPTION_DESC FROM TAST_CAPTION WHERE CAPTION_ID=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)';
    $stid = oci_parse($conn,$query );
    oci_execute($stid);
    $title="";  //хранится KVINT 2012...
    while ($row = oci_fetch_array($stid)) {
      $title=$row[0];
    }
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
    $pp=1;
    /*Добавление шапки отчета*/
    $html.='
  <div style="width:600px; margin:0 auto; text-align: center;"><p class="first">РЕЗУЛЬТАТЫ МЕЖДУНАРОДНОГО КОНКУРСА КОНЬЯКОВ</p><p>"'.$title.'" г. Тирасполь</p></div>';

    for ($j=$array[0]['id'],$k=0;$j<=$array[count($array)-1]['id'];$j++,$k++)
    { 
      /*Перед таблицей для каждой группы вставляем название группы*/
      $html.='<p class="last">'.$array[$k]['title'].'</p>';
       /*Заполнение таблиц*/
      $query='SELECT a.COGNAC_TITLE, 
          a.COGNAC_MANUF, 
          a.COGNAC_AGE, 
          b.PRIZE_TITLE
					FROM TAST_COGNAC a, TAST_PRIZE b  
					WHERE a.COGNAC_GROUP = b.PRIZE_GROUP 
          AND b.PRIZE_TITLE = (SELECT k.PRIZE_TITLE FROM TAST_PRIZE k 
          WHERE (SELECT round(((sum(rating_point)-min(rating_point)-max(rating_point))/(count(rating_point)-2)),2) 
          FROM TAST_RATING WHERE RATING_COGNAC = a.COGNAC_ID) 
          BETWEEN (SELECT p.PRIZE_LOWRANGE FROM TAST_PRIZE p WHERE p.PRIZE_GROUP = a.COGNAC_GROUP AND p.PRIZE_PLACE = k.PRIZE_PLACE) 
          AND (SELECT pl.PRIZE_HIGHRANGE FROM TAST_PRIZE pl WHERE pl.PRIZE_GROUP = a.COGNAC_GROUP AND pl.PRIZE_PLACE = k.PRIZE_PLACE) AND PRIZE_GROUP = a.COGNAC_GROUP)
          AND a.COGNAC_GROUP='.$j.' order by a.COGNAC_CODE'; 
      $stid = oci_parse($conn,$query );
      oci_execute($stid);
      $html.='<table border="1" style="width:100%;">';
      $html.='<th>№<br>п/п</th>'; //столбец для нумерации всех коньяков по порядку
      $html.='<th>№</th>';
      $html.='<th>Наименование</th>'; 
      $html.='<th>Государство, предприятие-изготовитель</th>'; 
      $html.='<th>Возраст, г.</th>'; 
      $html.='<th>Награждение</th>'; 
      /*for ($i = 1; $i-1 < oci_num_fields($stid); $i++) {
        $html.= "<th>";
        //заполнение заголовков таблицы
        $html.= oci_field_name($stid,$i);            
        $html.= "</th>";
      }*/
      $m=1;
      //заполнение таблицы
      while ($row = oci_fetch_array($stid)) {
        $html.= "<tr>";
        $html.="<td>".$pp++."</td>";
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
    //генерация документа с отчетом
    file_put_contents('report_7.html', $html);
    echo $html;

    ?>