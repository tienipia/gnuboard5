(function() {
	var method;
	var noop = function noop() { };
	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeStamp', 'trace', 'warn'
	];
	var length = methods.length;
	var console = (window.console = window.console || {});
	while (length--) {
		method = methods[length];
		// Only stub undefined methods.
		if (!console[method]) {
			console[method] = noop;
		}
	}
}());

(function($) {
	$.fn.classyNav = function(options) {
		// Variables
		var navContainer = $('.classy-nav-container');
		var classy_nav = $('.classynav ul');
		var classy_navli = $('.classynav > ul > li');
		var navbarToggler = $('.classy-navbar-toggler');
		var closeIcon = $('.classycloseIcon');
		var navToggler = $('.navbarToggler');
		var classyMenu = $('.classy-menu');
		var var_window = $(window);

		// default options
		var defaultOpt = $.extend({
			theme: 'light',
			breakpoint: 991,
			openCloseSpeed: 350,
			megaopenCloseSpeed: 700,
			alwaysHidden: false,
			openMobileMenu: 'left',
			dropdownRtl: false,
			stickyNav: false,
			stickyFooterNav: false
		}, options);

		return this.each(function() {

			// light or dark theme
			if (defaultOpt.theme === 'light' || defaultOpt.theme === 'dark') {
				navContainer.addClass(defaultOpt.theme);
			}

			// open mobile menu direction 'left' or 'right' side
			if (defaultOpt.openMobileMenu === 'left' || defaultOpt.openMobileMenu === 'right') {
				navContainer.addClass(defaultOpt.openMobileMenu);
			}

			// dropdown rtl
			if (defaultOpt.dropdownRtl === true) {
				navContainer.addClass('dropdown-rtl');
			}

			// navbar toggler
			navbarToggler.on('click', function() {
				navToggler.toggleClass('active');
				classyMenu.toggleClass('menu-on');
			});

			// close icon
			closeIcon.on('click', function() {
				classyMenu.removeClass('menu-on');
				navToggler.removeClass('active');
			});

			// add dropdown & megamenu class in parent li class
			classy_navli.has('.dropdown').addClass('cn-dropdown-item');
			classy_navli.has('.megamenu').addClass('megamenu-item');

			// adds toggle button to li items that have children
			classy_nav.find('li a').each(function() {
				if ($(this).next().length > 0) {
					$(this).parent('li').addClass('has-down').append('<span class="dd-trigger"></span>');
				}
			});

			// expands the dropdown menu on each click
			classy_nav.find('li .dd-trigger').on('click', function(e) {
				e.preventDefault();
				$(this).parent('li').children('ul').stop(true, true).slideToggle(defaultOpt.openCloseSpeed);
				$(this).parent('li').toggleClass('active');
			});

			// add padding in dropdown & megamenu item
			$('.megamenu-item').removeClass('has-down');

			// expands the megamenu on each click
			classy_nav.find('li .dd-trigger').on('click', function(e) {
				e.preventDefault();
				$(this).parent('li').children('.megamenu').slideToggle(defaultOpt.megaopenCloseSpeed);
			});

			// check browser width in real-time
			function breakpointCheck() {
				var windoWidth = window.innerWidth;
				if (windoWidth <= defaultOpt.breakpoint) {
					navContainer.removeClass('breakpoint-off').addClass('breakpoint-on');
				} else {
					navContainer.removeClass('breakpoint-on').addClass('breakpoint-off');
				}
			}

			breakpointCheck();

			var_window.on('resize', function() {
				breakpointCheck();
			});

			// always hidden enable
			if (defaultOpt.alwaysHidden === true) {
				navContainer.addClass('breakpoint-on').removeClass('breakpoint-off');
			}

			// sticky
			if (defaultOpt.stickyNav === true) {
				var_window.on('scroll', function() {
					if (var_window.scrollTop() > 0) {
						navContainer.addClass('classy-sticky');
					} else {
						navContainer.removeClass('classy-sticky');
					}
				});
			}

			// footer sticky
			if (defaultOpt.stickyFooterNav === true) {
				navContainer.addClass('classy-sticky-footer');
			}
		});
	};
}(jQuery));

(function($) {
	'use strict';
	var uza_window = $(window);

	// ****************************
	// :: 1.0 Preloader Active Code
	// ****************************
	uza_window.on('load', function() {
		$('#preloader').fadeOut('1000', function() {
			$(this).remove();
		});
	});

	// ****************************
	// :: 2.0 ClassyNav Active Code
	// ****************************
	if ($.fn.classyNav) {
		$('#uzaNav').classyNav();
	}

	// *********************************
	// :: 3.0 Welcome Slides Active Code
	// *********************************

	if ($.fn.owlCarousel) {
		var welcomeSlider = $('.welcome-slides');
		welcomeSlider.owlCarousel({
			items: 1,
			loop: true,
			autoplay: true,
			smartSpeed: 1500,
			animateIn: 'fadeIn',
			animateOut: 'fadeOut',
			autoplayTimeout: 7000,
			nav: false
		})
		welcomeSlider.on('translate.owl.carousel', function() {
			var layer = $("[data-animation]");
			layer.each(function() {
				var anim_name = $(this).data('animation');
				$(this).removeClass('animated ' + anim_name).css('opacity', '0');
			});
		});
		$("[data-delay]").each(function() {
			var anim_del = $(this).data('delay');
			$(this).css('animation-delay', anim_del);
		});
		$("[data-duration]").each(function() {
			var anim_dur = $(this).data('duration');
			$(this).css('animation-duration', anim_dur);
		});
		welcomeSlider.on('translated.owl.carousel', function() {
			var layer = welcomeSlider.find('.owl-item.active').find("[data-animation]");
			layer.each(function() {
				var anim_name = $(this).data('animation');
				$(this).addClass('animated ' + anim_name).css('opacity', '1');
			});
		});
	}

	// ***********************************
	// :: 4.0 Portfolio Slides Active Code
	// ***********************************
	if ($.fn.owlCarousel) {
		var portfolioSlide = $('.portfolio-sildes');
		portfolioSlide.owlCarousel({
			items: 4,
			margin: 50,
			loop: true,
			autoplay: true,
			smartSpeed: 1500,
			dots: true,
			responsive: {
				0: {
					items: 1
				},
				576: {
					items: 2
				},
				992: {
					items: 3
				},
				1400: {
					items: 4
				}
			}
		});
	}

	// *************************************
	// :: 5.0 Testimonial Slides Active Code
	// *************************************
	if ($.fn.owlCarousel) {
		var testimonialSlide = $('.testimonial-slides');
		testimonialSlide.owlCarousel({
			items: 1,
			margin: 0,
			loop: true,
			autoplay: true,
			autoplayTimeout: 10000,
			smartSpeed: 1500,
			nav: true,
			navText: ['<i class="arrow_carrot-left"></i>', '<i class="arrow_carrot-right"></i>']
		});
	}

	// ******************************
	// :: 6.0 Team Slides Active Code
	// ******************************
	if ($.fn.owlCarousel) {
		var teamSlide = $('.team-sildes');
		teamSlide.owlCarousel({
			items: 4,
			margin: 50,
			loop: true,
			autoplay: true,
			smartSpeed: 1500,
			dots: true,
			responsive: {
				0: {
					items: 1
				},
				576: {
					items: 2
				},
				992: {
					items: 3
				},
				1400: {
					items: 4
				}
			}
		});
	}

	// *******************************
	// :: 7.0 ImagesLoaded Active Code
	// *******************************
	if ($.fn.imagesLoaded) {
		$('.uza-portfolio').imagesLoaded(function() {
			// filter items on button click
			$('.portfolio-menu').on('click', 'button', function() {
				var filterValue = $(this).attr('data-filter');
				$grid.isotope({
					filter: filterValue
				});
			});
			// init Isotope
			var $grid = $('.uza-portfolio').isotope({
				itemSelector: '.single-portfolio-item',
				percentPosition: true,
				masonry: {
					columnWidth: '.single-portfolio-item'
				}
			});
		});
	}

	// *********************************
	// :: 8.0 Portfolio Menu Active Code
	// *********************************
	$('.portfolio-menu button.btn').on('click', function() {
		$('.portfolio-menu button.btn').removeClass('active');
		$(this).addClass('active');
	})

	// *********************************
	// :: 9.0 Magnific Popup Active Code
	// *********************************
	if ($.fn.magnificPopup) {
		$('.video-play-btn').magnificPopup({
			type: 'iframe'
		});
	}

	// ***************************
	// :: 10.0 Tooltip Active Code
	// ***************************
	if ($.fn.tooltip) {
		$('[data-toggle="tooltip"]').tooltip();
	}

	// ***********************
	// :: 11.0 WOW Active Code
	// ***********************
	if (uza_window.width() > 767) {
		new WOW().init();
	}

	// ****************************
	// :: 12.0 Jarallax Active Code
	// ****************************
	if ($.fn.jarallax) {
		$('.jarallax').jarallax({
			speed: 0.2
		});
	}

	// ****************************
	// :: 13.0 Scrollup Active Code
	// ****************************
	if ($.fn.scrollUp) {
		uza_window.scrollUp({
			scrollSpeed: 2000,
			scrollText: '<i class="fa fa-angle-up"</i>'
		});
	}
	// **************************
	// :: 14.0 Sticky Active Code
	// **************************
	uza_window.on('scroll', function() {
		if (uza_window.scrollTop() > 0) {
			$('.main-header-area').addClass('sticky');
		} else {
			$('.main-header-area').removeClass('sticky');
		}
	});
	// ********************************
	// :: 15.0 Slick Slider Active Code
	// ********************************
	if ($.fn.counterUp) {
		$('.counter').counterUp({
			delay: 15,
			time: 1500
		});
	}
	// *********************************
	// :: 16.0 Prevent Default 'a' Click
	// *********************************
	$('a[href="#"]').click(function($) {
		$.preventDefault();
	});

})(jQuery);