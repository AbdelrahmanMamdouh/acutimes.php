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
			Init.Modal();
		

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
				open: function () {
					$('body').removeClass('hide-horizontal-scrollbar');
				},
				afterClose: function () {
					$('body').addClass('hide-horizontal-scrollbar');
				}
			}
		}).addClass('hide-horizontal-scrollbar'); // Add the class for the first time in init.

		// init inline Magnific Popup on each element with "modal-link-inline" class which is inside a containter with "social-icons" class
		$('.social-icons').magnificPopup({
			delegate: '.modal-link-inline',
			type: 'inline',

			/**
			* Remove and re-add the class to fix a scroll bug.
			* open(): Will fire when the popup is OPENED
			* afterClose():Will fire when the popup is COMPLETELY CLOSED 
			*/
			callbacks: {
				open: function () {
					$('body').removeClass('hide-horizontal-scrollbar');
				},
				afterClose: function () {
					$('body').addClass('hide-horizontal-scrollbar');
				}
			}
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
	Init.Modal = function() {
		var firstlogin = document.getElementById("filled").value;
		if(firstlogin == 1){
    $(window).load(function () {
        $.magnificPopup.open({
            items: {
                src: 'wp-content/themes/Cairo-Jazz-Club/modal-templates/preference-modal.php',
				type: 'ajax'
				
	 }
        					});
   								 });}
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


var Forms = (function ($) {
	var Forms = {};

	Forms.ReserveEvent = function (form_submit_to) {

		var form = $("#form_reserve_ticket");
		var respon = $("#form_reserve_ticket_responce");

		$.post(form_submit_to, form.serialize())
			.done(function () {
				form.hide('slow');
				respon.text('thank you, your request is beeing processed');
			})
			.fail(function () {
				form.hide('slow');
				respon.text('an error happened pls try again later');
			})
			.always(function () {

			});
		return false;
	};

	Forms.PrefsClick = function () {
		$('#form_prefs').submit(function (evt) {
			evt.preventDefault();
			//window.history.back();
		});
	}

	Forms.Prefs = function (form_submit_to) {
		var form = $("#form_prefs");
		var respon = $("#form_prefs_responce");

		var data = [];

		var CheckBoxes = document.getElementsByName("pref_check");

		for (var key in CheckBoxes) {
			if (CheckBoxes.hasOwnProperty(key)) {
				var element = CheckBoxes[key];
				if (element.checked) {
					data.push(element.id);
				}
			}
		}

		$.ajax({
			type: 'POST',
			url: form_submit_to,
			data: JSON.stringify(data),
			contentType: "application/json",
			dataType: 'json'
		})
			.done(function () {
				form.hide('slow');
				respon.text('thank you, your preference have been saved');
			})
			.fail(function () {
				form.hide('slow');
				respon.text('an error happened pls try again later');
			})
			.always(function () {

			});

		return false;
	};


	Forms.PrefsClickModal = function () {
		$('#form_prefs_modal').submit(function (evt) {
			evt.preventDefault();
			//window.history.back();
		});
	}

	Forms.PrefsModal = function (form_submit_to) {
		var form = $("#form_prefs_modal");
		var respon = $("#form_prefs_responce_modal");

		var data = [];

		var CheckBoxes = document.getElementsByName("pref_check_modal");

		for (var key in CheckBoxes) {
			if (CheckBoxes.hasOwnProperty(key)) {
				var element = CheckBoxes[key];
				if (element.checked) {
					data.push(element.id);
				}
			}
		}

		$.ajax({
			type: 'POST',
			url: form_submit_to,
			data: JSON.stringify(data),
			contentType: "application/json",
			dataType: 'json'
		})
			.done(function () {
				form.hide('slow');
				respon.text('thank you, your preference have been saved');
			})
			.fail(function () {
				form.hide('slow');
				respon.text('an error happened pls try again later');
			})
			.always(function () {

			});

		return false;
	};



	return Forms;
})(jQuery);
