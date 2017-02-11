import { Component } from '@angular/core';
import { Facebook } from 'ionic-native';

@Component({
	selector: 'page-landing',
	templateUrl: 'landing.html'
})
export class LandingPage {

	logo = "assets/img/logo.png";

	slides = [
		{
			image: "assets/img/landing-slide-1.png"
		},
		{
			image: "assets/img/landing-slide-1.png"
		},
		{
			image: "assets/img/landing-slide-1.png"
		}
	];

	onFBLoginClick = function () {
		Facebook.login(['email']).then(data => {
			this.faceBookToken = data.authResponse.accessToken;
			this.faceBookUserId = data.authResponse.userID;

			this.onGetDetailsClick();
		});
	}

	onGetDetailsClick = function () {
		Facebook.api(this.faceBookUserId + "/?fields=name,email,birthday,gender", ['public_profile']).then(data => {
			alert(JSON.stringify(data));
		});
	}

}
