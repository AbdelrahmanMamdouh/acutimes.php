(function ($) {
	$(document).ready(function () {

		/*
			____                                   _               __  ___                
		   / __ \___  _________  ____  ____  _____(_)   _____     /  |/  /__  ____  __  __
		  / /_/ / _ \/ ___/ __ \/ __ \/ __ \/ ___/ / | / / _ \   / /|_/ / _ \/ __ \/ / / /
		 / _, _/  __(__  ) /_/ / /_/ / / / (__  ) /| |/ /  __/  / /  / /  __/ / / / /_/ / 
		/_/ |_|\___/____/ .___/\____/_/ /_/____/_/ |___/\___/  /_/  /_/\___/_/ /_/\__,_/  
					   /_/                                                                
					   			Responsive Menu
		*/
		$(".main-menu").mmenu({
			offCanvas: {
				position: "right",
				zposition: "front"
			}
		}, {	// configuration
				clone: true
			});



		/*
			__  ___                  _ _____         ____                        
		   /  |/  /___ _____ _____  (_) __(_)____   / __ \____  ____  __  ______ 
		  / /|_/ / __ `/ __ `/ __ \/ / /_/ / ___/  / /_/ / __ \/ __ \/ / / / __ \
		 / /  / / /_/ / /_/ / / / / / __/ / /__   / ____/ /_/ / /_/ / /_/ / /_/ /
		/_/  /_/\__,_/\__, /_/ /_/_/_/ /_/\___/  /_/    \____/ .___/\__,_/ .___/ 
					 /____/                                 /_/         /_/      

					 			Magnific Popup
		*/

		//init Magnific Popup on each element with "modal-link" class
		$('.modal-link').magnificPopup({
			type: 'ajax'
		});



		/*
		   _____                 ______  ___            _     
		  / ___/______________  / / /  |/  /___ _____ _(_)____
		  \__ \/ ___/ ___/ __ \/ / / /|_/ / __ `/ __ `/ / ___/
		 ___/ / /__/ /  / /_/ / / / /  / / /_/ / /_/ / / /__  
		/____/\___/_/   \____/_/_/_/  /_/\__,_/\__, /_/\___/  
											  /____/          

								Home Parallax Slider
		*/
		// build controller
		var controller = new ScrollMagic.Controller( { vertical: true } );

		// build tween
		var tween = TweenMax.fromTo( ".parallax", 1, { bottom: 182 }, { bottom: 7975 } );

		// build scene
		var scene = new ScrollMagic.Scene( { duration: 10000 } )
			.setTween(tween)
			.addTo(controller);


	});
})(jQuery);