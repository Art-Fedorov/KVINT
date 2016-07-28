$(document).mouseup(function (e) {
    var container = $(".b-popup");
    if (container.has(e.target).length === 0) {
        container.hide();
    }
});
function PopUpHide(){
    $(".b-popup").hide();
}
function cancel(){   
    $(".b-popup").hide();    
}

$(function(){   
$('#first').click(function(){
    $("#popup6").show();
    });
});