import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import { CachingService } from './caching-service';
import CONFIG from '../app/config.json';
/*
  Generated class for the EventsService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class EventsService {

	constructor(
		public http: Http,
		public cachingService: CachingService) {
		console.log('Hello EventsService Provider');
	}

	/**
	* Get all events that passes the given filter.
	* @param {string} filter - Used to change the args param passed to the WP_QUERY. ('all': Gets all events, 'upcoming': Gets the next 7 events from today).
	* @returns Observable Event[]
	*/
	getEvents(filter: string): Observable<Event[]> {
		return this.cachingService.http_get(`${CONFIG.API_URL}cjc/calendar/events/${filter}`)
			.map(res => <Event[]>res.json());
	}

	/**
	* Get all performing artists for the given event.
	* @param {string} eventId
	* @returns Observable Artist[]
	*/
	getPerformingArtists(eventId: number): Observable<Artist[]> {
		return this.cachingService.http_get(`${CONFIG.API_URL}cjc/calendar/events/${eventId}/artists`)
			.map(res => <Artist[]>res.json());
	}

}

export interface Event {
	id: number;
	title: string;
	startDate: Date;
	img: string;
	type: string;
	url: string;
	day: string;
	month: string;
	iday: string;
	genres: any;
	private: any;
}

export interface Artist {
	id: number;
	title: string;
	img: string;
	url: string;
}