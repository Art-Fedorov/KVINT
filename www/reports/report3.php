<?php 
include_once '../php/connect.php' ;
    /*Отчет оценки жюри по группам*/
    if (isset($_GET['group_id']))
    {
      $text = $_GET['text'];//Group_title
      $group_id = $_GET['group_id'];//group_id
      $html=file_get_contents('report3.html');

      /*KVINT 2012*/
      $query='SELECT CAPTION_DESC FROM TAST_CAPTION WHERE CAPTION_ID=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)';
      $stid = oci_parse($conn,$query );
      oci_execute($stid);
      $title="";
      while ($row = oci_fetch_array($stid)) {
        $title=$row[0];
      }
      /*Шапка отчета*/
      $html.='<p>МЕЖДУНАРОДНЫЙ КОНКУРС КОНЬЯКОВ "'.$title.'" г. Тирасполь</p><p>Итог	овая таблица результатов дегустации</p><p>'.$text.'</p>';

      /*Жюри для хедера таблицы*/
      $query='SELECT MAN_ID,MAN_FIO from TAST_MAN WHERE MAN_CAPTION=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION)';
      $array=array();
      $stid = oci_parse($conn,$query );
      oci_execute($stid);
      $x=0;
      $point="";
      while ($row = oci_fetch_array($stid)) {
        $array[$x++]=array('id'=>$row[0],'title'=> $row[1]);
        $point.=$row[0].',';
      }
      /*$point для вставки в pivot query*/
      $point=substr($point, 0, -1);
      /*Построение таблицы*/
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
                where rating_caption=(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION) and rating_cognac in 
                (select cognac_id from tast_cognac where 
                cognac_group='.$group_id.')
            ) r
        )
     ) pivot (
              max(point)
              for man_id in ('.$point.')
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
        }
        else  {$html.=oci_field_name($stid,$i);}
        $html.= "</th>";
      }
      while ($row = oci_fetch_array($stid)) {
        $html.= "<tr>";
        for ($i = 0; $i < oci_num_fields($stid); $i++) {
           $html.= '<td>';
           $html.=  $row[$i];
           $html.= '</td>';
        }
        $html.= "</tr>";
      }
      $html.='</table>';          
    
    $html.= "</div>\n";  
    $html.="</body></html>";
    
    file_put_contents('report_3.html', $html);
  }
 ?>