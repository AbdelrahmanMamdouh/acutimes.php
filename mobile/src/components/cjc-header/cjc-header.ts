import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { FacebookService, User } from '../../providers/facebook-service';
import { PreferencePage } from '../../pages/preference/preference';
/*
  Generated class for the CjcHeader page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'cjc-header',
	templateUrl: 'cjc-header.html'
})
export class CjcHeader {

	public user: User;

	constructor(
		public navCtrl: NavController,
		public navParams: NavParams,
		private facebookService: FacebookService) {

		this.facebookService.getUser().then(user => {
			this.user = user;
		}, () => { });

	}

	onPrefernceClick() {
		this.navCtrl.push(PreferencePage);
	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad CjcHeaderPage');
	}

}