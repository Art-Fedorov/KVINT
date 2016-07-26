$(function(){
	$('.cognacgroup li a').each(function () {
     if($(this).attr('href') == location.pathname.substring(1)+location.search) 
     { $(this).addClass('active');	}
  });
  	$('.main-menu li a').each(function () {
     if($(this)[0].pathname.substring(1)== location.pathname.substring(1))
     { $(this).addClass('active');	
 			}
  });
})

