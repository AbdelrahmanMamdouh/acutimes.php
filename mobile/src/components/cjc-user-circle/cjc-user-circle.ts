import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';

import { FacebookService, User } from '../../providers/facebook-service';

/*
  Generated class for the CjcUserCircle page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'cjc-user-circle',
	templateUrl: 'cjc-user-circle.html',
	providers: [FacebookService]
})
export class CjcUserCircle {

	public user: User;

	constructor(/*public navCtrl: NavController, public navParams: NavParams*/ facebookService: FacebookService) {
		this.user = facebookService.getUser();
	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad CjcUserCirclePage');
	}

}