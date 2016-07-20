	
  <?php include_once 'admin.php' ?>

	<div class="container">		
		<div class="row headine">
				<div class="col-md-12 col-xs-offset-0 col-xs-12 text-center">
					<h1>Справочник</h1>
				</div>
		</div>
		<div class="row table">
				<div class="col-md-12 col-xs-12 text-center conte">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim repellendus aliquam voluptates quam, error corporis deleniti quo tenetur assumenda ea, excepturi nobis explicabo? Nos	trum dignissimos animi eligendi id totam.		
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim repellendus aliquam voluptates quam, error corporis deleniti quo tenetur assumenda ea, excepturi nobis explicabo? Nostrum dignissimos animi eligendi id totam.	
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim repellendus aliquam voluptates quam, error corporis deleniti quo tenetur assumenda ea, excepturi nobis explicabo? Nostrum dignissimos animi eligendi id totam.
					</p>										
				</div>
        <div class="col-md-12 col-xs-12 text-center conte">
        <nav class="cognacgroup">
            <ul>
              <li><a href="admin-catalog.php?code=TAST_CAPTION" class="smoothly">TAST_CAPTION</a></li>
              <li><a href="admin-catalog.php?code=TAST_COGNAC" class="smoothly">TAST_GOCNAC</a></li>
              <li><a href="admin-catalog.php?code=TAST_GROUP" class="smoothly">TAST_GROUP</a></li>
              <li><a href="admin-catalog.php?code=TAST_MAN" class="smoothly">TAST_MAN</a></li>
              <li><a href="admin-catalog.php?code=TAST_PRIZE" class="smoothly">TAST_PRIZE</a></li>
              <li><a href="admin-catalog.php?code=TAST_RATING" class="smoothly">TAST_RATING</a></li>
            </ul>
          </nav>
          
        <div class="content">
          <div class="left-column col-md-10" style="float: left;">

          <?php 
          require('php/table-create.php');
          if (isset($_GET['code']))
          {
            $code=$_GET['code'];
            $table = new Table();
            $table->filltable($code);    
            }      
          ?>
          </div>
          <div class="right-column col-md-2" style="float: right;">
            <input type="button" class="button-add smoothly btn-right" value="Добавить"></input>
            <input type="button" class="button-re smoothly btn-right" value="Изменить"></input>
            <input type="button" class="button-del smoothly btn-right" value="Удалить"></input>
          </div>
        </div>
      </div>
		</div>
	</div>
</body>
</html>