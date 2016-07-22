<?php 
require('php/table-create.php');
          if (isset($_GET['code']))
          {
            $code=$_GET['code'];
            if($code=='1'){
              $code='SELECT CAPTION_DATEBEG, CAPTION_DATEEND, CAPTION_DESC FROM TAST_CAPTION ';              
            }
            if($code=='2'){
              $code='SELECT GROUP_TITLE, GROUP_PREFIX, GROUP_CAPTION 
              FROM TAST_GROUP e where GROUP_CAPTION = (SELECT MAX(GROUP_CAPTION) FROM TAST_GROUP)';
            }                 
            if($code=='3'){
              $code='SELECT PRIZE_PLACE, group_title, PRIZE_LOWRANGE, PRIZE_HIGHRANGE, PRIZE_TITLE FROM TAST_PRIZE, TAST_GROUP where PRIZE_CAPTION = (SELECT MAX(PRIZE_CAPTION) FROM TAST_PRIZE) and
              GROUP_CAPTION = (SELECT MAX(GROUP_CAPTION) FROM TAST_GROUP) and PRIZE_GROUP = GROUP_ID order by GROUP_ID, PRIZE_PLACE
              ';
            }  
            if($code=='4'){
              $code='SELECT MAN_FIO, MAN_STATUS FROM TAST_MAN where 
              MAN_CAPTION = (SELECT MAX(MAN_CAPTION) FROM TAST_MAN)';
            }  
            if($code=='5'){
              $code='SELECT COGNAC_CODE, COGNAC_TITLE, COGNAC_MANUF, COGNAC_AGE, COGNAC_CONDALC, COGNAC_CONDSUG FROM TAST_COGNAC  where COGNAC_CAPTION = (SELECT MAX(COGNAC_CAPTION) FROM TAST_COGNAC) order by COGNAC_CODE';
            }         
            $table = new Table();
            $table->filltable($code);    
            }     
?> 