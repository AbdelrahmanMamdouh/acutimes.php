import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions } from '@angular/http';
import CONFIG from '../app/config.json';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';
import { User } from './facebook-service';
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

	get(user: User): Observable<Genre[]> {
		var url = `${CONFIG.API_URL}fbr/preference/user/merged/${user.siteId}`;
		return this.http.get(url)
			.map(res => res.json());
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