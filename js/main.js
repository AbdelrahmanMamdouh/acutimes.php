(function ($) {
	$(document).ready(function () {

		if (enquire.register("screen and (min-width: 768px)", {
			deferSetup: !0,
			match: function () {
				skrollr.init({ forceHeight: false });
			},
			unmatch: function () {
				var e = skrollr.init({ forceHeight: false });
				e.destroy()
			}
		}), Modernizr.touch) {
			var e = skrollr.init({ forceHeight: false });
			e.destroy()
		}

		// Responsive Menu
		$(".main-menu").mmenu({
			offCanvas: {
				position: "right",
				zposition: "front"
			}
		}, {
				// configuration
				clone: true
			});

		// Form Labels
		inputCheck($('.input input'));

		$(".input input")
			.focus(function () {

				$(this).parent().addClass('focused');

			})
			.focusout(function () {

				inputCheck($(this));

			});

		function inputCheck(element) {
			var value = $(element).val();

			if (value.length > 0) {

				$(element).parent().addClass('have-data');

			} else {

				$(element).val('');
				$(element).parent().removeClass('focused');
				$(element).parent().removeClass('have-data');
			}
		}

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

		$('.hero-slider').slick({
			fade: true,
			cssEase: 'linear',
			autoplay: true,
			arrows: false
		});

		$('body').magnificPopup({
			delegate: '.modal-link'
		});

		$('.album').each(function () { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true,
				}
			});
		});

		$('.media-video').each(function () { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'iframe',
				iframe: {
					markup: '<div class="mfp-iframe-scaler">' +
					'<div class="mfp-close"></div>' +
					'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
					'</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button

					patterns: {
						youtube: {
							index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

							id: 'v=', // String that splits URL in a two parts, second part should be %id%
							// Or null - full URL will be returned
							// Or a function that should return %id%, for example:
							// id: function(url) { return 'parsed id'; }

							src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
						},
						vimeo: {
							index: 'vimeo.com/',
							id: '/',
							src: '//player.vimeo.com/video/%id%?autoplay=1'
						}
					},

					srcAction: 'iframe_src', // Templating object key. First part defines CSS selector, second attribute. "iframe_src" means: find "iframe" and set attribute "src".
				}
			});
		});

		$(function () {

			$(".attendees")
				.prepend('<div class="num-button num-organ">-</div>')
				.append('<div class="num-button num-organ">+</div>');

			$(".num-button").on("click", function () {

				console.log('button clicked');

				var $button = $(this);
				var oldValue = $button.parent().find("input").val();

				console.log(oldValue);

				if ($button.text() == "+") {
					var newVal = parseFloat(oldValue) + 1;
				} else {
					// Don't allow decrementing below one
					if (oldValue > 1) {
						var newVal = parseFloat(oldValue) - 1;
					} else {
						newVal = 1;
					}
				}

				$button.parent().find("input").val(newVal);

			});

		});

		$(function () {
			$(".wpas-select").wrap('<div class="select-wrap"></div>');
		});


		// Random events positioning
		// function eventPositions(item) {
		//  var sizes = ['lg', 'md', 'sm'];
		//  var positions = ['pos-1', 'pos-2', 'pos-3', 'pos-4', 'pos-5', 'pos-6', 'pos-7'];
		//  var appliedPositions = [];

		//  $(item).each(function(){
		//      var randSize = sizes[Math.floor(Math.random()*sizes.length)];
		//      var randPos = positions[Math.floor(Math.random()*positions.length)];
		//      var element = $(this);

		//      element.addClass('circule--' + randSize);

		//      function first(position) {

		//          if(appliedPositions.indexOf(position) == -1) {

		//              appliedPositions.push(position);
		//              console.log(element);
		//              element.addClass(position);

		//          } else {

		//              first(randPos)
		//          }

		//      }; first(randPos);


		//  });

		// }; eventPositions($('.event'));

	});
})(jQuery);