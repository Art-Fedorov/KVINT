<?php 
  $conn = oci_connect('TASTING', '1111', 'ora2.kvint.md/UNIACC', 'CL8MSWIN1251');
          if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES, 'cp1251'), E_USER_ERROR);
          }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Справочник</title>
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/fonts.css" />
  <link rel="stylesheet" href="css/admin-page-catalog.css" />
  <link rel="stylesheet" href="css/admin-page-rating.css" />
  <link rel="stylesheet" href="css/admin-page-report.css" />
  <link rel="stylesheet" href="css/admin-page.css" />
  <script src="libs/jquery/jquery-2.1.4.min.js"></script>
  <script src="libs/angular.js"></script>
  <script src="js/common.js"></script>
</head>
<body>  
	<div class="header">
		<div class="container">
			<ul class="main-menu">        
        <li> <a class="admin-link smoothly" href="admin-catalog.php">Справочники</a>
            <!--<ul class="sub-menu sub-menu-directory">
              <li><input type="submit" class="list-admin smoothly" value="Справочник дегустаций"></submit></li>
              <li><input type="submit" class="list-admin smoothly" value="Справочник групп"></input></li>
              <li><input type="submit" class="list-admin smoothly" value="Справочник призовых мест"></input></li>
              <li><input type="submit" class="list-admin smoothly" value="Справочник дегустаторов"></input></li>
              <li><input type="submit" class="list-admin smoothly" value="Справочник коньяков"></input></li>
            </ul>
            -->
        </li>
        <li><a class="admin-link smoothly" href="admin-rating.php">Оценки</a></li>
        <li><a class="admin-link smoothly" href="admin-report.php">Отчеты</a>
            <!--<ul class="sub-menu sub-menu-report">
              <li><input type="submit" class="list-admin smoothly" 
              value="Дегустационный лист (рус)"></input></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Дегустационный лист (анг)"></input></li>              
              <li><input type="submit" class="list-admin smoothly" 
              value="Список образцов"></input></li>							
              <li><input type="submit" class="list-admin smoothly" 
              value="Оценки жури по всем коньякам"></input></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Оценки жури по группам"></input></li>             
              <li><input type="submit" class="list-admin smoothly" 
              value="Результаты ( с уточнениями по группам )"></input></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Результаты ( конечные в разрезе групп )"></input></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Результаты ( суммарная таблица )"></input></li>
              <li><input type="submit" class="list-admin smoothly" 
              value="Результаты ( с учетом отклонений по группам )"></input></li>
            </ul>
            -->
        </li>
      </ul>
			<a class="admin-link smoothly" href="index.php">Выход</a>			
		</div>
	</div>	