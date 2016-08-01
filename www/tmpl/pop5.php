<div class="b-popup" id="popup5">
  <div class="b-popup-border b-popup-border5">
  	<div class="b-popup-header">
  		<label>Коньяк</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div>
  	<form id="form5"  method="POST"> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Группа коньяка</span>				
				<select id="popup5-group" name="d6" style="width: 384px;">
					<?php 
					require('../php/selection-create.php');
					$select = new Select();
					$select->fillselect_1();
					?>
				</select>
			</div>
			<div class="b-popup-content-block">
				<span>Шифр коньяка</span>
				<input id="popup5-code" name="d0" type="text" style="width: 80px; margin-right: 20px;" class="input-text textalign-center">
				<span>Возраст (г.)</span>
				<input id="popup5-age" name="d3" type="text" style="width: 90px; pattern="[0-9]{4};" class="input-text textalign-center">
			</div>			
			<div class="b-popup-content-block">
				<span>Наименование коньяка</span> <br>
				<input id="popup5-name" name="d1" type="text" class="input-text"  style="width: 497px; margin-top: 10px;">
			</div>	
			<div class="b-popup-content-block">
				<span>Предприятие изготовитель</span> <br>
				<input id="popup5-manuf" type="text" name="d2" class="input-text"  style="width: 497px; margin-top: 10px;">
			</div>	
			<div class="b-popup-content-block">				
				<span>Кондиция (спирт, %)</span>
				<input id="popup5-cond" type="text" name="d4" style="width: 80px; margin-right: 20px;" class="input-text textalign-center">
				<span>Кондиция (сахар, г/дм<sup>3</sup>)</span>
				<input id="popup5-sugare" type="text" name="d5" style="width: 80px;" class="input-text textalign-center">
			</div>
  	</div>		
  	<div class="b-popup-footer">
  	  <span class="smoothly popup-result ok"><i class="fa fa-check"></i>Действие успешно произведено</span>
  		<span class="smoothly popup-result false"><i class="fa fa-check"></i>Действие успешно произведено</span>
			<input type="submit" class="apply5 button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
		</form>
  </div>
</div>