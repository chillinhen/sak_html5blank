(function ($, root, undefined) {

    $(function () {
        //alert('hallo');
                // Nav Button
        var navButton = $('.menu-item > a');
        var tapped = false;
        //navButton.addClass('foo');
        navButton.on("touchstart", function (e) {
            if (!tapped) { //if tap is not set, set up single tap
                tapped = setTimeout(function () {
                    e.preventDefault();
                    //alert('single-tap');
                    
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

    });

})(jQuery, this);
//$(this).siblings('ul').toggleClass('show');


