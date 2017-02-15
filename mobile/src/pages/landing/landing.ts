import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { NativeStorage } from 'ionic-native';

import CONFIG from '../../app/config.json';
import { HomePage } from '../home/home';

import { FacebookService } from '../../providers/facebook-service';
import { User } from '../../providers/facebook-service';

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
	constructor(public navCtrl: NavController, public navParams: NavParams, private facebookService: FacebookService) { }

	onFBLoginClick(): void {
		this.facebookService.doFbLogin().subscribe(user => {
			//now we have the users info, let's save it in the NativeStorage
			NativeStorage.setItem('user', user)
				.then(() => {
					this.navCtrl.setRoot(HomePage, {}, { animate: true, direction: 'forward' });
				}, function (error) {
					console.log(error);
				})
		})
	}
}
