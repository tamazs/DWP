$(document).ready(function() {
    "use strict";

    PageScroll();


    // Loading Box (Preloader)
    function handlePreloader() {
        if ($('.preloader').length > 0) {
            $('.preloader').delay(200).fadeOut(500);
        }
    }

    function PageLoad() {
      $( window ).on( "load", function() {
            setInterval(function(){ 
                $('.preloader-wrap').fadeOut(300);
            }, 400);
            setInterval(function(){ 
                $('body').addClass('loaded');
            }, 600); 
      });
    }


    handlePreloader();
    PageLoad();

    $('.carousel-card').owlCarousel({
        loop:false,
        margin:10,
        nav:false,
        autoplay:false,  
        dots:false,
        autoWidth:true
    })



     $('.category-card').owlCarousel({
        loop:false,
        margin:7,
        nav:true,
        autoplay:false,  
        dots:false,
        navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
        autoWidth:true
    })

     $('.banner-slider').owlCarousel({
        loop:true,
        margin:15,
        nav:true,
        autoplay:false,  
        dots:true,
        navText: ["<i class='ti-angle-left icon-nav'></i>","<i class='ti-angle-right icon-nav'></i>"],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1,
            },
            1200:{
                items:1,
            }
            
        }      
    })

     $('.brand-slider').owlCarousel({
        loop:true,
        margin:15,
        nav:false,
        autoplay:false,  
        dots:false,
        items:5,
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:3,
            },
            1200:{
                items:5,
            }
            
        }
    })


     $('.feedback-slider').owlCarousel({
        loop:true,
        margin:15,
        nav:true,
        autoplay:false,  
        dots:false,
        items:5,
        navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1200:{
                items:3,
            }
            
        }
    })
     $('.feedback-slider2').owlCarousel({
        loop:true,
        margin:15,
        nav:true,
        autoplay:false,  
        dots:false,
        items:5,
        navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1200:{
                items:2,
            }
            
        }
    })

    $('.question-div .question-ans').on('click', function() {
        $('.question-ans').removeClass('active');
        $(this).addClass('active');
        return false;
    });

    $('.question-div .question-ans').on('click', function() {
        $('.question-ans').removeClass('active');
        $(this).addClass('active');
        return false;
    });

    $('.next-bttn').on('click', function() {
        var next_bttn_id =  $(this).attr('data-question');
        $('.question-div .card-body').fadeOut(0);
        $('.question-div #'+next_bttn_id ).fadeIn(500);
        // alert(next_bttn_id);
        // $(this).addClass('active');
        return false;
    });

    
    
    $('.dropdown-menu-icon').on('click', function() {
        $('.dropdown-menu-settings').toggleClass('active');
    });   
    

    $('.switchcolor').on('click', function() {
        $(this).addClass('active');
        $('.backdrop').addClass('active');
        $('.switchcolor-wrap').addClass('active'); 
    });

    $('.sheet-close,.backdrop').on('click', function() {
        $('.switchcolor').removeClass('active');
        $('.backdrop').removeClass('active');
        $('.switchcolor-wrap').removeClass('active'); 
    });

    $('#darkmodeswitch').on('change', function () {
        if (this.checked) {
            $('body').addClass('theme-dark');
        } else {
            $('body').removeClass('theme-dark');
        }
    });



    $(window).scroll(function(){
        if ($(this).scrollTop() > 10) {
           $('.scroll-header').addClass('bg-white shadow-xss');
        } else {
           $('.scroll-header').removeClass('bg-white shadow-xss');
        }
    });

    $(window).scroll(function(){
        if ($(this).scrollTop() > 10) {
           $('.middle-sidebar-header').addClass('scroll');
        } else {
           $('.middle-sidebar-header').removeClass('scroll');
        }
    });

    
    $('.nav-menu').on('click', function () {
        $(this).toggleClass('active');
        $('.navigation').toggleClass('nav-active');
    });

    

    

    $('.close-nav').on('click', function () {
        $('.navigation').removeClass('nav-active');
        return false;
    });

    
    $('.toggle-screen input').on('change', function () {
        if (this.checked) {
            $('body').addClass('theme-full');
        } else {
            $('body').removeClass('theme-full');
        }
    });
    
    
    $('.toggle-dark input').on('change', function () {
        if (this.checked) {
            $('body').addClass('theme-dark');
        } else {
            $('body').removeClass('theme-dark');
        }
    });

    $('input[name="color-radio"]').on('change', function () {
        if (this.checked) {
          $('body').removeClass('color-theme-teal color-theme-cadetblue color-theme-pink color-theme-deepblue color-theme-blue color-theme-red color-theme-black color-theme-gray color-theme-orange color-theme-yellow color-theme-green color-theme-white color-theme-brown color-theme-darkgreen color-theme-deeppink color-theme-darkorchid');
          $('body').addClass('color-theme-' + $(this).val());
        }
    });

    

});





function PageScroll() {
   $(".scroll-tiger").on("click", function(e) {
        var $anchor = $(this);
        $("html, body").stop().animate({
            scrollTop: $($anchor.attr("href")).offset().top - 0
        }, 1500, 'easeInOutExpo');
        $('.overlay-section').removeClass('active'); 
        e.preventDefault();

    });
}