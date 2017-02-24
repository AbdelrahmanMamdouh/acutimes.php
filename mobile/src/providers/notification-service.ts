import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

import { LocalNotifications } from 'ionic-native';

/*
  Generated class for the NotivicationService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class NotificationService {

	constructor() {

		console.log('Hello NotivicationService Provider');

	}
	schedule_Notifications(massage: string ) {
		LocalNotifications.schedule({
			id: 1,
			text: massage,
			at: new Date(new Date().getTime() + 5 * 1000),
			//sound: isAndroid? 'file://sound.mp3': 'file://beep.caf',
		});
	}


}
