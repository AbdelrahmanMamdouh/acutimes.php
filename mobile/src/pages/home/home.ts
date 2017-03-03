import { Component } from '@angular/core';
import { NavController, NavParams, ModalController } from 'ionic-angular';

import { ReservationPage } from '../reservation/reservation';

import * as $ from "jquery";
import 'slick-carousel/slick/slick';

import { MetaSliderImagesService } from '../../providers/meta-slider-images-service';
import { EventsService, Event } from '../../providers/events-service';
import { SliderImage } from '../../providers/meta-slider-images-service';
import { User, FacebookService } from '../../providers/facebook-service';
import { NotificationService } from '../../providers/notification-service';
import { PreferenceService, Genre } from '../../providers/preference-service';
import { PreferencePage } from '../../pages/preference/preference';


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

	constructor(
		public navCtrl: NavController,
		private navparm: NavParams,
		public modalCtrl: ModalController,
		private metaSliderImagesService: MetaSliderImagesService,
		private eventsService: EventsService,
		private preferenceService: PreferenceService,
		private notif: NotificationService,
		private fbService: FacebookService) {

		// Get all images of the wp meta slider that have the id 1777.
		metaSliderImagesService.getSliderImages(1777).subscribe(sliderImages => this.sliderImages = sliderImages)
		// Get all upcoming events.
		eventsService.getEvents("upcoming").subscribe(events => {
			this.events = events;
			this.onEventsDataLoad();
		});
	}


	doinitSlick = true; // initialize it to true for the first run

	initSlick(): void {
		if (this.events && this.doinitSlick) {
			$('.events-slider').slick({
				arrows: false,
				mobileFirst: true,
				centerMode: true,
				centerPadding: '90px',
			});
			this.doinitSlick = false; // set it to false until you need to trigger again
		}
	}

	openReservationModal(event): void {
		let modal = this.modalCtrl.create(ReservationPage, { event: event });
		modal.present();
	}

	ionViewDidLoad() {

	}

	onEventsDataLoad() {
		this.fbService.getUser().then((user: User) => {
			this.preferenceService.get(user).subscribe((prefs: Genre[]) => {

				if (prefs) {
					this.notif.Event_Prefs(user, prefs, this.events);
				} else {
					this.navCtrl.push(PreferencePage);
				}

			}, (err) => console.warn(err));
		}, (err) => console.warn(err));
	}

}