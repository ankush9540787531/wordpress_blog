(function($) {

    'use strict';

    $(document).ready(function() {

        var body = $('body');

        var masonry_grid = $('.masonry-row');

        masonry_grid.imagesLoaded().progress(function() {
            masonry_grid.masonry({
                itemSelector: '.masonry-article',
                transitionDuration: 0,
                percentPosition: true,
                stagger: 0,
            });
        });

        masonry_grid.masonry({
            itemSelector: '.masonry-article',
            transitionDuration: 0,
            percentPosition: true,
            stagger: 0,
        });

        /*
        ===========================
        = Image Lazyload Initialization
        ====================================
        */

        $('.lazy-bg-img, .img-lazyload').lazy({
            enableThrottle: false,
        });

        $(".lazy-img").Lazy({
            effect: "fadeIn",

            afterLoad: function(element) {

                masonry_grid.imagesLoaded().progress(function() {
                    masonry_grid.masonry({
                        itemSelector: '.masonry-article',
                        transitionDuration: 0,
                        percentPosition: true,
                        stagger: 0,
                    });
                });

                masonry_grid.masonry({
                    itemSelector: '.masonry-article',
                    transitionDuration: 0,
                    percentPosition: true,
                    stagger: 0,
                });
            },

            onFinishedAll: function() {
                
                $(".lazy-img").removeClass('lazy-img');
            }
        });

        /*
        ==========================
        = Post Carousel Initialization
        =======================================
        */

        $('.post-carousel-one').owlCarousel({

            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            lazyLoad: true,
            nav: true,
            dots: true,
            navText: ["<i class='fa fa-angle-left' aria-hidden='true'></i>","<i class='fa fa-angle-right' aria-hidden='true'></i>"],
            items: 1,
            smartSpeed: 1500,
        });

        /*
        ==========================
        = Search Form
        =======================================
        */
        body.on('click', '.search-icon', function(e) {

            e.preventDefault();

            var searchContainer = $('.search-form-container');

            if( searchContainer.hasClass('mb-close') ) {

                searchContainer.removeClass('mb-close').addClass('mb-open').slideDown();

                setTimeout( function() {

                  searchContainer.find('input[type="search"]').focus();
                }, 800 );
                
            } else {

                searchContainer.removeClass('mb-open').addClass('mb-close').slideUp();
            }
        });

        /*
        ==========================
        = Canvas Sidebar
        =======================================
        */
        body.on('click', '.canvas-icon, .canvas-sidebar-mask, .mb-close-btn', function(e) {

            e.preventDefault();

            canvasEvent();
        });


        /* Back To Top */

        $(window).scroll(function() {

            var height = $(window).scrollTop();

            if (height > 400) {

                $('.mb-to-top').fadeIn('slow');

            } else {

                $('.mb-to-top').fadeOut('slow');
            }
        });

        $(".mb-to-top").on('click', function(event) {

            event.preventDefault();

            $("html, body").animate({ scrollTop: 0 }, "slow");

            return false;
        });


        /* Sticky Sidebar */

        if( scriptObj.sticky_sidebar == '1'  ) {

            if( body.hasClass('sticky-sidebar') ) {

                jQuery('.primary-container, .sidebar-container').theiaStickySidebar();
            }
        }

        /* Sticky Menu */

        if( scriptObj.sticky_menu == '1' ) {

            if( body.hasClass('sticky-menu') ) {

                $(".menu-section").sticky({topSpacing:0});
            }
        }

        /* Loading posts with ajax */

        if( scriptObj.load_more_type == 'infinite_scroll' ) {

            if( ( body.hasClass( 'archive' ) ) || ( body.hasClass( 'blog' ) ) || ( body.hasClass( 'search-results' ) ) ) {

                var currentPage = parseInt( scriptObj.load_more['current_page'] );

                var loading = false;

                var scrollHandling = {
                    allow: true,
                    reallow: function() {
                        scrollHandling.allow = true;
                    },
                    delay: 400 
                };

                var pageType = '';

                if( body.hasClass('home') ) {

                    pageType = 'home-page';
                } 

                if( body.hasClass('archive') ) {

                    pageType = 'archive-page';
                }

                if( body.hasClass('search') ) {

                    pageType = 'search-page';
                }

                $(window).scroll(function() {

                    var hT = $('.infinite-scroll-container').offset().top,
                        hH = $('.infinite-scroll-container').outerHeight(),
                        wH = $(window).height(),
                        wS = $(this).scrollTop();

                    if( ! loading && scrollHandling.allow ) {

                        scrollHandling.allow = false;

                        setTimeout(scrollHandling.reallow, scrollHandling.delay);

                        if ( wS > ( ( hT + hH - wH ) - 250 ) ) {

                            loading = true;

                            $.ajax({

                                url : scriptObj.load_more['ajax_url'],

                                type : 'POST',
                                
                                data : {
                                    action : 'masonry_blog_load_posts_action',
                                    nonce : scriptObj.load_more['nonce'],
                                    page: currentPage,
                                    query: scriptObj.load_more['posts'],
                                    page_type : pageType
                                },

                                success : function( response ) {

                                    if( response ) {

                                        var masonryContainer = $('.masonry-row');

                                        masonryContainer.append( response );

                                        masonryContainer.imagesLoaded().progress(function() {

                                            masonryContainer.masonry({
                                                itemSelector: '.masonry-article',
                                            }).masonry('reloadItems').masonry('layout');
                                        }); 

                                        masonryContainer.masonry('reloadItems').masonry('layout').masonry({
                                            itemSelector: '.masonry-article',
                                        });                                     

                                        $(".lazy-img").Lazy({

                                            afterLoad: function() {

                                                masonryContainer.masonry({
                                                    itemSelector: '.masonry-article',
                                                }).masonry('reloadItems').masonry('layout');

                                                $(".lazy-img").removeClass('lazy-img');
                                            }
                                        }); 

                                        currentPage++;

                                        loading = false;   
                                    } else {                        

                                        $( '.infinite-scroll-container' ).hide();

                                        $( '.no-more-container' ).show();
                                    }
                                }
                            });
                        }
                    }
                });
            }
        }

        if( scriptObj.load_more_type == 'button_click_load' ) {

            var currentPage = scriptObj.load_more['current_page'];

            var pageType = '';

            if( body.hasClass('home') ) {

                pageType = 'home-page';
            } 

            if( body.hasClass('archive') ) {

                pageType = 'archive-page';
            }

            if( body.hasClass('search') ) {

                pageType = 'search-page';
            }

            $( 'body' ).on( 'click', '.load-more-btn',  function( e ) {

                e.preventDefault();

                $('.load-more-icon').show();

                $.ajax({

                    url : scriptObj.load_more['ajax_url'],

                    type : 'POST',
                    
                    data : {
                        action : 'masonry_blog_load_posts_action',
                        nonce : scriptObj.load_more['nonce'],
                        page: currentPage,
                        query: scriptObj.load_more['posts'],
                        page_type : pageType
                    },

                    success : function( response ) {

                        if( response ) {

                            var masonryContainer = $('.masonry-row');

                            masonryContainer.append( response );

                            masonryContainer.imagesLoaded().progress(function() {

                                masonryContainer.masonry({
                                    itemSelector: '.masonry-article',
                                }).masonry('reloadItems').masonry('layout');
                            });

                            masonryContainer.masonry('reloadItems').masonry('layout').masonry({
                                itemSelector: '.masonry-article',
                            });

                            $(".lazy-img").Lazy({

                                afterLoad: function() {

                                    $(".lazy-img").removeClass('lazy-img'); 

                                    masonryContainer.masonry({
                                        itemSelector: '.masonry-article',
                                    }).masonry('reloadItems').masonry('layout');
                                }
                            });

                            currentPage++;

                            $('.load-more-icon').hide();

                        } else {      

                            $( '.load-more-btn-container' ).hide();                  

                            $( '.no-more-container' ).show();
                        }
                    }
                });

            } );
        }
        
    });

    function canvasEvent() {

        var canvasContainer = $('.canvas-sidebar');

        if( canvasContainer.hasClass('mb-close') ) {

            canvasContainer.removeClass('mb-close').addClass('mb-open');
        } else {
            canvasContainer.removeClass('mb-open').addClass('mb-close');
        }
    }

})(jQuery);