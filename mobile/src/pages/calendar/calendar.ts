import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import * as $ from "jquery";
import 'slick-carousel/slick/slick';
import * as moment from 'moment';

import { EventsService } from '../../providers/events-service';

import { Event } from '../../providers/events-service';

/*
  Generated class for the Calendar page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'page-calendar',
	templateUrl: 'calendar.html'
})
export class CalendarPage {

	events: Event[];
	all: Array<string>=["January","February","March","April","May","June","July","August","September","October","November","December"];
	now = moment().format('MMMM');

	constructor(public navCtrl: NavController, public navParams: NavParams , private eventsService: EventsService){
			var thisMonth = moment().format('MMMM'); //get the current month
			eventsService.getEvents("all").subscribe(events => { //get the events from the api
			this.events = events;
			var i=0;
			for (var event in this.events) {
				this.events[i]['day']= moment(this.events[i]['startDate']).format('dddd');
				this.events[i]['month']=moment(this.events[i]['startDate']).format('MMMM');
				 this.events[i]['iday']=moment(this.events[i]['startDate']).format('DD');
				 i++;
			}
			i=0;
		})
	}

	doinitSlick = true; // initialize it to true for the first run


	initSlick(): void {
		$('.events-slider').slick({
			arrows: false,
			mobileFirst: true,
			centerMode: true,
			centerPadding: '70px'
		});
		this.doinitSlick = false; // set it to false until you need to trigger again
	}




	ionViewDidLoad() {
		console.log('ionViewDidLoad CalendarPage');

		
	}

}
