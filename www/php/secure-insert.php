<?php if (!empty($_POST))
					{				
							$array=array();
							$i=0;	
							$taster=$_POST['taster'];
							while (isset($_POST['id'.$i]))
							{
								$array[]= array(								
								'cognac_id'=>$_POST['id'.$i],
								'opacity'=>$_POST['opacity'.$i],
								'color'=>$_POST['color'.$i],
								'taste'=>$_POST['taste'.$i],
								'bouquet'=>$_POST['bouquet'.$i],
								'mainpoint'=>$_POST['mainpoint'.$i],
								'note'=>$_POST['note'.$i],
								'typicality'=>$_POST['typicality'.$i]);
								$query = 'INSERT INTO TAST_RATING (RATING_MAN,RATING_COGNAC,RATING_CAPTION,RATING_POINT,RATING_OPACITY,RATING_COLOR,RATING_BOUQUET,RATING_TASTE,RATING_TYPICALITY,RATING_NOTE) VALUES ('.$taster.','.$array[$i]['cognac_id'].',(SELECT MAX(CAPTION_ID) FROM TAST_CAPTION),'.$array[$i]['mainpoint'].','.$array[$i]['opacity'].','.$array[$i]['color'].','.$array[$i]['bouquet'].','.$array[$i]['taste'].','.$array[$i]['typicality'].',N\''.$array[$i]['note'].'\')';
								$stid = oci_parse($conn,$query);
								$i++;
								oci_execute($stid);
							}
							oci_commit($conn);

							/*if (!$r) {
							    $e = oci_error($conn);
							    trigger_error(htmlentities($e['message']), E_USER_ERROR);
							}*/
						}
		function debug( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log(" . implode($data) . " );</script>";
    else
        $output = "<script>console.log(". $data.");</script>";

    echo $output;
}
?>