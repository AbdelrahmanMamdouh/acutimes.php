import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

/*
  Generated class for the FacebookService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class FacebookService {

	constructor(public http: Http) {
		console.log('Hello FacebookService Provider');
	}

	getUser(): User {
		return <User>{
			name: "Beco G. Michael",
			img: "https://randomuser.me/api/portraits/men/78.jpg"
		};
	}

}

export interface User {
	name: string;
	img: string;
}