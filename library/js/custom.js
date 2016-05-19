jQuery(document).ready(function ($) {
	
    // run test on initial page load (and put firstly in document)
    checkSize();
    // run test on resize of the window
    $(window).resize(checkSize);

//some tweaks for smaller windows
    function checkSize() {
        if ($(".navbar-toggle").css("display") == "block") {
            
            $('.languages-menu').affix({
                offset: 50
            })
        } else {
            //get affix
            $('#mainNav, .languages-menu').affix({
                offset: 50
            })
            //switch justified nav
            $('.row.navigation ul.nav.navbar-nav').addClass('nav-tabs').addClass('nav-justified').removeClass('navbar-nav');
            $('.current_page_item').parent('ul').parent('li').addClass('active');
            $('li.active').parent('ul').parent('li').addClass('active').parent('ul').parent('li').addClass('active');

        }
    }
    
    //shadowbox
//    $('.thumbnails li a').each(function(){
//        $(this).attr('rel','shadowbox[gallery]');
//    });
        // Gallery
//    $('.gallery-item a').bind('touchstart click',function(e){
//   e.preventDefault();
//});
//
//    $('.attachment-img a').click(function(event){
//        event.preventDefault();
//    });

    $('.gallery-item a').nivoLightbox({ 
    effect: 'fade',                               // The effect to use when showing the lightbox 
    theme: 'default',                             // The lightbox theme to use 
    keyboardNav: true,                            // Enable/Disable keyboard navigation (left/right/escape) 
    onInit: function(){},                         // Callback when lightbox has loaded 
    beforeShowLightbox: function(){},             // Callback before the lightbox is shown 
    afterShowLightbox: function(lightbox){},      // Callback after the lightbox is shown 
    beforeHideLightbox: function(){},             // Callback before the lightbox is hidden 
    afterHideLightbox: function(){},              // Callback after the lightbox is hidden 
    onPrev: function(element){},                  // Callback when the lightbox gallery goes to previous item 
    onNext: function(element){},                  // Callback when the lightbox gallery goes to next item 
    errorMessage: 'The requested content cannot be loaded. Please try again later.' // Error message when content can't be loaded 
});
    
    $('.gallery-item a').each(function(){
        var gallery = $(this).parent().parent().parent('div');
        var galleryID = gallery.attr('id');
        //alert(galleryID);
        $(this).attr('data-lightbox-gallery',galleryID);
    });
    $('.wp-post-image, .attachment-acf-banner').each(function(){
        var altText = $(this).attr('alt');
        if (altText == 'logo-only'){
            $(this).addClass('scaleImg');
        }
    });
    //gallery responsive - ToDo:proof
    $('.gallery-item').hover(function () {
        //$(this).toggleClass('hover');
    });
    $('.gallery-caption').wrapInner('<span></span>');

//    //overlay caption effect
//    
//
//    //some specials fpr gallery partner
//    $('.category-partner .gallery-caption > span').replaceWith(function () {
//        var url = $.trim($(this).text());
//        return '<a href="' + url + '" target="_blank">' + url + '</a>';
//    });
//    $('.category-partner .gallery-caption a').wrapInner('<span></span>');

    //window scroll funtion
    $(window).scroll(function () {
        if ($(window).scrollTop() > 500) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });
    //Click event to scroll to top
    $('.scroll-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });



    //related Articles
    if ($('.row.bottom').children('div').length) {
        $('.row.bottom').addClass('related');
    }

    //sidebar and widgets ToDo -> ersetzen durch css icon-style
    $('.sidebar article ul li, .sidebar .widget ul li').each(function () {
        $(this)
                .addClass('clearfix')
                .css('list-style', 'none')
                .wrapInner("<span></span>")
                .prepend('<i class="fa fa-caret-right fa-large"></i>');
        ;
    });
    $('ul.sub-menu > li').addClass('clearfix');

    $('.sidebar .widget-news .entry p a').append(' <i class="fa-caret-right"></i>');
    $('.sidebar .format-gallery li').each(function () {
        $(this).children('.fa-caret-right').remove();
    });

    //individual formats and css-classes
    $('p').removeClass('lead');

    //show headlines in panels
    $('.panel h3 a').each(function () {
        $(this).hover(function () {
            $(this).parent('h3').siblings('a.more-link-corner').toggle();
            $(this).parent('h3').toggleClass('show');
        });
    });

    //collapsed Texts if written in Editor
    $(".accordion .editor").each(function () {
        //$(this).css('border','1px solid red');
        if ($(this).children('h3').length > 0) {
            var ID = $(this).attr('id');
            var Headline = $(this).children('h3').text();
            $(this).before('<h3 class="collapseHeadline"><a aria-expanded="false" data-toggle="collapse" href="#' + ID + '">' + Headline + '</a></h3>');
            $(this).children('h3').remove();
            $(this).addClass('collapse');
        }
    });

    //accordions for teams, locations and partner
    $(".site-content article[class*='teams'], .site-content article[class*='standorte']").each(function () {
        var ID = $(this).attr('id');
        $(this).children('h2.page-title').addClass('collapseHeadline').wrapInner('<a data-toggle="collapse" href="#container-' + ID + '"></a>');
        $(this).children('div.collapse').attr('id', 'container-' + ID);
    });

    //responsive images and tables
    $('[class*="wp-image"]').addClass('img-responsive');


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

    //elastic iframes
    $('iframe').wrap('<div class="iframe-elastic"></div>');
    $('.page-template-page-standorte-php iframe').attr('id', 'map');

    //enable pointer events by clicking on parent
    $('.iframe-elastic, #wpgmza_map').click(function () {
        $('#map,.gm-style').css('pointer-events', 'all');
    });
    // you want to disable pointer events when the mouse leave the canvas area;
    $("#map").mouseleave(function () {
        $('#map').css('pointer-events', 'none'); // set the pointer events to none when mouse leaves the map area
    });

    //add some bootstrap styles to contact form
    $('span[role="alert"]').addClass('alert');
    $('.wpcf7-validation-errors').addClass('alert-block').addClass('alert-error');

    //show send Box
    if ($(".wpcf7-response-output.wpcf7-mail-sent-ok").length > 0) {

        $(".wpcf7-response-output.wpcf7-mail-sent-ok").siblings().css('display', 'none');

        $(".wpcf7-response-output.wpcf7-mail-sent-ok").siblings('legend')
                .text('Anmeldung versendet')
                .css('display', 'block');

    }

//    //request Boxes
//    function requestBoxes(requestSelect, hiddenSelect) {
//        var hiddenContainer = $(hiddenSelect).parent().parent().parent();
//        $(hiddenContainer).addClass('hide');
//        var requestContainer = $(requestSelect);
//
//        $(requestContainer).change(function () {
//            var antwort = $(this).val();
//            if (antwort == 'nein' || antwort == 'no') {
//                $(hiddenContainer).removeClass('hide');
//            }
//        });
//    }
//// request Visa
//    requestBoxes('#abidance', '#visa');

    //Referenzrahmen
    $('#infographic .right-col').each(function () {
        $(this).children('.collapseHeadline:first-child').children('a').addClass('show');
    });
    $('#infographic h3 br').remove();
    $('infographic .left-col').after('<div class="col-md-2 middle-col"> </div>');
    //Organigramm
    $('#infographic .sub-level ul').each(function () {
        $(this).addClass('icons');
    });
    //collapse items
    $('.panel-collapse').collapse();

    //external icons
    $('a').filter(function () {
        return this.hostname && this.hostname !== location.hostname;
    }).append(' <i class="fa fa-external-link"></i>').attr('target', '_blank');
//PDFs LInks
    $("a[href$='pdf']")
            .prepend('<i class="fa fa-file-pdf-o"></i> ')
            .addClass('file')
            .attr('target', '_blank');


    // tweek large headlines in panels for small devices
    $('article.panel > h3').each(function () {
        var headlineWidth = $(this).width();
        var linkWidth = $(this).children('a').width();
        
        if (linkWidth > headlineWidth) {
            $(this).children('a').addClass('ellipsis');
        }

    });
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
    
});
//uncrypt email
function UnCryptMailto(s) {
    var n = 0;
    var r = "";
    for (var i = 0; i < s.length; i++)
    {
        n = s.charCodeAt(i);
        if (n >= 8364)
        {
            n = 128;
        }
        r += String.fromCharCode(n - 1);
    }
    return r;
}
function linkTo_UnCryptMailto(s) {
    location.href = UnCryptMailto(s);
}
