var tr_id;
  $(document).ready(function(){
    $('tr').click(function(){
        $('tr').removeClass();
        $(this).addClass('selected');
        alert($(this).data('value'));
        tr_id = $(this).data('value');
    });
  });
function Show_tr_id(){
  alert(tr_id);
}
function Show_delete_window(){
  $("#popup7").show();
}
