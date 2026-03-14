; (function ($) {
    "use strict";

    $(document).ready(function () {

        /**-----------------------------
         *  Navbar fix
         * ---------------------------*/
        $(document).on('click', '.navbar-area .navbar-nav li.menu-item-has-children>a', function (e) {
            e.preventDefault();
        })

        $(document).on('mouseover','.single-intro-inner',function() {
            $(this).addClass('single-intro-inner-active');
            $('.single-intro-inner').removeClass('single-intro-inner-active');
            $(this).addClass('single-intro-inner-active');
        });

        $(document).on('mouseover','.single-pricing-wrap',function() {
            $(this).addClass('single-pricing-wrap-active');
            $('.single-pricing-wrap').removeClass('single-pricing-wrap-active');
            $(this).addClass('single-pricing-wrap-active');
        });
       
        /*-------------------------------------
            menu
        -------------------------------------*/
        $('.navbar-area .menu').on('click', function() {
            $(this).toggleClass('open');
            $('.navbar-area .navbar-collapse').toggleClass('sopen');
        });
    
        // mobile menu
        if ($(window).width() < 992) {
            $(".in-mobile").clone().appendTo(".sidebar-inner");
            $(".in-mobile ul li.menu-item-has-children").append('<i class="fas fa-chevron-right"></i>');
            $('<i class="fas fa-chevron-right"></i>').insertAfter("");

            $(".menu-item-has-children a").on('click', function(e) {
                // e.preventDefault();

                $(this).siblings('.sub-menu').animate({
                    height: "toggle"
                }, 300);
            });
        }

        var menutoggle = $('.menu-toggle');
        var mainmenu = $('.navbar-nav');
        
        menutoggle.on('click', function() {
            if (menutoggle.hasClass('is-active')) {
                mainmenu.removeClass('menu-open');
            } else {
                mainmenu.addClass('menu-open');
            }
        });

        /*--------------------------------------------------
            select onput
        ---------------------------------------------------*/
        if ($('.single-select').length){
            $('.single-select').niceSelect();
        }

        /* --------------------------------------------------
            isotop filter 
        ---------------------------------------------------- */
        var $Container = $('.isotop-filter-area');
        if ($Container.length > 0) {
            $('.property-filter-area').imagesLoaded(function () {
                var festivarMasonry = $Container.isotope({
                    itemSelector: '.project-filter-item', // use a separate class for itemSelector, other than .col-
                    masonry: {
                        gutter: 0
                    }
                });
                $(document).on('click', '.isotop-filter-menu > button', function () {
                    var filterValue = $(this).attr('data-filter');
                    festivarMasonry.isotope({
                        filter: filterValue
                    });
                });
            });
            $(document).on('click','.isotop-filter-menu > button' , function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });
        }

        /*--------------------------------------------
            Search Popup
        ---------------------------------------------*/
        var bodyOvrelay =  $('#body-overlay');
        var searchPopup = $('#td-search-popup');
        var sidebarMenu = $('#sidebar-menu');

        $(document).on('click','#body-overlay',function(e){
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
            sidebarMenu.removeClass('active');
        });
        $(document).on('click','.search-bar-btn',function(e){
            e.preventDefault();
            searchPopup.addClass('active');
        bodyOvrelay.addClass('active');
        });

        // sidebar menu 
        $(document).on('click', '.sidebar-menu-close', function (e) {
            e.preventDefault();
            bodyOvrelay.removeClass('active');
            sidebarMenu.removeClass('active');
        });
        $(document).on('click', '#navigation-button', function (e) {
            e.preventDefault();
            sidebarMenu.addClass('active');
            bodyOvrelay.addClass('active');
        });

        /* -----------------------------------------------------
            Variables
        ----------------------------------------------------- */
        var leftArrow = '<img src="assets/img/icon/left-arrow.png">';
        var rightArrow = '<img src="assets/img/icon/right-arrow.png">';

        /*------------------------------------------------
            banner-slider
        ------------------------------------------------*/
        $('.banner-slider').owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop: true,
            autoplay: true,
            autoplayTimeout: 10000,
            nav: true,
            dots: false,
            items: 1,
            smartSpeed: 1800,
            navText: ['<img src="assets/img/icon/left-arrow.png"/>','<img src="assets/img/icon/right-arrow.png"/>'],           
        });

        

        /*------------------------------------------------
            feature-slider
        ------------------------------------------------*/
        $('.feature-slider').owlCarousel({
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            items: 3,
            loop: true,
            autoplay:true,
            navText: ['<img src="assets/img/icon/left-arrow.png"/>','<img src="assets/img/icon/right-arrow.png"/>'],           
            responsive : {                
                769 : {
                    items: 3,
                },
                577 : {
                    items: 2,
                },
                0 : {
                    items: 1,
                }
            },             
        });

        
        /*------------------------------------------------
            project-slider
        ------------------------------------------------*/
        $('.project-slider').owlCarousel({
            margin: 30,
            nav: false,
            dots: false,
            smartSpeed: 1500,
            items: 3,
            loop: true,
            autoplay:true,
            navText: ['<img src="assets/img/icon/left-arrow.png"/>','<img src="assets/img/icon/right-arrow.png"/>'],           
            responsive : {               
                1600 : {
                    items: 4,
                    stagePadding: 200,
                },                
                769 : {
                    items: 3,
                    stagePadding: 0,
                },
                577 : {
                    items: 2,
                },
                0 : {
                    items: 1,
                }
            },             
        });

        /*------------------------------------------------
            team-slider
        ------------------------------------------------*/
        $('.team-slider').owlCarousel({
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            items: 3,
            loop: true,
            autoplay:true,
            navText: ['<img src="assets/img/icon/left-arrow.png"/>','<img src="assets/img/icon/right-arrow.png"/>'],           
            responsive : {                
                769 : {
                    items: 3,
                },
                577 : {
                    items: 2,
                },
                0 : {
                    items: 1,
                }
            },             
        });

        /*------------------------------------------------
            testimonial-slider
        ------------------------------------------------*/
        $('.testimonial-slider').owlCarousel({
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            items: 3,
            loop: true,
            autoplay:true,
            navText: ['<img src="assets/img/icon/left-arrow.png"/>','<img src="assets/img/icon/right-arrow.png"/>'],           
            responsive : {                
                769 : {
                    items: 3,
                },
                577 : {
                    items: 2,
                },
                0 : {
                    items: 1,
                }
            },  
        });

        /*------------------------------------------------
            partner-slider
        ------------------------------------------------*/
        $('.partner-slider').owlCarousel({
            margin: 30,
            nav: false,
            dots: false,
            smartSpeed: 1500,
            items: 6,
            loop: true,
            autoplay:true,
            responsive : { 
                1024 : {
                    items: 6,
                },               
                769 : {
                    items: 3,
                },
                577 : {
                    items: 3,
                },
                0 : {
                    items: 2,
                }
            },  
        });

        /*------------------------------------------------
            service-slider
        ------------------------------------------------*/
        $('.service-slider').owlCarousel({
            margin: 30,
            nav: true,
            dots: false,
            smartSpeed: 1500,
            items: 3,
            loop: true,
            autoplay:true,
            navText: ['<img src="assets/img/icon/left-arrow.png"/>','<img src="assets/img/icon/right-arrow.png"/>'],           
            responsive : {                
                769 : {
                    items: 3,
                },
                577 : {
                    items: 2,
                },
                0 : {
                    items: 1,
                }
            },             
        });

        /*------------------------------------------------
            portfolio-slider
        ------------------------------------------------*/
        var $swiper = $(".swiper-container");
        var $bottomSlide = null;
        var $bottomSlideContent = null; 

        var mySwiper = new Swiper(".swiper-container", {
            spaceBetween: 1,
            slidesPerView: 3,
            centeredSlides: true,
            roundLengths: true,
            loop: true,
            loopAdditionalSlides: 30,
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                500: {
                  slidesPerView: 1
                },
                768: {
                  slidesPerView: 1
                }
            }
        });

        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });

        /**---------------------------------------
          Progress BAR
        ----------------------------------------*/
        function td_Progress() {
            var progress = $('.progress-rate');
            var len = progress.length;
            for (var i = 0; i < len; i++) {
                var progressId = '#' + progress[i].id;
                var dataValue = $(progressId).attr('data-value');
                $(progressId).css({'width':dataValue+'%'});
            }
        }
        var progressRateClass = $('.progress-item');
        if ((progressRateClass).length) {
            td_Progress();
        }
        $('.counting').each(function() {
            var $this = $(this),
            countTo = $this.attr('data-count');

            $({ countNum: $this.text()}).animate({
                countNum: countTo
            },

            {
                duration: 2000,
                easing:'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });  
        });

        /*------------------------------------------------
            Magnific JS
        ------------------------------------------------*/
        $('.video-play-btn').magnificPopup({
            type: 'iframe',
            removalDelay: 260,
            mainClass: 'mfp-zoom-in',
        });
        $.extend(true, $.magnificPopup.defaults, {
            iframe: {
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        src: 'https://www.youtube.com/embed/Wimkqo8gDZ0'
                    }
                }
            }
        });

        /* -----------------------------------------
            fact counter
        ----------------------------------------- */
        $('.counter').counterUp({
            delay: 15,
            time: 2000
        });


        /*----------------------------------------
           back to top
        ----------------------------------------*/
        $(document).on('click', '.back-to-top', function () {
            $("html,body").animate({
                scrollTop: 0
            }, 2000);
        });

    });

    $(window).on("scroll", function() {
        /*---------------------------------------
            back-to-top
        -----------------------------------------*/
        var ScrollTop = $('.back-to-top');
        if ($(window).scrollTop() > 1000) {
            ScrollTop.fadeIn(1000);
        } else {
            ScrollTop.fadeOut(1000);
        }

    });


    $(window).on('load', function () {

        /*-----------------
            preloader
        ------------------*/
        var preLoder = $("#preloader");
        preLoder.fadeOut(0);

        /*-----------------
            back to top
        ------------------*/
        var backtoTop = $('.back-to-top')
        backtoTop.fadeOut();

        /*---------------------
            Cancel Preloader
        ----------------------*/
        $(document).on('click', '.cancel-preloader a', function (e) {
            e.preventDefault();
            $("#preloader").fadeOut(2000);
        });

    });



})(jQuery);