import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';

import { EventsService } from '../../providers/events-service';

import { Event } from '../../providers/events-service';
import { ReservationService, Reservation } from '../../providers/reservation-service';

/*
  Generated class for the Reservation page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'page-reservation',
	templateUrl: 'reservation.html'
})
export class ReservationPage {

	numberOfPeople: number = 1;
	userid:string = '1';
	targetEvent: any;
	reserve : ReservationService;
	reservation : Reservation[];
	artists = [
		{
			image: "http://104.40.211.237/Cairo-Jazz-Club.wp/website/wp-content/uploads/2017/02/12112119_1102935619792763_118435785410598425_n-280x280.jpg",
			title: "El Dor El Awal"
		},
		{
			image: "http://104.40.211.237/Cairo-Jazz-Club.wp/website/wp-content/uploads/2017/02/171497_1548962564637_748791_o-280x280.jpg",
			title: "Gaser"
		}
	];

	constructor(public navCtrl: NavController, public navParams: NavParams, private eventsService: EventsService) {
		this.targetEvent = navParams.get('eventparm');
		console.log(this.targetEvent);
	}

	incrementNumberOfPeople() {
		this.numberOfPeople += 1;
	}

	decrementNumberOfPeople() {
		if(this.numberOfPeople != 1)
		{
			this.numberOfPeople -= 1;
		}
	}
	doreserve(){
		this.reserve.reserve(this.targetEvent.id,'1');
		console.log(this.reserve.getUserReservation('1'));
	}
	ionViewDidLoad() {
		console.log('ionViewDidLoad ReservationPage');
	}
	
}
