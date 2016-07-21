<?php if (!empty($_POST))
					{				
							$array=array();
							$i=0;	
							while (isset($_POST['code'.$i]))
							{
								$taster=$_POST['taster'];
								$array[$i]= array('code'=>$_POST['code'.$i],
								'opacity'=>$_POST['opacity'.$i],
								'age'=>$_POST['age'.$i],
								'color'=>$_POST['color'.$i],
								'taste'=>$_POST['taste'.$i],
								'bouquet'=>$_POST['bouquet'.$i],
								'mainpoint'=>$_POST['mainpoint'.$i],
								'note'=>$_POST['note'.$i],
								'typicality'=>$_POST['typicality'.$i]);
								$i++;
							}

							echo "<pre>";
							echo $taster."\n";
							print_r($array);
							echo "</pre>";


							
					}
?>