(function ($, root, undefined) {

    $(function () {
        /*** responsive***/

        $(window).bind("resize", resizeWindow);
        function resizeWindow(e) {
            var newWindowWidth = $(window).width();

            // If width width is below 600px, switch to the mobile stylesheet
            if (newWindowWidth < 600) {
                //alert('hallo');
            }

        }
        // Toggle Nav
        $('.toggle-nav').click(function (e) {
            $('#offMenu').toggleClass('open');
            $(this).toggleClass('open');
            e.preventDefault();
        });

        var navButton = $('#offMenu .menu-item > a');
        var tapped = false;
        navButton.on("touchstart", function (e) {
            if (!tapped) { //if tap is not set, set up single tap
                tapped = setTimeout(function () {
                    e.preventDefault();
                    //insert things you want to do when single tapped
                }, 300);   //wait 300ms then run single click code
                $(this).siblings('ul').toggleClass('show');
            } else {    //tapped within 300ms of last tap. double tap
                clearTimeout(tapped); //stop single tap callback
                window.location.href = $(this).attr('href');
                //insert things you want to do when double tapped
            }
            e.preventDefault()
        });
        /*** Language switch ***/
        $('.lang-item').each(function () {
            $(this).children('a').wrapInner('<span></span>');
        });
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




        //related Articles
        if ($('.row.bottom').children('div').length) {
            $('.row.bottom').addClass('related');
        }

        //EVENTS
        $('.events table.tablepress').addClass('events-table collapse table');
        $('h2.tablepress-table-name').wrapInner('<a data-toggle="collapse" class="showToggle"></a>');
        $.each($('.tablepress'), function () {
            $("#" + this.id).prev('h2').addClass('collapseHeadline').children('a').attr('href', '#' + this.id);
            $("#" + this.id).wrap('<div class="table-responsive"></div>');
        });

        //responsive table
//        var mobile = $('body').hasClass('handheld') || $('body').hasClass('android') || $('body').hasClass('tablet');
//        if (!(mobile)) {
//            $('.table-responsive').removeClass('table-responsive');
//        }

        $('.events table.tablepress').each(function () {
            if ($(this).children('tbody').children('tr').length < 5) {
                $(this).removeClass('collapse');
                $(this).parent('div').siblings('h2').removeClass('collapseHeadline');
                $(this).parent('div').siblings('h2').children('a').removeClass('collapse').addClass('no-icon');
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

        // Collapse Headlines
        $('.collapseHeadline').each(function () {
            $(this).addClass('clearfix');
        });
        $('.collapseHeadline > a').each(function () {
            $(this).wrapInner('<span></span>');
            $(this).children('span').before('<i class="fa fa-plus-circle"></i>');
            $(this).click(function () {
                $(this).parent().find('i').toggleClass('fa-minus-circle fa-plus-circle');
            });
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

        //external icons
        $('a').filter(function () {
            return this.hostname && this.hostname !== location.hostname;
        }).append(' <i class="fa fa-external-link"></i>').attr('target', '_blank');
//PDFs LInks
        $("a[href$='pdf']")
                .prepend('<i class="fa fa-file-pdf-o"></i> ')
                .addClass('file')
                .attr('target', '_blank');
        // post edit link 
        $('.post-edit-link').wrapInner('<span></span>');

        navButton.bind('touchstart hover', function () {
            $(this).siblings('ul').addClass('show');
        });


    });

})(jQuery, this);
//$(this).siblings('ul').toggleClass('show');


