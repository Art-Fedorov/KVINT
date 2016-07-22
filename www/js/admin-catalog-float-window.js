$(document).mouseup(function (e) {
    var container = $(".b-popup");
    if (container.has(e.target).length === 0) {
        container.hide();
    }
});

function PopUpShow(){
    $("#popup6").show();
}
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
       
function Show_float_window(){    
    var query = window.location.search.substring(1);
    var vars = query.split("&");     
    var l = vars[0].split("=");
    var codetable = l[1];
    if (codetable=='1'){
        $("#popup1").show();
    } else if (codetable=='2'){
        $("#popup2").show();
    } else if (codetable=='3'){
        $("#popup3").show();
    } else if (codetable=='4'){
        $("#popup4").show();
    } else if (codetable=='5'){
        $("#popup5").show();
    } else if (codetable=='6'){
        $("#popup6").show();
    }
    else  $("#popup1").show(); 
}
  