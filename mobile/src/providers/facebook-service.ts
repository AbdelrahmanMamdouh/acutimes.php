import { Injectable } from '@angular/core';
import { Http, Headers, RequestOptions } from '@angular/http';
import { Facebook, NativeStorage } from 'ionic-native';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/observable/throw';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

import CONFIG from '../app/config.json';

/*
  Generated class for the FacebookService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class FacebookService {
	private static _user: User;

	constructor(public http: Http) {
		console.log('Hello FacebookService Provider');
	}

	public getUser(): Promise<User> {
		if (FacebookService._user) {
			return new Promise((resolve, reject) => resolve(FacebookService._user));
		} else {
			return NativeStorage.getItem('user'); // Returns a NativeStorage Promise.
		}
	}

	public setUser(user: User): void {
		FacebookService._user = user;
	}

	private _sendUser(): Observable<any> {
		let headers = new Headers({ 'Content-Type': 'application/json' });
		let options = new RequestOptions({ headers: headers });
		let user = FacebookService._user;

		return this.http.post(`${CONFIG.API_URL}fbr/mobile/users/`, { user }, options)
			.map(res => res.json())
			//...errors if any
			.catch((error: any) => Observable.throw(error.json().error || 'Server error'))
	}

	public doFbLogin(): Observable<User> {

		//the permissions your facebook app needs from the user
		let permissions: string[] = ["public_profile", "email"];

		let observable = new Observable(observer => {

			Facebook.login(permissions)
				.then((response) => {
					let userId = response.authResponse.userID;
					let userAccessToken = response.authResponse.accessToken;
					let params: string[];

					//Getting name and email properties
					Facebook.api("/me?fields=name,email,link", params)
						.then((user) => {
							user.img = `https://graph.facebook.com/${userId}/picture?type=large`;
							user.accessToken = userAccessToken;
							FacebookService._user = user;
							this._sendUser().subscribe(data => {
								FacebookService._user.siteId = data.id;
								NativeStorage.setItem('user', FacebookService._user).catch((error) => console.warn(error));
								observer.next(FacebookService._user);
							});
						})
				}, (error) => console.warn(error));
		})
		return observable;
	}

	public doFbLogout(): Promise<any> {
		FacebookService._user = null;
		return NativeStorage.remove('user');
	}
}

export class User {
	id: string;
	siteId: number;
	name: string;
	email: string;
	link: string;
	img: string;
	accessToken: string;
	pref: any;
	user_status: any;
}