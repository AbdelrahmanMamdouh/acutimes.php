import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { Facebook } from 'ionic-native';

import CONFIG from '../../app/config.json';
import { HomePage } from '../home/home';

@Component({
	selector: 'page-landing',
	templateUrl: 'landing.html'
})
export class LandingPage {

	logo = "assets/img/logo.png";

	slides = [
		{ image: "assets/img/landing-slide-1.png" },
		{ image: "assets/img/landing-slide-1.png" },
		{ image: "assets/img/landing-slide-1.png" }
	];

	faceBookToken;
	faceBookUserId;

	constructor(public navCtrl: NavController, public navParams: NavParams) { }

	onFBLoginClick() {

		if (CONFIG.DEV.SKIP_LOGIN) {

			this.navCtrl.setRoot(HomePage);

		} else {
			Facebook.login(['email']).then(data => {
				this.faceBookToken = data.authResponse.accessToken;
				this.faceBookUserId = data.authResponse.userID;

				this.onGetDetailsClick();
			});
		}

	}

	onGetDetailsClick() {

		Facebook.api(this.faceBookUserId + "/?fields=name,email,birthday,gender", ['public_profile']).then(data => {
			alert(JSON.stringify(data));
		});

	}

}
