import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions } from '@angular/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';
import CONFIG from '../app/config.json';

/*
  Generated class for the Reservation provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html

  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class ReservationService {

	constructor(public http: Http) {
		console.log('Hello Reservation Provider');
	}

	getUserReservation(userid: number): Observable<Reservation[]> {
		return this.http.get(`${CONFIG.API_URL}fbr/reservation/user/${userid}`)
			.map(res => <Reservation[]>res.json());
	}


	getEventReservation(eventid: number): Observable<Reservation[]> {
		return this.http.get(`${CONFIG.API_URL}fbr/reservation/user/${eventid}`)
			.map(res => <Reservation[]>res.json());
	}
	reserve(event_id: number, user_id: number, attendees: number, accessToken: string) {
		let headers = new Headers({ 'Content-Type': 'application/json' });
		let options = new RequestOptions({ headers: headers });

		let data = {
			event_id: event_id,
			user_id: user_id,
			attendees: attendees,
			accessToken: accessToken
		};

		return this.http.post(`${CONFIG.API_URL}fbr/reservation/`, data, options)
			.map(res => res.json());
	}

}
export interface Reservation {
	reserv_date: string;
	user_id: number;
	event_id: number;
	state: any;
	attendees: number;
}