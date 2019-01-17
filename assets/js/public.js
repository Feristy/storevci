$(document).ready(function(){
	$('.btn-bar').click(function(){
		$('.menu-side').css({'right':'0'});
		$('body').append('<div class="close-side block-close-side"></div>');
	});
	$(document).on('click', '.close-side', function(){
		$('.menu-side').css({'right':'-300px'});
		$('.block-close-side').remove();
	});
});