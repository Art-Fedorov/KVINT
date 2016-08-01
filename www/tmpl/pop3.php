<div class="b-popup" id="popup3">
  <div class="b-popup-border b-popup-border3">
    <div class="b-popup-header">
  		<label>Призовые места</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<form id="form3" method="POST">
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Номер призового места</span>				
				<input id="popup3-place" type="number" name="d0" class="number-data" style="width: 60px;" step="1" min="1" max="4" value="0">
			</div>
			<div class="b-popup-content-block">
				<span>Группа</span>				
				<select id="popup3-group" style="width: 380px;" name="d1">
					<?php 
					require('../php/selection-create.php');
					$select = new Select();
 					$select->fillselect_1();
					?>
				</select>
			</div>	
			<div class="b-popup-content-block">
				<span>Нижняя граница</span>				
				<input id="popup3-down" type="number" name="d2" class="number-data" style="width: 80px; margin-right: 30px;" step="0.01" min="0" max="10">
				<span>Верхняя граница</span>				
				<input id="popup3-up" type="number" name="d3" class="number-data" style="width: 80px;" step="0.01" min="0" max="10">
			</div>
			<div class="b-popup-content-block">
				<span>Наименование места</span>				
				<select id="popup3-medal" style="width: 285px;" name="d4">
					<option>Золотая медаль</option>
					<option>Серебряная медаль</option>
					<option>Бронзовая медаль</option>
					<option>Диплом участия</option>
				</select>
			</div>					
  	</div>		
  	<div class="b-popup-footer">
  		<span class="smoothly popup-result ok"><i class="fa fa-check"></i>Действие успешно произведено</span>
  		<span class="smoothly popup-result false"><i class="fa fa-check"></i>Действие успешно произведено</span>
			<input type="submit" class="apply3 button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
		</form>  
  </div>
</div>