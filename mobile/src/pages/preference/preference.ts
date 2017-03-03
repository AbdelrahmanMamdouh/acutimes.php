import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { PreferenceService, Genre } from '../../providers/preference-service';
import { FacebookService, User } from '../../providers/facebook-service';

/*
  Generated class for the Preference page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'page-preference',
	templateUrl: 'preference.html'
})
export class PreferencePage {

	public genres: Genre[] = [];
	public user: User;

	constructor(
		public navCtrl: NavController,
		public navParams: NavParams,
		public prefService: PreferenceService,
		public fbService: FacebookService) {

		fbService.getUser().then((user: User) => {
			this.user = user;
			prefService.get(this.user).subscribe(
				(data) => this.genres = data,
				(err) => console.warn(err)
			);
		}, (err) => console.warn(err));

	}


	onSubmit() {
		if (!this.user.siteId) { return; }
		this.prefService.send(this.user.siteId, this.genres);
	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad PreferencePage');
	}

}
