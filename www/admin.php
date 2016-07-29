<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Справочник</title>
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/admin-page-catalog.css" />
  <link rel="stylesheet" href="css/admin-page-rating.css" />
  <link rel="stylesheet" href="css/admin-page-report.css" />
  <link rel="stylesheet" href="css/admin-float-window.css" />
  <link rel="stylesheet" href="css/admin-page.css" />
  <script src="libs/jquery/jquery-2.1.4.min.js"></script>
  <script src="libs/angular.js"></script>
  <script src="js/common.js"></script>
  <script src="js/admin-catalog-float-window.js"></script>
  <script src="js/select-table-tr.js"></script>
  <script src="js/float-choose.js"></script>
  <script src="js/active-menu.js"></script>
  <script src="js/function_add.js"></script>
  <script src="js/function_del.js"></script>
  <script src="js/function_change.js"></script>
  <script src="js/admin-rating-search-select.js"></script>
</head>
<body>
  <?php
  /*всплывающие окна*/
  //  include_once('php/float-window.php');
  ?>
	<div class="header">
		<div class="container">
			<ul class="main-menu">        
        <li> <a class="admin-link smoothly" href="admin-catalog.php?code=1">Справочники</a>
        </li>
        <li><a class="admin-link smoothly" href="admin-rating.php?code=6">Оценки</a></li>
        <li><a class="admin-link smoothly" href="admin-report.php">Отчеты</a>
        </li>    
        <!--<li><a class="admin-link smoothly" id="first">Всплывающее окно</a></li>-->
      </ul>
			<a class="admin-link smoothly" href="index.php">Выход</a>			
		</div>
	</div>	