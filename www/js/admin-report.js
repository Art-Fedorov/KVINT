$(function(){
	$('#load-report-1').click(function(){
		var group_id=$('select#report-sample-list option:selected').attr('value');
		var group_prefix=$('select#report-sample-list option:selected').attr('data-value');
		$.ajax({
			url:"../reports/report1.php",
			type:"GET",
			data:{
				'group_id':group_id,
				'group_prefix':group_prefix
			},
			success:function(data){
				console.log(data);
				}
		})
	});
})