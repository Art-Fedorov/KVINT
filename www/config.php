<?php

	

	function control_admin ($log, $pass){
		$admin_password = 'tast';
	$admin_login = 'kvint';
		if ($admin_password == $pass && $admin_login == $log) echo '1';
		else echo '0';
		//echo $log." ".$pass." ||| ".$admin_password." ".$admin_login;
	}

if (!empty($_POST))
	{		
		$log=$_POST['login'];
		$pass=$_POST['password'];
		//$control = new Config();
    control_admin($log, $pass);
	}

?>