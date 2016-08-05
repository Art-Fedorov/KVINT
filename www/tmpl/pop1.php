<div class="b-popup" id="popup1">
  <div class="b-popup-border b-popup-border1">    
  	<div class="b-popup-header">
  		<label>Проведение дегустации</label>
  		<a href="javascript:PopUpHide()">&#215;</a>  		
  	</div> 
  	<form id="form1" method="POST">
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
			<input type="submit" class="apply1 button-ok smoothly" value="Применить"></input>
			<input type="button" id="#float-window-cancel" class="button-cancel smoothly" onclick="javascript:cancel()" value="Отменить"></input>
		</div>
		</form>
  </div>  
</div>