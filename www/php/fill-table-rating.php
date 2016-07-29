<?php 
$selection_condition='';
if (isset($_GET['selection_condition']))   
  $selection_condition=$_GET['selection_condition'];  


 $code='SELECT RATING_ID, MAN_FIO as "ФИО", COGNAC_CODE as "Шифр", RATING_POINT as "Оценка", RATING_OPACITY as "Прозрачность", RATING_COLOR as "Цвет", RATING_BOUQUET as "Букет", RATING_TASTE as "Вкус",RATING_TYPICALITY as "Типичность",RATING_NOTE as "Примечание" FROM TAST_COGNAC, TAST_RATING, TAST_MAN  where RATING_CAPTION = (SELECT MAX(RATING_CAPTION) FROM TAST_RATING) AND TAST_MAN.MAN_ID = RATING_MAN AND TAST_COGNAC.COGNAC_ID = RATING_COGNAC '
    .$selection_condition. ' order by RATING_COGNAC';
       
  include('table-create.php');
  $table = new Table();
  $table->filltable($code);
 ?>