<?php

/*Подключение библиотек для генерации pdf*/
use Dompdf\Adapter\CPDF;      
use Dompdf\Dompdf;
use Dompdf\Exception;

/*ОТЧЕТ Список образцов*/
include_once '../php/connect.php' ;		

/*проверка на наличие поступивших данных ajax для выбора по группам*/
if (isset($_GET['group_id']))
{
  $group_id = $_GET['group_id'];
   /*Кусок со стилями и т.п берется из html файла*/
  $html=file_get_contents('report5.html');

$html.='<div class="simple_table">';
/*Запрос для получения KVINT 2012 (2017...)*/
 $query='SELECT CAPTION_DESC FROM TAST_CAPTION WHERE CAPTION_ID=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)';
    $stid = oci_parse($conn,$query );
    oci_execute($stid);
    $title=""; //хранится KVINT 2012...
    while ($row = oci_fetch_array($stid)) {
      $title=htmlentities($row[0], ENT_QUOTES, 'cp1251');
    }
    /*Добавление шапки отчета*/
     $html.='
<div style="width:600px; margin:0 auto; text-align: center;"><p class="first">РЕЗУЛЬТАТЫ МЕЖДУНАРОДНОГО КОНКУРСА КОНЬЯКОВ</p><p>"'.$title.'" г. Тирасполь</p><p>Итоговоя таблица результатов дегустации</p></div>';

  /*вывод выбранной группы по которой фомрируется отчет*/
  $html.='<p class="last"> Группа: '.$_GET['text'].'</p>';

  /*запрос на формирование выборки по конкретной группе*/
  $query="SELECT cognac_code, cnt0, avg0, a.prize_title, cnt1, avg1, b.prize_title from ( select count(rating_id) as cnt0, count(rating_id)-2 as cnt1, round(avg(rating_point),2) as avg0, round(((sum(rating_point)-min(rating_point)-max(rating_point))/(count(rating_point)-2)),2) as avg1, rating_cognac, (select cognac_group from tast_cognac where cognac_id=rating_cognac and cognac_caption=(select max(caption_id) from tast_caption)) as cg from tast_rating where rating_caption=(select max(caption_id) from tast_caption) group by rating_cognac) tr, tast_prize a, tast_prize b, tast_cognac where a.prize_group=tr.cg and b.prize_group=tr.cg and avg0>=a.prize_lowrange and avg0<=a.prize_highrange and avg1>=b.prize_lowrange and avg1<=b.prize_highrange and substr(cognac_code,1,2)='".$group_id."' and tr.rating_cognac=tast_cognac.cognac_id order by cognac_code";
    echo $query;
  $stid = oci_parse($conn,$query );
  oci_execute($stid); //выполнение запроса
  $html.='<table border="1" style="width:100%;">';
  $html.='<th>№</th>'; //добавление новог столбца в таблице - номер
  /*заполнение заголовков таблицы*/
  $html.='<th>Шифр</th>'; 
  $html.='<th>Количество оценок</th>'; 
  $html.='<th>Средний балл</th>'; 
  $html.='<th>Награда</th>'; 
  $html.='<th>Количество оценок</th>'; 
  $html.='<th>Средний балл</th>';
  $html.='<th>Награда</th>';  
  /*
  for ($i = 1; $i-1 < oci_num_fields($stid); $i++) {
    $html.= "<th>";
    $html.= oci_field_name($stid,$i);            
    $html.= "</th>";
  }*/
  $m=1;
  //заполнение таблицы
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
/*Генерация html документа*/
file_put_contents('report_5.html', $html);
echo $html;
  }
?>