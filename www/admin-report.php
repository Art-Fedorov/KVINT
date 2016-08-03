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
				<div class="report-place">
					<span>Список образцов</span><br>
					<select id="report-sample-list" style="width: 400px;">            
            <?php  
            require('php/selection-create.php');
            $select = new Select();            
            $select->fillselect_1();
            ?>
           </select><br>
					<button id="load-report-1" class="load-report">Просмотреть</a>
				</div>					
			</div>
		</div>	
	</div>
</body>
</html>