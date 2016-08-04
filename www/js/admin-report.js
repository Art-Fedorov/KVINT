$(function(){
	$('#load-report-1').click(function(){
		var group_id=$('select#report-sample-list option:selected').attr('value');
		$.ajax({
			url:"../reports/report1.php",
			type:"GET",
			success:function(data){
					//window.location.href = "reports/report_1.html";
					window.open("reports/report_1.html");
				}
		})
	});
	$('#load-report-2').click(function(){
		var group_id=$('select#report-sample-list option:selected').attr('value');
		$.ajax({
			url:"../reports/report2.php",
			type:"GET",
			success:function(data){
					//window.location.href = "reports/report_2.html";
					window.open("reports/report_2.html");
				}
		})
	});
	$('#load-report-7').click(function(){
		$.ajax({
			url:"../reports/report7.php",
			type:"GET",
			success:function(data){
				console.log(data);
				}
		})
	});
	$('#load-report-6').click(function(){
		$.ajax({
			url:"../reports/report6.php",
			type:"GET",
			success:function(data){
				console.log(data);
				}
		})
	});
	$('#load-report-5').click(function(){
		var group_id=$('select#report-result-group option:selected').attr('value');
		var group_text=$('select#report-result-group option:selected').text();
		$.ajax({
			url:"../reports/report5.php",
			type:"GET",
			data:{
				'group_id':group_id,
				'text':group_text
			},
			success:function(data){
				console.log(data);
				}
		})
	});
})