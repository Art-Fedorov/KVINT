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
							echo "<div class=\"rowrate\" id='form$i'>";
						    echo "<p code=\"p".$i."\">\n".htmlentities('��� �������:', ENT_QUOTES, 'cp1251');
						    
						    if ($row[0] !== null)
						    {
						    echo htmlentities($row[0], ENT_QUOTES, 'cp1251');
echo '<input type="hidden" name="code'.$i.'" value="'.htmlentities($row[0], ENT_QUOTES, 'cp1251').'"';
						  		} else echo "";
						    echo "</p>\n";
						    echo "<p name=\"a".$i."\">\n".htmlentities('������� �������:', ENT_QUOTES, 'cp1251');
						    if ($row[1] !== null)
						    {
						    echo htmlentities($row[1], ENT_QUOTES, 'cp1251');
								echo '<input type="hidden" name="age'.$i.'" value="'.htmlentities($row[1], ENT_QUOTES, 'cp1251').'"';
						  		} else echo "";
						    echo "</p>\n";
						    echo '<div class="cellrate"><span>'.htmlentities('������������', ENT_QUOTES, 'cp1251').'</span><input type="number" name="opacity'.$i.'" min="0" max="0.5" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('����', ENT_QUOTES, 'cp1251').'</span><input type="number" name="color'.$i.'" min="0" max="0.5" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('�����', ENT_QUOTES, 'cp1251').'</span><input type="number" name="bouquet'.$i.'" min="0" max="3.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('����', ENT_QUOTES, 'cp1251').'</span><input type="number" name="taste'.$i.'" min="0" max="5.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('����������', ENT_QUOTES, 'cp1251').'</span><input type="number" name="typicality'.$i.'" min="0" max="1.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('����� ����', ENT_QUOTES, 'cp1251').'</span><input type="number" name="mainpoint'.$i.'" min="0" max="10.0" step="0.05"></div>';
						    echo '<div class="cellrate"><span>'.htmlentities('����������', ENT_QUOTES, 'cp1251').'</span><input type="text" name="note'.$i.'"></div>';
						    
						    echo "</div>";
						    $i++;
					}
					echo "</div>\n";
					}
					
					?>