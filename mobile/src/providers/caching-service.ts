import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { NativeStorage } from 'ionic-native';
import { Observable } from 'rxjs/Observable';
import { Subject } from 'rxjs/Subject';
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

	get(url: string): Observable<any> {

		let subsc = new ReplaySubject(1);

		this._getFromStorage(url,
			data => {
				subsc.next(data);
			}, error => {

				this._getFromAPI(url,
					data => {
						subsc.next(data);
					}, error => {
						subsc.error(error);
					});

			});
		return subsc.asObservable();
	}

	/**
	 * get the json from the api and store it in storage
	 */
	private _getFromAPI(url: string, success: Function, fail: Function) {
		return this.http.get(url).subscribe(
			data => {
				this.add(url,
					<CacheReponce>{
						value: data,
						key: url,
						time: new Date(),
						isValid: true
					});
				success(data);
			}, error => {
				fail(error);
			}
		)

	}

	private _getFromStorage(url: string, success: Function, fail: Function) {
		NativeStorage.getItem(url)
			.then(
			data => {
				if (data != null && this._isValidDate(data.time)) {
					success(data.value);
				} else {
					fail();
				}
			},
			error => {
				fail(error)
			}
			);
	}

	/**
	 * check the diffrence bettwen the current date and now
	 */
	private _isValidDate(date: Date): boolean {
		return (new Date(date).getTime() - new Date().getTime()) >= (1000 * 60 * 60 * 24);
	}


	add(key, value) {
		NativeStorage.setItem(key, { property: 'value', anotherProperty: 'anotherValue' })
			.then(
			() => console.log('Stored item!'),
			error => console.error('Error storing item', error)
			);
	}

	getvalue(key) {
		NativeStorage.getItem(key)
			.then(
			data => console.log(data),
			error => console.error(error)
			);
	}

	rmValue() {

	}

}

export interface CacheReponce {
	value: any;
	key: string;
	time: Date;
	isValid: boolean;
}