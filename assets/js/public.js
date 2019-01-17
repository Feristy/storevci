$(document).ready(function(){
	$('.btn-bar').click(function(){
		$('.menu-side').css({'right':'0'});
		$('body').append('<div class="close-side block-close-side"></div>');
	});
	$(document).on('click', '.close-side', function(){
		$('.menu-side').css({'right':'-300px'});
		$('.block-close-side').remove();
	});
	var scr = $(document).scrollTop();
	function scrollMenu(scr){
		if(scr > 100){
			$('.top-menu').addClass('top-menu-i');
			$('.brand').addClass('menu-item-i');
			$('.menu-item a').addClass('menu-item-i');
			$('.cart a').addClass('menu-item-i');
		}else{
			$('.top-menu').removeClass('top-menu-i');
			$('.brand').removeClass('menu-item-i');
			$('.menu-item a').removeClass('menu-item-i');
			$('.cart a').removeClass('menu-item-i');
		}
	}

	scrollMenu(scr);

	$(document).scroll(function(){
		var scr1 = $(document).scrollTop();
		scrollMenu(scr1);
	});
});