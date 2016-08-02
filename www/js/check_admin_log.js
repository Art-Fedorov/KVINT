 $(document).ready(function(){
    $('#btn_admin_enter').click(function(){
      log_admin();      
    });   
  });

function log_admin(){	
	var login = $("#login-admin").val();
  var password = $("#password-admin").val();  
  var flag_log = false;
	$.ajax({ 
	  type:'POST', 
	  url:'config.php', 
	  data:{   
	  'login':login,
	  'password':password  
	  }, 
	  response:'text', 
	  success:function(data){
	  	console.log(data);
	  		if(data == '1'){
	  			document.location.href = "admin-catalog.php?code=1";	  			
	  		}
	  		else {
	  			$("#login-admin").val("");
 					$("#password-admin").val(""); 					
	  		}
	  }
	});
}