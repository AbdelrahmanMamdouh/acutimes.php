import { Component } from '@angular/core';

import * as $ from "jquery";
import 'slick-carousel/slick/slick';

import { MetaSliderImagesService } from '../../providers/meta-slider-images-service';
import { EventsService } from '../../providers/events-service';

import { SliderImage } from '../../providers/meta-slider-images-service';
import { Event } from '../../providers/events-service';

/*
  Generated class for the Home page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'page-home',
	templateUrl: 'home.html'
})
export class HomePage {

	sliderImages: SliderImage[] = []; // Initialize the array to avoid undefined behaviour with ionic/angular directives.
	events: Event[];

	constructor(private metaSliderImagesService: MetaSliderImagesService, private eventsService: EventsService) {
		// Get all images of the wp meta slider that have the id 1777.
		metaSliderImagesService.getSliderImages(1777).subscribe(sliderImages => {
			this.sliderImages = sliderImages;
		})
		// Get all upcoming events.
		eventsService.getEvents("upcoming").subscribe(events => {
			this.events = events;
		})
	}

	doinitSlick = true; // initialize it to true for the first run

	initSlick(): void {
		$('.events-slider').slick({
			arrows: false,
			mobileFirst: true,
			centerMode: true,
			centerPadding: '90px',
		});
		this.doinitSlick = false; // set it to false until you need to trigger again
	}

	ionViewDidLoad() {

	}
}
