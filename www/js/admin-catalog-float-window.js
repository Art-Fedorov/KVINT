//скрытие всплывающих окон при клике вне оных
$(document).mouseup(function (e) {
    var container = $(".b-popup");
    if (container.has(e.target).length === 0) {
        container.remove();   

    }
});
//скрытие окна и удаление его из разметки
function PopUpHide(){
    $('div.b-popup').empty();
    $("div.b-popup").remove();

}
//скрытие окна и удаление его из разметки
function cancel(){ 
		$('div.b-popup').empty();  
    $("div.b-popup").remove();   
}

//кнопки удалить/изменить/добавить двигаются вместе с окном
  $(window).scroll(function() {
  var sb_m = 20; /* отступ сверху и снизу */
  var mb = 300; /* высота подвала с запасом */
  var st = $(window).scrollTop();
  var sb = $(".sticky-block");
  var sbi = $(".sticky-block .inner");
  var sb_ot = sb.offset().top;
  var sbi_ot = sbi.offset().top;
  var sb_h = sb.height();
 
  if(sb_h + $(document).scrollTop() + sb_m + mb < $(document).height()) {
    if(st > sb_ot) {
      var h = Math.round(st - sb_ot) + sb_m;
      sb.css({"paddingTop" : h});
    }
    else {
      sb.css({"paddingTop" : 0});
    }
  }
});	


jQuery(document).ready(function($){
  var isLateralNavAnimating = false;
  
  //open/close lateral navigation
  $('.cd-nav-trigger').on('click', function(event){
    event.preventDefault();
    //stop if nav animation is running 
    if( !isLateralNavAnimating ) {
      if($(this).parents('.csstransitions').length > 0 ) isLateralNavAnimating = true; 
      
      $('body').toggleClass('navigation-is-open');
      $('.cd-navigation-wrapper').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
        //animation is over
        isLateralNavAnimating = false;
      });
    }
  });
});