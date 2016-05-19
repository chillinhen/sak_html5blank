(function ($, root, undefined) {
	
	$(function () {
		//alert('hallo');
		    //give active-class to first carousel item
		    $('.carousel-inner').each(function () {
		        $(this).children('.item:first-child').addClass('active');
		    });
		    $('.carousel-indicators').each(function () {
		        $(this).children('li:first-child').addClass('active');
		    });
		
		    //disable carousel controls if there is only one item
		    $('.carousel').each(function () {
		        //
		        if ($(this).children('.carousel-inner').children('.item').length === 1) {
		            $(this).children('.carousel-indicators').remove();
		            $(this).children('.carousel-control').remove();
		        }
		    });
		
	});
	
})(jQuery, this);
