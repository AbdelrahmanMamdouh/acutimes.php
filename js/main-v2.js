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


		/*
    	 * ----------------------------------------------------------------
     	* ScrollMagic init (Home Parallax Slider) 
     	* ----------------------------------------------------------------
     	*/
		// build controller
		var controller = new ScrollMagic.Controller({vertical: true});

		// build tween
        var tween =TweenMax.fromTo (".parallax", 0.75, {bottom: 400}, {bottom: 7975});

        // build scene
        var scene = new ScrollMagic.Scene({TriggerElement: "#trigger", duration: 10000})
                    .setTween(tween)
                    .addTo(controller);
        /*
    	* ----------------------------------------------------------------
     	* ScrollMagic init (Home Parallax Slider) 
     	* ----------------------------------------------------------------
     	*/


	});
})(jQuery);