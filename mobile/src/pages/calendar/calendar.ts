import { Component } from '@angular/core';
import { NavController, NavParams, AlertController } from 'ionic-angular';
import * as $ from "jquery";
import 'slick-carousel/slick/slick';
import * as moment from 'moment';

import { EventsService } from '../../providers/events-service';
import { Event } from '../../providers/events-service';
import { ReservationPage } from '../reservation/reservation';

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
	month_events: Event[];
	all: Array<string> = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	now = moment().format('MMMM');
	month: any;
	v_month: any;
	constructor(
		public navCtrller: NavController,
		public navParams: NavParams,
		private eventsService: EventsService,
		private Alert: AlertController) {

		var currentmonth = moment().format('M');
		this.v_month = Number(currentmonth);
		this.month = this.all[this.v_month];
		eventsService.getEvents("all").subscribe(events => { //get the events from the api 
			this.events = events;

			for (var i in this.events) {
				this.events[i]['day'] = moment(this.events[i]['startDate']).format('dddd');
				this.events[i]['month'] = moment(this.events[i]['startDate']).format('MMMM');
				this.events[i]['iday'] = moment(this.events[i]['startDate']).format('DD');
			}

			this.month_events = this.events;
			this.setFilteredItems();
		});
	}

	doinitSlick = true; // initialize it to true for the first run

	initSlick(): void {
		if (this.month_events && this.doinitSlick) {
			$('.events-slider').slick({
				arrows: false,
				mobileFirst: true,
				centerMode: true,
				centerPadding: '70px'
			});
			this.doinitSlick = false; // set it to false until you need to trigger again
		}
	}

	desSlick(): void {
		$('.events-slider').slick('unslick');
		this.doinitSlick = true;
	}

	next(): void {
		this.v_month = this.v_month + 1;
		if (this.v_month == 13) {
			this.v_month = 1;
		}
		this.month = this.all[this.v_month];
		this.setFilteredItems();
		this.desSlick();
	}

	previous(): void {
		this.v_month = this.v_month - 1;
		if (this.v_month == 0) {
			this.v_month = 12;
		}
		this.month = this.all[this.v_month];
		this.setFilteredItems();
		this.desSlick();
	}

	filterItems() {
		if (typeof this.events != 'undefined') {
			return this.events.filter((event) => {
				return event.month.toLowerCase().indexOf(this.month.toLowerCase()) > -1;

			});
		}

	}

	setFilteredItems() {
		this.month_events = this.filterItems();

	}

	goToEvent(event: Event) {
		console.log(event);
		this.navCtrller.push(ReservationPage, {
			event: event
		});
	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad CalendarPage');
	}

}
