
var $menu = $(".main-menu"),
 		// кэшируем в переменную меню
var links = $menu.find("a");
    // кэшируем в переменную ссылки

$links.on("click", function() {
    //$menu.children().removeClass("active"); 
    // убираем класс у всех пунктов
    $(this).addClass("active"); 
    // добавляем к пункту, содержащему нажатую ссылку
});

