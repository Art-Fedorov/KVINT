<?php
class Config {	
	protected  $admin_password = 'tast';	
	protected  $admin_login = 'kvint'; 
	
	function control_admin ($log, $pass){		
		if ($this->admin_password == $pass && $this->admin_login == $log) 
			echo '1';
		else echo '0';
	}
}
if (!empty($_POST))
	{		
		$log=$_POST['login'];
		$pass=$_POST['password'];
		$control = new Config();
    $control -> control_admin($log, $pass);
	}

?>