<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Аутентификация</title>
	<link rel="stylesheet" href="css/main-page.css" />
	<link rel="stylesheet" href="css/taster-page.css" />
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="libs/jquery/jquery-2.1.4.min.js"></script>
	<script src="libs/angular.js"></script>
	<script src="js/check_admin_log.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
		<button class="cancel-admin smoothly" name="Exit" id="exit">&#215;</button>
			<div class="col-md-4 col-md-offset-4 pin">
				<div class="text-center">	
					<span class="text-info">Для доступа к панели администратора необходимо ввести логин и пароль (если чё, то он в файле config)</span><br><br><br>
					<input id="login-admin" class="login-admin" type="text" placeholder="login">
					<input id="password-admin" class="password-admin" type="password" placeholder="password">
					<br><br>
					<button id="btn_admin_enter" class="btn_admin_enter smoothly">Войти</button>
				</div>
			</div>	
		</div>	
	</div>			
</body>
</html>