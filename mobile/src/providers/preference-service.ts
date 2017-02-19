import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
import CONFIG from '../app/config.json';
import { Observable } from 'rxjs/Observable';
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
	//if there is no user id then return all the genrs
	getpreference(id: string = 'all'): Observable<Preference[]> {
		if (id != 'all') {
			return this.http.get(`${CONFIG.API_URL}fbr/preference/user/${id}`).map(res => <Preference[]>res.json());;
		} else {
			return this.http.get(`${CONFIG.API_URL}fbr/preference/all`).map(res => <Preference[]>res.json());;
		}

	}
	addpreference(id: string, prefid: string) {
		var prefs = "prefs=" + prefid;
		return this.http.post(`${CONFIG.API_URL}fbr/preference/user/${id}/`, prefs)
			.map(res => res.json());
	}


}

export class Preference {
	id: string;
	name: string;
}
