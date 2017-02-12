import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

import CONFIG from '../app/config.json';
/*
  Generated class for the EventsService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class EventsService {

	constructor(public http: Http) {
		console.log('Hello EventsService Provider');
	}

/**
* Get all events that passes the given filter.
* @param {string} filter - Used to change the args param passed to the WP_QUERY. ('all': Gets all events, 'upcoming': Gets the next 7 events from today).
* @returns Observable SliderImage[]
*/
getEvents(filter: string): Observable<Event[]> {
    return this.http.get(`${CONFIG.API_URL}cjc/calendar/events/${filter}`)
      .map(res => <Event[]>res.json());
  }
}

export interface Event {
  title: string;
  startDate: Date;
  img: string;
  type: string;
}