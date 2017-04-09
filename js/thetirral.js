;
(function ($) {
	'use strict'

	
var testMobile;
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    var testiPad;
    var isiPad = {
        iOS: function() {
            return navigator.userAgent.match(/iPad/i);
        },
        any: function() {
            return ( isiPad.iOS() );
        }
    };
    
    
    
	
	   // 	
        
    var sliderWrap = function () {
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();
    
        
   if (windowWidth > 1024) {     
    
    $('.carousel-inner .item img').css({
        'height': windowHeight - 120,
        'width' : windowWidth
    })
   }
};
        
        
        
        
        
        
    
    
// Fixed header wrapper area when body scroll	
	
	
var headerWrap = function () {
	var windowWidth = $(window).width();
	if (windowWidth > 768) {
		var headerWrap = $('.header-wrap').offset().top;
		$(window).on('load scroll', function () {
			var y = $(this).scrollTop();
			if (y >= 107) {
				$('.header-wrap').addClass('show');
			} else {
				$('.header-wrap').removeClass('show');
			}
		});
	}
};

	
// Fixed header area when body scroll
var headerFixed = function () {
	var windowWidth = $(window).width();
	if (windowWidth > 768) {
		var headerFix = $('.site-header').offset().top;
		$(window).on('load scroll', function () {
			var y = $(this).scrollTop();
			if (y >= headerFix) {
				$('.site-header').addClass('fixed');
			} else {
				$('.site-header').removeClass('fixed');
			}
			if (y >= 107) {
				$('.site-header').addClass('float-header');
			} else {
				$('.site-header').removeClass('float-header');
				$('.site-header').removeClass('fixed');
			}
		});
	}
};
	
	
	
	
	
	
	
	
	
	
	
	
	
    
  // Responsive Menu 
    
     	var responsiveMenu = function() {
        
		var	menuType = 'desktop';

		$(window).on('load resize', function() {
			var currMenuType = 'desktop';

			if ( matchMedia( 'only screen and (max-width: 1024px)' ).matches ) {
				currMenuType = 'mobile';
			}
            
         
			if ( currMenuType !== menuType ) {
				menuType = currMenuType;

				if ( currMenuType === 'mobile' ) {
                   
					var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
					var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');

					$('#header').find('.header-wrap').after($mobileMenu);
					hasChildMenu.children('ul').hide();
					hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
					$('.btn-menu').removeClass('active');
				} else {
                  
					var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');

					$desktopMenu.find('.submenu').removeAttr('style');
					$('#header').find('.col-md-10').append($desktopMenu);
					$('.btn-submenu').remove();
				}
			}
		});

            
		$('.btn-menu').on('click', function() {
			$('#mainnav-mobi').slideToggle(300);
			$(this).toggleClass('active');
		});

		$(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
			$(this).toggleClass('active').next('ul').slideToggle(300);
			e.stopImmediatePropagation()
		});

                
	}
    
    
        
        


	
// Add go to top button 
var goTop = function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 800) {
			$('.go-top').addClass('show');
		} else {
			$('.go-top').removeClass('show');
		}
	});
	$('.go-top').on('click', function () {
		$("html, body").animate({
			scrollTop: 0
		}, 1000);
		return false;
	});
};

	
// Fixed sidebar when body scroll
var sidebar = function () {
	var windowWidth = $(window).width();
	if (windowWidth > 768) {
		var header_hght = $('.header-wrap').outerHeight();
		if ($("div").is(".carousel")) {
			var carousel_hght = $('.carousel').outerHeight();
			var top_hght = header_hght + carousel_hght;
		}
		if ($("div").is(".jumbotron")) {
			var jumbotron_hght = $('.jumbotron').outerHeight();
			var top_hght = header_hght + jumbotron_hght;
		}
		var top;
		$(window).scroll(function () {
			top = $(this).scrollTop();
			if ((top_hght) < (top + header_hght)) {
				$('#secondary').addClass('secondary-fixed');
			} else {
				$('#secondary').removeClass('secondary-fixed');
			}
		});
	}
};


// Fix the footer widget width in case fixed sidebar area
var sidebarFooterWidth = function () {
	var windowWidth = $(window).width();
	if (windowWidth > 768) {
		$(document).ready(function () {
			var secondaryWidth = $('#secondary').width();
			$('#sidebar-footer .row').css({
				'padding-right': secondaryWidth + 50
			})
		});
		$(window).resize(function () {
			var secondaryWidth = $('#secondary').width();
			$('#sidebar-footer .row').css({
				'padding-right': secondaryWidth + 50
			})
		});
	}
};

	
// Remove the scroll in Sidebar started from the size of the tablets ( Ipad = 768px)
var sidebarMobile = function () {
	var windowWidth = $(window).width();
	if (windowWidth < 768) {
		$('#secondary').removeClass('mCustomScrollbar');
	}
};
	
	
$(function () {
    
      
sliderWrap(); 

responsiveMenu();


    headerWrap();
headerFixed();

	
	
	
	
goTop();
//sidebar();
//sidebarFooterWidth();
//sidebarMobile();
    
    
    
});
})(jQuery);


















