/*метод для заполнения шифра коньяка*/
$(document).ready(function(){
    $(document).on('change','select#popup5-group',function(){    	
    	Fill_cipher_cognac();
    });
});
function Fill_cipher_cognac(){
	$('#popup5-code').val($('#popup5-group option:selected').attr('data-value'));
	;
}