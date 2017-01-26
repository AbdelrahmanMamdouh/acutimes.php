(function ($) {
	$(document).ready(function () {


		// Responsive Menu
		$(".main-menu").mmenu({
			offCanvas: {
				position: "right",
				zposition: "front"
			}
		}, {	// configuration
				clone: true
			});


		//init Magnific Popup on each element with "modal-link" class
		$('.modal-link').magnificPopup({
			type: 'ajax'
		});


	});
})(jQuery);