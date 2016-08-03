  <?php include_once 'admin.php' ?>
	<div class="container">		
		<div class="row headine">
				<div class="col-md-12 col-xs-offset-0 col-xs-12 text-center">
					<h1>Отчеты</h1>
				</div>
		</div>
		<div class="row">
				<div class="col-md-12 text-center">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim repellendus aliquam voluptates quam, error corporis deleniti quo tenetur assumenda ea, excepturi nobis explicabo? Nos	trum dignissimos animi eligendi id totam.	
					</p>
				</div>				
		</div>
		<div class="row">
			<div class="col-md-12">	
				<div class="report-place report-place-min text-center">
					<p>Список образцов</p>
					<select id="report-sample-list" class="report-select" style="width: 400px;">            
            <?php  
            require('php/selection-create.php');
            $select = new Select();            
            $select->fillselect_1();
            ?>
           </select><br>
					<button id="load-report-1" class="load-report">Просмотреть</button>
					<a href="admin-report.php?asd=1"></a>
					<?php 
						/*use Dompdf\Adapter\CPDF;      
						use Dompdf\Dompdf;
						use Dompdf\Exception;
						require_once("reports/dompdf/autoload.inc.php");
				    $dompdf = new DOMPDF();// Создаем обьект
				    $dompdf->load_html($html); // Загружаем в него наш html код
				    $dompdf->render(); // Создаем из HTML PDF
				    //$dompdf->stream('mypdf.pdf'); // Выводим результат (скачивание)
				    $output = $dompdf->output();
				    echo $html;
				    file_put_contents('Brochure.pdf', $output);*/
					 ?>
				</div>					
			</div>
		</div>	
		<hr>
		<div class="row">
			<div class="col-md-12">	
				<div class="report-place report-place-min text-center">
					<p>Оценки жури по всем коньякам</p>					
					<button id="load-report-2" class="load-report">Просмотреть</button>
				</div>		
				<div class="report-place report-place-min text-center">
					<p>Оценки жури по всем группам</p>					
					<button id="load-report-3" class="load-report">Просмотреть</button>
				</div>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">	
				<div class="report-place report-place-min text-center">
					<p>Результаты (с уточнением по группам)</p>		
					<select id="report-result-group" class="report-select" style="width: 400px;">            
            <?php                   
            $select->fillselect_1();
            ?>
           </select><br>			
					<button id="load-report-4" class="load-report">Просмотреть</button>
				</div>					
				<div class="report-place report-place-min text-center">
					<p>Результаты (с учетом отклонений по группам)</p>		
					<select id="report-deviation-group" class="report-select" style="width: 400px;">            
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
			<div class="col-md-12">	
				<div class="report-place report-place-min text-center">
					<p>Результаты (конечные в разделе групп)</p>					
					<button id="load-report-6" class="load-report">Просмотреть</button>
				</div>	
				<div class="report-place report-place-min text-center">
					<p>Результаты (суммарная таблица)</p>					
					<button id="load-report-7" class="load-report">Просмотреть</button>				</div>				
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/admin-report.js"></script>
</body>
</html>