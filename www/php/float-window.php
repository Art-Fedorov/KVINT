<!--всплывающее окно 1*/-->
<div class="b-popup" id="popup1">
  <div class="b-popup-border b-popup-border1">    
  	<div class="b-popup-header">
  		<label>Дегустация</label>
  		<a href="javascript:PopUpHide()">X</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Начало дегустации</span>
				<input type="date" class="input"></input>
			</div>
			<div class="b-popup-content-block">
				<span>Конец дегустации</span>
				<input type="date" class="input">
			</div>
			<div class="b-popup-content-block">
				</input>
				<p>Описание дегустации</p>			
				<textarea>
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
  		<label>Группа</label>
  		<a href="javascript:PopUpHide()">X</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<p>Наименование группы</p>
				<input type="text" class="input"></input>
			</div>
			<div class="b-popup-content-block">
				<p>Префикс группы</p>
				<input type="text" class="input">
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
  		<a href="javascript:PopUpHide()">X</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<span>Номер призового места</span>				
				<input type="number" step="1" min="0" max="4" value="0">
			</div>
			<div class="b-popup-content-block">
				<p>Группа</p>				
				<select>
					<option>cognakc1</option>
					<option>cognakc2</option>
				</select>
			</div>	
			<div class="b-popup-content-block">
				<span>Нижняя граница</span>				
				<input type="number" step="0.01" min="0" max="10">
				<span>Верхняя граница</span>				
				<input type="number" step="0.01" min="0" max="10">
			</div>
			<div class="b-popup-content-block">
				<span>Наименование места</span>				
				<select>
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
  		<a href="javascript:PopUpHide()">X</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<p>ФИО Дегустатора</p>
				<input type="text" class="input"></input>
			</div>
			<div class="b-popup-content-block">
				<p>Должность</p>
				<input type="text" class="input">
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
  		<a href="javascript:PopUpHide()">X</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<p>Группа коньяка</p>				
				<select>
					<option>cognakc1</option>
					<option>cognakc2</option>
				</select>
			</div>
			<div class="b-popup-content-block">
				<span>Шифр коньяка</span>
				<input type="text" class="input">
			</div>			
			<div class="b-popup-content-block">
				<span>Наименование коньяка</span>
				<input type="text" class="input">
			</div>		
			<div class="b-popup-content-block">
				<span>Возраст (г.)</span>
				<input type="text" class="input">				
			</div>
			<div class="b-popup-content-block">				
				<span>Кондиция (спирт, %)</span>
				<input type="text" class="input"><br>
				<span>Кондиция (сахар, г/дм<sup>3</sup>)</span>
				<input type="text" class="input">
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
  		<a href="javascript:PopUpHide()">X</a>  		
  	</div> 
  	<div class="b-popup-content">
  		<div class="b-popup-content-block">
  			<p>ФИО Дегустатора</p>
				<select>
					<option>cognakc1man</option>
					<option>cognakc2man</option>
				</select>
			</div>
			<div class="b-popup-content-block">
				<span>Шифр коньяка</span>
				<select>
					<option>A001</option>
					<option>B002</option>
					<option>C001</option>
					<option>C002</option>
				</select>
			</div>			
			<div class="b-popup-content-block">
				<span>Наименование коньяка</span>
				<input type="text" class="input">
			</div>		
			<div class="b-popup-content-block">
				<p>Итоговая оценка</p>
				<input type="text" class="input">				
			</div>
			<div class="b-popup-content-block">				
				<span>Прозрачность</span>
				<input type="text" class="input">
				<span>Цвет</span>
				<input type="text" class="input"><br>
				<span>Букет</span>
				<input type="text" class="input">
				<span>Вкус</span>
				<input type="text" class="input"><br>
				<span>Типичность</span>
				<input type="text" class="input">
				<span>Примечание</span>
				<input type="text" class="input">
			</div>
  	</div>		
  	<div class="b-popup-footer">
			<input type="button" class="button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
  </div>
</div>