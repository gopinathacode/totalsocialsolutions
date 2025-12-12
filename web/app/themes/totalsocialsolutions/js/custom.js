;
(function ($) {
    // DOM ready
    $(function () {
        $('.nav-list > li').addClass('nav-item');
        // Append the mobile icon nav
        $('.nav').append($('<div class="nav-mobile">Menu <i class="fa fa-list-ul" aria-hidden="true"></i></div>'));
        // Add a <span> to every .nav-item that has a <ul> inside
        $('.nav-item').has('ul').prepend('<span class="nav-click"><i class="fa fa-bars"></i></span>');
        // Click to reveal the nav
        $('.nav-mobile').click(function () {
            if ($('.nav-list').is(':hidden')) {
                $('.nav-mobile').addClass("open");
                $('.nav-list').slideDown("slow", function () {
                });
            } else {
                $('.nav-mobile').removeClass("open");
                $('#lk').removeClass("vis");
                $('.nav-list').slideUp("slow", function () {
                });
            }
        });
        // Dynamic binding to on 'click'
        $('.nav-list').on('click', '.nav-click', function () {
            // Toggle the nested nav
            /*$(this).siblings('.sub-menu').toggle();*/
            if ($(this).siblings('.sub-menu').is(':hidden')) {
                $(this).siblings('.sub-menu').slideDown("slow", function () {
                });
            } else {
                $(this).siblings('.sub-menu').slideUp("slow", function () {
                    // Animation complete.
                });
            }
            // Toggle the arrow using CSS3 transforms
            $(this).children('.nav-arrow').toggleClass('nav-rotate');
        });
    });
    
})(jQuery);
//bx slider js
jQuery(document).ready(function ($) {
    var maxxxHeight = 0;
    $('.services .block').each(function () {
        maxxxHeight = Math.max(maxxxHeight, $(this).height());
    }).height(maxxxHeight);
    $('.bxslider').bxSlider({
        mode: 'horizontal',
        auto: true,
        prevText: '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        nextText: '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    });
    $('.bxslider1').bxSlider({
        mode: 'horizontal',
        auto: true,
        adaptiveHeight: true,
        pause: 15000

    });
   
/*
    var $container = jQuery('#grid');
    $container.masonry({
        itemSelector: '.grid-item',
	isAnimated: true
    });
*/
    if ($(window).width() > 767) {
        var maxHeight = 0;
        $('.inner-blog').each(function () {
            maxHeight = Math.max(maxHeight, $(this).height());
        }).height(maxHeight);
    }

});
//popup
jQuery(document).ready(function ($) {
    //----- OPEN
    $('[data-popup-open]').on('click', function (e) {
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
        e.preventDefault();
    });
    //----- CLOSE
    $('[data-popup-close]').on('click', function (e) {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
        e.preventDefault();
    });
});
jQuery(document).ready(function ($) {
    new WOW().init();
    $('.bxslider').bxSlider({
        mode: 'horizontal',
        slideMargin: 0,
        auto: true
    });
    function close_accordion_section() {
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }
    //$("#accordion-1").show()
    var curnturl = window.location.href;  
    var catUrl = curnturl.split('#');
    if( catUrl[1] != null) {
        //alert(catUrl);
        $("#"+catUrl[1]).show()
        window.setTimeout(function() {
            $(window).scrollTop(600); 
        }, 0);
    }
    $('.accordion-section-title').click(function (e) {
        // Grab current anchor value
        var currentAttrValue = $(this).attr('href');
        if ($(e.target).is('.active')) {
            close_accordion_section();
        } else {
            close_accordion_section();
            // Add active class to section title
            $(this).addClass('active');
            // Open up the hidden content panel
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open');
        }
        e.preventDefault();

    });

});
 // This bit sets up jQuery Masonry
jQuery(window).load(function() {
	
	function preventNumberInput(e){
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode > 47 && keyCode < 58) {
        e.preventDefault();
    }
}

    jQuery('.input-name').keypress(function(e) {
        preventNumberInput(e);
    });
	/*
		jQuery(".input-name").on("keydown", function(event){
  // Ignore controls such as backspace
  var arr = [8,16,17,20,35,36,37,38,39,40,45,46];

  // Allow letters
  for(var i = 65; i <= 90; i++){
    arr.push(i);
  }

  if(jQuery.inArray(event.which, arr) === -1){
    event.preventDefault();
  }
});

jQuery(".input-name").on("input", function(){
    var regexp = /[^a-zA-Z]/g;
    if(jQuery(this).val().match(regexp)){
      jQuery(this).val( jQuery(this).val().replace(regexp,'') );
    }
});
*/
  jQuery(".input-number").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
       
               return false;
    }
   });
   jQuery('#grid').masonry({
        columnWidth: '.grid-item',
        itemSelector: '.grid-item',
        isAnimated: true
    });
});


