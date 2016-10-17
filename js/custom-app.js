jQuery(document).ready(function ($) {
	"use strict";

	/*====== PRELOADER ======*/
	jQuery(window).load(function() {
	        // will first fade out the loading animation
		jQuery(".lines").fadeOut();
	        // will fade out the whole DIV that covers the website.
		jQuery(".preloader").delay(1000).fadeOut("slow");
	});
	/*====== MOBILE MENU SEPERATOR ======*/
	$('ul.mobile-menu li.menu-item-has-children').append('<span><i class="fa fa-caret-down" aria-hidden="true"></i></span>');

	/*====== SIDEBAR ======*/
	$('.sidebar-navigation').each(function(){
		$("body").on("click",".sidebar-button a", function(e){
	    	$("html").addClass("sidebar-nav-open");
	    	$(".sidebar-navigation, .blog-inwrap").addClass("open");

			e.stopPropagation();
	    	e.preventDefault();
	    });

	    $("body").on("click",".close-btn", function(e){
			$("html").removeClass("sidebar-nav-open");
			$(".sidebar-navigation, .blog-inwrap").removeClass("open");
			
	    	e.preventDefault();
	    });

	    var clone_sidebar_logo = $("header .brand-logo").clone();
	    var clone_sidebar_social = $("header .social-button .social-links ul").clone();
	    var clone_sidebar_copyright = $("footer .copyright p").clone();

	    $(".sidebar-navigation-logo").append(clone_sidebar_logo);
	    $(".sidebar-navigation-social").append(clone_sidebar_social);
	    $(".sidebar-navigation-copyright").append(clone_sidebar_copyright);

		$(".sidebar-navigation ul li.menu-item-has-children span").on("click", function() {
			var link = $(this);
			var closest_ul = link.closest("ul");
			var parallel_active_links = closest_ul.find(".active")
			var closest_li = link.closest("li");
			var link_status = closest_li.hasClass("active");
			var count = 0;

			closest_ul.find("ul").slideUp(function() {
				if (++count == closest_ul.find("ul").length)
						parallel_active_links.removeClass("active");
			});

			if (!link_status) {
				closest_li.children("ul").slideDown();
				closest_li.addClass("active");
			}
		});

		$('.scrollbar-macosx').scrollbar();

	});

	/*====== SOCIAL MEDIA ======*/ 
	$('header .social-button').each(function(){
		$('header .header-main .social-button ul').each(function(){  
		    var liItems = $(this);
		    var Sum = 0;
		    if(liItems.children('li').length >= 1){
		        $(this).children('li').each(function(i, e){
		            Sum += $(e).outerWidth(true);
		        });
		        $(this).width(Sum+1);
		    } 
		});
		$('header .header-main .social-button .social-toggle').on('click', function () {
        	$('header .header-main .social-links, header .header-main .social-toggle').toggleClass('active');
    	});

		$('header.style-2 .header-bottom .social-button ul').each(function(){  
		    var liItems = $(this);
		    var Sum = 0;
		    if(liItems.children('li').length >= 1){
		        $(this).children('li').each(function(i, e){
		            Sum += $(e).outerWidth(true);
		        });
		        $(this).width(Sum+1);
		    } 
		});
		$('header.style-2 .header-bottom .social-button .social-toggle').on('click', function () {
        	$('header.style-2 .header-bottom .social-links, header.style-2 .header-bottom .social-toggle').toggleClass('active');
    	});
	});

	/*====== MOBILE TOPBAR ======*/
	$('.search-for-mobile').each(function(){
		$('.search-for-mobile .mobile-search a').on('click', function () {
        	$('.search-for-mobile .mobile-search').toggleClass('open');
    	});
	});

	/*====== STICKY NAVBAR ======*/
	$('.header-bottom').each(function(){
		var window_scrolltop;
		var clone_navigation = $(".header-bottom").clone().addClass("sticky");
		var clone_fixed_logo = $("header .brand-logo").clone();
		var clone_fixed_search = $("header .header-main .search-button").clone();
		var clone_fixed_social = $("header .header-main .social-button").clone();

		if($("#wpadminbar").length>0){
			$("body").addClass("wpadminbar-open");
		}

		$("header").append(clone_navigation);
		$(".header-bottom.sticky").append(clone_fixed_logo);
		$(".header-bottom.sticky").append(clone_fixed_search);
		$(".header-bottom.sticky").append(clone_fixed_social);


		$(window).scroll(function(){
			window_scrolltop = $(this).scrollTop();
			if(window_scrolltop>500){
				$(".header-bottom.sticky").addClass("open");
			}
			else {
				$(".header-bottom.sticky").removeClass("open");
			}
		});

		$('header .header-bottom.sticky .social-button .social-toggle').on('click', function () {
        	$('header .header-bottom.sticky .social-links, header .header-bottom.sticky .social-toggle').toggleClass('active');
    	});

	});


	/*====== BLOG FEATURED ======*/

		$('.featured-style-1').slick({
		  dots: true,
		  arrows: true,
		  infinite: true,
		  autoplay: true,
		  speed: 300,
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 666,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});

		$('.featured-style-2').slick({
		  dots: true,
		  arrows: true,
		  infinite: true,
		  autoplay: true,
		  speed: 300,
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 1,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 666,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});

		$('.featured-style-3 .featured-style-width').slick({
		  dots: false,
		  arrows: true,
		  infinite: true,
		  autoplay: true,
		  speed: 300,
		  slidesToShow: 1,
		  slidesToScroll: 1,
		});

		$('.featured-style-4').slick({
		  dots: true,
		  arrows: true,
		  infinite: true,
		  autoplay: true,
		  centerMode: true,
		  centerPadding: '80px',
		  speed: 1200,
		  slidesToShow: 2,
		  slidesToScroll: 1,
		  autoplaySpeed: 3500,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1,
		        centerPadding: '0px',
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 2,
		        centerPadding: '0px',
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 666,
		      settings: {
		        slidesToShow: 1,
		        centerPadding: '0px',
		        slidesToScroll: 1
		      }
		    }
		  ]
		});

	

	/*====== CATEGORY POST SLIDER ======*/
	$('.category-posts').each(function(){

		$('.category-slider').slick({
		  dots: true,
		  arrows: false,
		  infinite: true,
		  autoplay: true,
		  speed: 300,
		  slidesToShow: 1,
		  slidesToScroll: 1
		});

	});

	/*====== CATEGORY POST SLIDER WIDGET ======*/
	$('.category-widget-slider ul').slick({
	    dots: true,
		arrows: false,
		infinite: true,
		autoplay: true,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1
	});


	/*====== CATEGORY ARTICLES ======*/
	$('.theme-category-articles').each(function(){

		$('.theme-category-articles-style-1').slick({
		  dots: false,
		  arrows: false,
		  infinite: true,
		  autoplay: true,
		  speed: 300,
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 1,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 666,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});

		$('.theme-category-articles-style-2').slick({
		  dots: false,
		  arrows: true,
		  fade: true,
		  infinite: true,
		  autoplay: true,
		  speed: 300,
		  slidesToShow: 1,
		  slidesToScroll: 1,
		});

	});



	/*====== STICKY SIDEBAR ======*/
	$('.sidebar').each(function(){
		$('.sidebar').theiaStickySidebar({
			additionalMarginTop: 70,
			additionalMarginBottom: 30,
		});
	});

	/*====== POST TYPE VIDEO ======*/
	$('.post-video').each(function(){
		$(".post-video").fitVids();
	});

	/*====== POST TYPE GALLERY ======*/
	$('.post-gallery').each(function(){
		$(".post-gallery").justifiedGallery({
			rowHeight: 200,
			margins: 1,
			lastRow: 'justify',
			captions : false,
		});
		$(".post-full-image .post-gallery").justifiedGallery({
			rowHeight: 270,
			margins: 1,
			lastRow: 'justify',
			captions : false,
		});
	});

	/*====== LIGHTBOX IMAGE ======*/
	$('a.lightbox-image').each(function(){
		$('a.lightbox-image').magnificPopup({
			type:'image',
			gallery:{
				enabled:true
			}
	  	});
  	});

	/*====== POST TYPE GRID FIXED HEIGH  ======*/
	$('.grid-style').each(function(){
		var $list		= $( '.blog-posts' ),
			$items		= $list.find( '.grid-style' ),
			setHeights	= function()
		    {
				$items.css( 'height', 'auto' );

				var perRow = Math.floor( $list.width() / $items.width() );
				if( perRow == null || perRow < 2 ) return true;

				for( var i = 0, j = $items.length; i < j; i += perRow )
				{
					var maxHeight	= 0,
						$row		= $items.slice( i, i + perRow );

					$row.each( function()
					{
						var itemHeight = parseInt( $( this ).outerHeight(), 10 );
						if ( itemHeight > maxHeight ) maxHeight = itemHeight;
					});
					$row.css( 'height', maxHeight );
				}
			};

		
		setHeights();
		$( window ).on( 'resize', setHeights );
		$list.find( 'img' ).on( 'load', setHeights );
	});

	/*====== COMMENT POST TOGLLE ======*/
	$('.post-comments .comments-title').each(function(){
		var $content = $(".comment-list").hide();
		$(".post-comments .comments-title a").on("click", function(e){
			$(this).toggleClass("expanded");
			$content.slideToggle();
		});
	});


	/*====== MEGA MENU ======*/
	function mousein_triger(){		
		var fullsize = $('.wrapper').width();
		if (fullsize > 700) {              
		$(".main-menu .menu-item").removeClass("active");
		$(this).addClass("active");	
		$(this).find('.mega-menu-wrapper').css('visibility', 'hidden').show();			
		$(this).find('.mega-menu-wrapper').height($(this).find('.mega-category').height());
		$(this).find('.mega-menu-wrapper').css('visibility', 'visible').hide();
		$(this).children('.mega-menu-wrapper, .sub-meni').fadeIn(150);
 
  		}
	}

	function mouseout_triger() {
        $(this).children('.mega-menu-wrapper, .sub-meni').fadeOut(150);
	}
	var settings = {
		sensitivity: 4,
		interval: 30,
		timeout: 300,
		over: mousein_triger,
		out:mouseout_triger
		
	};
	
	$('.main-menu .menu-item').not( '.sub-menu .menu-item' ).hoverIntent( settings );

    var settings1 = {
        sensitivity: 4,
        interval: 0,
        timeout: 300,
        over: mousein_triger,
        out:mouseout_triger
        
	};

	$( '.sub-menu .menu-item' ).hoverIntent( settings1 );

	/*====== BACK TO TOP ======*/
	$('.back-to-top').each(function(){
		var offset = 220;
		var duration = 500;
			$(window).scroll(function() {
				if ($(this).scrollTop() > offset) {
					$('.back-to-top').fadeIn(duration);
				} else {
					$('.back-to-top').fadeOut(duration);
				}
		});

		$('.back-to-top a').on("click", function(event) {

			event.preventDefault();
			$('html, body').animate({scrollTop: 0}, 1000);

		return false;
		});
	});


});