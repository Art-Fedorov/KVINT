<!--всплывающее окно 1*/-->
<div class="b-popup" id="popup1">
  <div class="b-popup-border b-popup-border1">    
  	<div class="b-popup-header">
  		<label>Проведение дегустации</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Начало дегустации</span>
				<input type="date" class="input-date"></input>
			</div>
			<div class="b-popup-content-block">
				<span>Конец дегустации</span>
				<input type="date" class="input-date">
			</div>
			<div class="b-popup-content-block">				
				<p>Описание дегустации</p>			
				<textarea class="textarea-input" rows="2" cols="48">
				</textarea> 
			</div>			
  	</div>		
  	<div class="b-popup-footer">
			<input type="button" class="button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
  </div>  
</div>

<!--всплывающее окно 2*/-->
<div class="b-popup" id="popup2">
  <div class="b-popup-border b-popup-border2">
  	<div class="b-popup-header">
  		<label>Группа </label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<div class="b-popup-content">  		
			<div class="b-popup-content-block">
				<span>Префикс группы</span>
				<input type="text" class="input-text textalign-center"  style="width: 80px;">
			</div>		
			<div class="b-popup-content-block">
  			<p>Наименование группы</p>
				<input type="text" class="input-text" style="width: 400px;"></input>
			</div>			
  	</div>		
  	<div class="b-popup-footer">
			<input type="button" class="button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
  </div>
</div>

<!--всплывающее окно 3*/-->
<div class="b-popup" id="popup3">
  <div class="b-popup-border b-popup-border3">
    <div class="b-popup-header">
  		<label>Призовые места</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Номер призового места</span>				
				<input type="number" class="number-data" style="width: 60px;" step="1" min="0" max="4" value="0">
			</div>
			<div class="b-popup-content-block">
				<span>Группа</span>				
				<select style="width: 380px;">
					<option>cognakc1</option>
					<option>cognakc2</option>
				</select>
			</div>	
			<div class="b-popup-content-block">
				<span>Нижняя граница</span>				
				<input type="number" class="number-data" style="width: 80px; margin-right: 30px;" step="0.01" min="0" max="10">
				<span>Верхняя граница</span>				
				<input type="number" class="number-data" style="width: 80px;" step="0.01" min="0" max="10">
			</div>
			<div class="b-popup-content-block">
				<span>Наименование места</span>				
				<select style="width: 285px;">
					<option>Золотая медаль</option>
					<option>Серебряная медаль</option>
					<option>Бронзовая медаль</option>
					<option>Диплом участия</option>
				</select>
			</div>					
  	</div>		
  	<div class="b-popup-footer">
			<input type="button" class="button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>  
  </div>
</div>

<!--всплывающее окно 4*/-->
<div class="b-popup" id="popup4">
  <div class="b-popup-border b-popup-border4">
    <div class="b-popup-header">
  		<label>Дегустаторы</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>ФИО Дегустатора</span>
				<input type="text" class="input-text" style="width: 350px;"></input>
			</div>
			<div class="b-popup-content-block">
				<span>Должность</span>
				<input type="text" class="input-text" style="width: 394px;"></input>
			</div>					
  	</div>		
  	<div class="b-popup-footer">
			<input type="button" class="button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div> 
  </div>
</div>

<!--всплывающее окно 5*/-->
<div class="b-popup" id="popup5">
  <div class="b-popup-border b-popup-border5">
  	<div class="b-popup-header">
  		<label>Коньяк</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Группа коньяка</span>				
				<select style="width: 384px;">
					<option>cognakc1</option>
					<option>cognakc2</option>
				</select>
			</div>
			<div class="b-popup-content-block">
				<span>Шифр коньяка</span>
				<input type="text" style="width: 80px; margin-right: 20px;" class="input-text textalign-center">
				<span>Возраст (г.)</span>
				<input type="text" style="width: 90px; pattern="[0-9]{4};" class="input-text textalign-center">
			</div>			
			<div class="b-popup-content-block">
				<span>Наименование коньяка</span> <br>
				<input type="text" class="input-text"  style="width: 497px; margin-top: 10px;">
			</div>	
			<div class="b-popup-content-block">				
				<span>Кондиция (спирт, %)</span>
				<input type="text" style="width: 80px; margin-right: 20px;" class="input-text textalign-center">
				<span>Кондиция (сахар, г/дм<sup>3</sup>)</span>
				<input type="text" style="width: 80px;" class="input-text textalign-center">
			</div>
  	</div>		
  	<div class="b-popup-footer">
			<input type="button" class="button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
  </div>
</div>

<!--всплывающее окно 6*/-->
<div class="b-popup" id="popup6">
  <div class="b-popup-border b-popup-border6">
  	<div class="b-popup-header">
  		<label>Оценки коньяка</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>ФИО Дегустатора</span>
				<select style="width: 300px; margin-right: 20px;">
					<option>cognakc1man</option>
					<option>cognakc2man</option>
				</select>
				<span>Шифр коньяка</span>
				<select>
					<option>A001</option>
					<option>B002</option>
					<option>C001</option>
					<option>C002</option>
				</select>
			</div>					
			<!--<div class="b-popup-content-block">
				<span>Наименование коньяка</span>
				<input type="text" class="input-text textalign-center">
			</div>		-->			
			<div class="b-popup-content-block">				
				<span>Прозрачность</span>
				<input type="text" class="input-text-short textalign-center">
				<span>Цвет</span>
				<input type="text" class="input-text-short textalign-center">
				<span>Букет</span>
				<input type="text" class="input-text-short textalign-center">	
				<span>Вкус</span>
				<input type="text" class="input-text-short textalign-center">
				<span>Типичность</span>
				<input type="text" class="input-text-short textalign-center"">			
			</div>			
			<div class="b-popup-content-block">				
				<span>Примечание</span>
				<input type="text" class="input-text" style="width: 350px; margin-right: 28px;">
				<span>Итоговая оценка</span>
				<input type="button" class="final-grade" value="8,65"></span>
			</div>			
  	</div>		
  	<div class="b-popup-footer">
			<input type="button" class="button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
  </div>
</div>

<div class="b-popup" id="popup7">
  <div class="b-popup-border b-popup-border7">
    <div class="b-popup-header">
  		<label>Удаление данных таблицы</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Вы действиетльно хотите удалить выбранные данные из таблицы?</span><br>
				<span>(тут выбранные данные)</span>
			</div>						
  	</div>		
  	<div class="b-popup-footer">
			<input type="button" class="button-ok smoothly" value="Да"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Нет"></input>
		</div> 
  </div>
</div>