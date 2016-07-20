<?php	
$conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
					if (!$conn) {
    				$e = oci_error();
    				trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
					}
					if (isset($_GET['code']))
					{
						$code=$_GET['code'];
						$query='SELECT COGNAC_CODE,COGNAC_AGE FROM TAST_COGNAC WHERE COGNAC_CAPTION=63 AND COGNAC_CODE like \''.$code.'%\' ORDER BY COGNAC_CODE';
						$stid = oci_parse($conn,$query );
						oci_execute($stid);
						echo "<div class=\"group\">\n";
						$i=0;
						while ($row = oci_fetch_array($stid)) {
							echo "<form action=\"ajaxRow.php\" class=\"rowrate\" id='form$i'>";
						    echo "<p code=\"p".$i."\">\n".htmlentities('Код коньяка:', ENT_QUOTES, 'cp1251');
						    echo $row[0] !== null ? htmlentities($row[0], ENT_QUOTES, 'cp1251') : "";
						    echo "</p>\n";
						    echo "<p name=\"age".$i."\">\n".htmlentities('Возраст коньяка:', ENT_QUOTES, 'cp1251');
						    echo $row[1] !== null ? htmlentities($row[1], ENT_QUOTES, 'cp1251') : "";
						    echo "</p>\n";
						    echo '<div class="cellrate"><span>'.htmlentities('Прозрачность', ENT_QUOTES, 'cp1251').'</span><input type="number" name="opacity" required min="0" max="0.5" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('Цвет', ENT_QUOTES, 'cp1251').'</span><input type="number" name="color" required min="0" max="0.5" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('Букет', ENT_QUOTES, 'cp1251').'</span><input type="number" name="bouquet" required min="0" max="3.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('Вкус', ENT_QUOTES, 'cp1251').'</span><input type="number" name="taste" required min="0" max="5.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('Типичность', ENT_QUOTES, 'cp1251').'</span><input type="number" name="typicality" required min="0" max="1.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('Общий балл', ENT_QUOTES, 'cp1251').'</span><input type="number" name="mainball" required min="0" max="10.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('Примечания', ENT_QUOTES, 'cp1251').'</span><input type="text" name="notes"></div>';
						    echo '<button type="submit" class="secure" name="submit">'.htmlentities('Закрепить', ENT_QUOTES, 'cp1251').'</button>';
						    echo "</div>";
						    $i++;
					}
					echo "</div>\n";
					}
					
					?>