var Init = (function ($) {
	//"use strict";
	var Init = {};

    /**
     * run all the necessary init functions
     * add you new function here to be automaticly run on each page load
     */
	Init.AutoRun = function () {
		$(document).ready(function () {

            //Init.Modal();
            Init.ResponsiveMenu();
			Init.MagnificPopup();
			Init.HomeParallaxSlider();
			Init.Footer();
			Init.Header();
		});
	};

	Init.ResponsiveMenu = function () {
		$(".main-menu").mmenu({
			offCanvas: {
				position: "right",
				zposition: "front"
			}
		}, { // configuration
				clone: true
			});
	};

	Init.MagnificPopup = function () {

		// Remove and re-add the class to fix a scroll bug.
		var open = function () { // open(): Will fire when the popup is OPENED
			$('body').removeClass('hide-horizontal-scrollbar');
		};
		var afterClose = function () { // afterClose():Will fire when the popup is COMPLETELY CLOSED 
			$('body').addClass('hide-horizontal-scrollbar');
		};

		// init Magnific Popup on each element with "modal-link" class
		$('body').magnificPopup({
			delegate: '.modal-link',
			type: 'ajax',
			modal:true
			callbacks: {
				open: open,
				afterClose: afterClose
			}
		}).addClass('hide-horizontal-scrollbar'); // Add the class for the first time in init.

		// init inline Magnific Popup on each element with "modal-link-inline" class which is inside a containter with "social-icons" class
		$('body').magnificPopup({
			delegate: '.modal-link-inline',
			type: 'inline',
			callbacks: {
				open: open,
				afterClose: afterClose
			}
		});

		if (document.getElementById("filled").value === 0) {
			$.magnificPopup.open({
				items: {
					src: 'wp-content/themes/Cairo-Jazz-Club/modal-templates/preference-modal.php',
					type: 'ajax'
				}
			});
		}
	};

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
	};
	


	Init.Event = function (ApiURL) {
		// Calendar
		var thisMonth = moment().format('YYYY-MM');

		// Events to load into calendar
		$.getJSON(ApiURL, function (data) {
			var eventArray = data;

			if ($(window).width() >= 1024) {

				$('.calendar').clndr({
					daysOfTheWeek: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday '],
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

			} else {

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
			}

		});
	};

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




	};

	Init.Header = function () {




		if ($(window).width() > 1024) {

			// bubble home

			if ($('#bubble').length > 0) {
				var waypoint = new Waypoint({
					element: document.getElementById('bubble'),
					handler: function (direction) {
						$(".desktop-events .event:nth-child(1)").delay(1100).fadeIn().addClass("bounceIn");
						$(".desktop-events .event:nth-child(2)").delay(1500).fadeIn().addClass("bounceIn");
						$(".desktop-events .event:nth-child(3)").delay(1400).fadeIn().addClass("bounceIn");
						$(".desktop-events .event:nth-child(4)").delay(900).fadeIn().addClass("bounceIn");
						$(".desktop-events .event:nth-child(5)").delay(1200).fadeIn().addClass("bounceIn");
						$(".desktop-events .event:nth-child(6)").delay(300).fadeIn().addClass("bounceIn");
						$(".desktop-events .event:nth-child(7)").delay(100).fadeIn().addClass("bounceIn");
						$(".rand-artists .artist:nth-child(1)").delay(1300).fadeIn().addClass("bounceIn");
						$(".rand-artists .artist:nth-child(2)").delay(400).fadeIn().addClass("bounceIn");
						$(".rand-artists .artist:nth-child(3)").delay(900).fadeIn().addClass("bounceIn");
						$(".rand-artists .artist:nth-child(4)").delay(700).fadeIn().addClass("bounceIn");
						$(".rand-artists .artist:nth-child(5)").delay(200).fadeIn().addClass("bounceIn");
						$(".rand-artists .artist:nth-child(6)").delay(900).fadeIn().addClass("bounceIn");
						$(".rand-artists .artist:nth-child(7)").delay(600).fadeIn().addClass("bounceIn");
					},
					offset: '70%'
				});
			}

			// fixed slider

			var sliderheight = $(".metaslider").height();
			$(".metaslider").css({ "height": sliderheight });
			$(".flexslider").css({ "position": "fixed" });

			//header
			$(window).on('scroll', function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > 50) {
					//$('header').css({"height": "70px"});
					$('header .logo img').css({ "height": "60px", "transition": "all 0.3s ease-in-out" });
					$('div:not([id^="mm-"]) .main-menu ul').css({ "margin-top": "2rem", "transition": "all 0.3s ease-in-out" });
					$('.top-icons .social-icons').css({ "margin-top": "0rem", "transition": "all 0.3s ease-in-out" });
					$(".flexslider").css({ "margin-top": "-40px", "transition": "all 0.3s ease-in-out" });

				} else {
					//$('header').css({"height": "auto"}); 
					$('header .logo img').css({ "height": "100", "transition-delay": "2s", "transition": "all 0.3s ease-in-out" });
					$('div:not([id^="mm-"]) .main-menu ul').css({ "margin-top": "4rem", "transition-delay": "2s", "transition": "all 0.2s ease-in-out" });
					$('.top-icons .social-icons').css({ "margin-top": "2rem", "transition-delay": "2s", "transition": "all 0.2s ease-in-out" });
					$(".flexslider").css({ "margin-top": "0px", "transition": "all 0.3s ease-in-out" });
				}
			});



			// artist dropdown when page open for 1st
			$('.artists-grid .esg-dropdown-wrapper').css({ "display": "none" });


			// fixed section on scroll
			var secfixedheight = $('.home .photogallery .myportfolio-container #eg-3-post-id-437').height();
			$('.home .photogallery').css({ "height": secfixedheight, "background-color": "#214e58" });

			var secfixedheightb = $('.home .bn-in .bnwarp .half').height();
			$('.home .bn-in').css({ "height": secfixedheightb + 300, "background-color": "#214e58" });

			var screenheight = $(window).height();
			var docheight = $(document).height();
			var empetysheight = screenheight - (secfixedheight + secfixedheightb + 80);

			var footerheight = $('.home .top-footer').height();
			$('.home footer').css({ "height": footerheight });

			var docwithoutfooter = docheight - screenheight;
			var topspacebeforfixed = $('.metaslider').height() - ($('.events-content').outerHeight() / 2);


			$(window).on('scroll', function () {
				var scrollTop = $(window).scrollTop();
				if ($(window).width() > 1600) {

					if (scrollTop > (docwithoutfooter - (footerheight + empetysheight - 80))) {
						$('.home .top-footer').css({ "position": "relative", "top": "auto" });
						$(".flexslider").css({ "position": "relative" });
						console.log("footerheight" + footerheight + "empetyspace" + empetysheight);
					} else if (scrollTop > (topspacebeforfixed - 80)) {

						$('.home .bn-in .bnwarp').css({ "position": "fixed", "top": secfixedheight + 80 });
						$('.home .photogallery .vc_column-inner article#2 .esg-container-fullscreen-forcer').css({ "position": "fixed", "top": "80px" });
						$('.home .top-footer').css({ "position": "fixed", "top": secfixedheight + secfixedheightb + 80 });
						$(".flexslider").css({ "position": "relative" });
					} else {
						$('.home .top-footer').css({ "position": "relative", "top": "auto" });
						$('.home .bn-in .bnwarp').css({ "position": "relative", "top": "auto" });
						$('.home .photogallery .vc_column-inner article#2 .esg-container-fullscreen-forcer').css({ "position": "relative", "top": "auto" });
						$(".flexslider").css({ "position": "fixed" });
					}


				} else {
					if (scrollTop > (docwithoutfooter - (footerheight + empetysheight))) {
						$('.home .top-footer').css({ "position": "relative", "top": "auto" });
						$(".flexslider").css({ "position": "relative" });
						console.log("footerheight" + footerheight + "empetyspace" + empetysheight);
					} else if (scrollTop > (topspacebeforfixed - 40)) {

						$('.home .bn-in .bnwarp').css({ "position": "fixed", "top": secfixedheight + 80 });
						$('.home .photogallery .vc_column-inner article#2 .esg-container-fullscreen-forcer').css({ "position": "fixed", "top": "80px" });
						$('.home .top-footer').css({ "position": "fixed", "top": secfixedheight + secfixedheightb + 80 });
						$(".flexslider").css({ "position": "relative" });
					} else {
						$('.home .top-footer').css({ "position": "relative", "top": "auto" });
						$('.home .bn-in .bnwarp').css({ "position": "relative", "top": "auto" });
						$('.home .photogallery .vc_column-inner article#2 .esg-container-fullscreen-forcer').css({ "position": "relative", "top": "auto" });
						$(".flexslider").css({ "position": "fixed" });
					}
				}

			});

		}

        /*
        var secfixedheight = $('.entry-content .vc_row-fluid:last-child').height();
        $('.entry-content .vc_row-fluid:last-child').css({ "height": secfixedheight });
        var topspacebeforfixed = $('.vc_row wpb_row vc_row-fluid:first-child').height() + $('header').height();
        $(window).on('scroll', function () {
        	var scrollTop = $(window).scrollTop();
        	if (scrollTop > topspacebeforfixed) {
        		$('.entry-content .vc_row-fluid:last-child .vc_column_container').css({ "position": "fixed", "top": "0" });
        	} else {
        		$('.entry-content .vc_row-fluid:last-child .vc_column_container').css({ "position": "fixed", "top": "0" });
        	}

        });
        */
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


			.done(function (response) {
				form.hide('slow');
				resrponsjson = JSON.parse(response);
				if (resrponsjson.status == "AlreadyReserved") {
					respon.text('you have already reserved!');

				} else {

					respon.text('thank you, your request is beeing processed');
				}
			})
			.fail(function () {
				form.hide('slow');
				respon.text('an error happened pls try again later');
			})
			.always(function () {


			});

		return false;
	};

	Forms.Prefs = function (form_submit_to) {
		var form = $("#form_prefs");
		var respon = $("#form_prefs_responce");

		var data = { checkBoxes: [], userFields: {} };

		$('input[name="user_fields"]').each(function () {
			if (this.value) {
				data.userFields[this.id] = this.value;
			}
		});

		var CheckBoxes = document.getElementsByName("pref_check");

		for (var key in CheckBoxes) {
			if (CheckBoxes.hasOwnProperty(key)) {
				var element = CheckBoxes[key];
				if (element.checked) {
					data.checkBoxes.push(element.id);
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
				respon.text('Thank you, your preferences have been saved');
			})
			.fail(function () {
				form.hide('slow');
				respon.text('an error happened pls try again later');
			})
			.always(function () {

			});

		return false;
	};

	Forms.PrefsModal = function (form_submit_to) {
		var form = $("#form_prefs_modal");
		var respon = $("#form_prefs_responce_modal");

		var data = { checkBoxes: [], userFields: {} };

		$('input[name="user_fields_modal"]').each(function () {
			if (this.value) {
				data.userFields[this.id] = this.value;
			}
		});

		var CheckBoxes = document.getElementsByName("pref_check_modal");

		for (var key in CheckBoxes) {
			if (CheckBoxes.hasOwnProperty(key)) {
				var element = CheckBoxes[key];
				if (element.checked) {
					data.checkBoxes.push(element.id);
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
				respon.text('Thank you, your preferences have been saved');
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