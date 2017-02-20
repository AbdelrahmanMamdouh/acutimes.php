import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions } from '@angular/http';
import CONFIG from '../app/config.json';
import { Observable } from 'rxjs/Observable';
import { Subject } from 'rxjs/Subject';
import { ReplaySubject } from 'rxjs/ReplaySubject';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';
/*
  Generated class for the PreferenceService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class PreferenceService {

	constructor(public http: Http) {
		console.log('Hello PreferenceServce Provider');
	}

	get(user_id: number): Observable<Genre[]> {
		let subsc = new ReplaySubject(1);

		var selected = [];
		var genres: Genre[] = [];

		var doneOne = false; // if one of them is complete
		var done = function () {
			if (doneOne) {

				for (var key in genres) {
					let pk = genres[key].term_id;
					genres[key].isChecked = selected[pk] ? true : false;

				}

				subsc.next(genres);
			} else { doneOne = true; }
		}

		this.http.get(`${CONFIG.API_URL}fbr/preference/user/${user_id}`).subscribe(
			data => {
				data = data.json();
				for (var key in data) {
					selected[data[key]] = true
				}
				done();

			}, error => subsc.error(error)
		);

		this.http.get(`${CONFIG.API_URL}fbr/preference/all`).subscribe(
			(data) => {
				genres = data.json();
				done();

			}, error => subsc.error(error)
		);

		return subsc.asObservable();
	}



	send(user_id, gens: Genre[]) {

		var data = [];

		for (let key in gens) {
			if (gens[key].isChecked == true) {
				data.push(gens[key].term_id);
			}
		}

		let options = new RequestOptions({
			headers: new Headers({ 'Content-Type': 'application/json' })
		});

		return this.http.post(`${CONFIG.API_URL}fbr/preference/user/${user_id}/`, data, options)
			.map(res => res.json());
	}

}


export interface Genre {

	term_id: number;
	name: string;
	slug: string;
	term_group: number;
	term_taxonomy_id: number;
	taxonomy: string;
	description: string;
	parent: number;
	count: number;
	filter: string;

	isChecked: boolean;
}