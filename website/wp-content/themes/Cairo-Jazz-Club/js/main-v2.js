var Init = (function ($) {

	var Init = {};

	/**
	 * run all the necessary init functions
	 * add you new function here to be automaticly run on each page load
	 */
	Init.AutoRun = function () {
		$(document).ready(function () {

			Init.ResponsiveMenu();
			Init.MagnificPopup();
			Init.HomeParallaxSlider();
			Init.Footer();

		});
	}

	Init.ResponsiveMenu = function () {
		$(".main-menu").mmenu({
			offCanvas: {
				position: "right",
				zposition: "front"
			}
		}, {	// configuration
				clone: true
			});
	}

	Init.MagnificPopup = function () {
		// init Magnific Popup on each element with "modal-link" class
		$('body').magnificPopup({
			delegate: '.modal-link',
			type: 'ajax',

			/**
			* Remove and re-add the class to fix a scroll bug.
			* open(): Will fire when the popup is OPENED
			* afterClose():Will fire when the popup is COMPLETELY CLOSED 
			*/
			callbacks: {
				open: function() {
					$('body').removeClass('hide-horizontal-scrollbar');
				},
				afterClose: function() {
					$('body').addClass('hide-horizontal-scrollbar');
				}
			}
		}).addClass('hide-horizontal-scrollbar'); // Add the class for the first time in init.

		// init inline Magnific Popup on each element with "modal-link-inline" class which is inside a containter with "social-icons" class
		$('.social-icons').magnificPopup({
			delegate: '.modal-link-inline',
			type: 'inline'
		})

	}

	Init.HomeParallaxSlider = function () {
		// build controller
		var controller = new ScrollMagic.Controller({ vertical: true });
		var tween;
		// build scene
		var scene = new ScrollMagic.Scene({ duration: 10000 });
		scene.addTo(controller);

		var pararezize = function () {

			var buttonStart = 182;
			var winWidth = $(window).width();
			
			if (winWidth <= 600) {
				buttonStart = 70;
			} else if (winWidth <= 768) {
				buttonStart = 60;
			} else if (winWidth <= 1024) {
				buttonStart = 110;
			};

			tween = TweenMax.fromTo(".parallax", 1, { bottom: buttonStart }, { bottom: 7975 });
			scene.setTween(tween);

		};

		pararezize();

		$(window).bind("resize", pararezize);


		// Events Slider
		$('.events-slider').slick({
			centerMode: true,
			arrows: false,
			centerPadding: '20px',
			slidesToShow: 3,
			responsive: [{
				breakpoint: 680,
				settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '0',
					slidesToShow: 3
				}
			}, {
				breakpoint: 580,
				settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '0',
					slidesToShow: 1
				}
			}]
		});
	}

	Init.Footer = function () {
		var footermenuheight = $(".bottom-footer").outerHeight();
		$(".bottom-footer").css({ "bottom": -footermenuheight });
		$(".footer-container").css({ "padding-bottom": footermenuheight });
		$(window).scroll(function () {
			if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
				$(".bottom-footer").css({ "bottom": 0 });
			} else {
				$(".bottom-footer").css({ "bottom": -footermenuheight });
			}
		});
	}

	Init.Event = function (ApiURL) {
		// Calendar
		var thisMonth = moment().format('YYYY-MM');

		// Events to load into calendar
		$.getJSON(ApiURL, function (data) {
			var eventArray = data;

			$('.calendar').clndr({
				daysOfTheWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
				events: eventArray,
				multiDayEvents: {
					singleDay: 'date',
					endDate: 'endDate',
					startDate: 'startDate'
				},
				showAdjacentMonths: true,
				adjacentDaysChangeMonth: false,
				template: $('#template-calendar').html(),
			});
		});
	};

	return Init;
})(jQuery);

Init.AutoRun();