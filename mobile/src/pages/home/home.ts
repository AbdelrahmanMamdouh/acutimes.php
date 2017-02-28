import { Component } from '@angular/core';
import { NavController,NavParams, ModalController } from 'ionic-angular';

import { Facebook, NativeStorage } from 'ionic-native';

import { ReservationPage } from '../reservation/reservation';
import { LandingPage } from '../landing/landing';

import * as $ from "jquery";
import 'slick-carousel/slick/slick';

import { MetaSliderImagesService } from '../../providers/meta-slider-images-service';
import { EventsService } from '../../providers/events-service';

import { SliderImage } from '../../providers/meta-slider-images-service';
import { Event } from '../../providers/events-service';

import { User } from '../../providers/facebook-service';
import { NotificationService }from '../../providers/notification-service';
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
	//user: testuser={id:"",siteId:0,email:"",name:"",pref:[]};
	 prefs: Genre[];

	sliderImages: SliderImage[] = []; // Initialize the array to avoid undefined behaviour with ionic/angular directives.
	events: Event[];

	constructor(public navCtrl: NavController,private navparm :NavParams, public modalCtrl: ModalController, private metaSliderImagesService: MetaSliderImagesService, private eventsService: EventsService,private preference : PreferenceService) {
		// Get all images of the wp meta slider that have the id 1777.
		metaSliderImagesService.getSliderImages(1777).subscribe(sliderImages => {
			this.sliderImages = sliderImages;
		})
		// Get all upcoming events.
		eventsService.getEvents("upcoming").subscribe(events => {
			this.events = events;
			let notif= new NotificationService();
			let name= this.navparm.get('username');
			let id=this.navparm.get('userid');
			let prefs=this.navparm.get('userprefs');
			if(prefs == null){
				this.navCtrl.push(PreferencePage);
			}
			preference.get(id).subscribe(
					(data: Genre[]) => {
						this.prefs = data;
						if(prefs != undefined)
						{
							console.log(prefs);
						for (var i = 0; i < prefs.length; i++) {
							for (var j = 0; j < this.events[0].genres.length; j++) {
								if(this.events[0].genres[j] === prefs[i]){
									let massage ="hello " + name + " this event "+this.events[0].title  + " matches one of your prefrences, which is: " +prefs[i];
									notif.schedule_Notifications(massage);
									console.log(massage);


								}
							}
						}
					}
					}, (err) => console.warn(err)
				);
			
			
			
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

	openReservationModal(event): void {
		let modal = this.modalCtrl.create(ReservationPage, { event: event });
		modal.present();
	}

	ionViewDidLoad() {

	}
}
/*
export interface testuser{
	id:string;
	name:string;
	siteId:number;
email:string;
pref: any;
}
*/
