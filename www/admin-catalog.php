	
  <?php include_once 'admin.php' ?>

	<div class="container">		
		<div class="row headine">
				<div class="col-md-12 col-xs-offset-0 col-xs-12 text-center">
					<h1>Справочник</h1>
				</div>
		</div>
		<div class="row table">						
        <div class="col-md-12 col-xs-12 text-center conte">
        <nav class="cognacgroup">
            <ul>
              <li><a href="admin-catalog.php?code=1" class="smoothly">Справочник дегустаций</a></li>
              <li><a href="admin-catalog.php?code=2" class="smoothly">Справочник групп</a></li>
              <li><a href="admin-catalog.php?code=3" class="smoothly">Справочник призовых мест</a></li>
              <li><a href="admin-catalog.php?code=4" class="smoothly">Справочник дегустаторов</a></li>
              <li><a href="admin-catalog.php?code=5" class="smoothly">Справочник коньяков</a></li>              
            </ul>
        </nav> 
        <div class="content">
          <div class="left-column col-md-10" style="float: left;">
            <?php include_once('php/fill-table.php'); ?>
          </div>              
          <div class="right-column col-md-2 col-xs-2 aside" style="float: right;">
            <div class="sticky-block">
              <div class="inner">
                <input type="button" id="right-column-button-add" class="button-add smoothly btn-right" value="Добавить"></input>
                <input type="button" id="right-column-button-re" class="button-re smoothly btn-right" value="Изменить"></input>
                <input type="button" id="right-column-button-del" class="button-del smoothly btn-right" value="Удалить"></input>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
	</div>
  
</body>
</html>