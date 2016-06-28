(function ($, root, undefined) {
	
	$(function () {
		
			/*** NIVO Lightbox ***/
			$('a').nivoLightbox();
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
    
        //elastic iframe & pointer events
        $('iframe').wrap('<div class="iframe-elastic"></div>');
        $('.iframe-elastic > iframe').attr('id', 'map');
        //enable pointer events by clicking on parent
        $('.iframe-elastic').click(function () {
            $('#map,.gm-style').css('pointer-events', 'all');
        });
        // you want to disable pointer events when the mouse leave the canvas area;
        $("#map").mouseleave(function () {
            $('#map').css('pointer-events', 'none'); // set the pointer events to none when mouse leaves the map area
        });
        
        //alert('hallo');
});
        



	
	
})(jQuery, this);


