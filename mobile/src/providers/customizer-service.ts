import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

import CONFIG from '../app/config.json';

/*
  Generated class for the CustomizerService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class CustomizerService {

	constructor(public http: Http) {
		console.log('Hello CustomizerService Provider');
	}
	/**
	 * get all the customizer options
	 * @returns Observable Customizer
	 */
	getAll(): Observable<Customizer> {

		return this.http.get(CONFIG.API_URL + 'cjc/customizer/')
			.map(res => {
				return this.parsejson(res.json());
			})
		//.catch(err => {console.log(error)})

	}
	public parsejson(json): Customizer {
		return {
			logo: {
				main: json['custom_logo'],
				footer: json['cjc-identity-footer-logo'],
			},
			identity: {
				phone: json['cjc-identity-phone'],
				email: json['cjc-identity-email'],
				address: json['cjc-identity-address'],
				android: json['cjc-identity-android'],
				ios: json['cjc-identity-ios'],
			},
			social: {
				facebook: json['cjc-social-media-facebook'],
				twitter: json['cjc-social-media-twitter'],
				youtube: json['cjc-social-media-youtube'],
			},
			adds: [{
				url: json['cjc-adds-url-1'],
				img: json['cjc-adds-img-1'],
			}, {
				url: json['cjc-adds-url-2'],
				img: json['cjc-adds-img-2'],
			}],
		}
	}

}

/*
nav_menu_locations: any;
custom_css_post_id: number;

custom_logo: 44;
cjc-identity-footer-logo:  string;

cjc-identity-phone: string;
cjc-identity-email:  string;
cjc-identity-address:  string;
cjc-identity-android:  string;
cjc-identity-ios:  string;

cjc-social-media-facebook:  string;
cjc-social-media-twitter:  string;
cjc-social-media-youtube:  string;

cjc-adds-url-1:  string ;
cjc-adds-img-1:  string;
cjc-adds-url-2:  string;
cjc-adds-img-2:  string;
*/
export interface Customizer {

	logo: {
		main: string;
		footer: string;
	}

	identity: {
		phone: string;
		email: string;
		address: string;
		android: string;
		ios: string;
	}
	social: {
		facebook: string;
		twitter: string;
		youtube: string;
	}
	adds: Array<{
		url: string;
		img: string;
	}>;

}