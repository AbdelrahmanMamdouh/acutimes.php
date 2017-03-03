import { Injectable } from '@angular/core';
import 'rxjs/add/operator/map';

import { LocalNotifications } from 'ionic-native';
import { User } from './facebook-service';
import { Genre } from './preference-service';
import { Event } from './events-service';

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

	Event_Prefs(user: User, prefs: Genre[], events: Event[]) {
		for (var ev in events) {
			for (var i in prefs) {
				for (var j in events[ev].genres) {
					if (events[ev].genres[j] == prefs[i]) {

						LocalNotifications.schedule({
							id: events[ev].id,
							text: `hello ${user.name} this event ${events[ev].title} matches one of your prefrences, which is: ${prefs[i].name}`,
							at: new Date(new Date().getTime() + 5 * 1000),
							//sound: isAndroid? 'file://sound.mp3': 'file://beep.caf',
						});

					}
				}
			}
			return; // return at the first event the for loop can also be replaced by an if ^_^ but index [0] can cause troubles
		}
	}

}
