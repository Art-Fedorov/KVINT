$(function(){
	$('.cognacgroup li a').each(function () {
     if($(this).attr('href') == location.pathname.substring(1)+location.search) 
     { $(this).addClass('active');	}
  });
  	$('.main-menu li a').each(function () {
     if($(this).attr('href') == location.pathname.substring(1)+location.search) 
     { $(this).addClass('active');	}
  });
})

