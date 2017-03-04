import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { NativeStorage } from 'ionic-native';
import { Observable } from 'rxjs/Observable';
import { ReplaySubject } from 'rxjs/ReplaySubject';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

/*
  Generated class for the CachingService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class CachingService {

	constructor(public http: Http) {
		console.log('Hello CachingService Provider');
	}

	public http_get(url: string): Observable<any> {

		let subsc = new ReplaySubject(1);

		this._getFromStorage(url,
			(data) => subsc.next(data),
			(error) => {

				this._getFromAPI(url,
					(data) => subsc.next(data),
					(error) => subsc.error(error));

			});
		return subsc.asObservable();
	}

	/**
	 * get the json from the api and store it in storage
	 */
	private _getFromAPI(url: string, success: Function, fail: Function) {
		return this.http.get(url).subscribe(
			(data) => {
				NativeStorage.setItem(url,
					<CacheReponce>{
						value: data,
						key: url,
						time: new Date(),
						isValid: true
					});
				success(data);
			}, (error) => fail(error))

	}

	/**
	 * retreave the data from storage if it exists
	 */
	private _getFromStorage(url: string, success: Function, fail: Function) {
		NativeStorage.getItem(url)
			.then(
			(data) => {
				if (data != null && this._isValidDate(data.time)) {
					success(data.value);
				} else {
					fail();
				}
			},
			(error) => fail(error));
	}

	/**
	 * check the diffrence bettwen the current date and now
	 */
	private _isValidDate(date: Date): boolean {
		return (new Date(date).getTime() - new Date().getTime()) >= (1000 * 60 * 60 * 24);
	}

}

export interface CacheReponce {
	value: any;
	key: string;
	time: Date;
	isValid: boolean;
}