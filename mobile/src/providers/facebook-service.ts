import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { NavController, NavParams } from 'ionic-angular';
import { Facebook, NativeStorage } from 'ionic-native';
import { Observable } from 'rxjs/Observable';

/*
  Generated class for the FacebookService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class FacebookService {
	private _user: User;

	constructor(public http: Http) {
		console.log('Hello FacebookService Provider');
	}

	public getUser(): Promise<any> {
		if (this._user) {
			let promise = new Promise((resolve, reject) => {
				resolve(this._user);
			});
			// Returns a custom User Promise.
			return promise;
		}
		return NativeStorage.getItem('user'); // Returns a NativeStorage Promise.
	}

	public setUser(user: User): void {
		this._user = user;
	}

	public doFbLogin(): Observable<User> {
		let permissions: string[];

		//the permissions your facebook app needs from the user
		permissions = ["public_profile", "email"];

		let observable = new Observable(observer => {

			Facebook.login(permissions)
				.then((response) => {
					let userId = response.authResponse.userID;
					let params: string[];

					//Getting name and email properties
					Facebook.api("/me?fields=name,email", params)
						.then((user) => {
							user.img = `https://graph.facebook.com/${userId}/picture?type=large`;
							this._user = user;
							observer.next(this._user);
						})
				}, function (error) {
					console.log(error);
				});
		})
		return observable;
	}

	public doFbLogout(): Promise<any> {
		return Facebook.logout();
	}
}

export class User {
	name: string;
	email: string;
	img: string;
}