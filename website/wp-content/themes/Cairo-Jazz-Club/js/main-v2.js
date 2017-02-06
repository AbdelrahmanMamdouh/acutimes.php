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
		//init Magnific Popup on each element with "modal-link" class which is inside Essential Grid div
		$('.esg-grid').magnificPopup({
			delegate: '.modal-link',
			type: 'ajax'
		});

		//init Magnific Popup on each element with "modal-link" class which is inside any div with artist class
		$('.artist').magnificPopup({
			delegate: '.modal-link',
			type: 'ajax'
		});

		//init Magnific Popup on each element with "modal-link" class which is inside any div with calendar class
		$('.calendar').magnificPopup({
			delegate: '.modal-link',
			type: 'ajax'
		});

		//init Magnific Popup on each element with "modal-link" class which is inside any div with event class
		$('.event').magnificPopup({
			delegate: '.modal-link',
			type: 'ajax'
		});
	}

	Init.HomeParallaxSlider = function () {
		// build controller
		var controller = new ScrollMagic.Controller({ vertical: true });

		// build tween
		var tween = TweenMax.fromTo(".parallax", 1, { bottom: 182 }, { bottom: 7975 });

		// build scene
		var scene = new ScrollMagic.Scene({ duration: 10000 })
			.setTween(tween)
			.addTo(controller);
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