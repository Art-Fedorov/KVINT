/*$(document).mouseup(function (e) {
    var container = $(".b-popup");
    if (container.has(e.target).length === 0) {
        container.remove();   

    }
});*/
function PopUpHide(){
    $("div.b-popup").remove();
    location.reload();
}
function cancel(){   
    $("div.b-popup").remove();   
    location.reload();
}