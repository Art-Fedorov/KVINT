<!--всплывающее окно 1*/-->
<div class="b-popup" id="popup1">
  <div class="b-popup-border b-popup-border1">    
  	<div class="b-popup-header">
  		<label>Проведение дегустации</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<form id="form1">
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Начало дегустации</span>
				<input id="popup1-date1" name="d0" type="date" class="input-date"></input>
			</div>
			<div class="b-popup-content-block">
				<span>Конец дегустации</span>
				<input  id="popup1-date2" name="d1" type="date" class="input-date">
			</div>
			<div class="b-popup-content-block">				
				<p>Описание дегустации</p>			
				<textarea  id="popup1-desc" name="d2" class="textarea-input" rows="2" cols="48">
				</textarea> 
			</div>			
  	</div>		
  	<div class="b-popup-footer">
			<input type="submit" class="apply button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
		</form>
  </div>  
</div>

<!--всплывающее окно 2*/-->
<div class="b-popup" id="popup2">
  <div class="b-popup-border b-popup-border2">
  	<div class="b-popup-header">
  		<label>Группа </label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<form id="form2">
  	<div class="b-popup-content">  		
			<div class="b-popup-content-block">
				<span>Префикс группы</span>
				<input id="popup2-prefix" type="text" name="d1" class="input-text textalign-center"  style="width: 80px;">
			</div>		
			<div class="b-popup-content-block">
  			<p>Наименование группы</p>
				<input id="popup2-group" type="text" name="d0" class="input-text" style="width: 400px;"></input>
			</div>			
  	</div>		
  	<div class="b-popup-footer">
			<input type="submit" class="apply button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
		</form>
  </div>
</div>

<!--всплывающее окно 3*/-->
<div class="b-popup" id="popup3">
  <div class="b-popup-border b-popup-border3">
    <div class="b-popup-header">
  		<label>Призовые места</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<form id="form3">
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Номер призового места</span>				
				<input id="popup2-num" type="number" name="d0" class="number-data" style="width: 60px;" step="1" min="0" max="4" value="0">
			</div>
			<div class="b-popup-content-block">
				<span>Группа</span>				
				<select style="width: 380px;" name="d1">
					<?php 
					require('php/selection-create.php');
					$select = new Select();
 					$select->fillselect_1();
					?>
				</select>
			</div>	
			<div class="b-popup-content-block">
				<span>Нижняя граница</span>				
				<input type="number" name="d2" class="number-data" style="width: 80px; margin-right: 30px;" step="0.01" min="0" max="10">
				<span>Верхняя граница</span>				
				<input type="number" name="d3" class="number-data" style="width: 80px;" step="0.01" min="0" max="10">
			</div>
			<div class="b-popup-content-block">
				<span>Наименование места</span>				
				<select style="width: 285px;" name="d4">
					<option>Золотая медаль</option>
					<option>Серебряная медаль</option>
					<option>Бронзовая медаль</option>
					<option>Диплом участия</option>
				</select>
			</div>					
  	</div>		
  	<div class="b-popup-footer">
			<input type="submit" class="apply button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
		</form>  
  </div>
</div>

<!--всплывающее окно 4*/-->
<div class="b-popup" id="popup4">
  <div class="b-popup-border b-popup-border4">
    <div class="b-popup-header">
  		<label>Дегустаторы</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<form id="form4">
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>ФИО Дегустатора</span>
				<input id="popup4-fio" type="text" class="input-text" style="width: 350px;" name="d0"></input>
			</div>
			<div class="b-popup-content-block">
				<span>Должность</span>
				<input id="popup4-pos" type="text" class="input-text" style="width: 394px;" name="d1"></input>
			</div>					
  	</div>		
  	<div class="b-popup-footer">
			<input type="submit" class="apply button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
		</form> 
  </div>
</div>

<!--всплывающее окно 5*/-->
<div class="b-popup" id="popup5">
  <div class="b-popup-border b-popup-border5">
  	<div class="b-popup-header">
  		<label>Коньяк</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div>
  	<form id="form5"> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Группа коньяка</span>				
				<select id="popup5-group" name="d6" style="width: 384px;">
					<?php 
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
			<input type="submit" class="apply button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
		</form>
  </div>
</div>

<!--всплывающее окно 6*/-->
<div class="b-popup" id="popup6">
  <div class="b-popup-border b-popup-border6">
  	<div class="b-popup-header">
  		<label>Оценки коньяка</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<form id="form6">
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>ФИО Дегустатора</span>
				<select id="popup6-fio" name="d0" style="width: 300px; margin-right: 20px;">
					<?php 
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
				<input name="d3" id="popup6-opacity" type="text" class="input-text-short textalign-center">
				<span>Цвет</span>
				<input name="d4" id="popup6-color" type="text" class="input-text-short textalign-center">
				<span>Букет</span>
				<input name="d5" id="popup6-buk" type="text" class="input-text-short textalign-center">	
				<span>Вкус</span>
				<input name="d6" id="popup6-taste" type="text" class="input-text-short textalign-center">
				<span>Типичность</span>
				<input name="d7" id="popup6-type" type="text" class="input-text-short textalign-center"">			
			</div>			
			<div class="b-popup-content-block">				
				<span>Примечание</span>
				<input name="d8" id="popup6-desc" type="text" class="input-text" style="width: 350px; margin-right: 28px;">
				<span>Итоговая оценка</span>
				<input name="d2" id="popup6-grade" type="button" class="final-grade" value="8,65"></span>
			</div>			
  	</div>		
  	<div class="b-popup-footer">
			<input type="submit" class="apply button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
		</form>
  </div>
</div>

<!--всплывающее окно 7*/-->
<div class="b-popup" id="popup7">
  <div class="b-popup-border b-popup-border7">
    <div class="b-popup-header">
  		<label>Удаление данных таблицы</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Вы действиетльно хотите удалить выбранные данные из таблицы?</span><br>
			</div>						
  	</div>		
  	<div class="b-popup-footer">
			<input type="button" class="del button-ok smoothly"  value="Да"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Нет"></input>
		</div> 
  </div>
</div>