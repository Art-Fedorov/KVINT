<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Главная</title>
	<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 	<link rel="stylesheet" href="css/fonts.css" />
	<link rel="stylesheet" href="css/admin-page.css" />
  <script src="libs/jquery/jquery-2.1.4.min.js"></script>
	<script src="libs/angular.js"></script>
	<script src="js/common.js"></script>
</head>
<body>	
	<div class="header">
		<div class="container">
			<ul class="main-menu">        
        <li class="admin-link smoothly"> <a href="#directory">Справочники</a>
            <ul class="sub-menu sub-menu-directory">
              <li><input type="submit" class="list-admin smoothly" value="Справочник дегустаций"></submit></li>           
              <li class="separator"></li>   
              <li><input type="submit" class="list-admin smoothly" value="Справочник групп"></input></li>
              <li><input type="submit" class="list-admin smoothly" value="Справочник призовых мест"></input></li>
              <li><input type="submit" class="list-admin smoothly" value="Справочник дегустаторов"></input></li>
              <li><input type="submit" class="list-admin smoothly" value="Справочник коньяков"></input></li>
            </ul>
        </li>
        <li class="list-report-button" ><input class="list-report smoothly" type="submit" value="Оценки"></input></li>
        <li class="admin-link smoothly"><a href="#report">Отчеты</a>
            <ul class="sub-menu sub-menu-report">
              <li><input type="submit" class="list-admin smoothly" 
              value="Дегустационный лист (рус)"></input></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Дегустационный лист (анг)"></input></li>
              <li class="separator"></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Список образцов"></input></li>
							<li class="separator"></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Оценки жури по всем коньякам"></input></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Оценки жури по группам"></input></li>
              <li class="separator"></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Результаты ( с уточнениями по группам )"></input></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Результаты ( конечные в разрезе групп )"></input></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Результаты ( суммарная таблица )"></input></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Результаты ( с учетом отклонений по группам )"></input></li>
            </ul>
        </li>
      </ul>
			<a class="admin-link smoothly" href="index.php">Выход</a>			
		</div>
	</div>
	<div class="container">		
		<div class="row headine">
				<div class="col-md-12 col-xs-offset-0 col-xs-12 text-center">
					<h1>Дегустация</h1>
				</div>
		</div>
		<div class="row table">
				<div class="col-xs-offset-1 col-xs-10 text-center conte">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim repellendus aliquam voluptates quam, error corporis deleniti quo tenetur assumenda ea, excepturi nobis explicabo? Nos	trum dignissimos animi eligendi id totam.		
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim repellendus aliquam voluptates quam, error corporis deleniti quo tenetur assumenda ea, excepturi nobis explicabo? Nostrum dignissimos animi eligendi id totam.	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim repellendus aliquam voluptates quam, error corporis deleniti quo tenetur assumenda ea, excepturi nobis explicabo? Nostrum dignissimos animi eligendi id totam.
					</p>					
					<button class="btn">Дегустация</button>
				</div>
		</div>
	</div>
</body>
</html>