 //функции аутентификации админа
 $(document).ready(function(){
    $('#btn_admin_enter').click(function(){
      log_admin();      
    });   
    $('#cancel-admin').click(function(){
      cancel_admin();      
    });
  });
//аутентификация админа
function log_admin(){	
	//полуцчение введенных данных админа
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
	  		//проверка на совпадение пароля и логина
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

function cancel_admin(){
	//переход обратно к дегустации
	document.location.href = "index.php";	
}