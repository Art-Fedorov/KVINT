<?php 

if (isset($_GET['code']))
{
  $code=$_GET['code'];
  if($code=='1'){
    $code='SELECT CAPTION_ID, CAPTION_DATEBEG as "Начало", CAPTION_DATEEND as "Окончание", CAPTION_DESC as "Описание" FROM TAST_CAPTION ';
  }
  if($code=='2'){
    $code='SELECT GROUP_ID, GROUP_TITLE as "Наименование", GROUP_PREFIX as "Префикс" FROM TAST_GROUP e where GROUP_CAPTION = (SELECT MAX(GROUP_CAPTION) FROM TAST_GROUP)';
  }                 
  if($code=='3'){
    $code='SELECT PRIZE_GROUP, PRIZE_PLACE as "Место", group_title as "Наименование", PRIZE_LOWRANGE as "Нижняя оценка", PRIZE_HIGHRANGE as "Верхняя оценка", PRIZE_TITLE as "Медаль" FROM TAST_PRIZE, TAST_GROUP where PRIZE_CAPTION = (SELECT MAX(PRIZE_CAPTION) FROM TAST_PRIZE) and
    GROUP_CAPTION = (SELECT MAX(GROUP_CAPTION) FROM TAST_GROUP) and PRIZE_GROUP = GROUP_ID order by GROUP_ID, PRIZE_PLACE
    ';
  }  
  if($code=='4'){
    $code='SELECT MAN_ID, MAN_FIO as "ФИО", MAN_STATUS as "Должность", MAN_PIN as "PIN" FROM TAST_MAN where 
    MAN_CAPTION = (SELECT MAX(MAN_CAPTION) FROM TAST_MAN)';
  }  
  if($code=='5'){
    $code='SELECT COGNAC_ID, COGNAC_CODE as "Код", COGNAC_TITLE as "Название", COGNAC_MANUF as "Группа", COGNAC_AGE as "Возраст", COGNAC_CONDALC as "Кондиция", COGNAC_CONDSUG as "Сахар" FROM TAST_COGNAC  where COGNAC_CAPTION = (SELECT MAX(COGNAC_CAPTION) FROM TAST_COGNAC) order by COGNAC_CODE';
  }        
  include('table-create.php');
  $table = new Table();
  if (isset($_GET['tr_id'])&& isset($_GET['tr_id_help'])){
    echo $_GET['tr_id']." a ".$_GET['tr_id_help'];
    $table->filltable($code,$_GET['tr_id'],$_GET['tr_id_help']);
  }
  else
    {$table->filltable($code);   }
  }     
?> 