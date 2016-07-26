<?php 
require('php/selection-create.php');
 $select = new Select();
 if ($sect=='1'){
 $select->fillselect_1();   
} else if ($sect == '2'){
 $select->fillselect_2();
}else if ($sect == '3'){
 $select->fillselect_3();
}
?>