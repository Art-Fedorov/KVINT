  <?php include_once 'admin.php' ?>
	<div class="container">		
		<div class="row headine">
				<div class="col-md-12 col-xs-offset-0 col-xs-12 text-center">
					<h1>Отчеты</h1>
				</div>
		</div>		
		<div class="row">
			<div class="col-md-6 text-center report-place-padding">				
				<div class="report-place text-center">
					<p>Список образцов</p>					
					<button id="load-report-1" class="load-report">Просмотреть</button>
					<a href="admin-report.php?asd=1"></a>					
				</div>	
			</div>
			<div class="col-md-6 text-center report-place-padding">		
				<div class="report-place text-center">
					<p>Оценки жюри по всем коньякам</p>					
					<button id="load-report-2" class="load-report">Просмотреть</button>
				</div>	
			</div>		
		</div>	
		<hr>
		<div class="row">
			<div class="col-md-6 text-center report-place-padding">			
				<div class="report-place text-center">
					<p>Оценки жюри по всем группам</p>		
					<select id="report-sample-list" class="report-select" style="width: 400px;">            
            <?php  
            require('php/selection-create.php');
            $select = new Select();            
            $select->fillselect_1();
            ?>
           </select><br>			
					<button id="load-report-3" class="load-report">Просмотреть</button>
				</div>	
			</div>
			<div class="col-md-6 text-center report-place-padding">
				<div class="report-place text-center">
					<p>Результаты (с уточнением по группам)</p>		
					<select id="report-result-group" class="report-select" style="width: 400px;">            
            <?php                   
            $select->fillselect_1();
            ?>
           </select><br>			
					<button id="load-report-5" class="load-report">Просмотреть</button>
				</div>	
			</div>		
		</div>
		<hr>		

		<div class="row">			
			<div class="col-md-6 text-center report-place-padding">
				<div class="report-place text-center">
					<p>Результаты (конечные в разделе групп)</p>					
					<button id="load-report-6" class="load-report">Просмотреть</button>
				</div>	
			</div>
			<div class="col-md-6 text-center report-place-padding">
				<div class="report-place text-center">
					<p>Результаты (суммарная таблица)</p>					
					<button id="load-report-7" class="load-report">Просмотреть</button>
				</div>				
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/admin-report.js"></script>
</body>
</html>