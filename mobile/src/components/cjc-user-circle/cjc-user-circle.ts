import { Component, ViewChild } from '@angular/core';
import { Nav } from 'ionic-angular';
import { NativeStorage } from 'ionic-native';

import { FacebookService, User } from '../../providers/facebook-service';

import { LandingPage } from '../../pages/landing/landing';


/*
  Generated class for the CjcUserCircle page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'cjc-user-circle',
	templateUrl: 'cjc-user-circle.html',
})
export class CjcUserCircle {
	@ViewChild(Nav) nav: Nav;

	public user: User;

	constructor(private facebookService: FacebookService) {
		this.facebookService.getUser().then(user => {
			this.user = user;
		}, () => { });
	}

	onFBLogoutClick(): void {
		this.facebookService.doFbLogout().then(response => {
			//user logged out so we will remove him from the NativeStorage
			//this.nav.setRoot(LandingPage, {}, { animate: true, direction: 'back' });
		}, error => {
			console.log(error);
		})
	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad CjcUserCirclePage');
	}
	ionViewCanEnter() {
	}
}