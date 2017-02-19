import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
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

	getUserReservation(userid: string): Observable<Reservation[]> {
		return this.http.get(`${CONFIG.API_URL}fbr/reservation/user/${userid}`)
			.map(res => <Reservation[]>res.json());
	}


	getEventReservation(eventid: string): Observable<Reservation[]> {
		return this.http.get(`${CONFIG.API_URL}fbr/reservation/user/${eventid}`)
			.map(res => <Reservation[]>res.json());
	}
	reserve(event_id: string, user_id: string) {
		var data = "event_id=" + event_id + "&user_id=" + user_id;
		return this.http.post('${CONFIG.API_URL}fbr/reservation/', data)
			.map(res => res.json());
	}

}
export interface Reservation {
	reserv_date: string;
	user_id: string;
	event_id: string;
	state: any;
	attendees: any;
}