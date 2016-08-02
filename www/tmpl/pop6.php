<div class="b-popup" id="popup6">
  <div class="b-popup-border b-popup-border6">
  	<div class="b-popup-header">
  		<label>Оценки коньяка</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<form id="form6" method="POST">
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>ФИО Дегустатора</span>
				<select id="popup6-fio" name="d0" style="width: 300px; margin-right: 20px;">
					<?php 
					require('../php/selection-create.php');
					$select = new Select();
					$select->fillselect_2();					
					?>
				</select>
				<span>Шифр коньяка</span>
				<select id="popup6-code" name="d1">
					<?php 
					$select->fillselect_3();					
					?>
				</select>
			</div>
			<div class="b-popup-content-block">				
				<span>Прозрачность</span>
				<input name="d3" id="popup6-opacity" type="number" class="input-text-short text-center"  step="0.01" min="0" max="0.5" >
				<span>Цвет</span>
				<input name="d4" id="popup6-color" type="number" class="input-text-short text-center" step="0.01" min="0" max="0.5">
				<span>Вкус</span>
				<input name="d5" id="popup6-taste" type="number" class="input-text-short text-center" step="0.01" min="0" max="3.0">
				<span>Букет</span>
				<input name="d6" id="popup6-buk" type="number" class="input-text-short text-center" step="0.01" min="0" max="5.0">			
				<span>Типичность</span>
				<input name="d7" id="popup6-type" type="number" class="input-text-short text-center" step="0.01" min="0" max="1.0">			
			</div>			
			<div class="b-popup-content-block">				
				<span>Примечание</span>
				<input name="d8" id="popup6-desc" type="text" class="input-text" style="width: 350px; margin-right: 28px;">
				<span>Итоговая оценка</span>
				<input name="d2" id="popup6-grade" type="button" value="0" class="final-grade"></span>
			</div>			
  	</div>		
  	<div class="b-popup-footer">
  		<span class="smoothly popup-result ok"><i class="fa fa-check"></i>Действие успешно произведено</span>
  		<span class="smoothly popup-result false"><i class="fa fa-check"></i>Действие успешно произведено</span>
			<input type="submit" class="apply6 button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
		</form>
  </div>
</div>