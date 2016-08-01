  <?php include_once 'admin.php' ?>
	<div class="container">		
		<div class="row headine">
				<div class="col-md-12 col-xs-offset-0 col-xs-12 text-center">
					<h1>Оценки</h1>
				</div>
		</div>
		<div class="row table">
			<div class="col-xs-10 col-md-12 text-center conte">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem enim repellendus aliquam voluptates quam, error corporis deleniti quo tenetur assumenda ea, excepturi nobis explicabo? Nos	trum dignissimos animi eligendi id totam.	
					</p>										
          <hr>
          <div class="b-popup-content-block">
            <span>ФИО Дегустатора</span>
            <select id="search-man-rating" style="width: 380px;" >
            <option value="0">Нет</option>
              <?php 
              require('php/selection-create.php');
              $select = new Select();
              $select->fillselect_2();
              ?>
            </select>
            <span>Шифр коньяка</span>
            <select id="search-cognac-rating" style="width: 100px;">
            <option value="0">Нет</option>
              <?php              
              $select->fillselect_3();
              ?>
            </select>
          </div>  

        <div class="content">
          <div class="left-column col-md-10" style="float: left;">
            <?php               
              include_once('php/fill-table-rating.php'); 
            ?>
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
  <script src="js/admin-rating.js"></script>
</body>
</html>