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
		    
		    // Affix Menu
		    $('#mainNav').affix({
		      offset: {
		        top: 100,
		        bottom: function () {
		          return (this.bottom = $('.footer').outerHeight(true))
		        }
		      }
		    })
		    
    //EVENTS
    $('.events table.tablepress').addClass('events-table collapse');
    $('.tablepress').each(function () {
        //alert(this.id);
        $(this).wrap('<div class="table-responsive"></div>');
        $(this).parent('div').siblings('h2').wrapInner('<a data-toggle="collapse" class="showToggle" href="#' + this.id + '"></a>').addClass('collapseHeadline');
        ;
    });

    //responsive table
    var mobile = $('body').hasClass('handheld') || $('body').hasClass('android') || $('body').hasClass('tablet');
    if (!(mobile)) {
        $('.table-responsive').removeClass('table-responsive');
    }




    $('.events table.tablepress').each(function () {
        if ($(this).children('tbody').children('tr').length < 5) {
            //alert('treffer');
            $(this).removeClass('collapse');
            $(this).parent('div').siblings('h2').removeClass('collapseHeadline');
            $(this).parent('div').siblings('h2').children('a').removeClass('collapse').addClass('no-icon');
            $(this).css('margin-left','-40px');
        }
    });
    $('.events-table td').each(function () {

        if ($(this).attr('colspan')) {
            $(this).addClass('table-headline');
        }
    });
    $('td.table-headline').each(function () {
        $(this).parent('tr').next('tr').addClass('transparent');
    });
		
	});
	
})(jQuery, this);
