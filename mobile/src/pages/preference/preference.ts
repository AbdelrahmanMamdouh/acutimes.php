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
	public user_id: number;

	constructor(public navCtrl: NavController, public navParams: NavParams, public prefService: PreferenceService, public fbService: FacebookService) {

		fbService.getUser()
			.then((user: User) => {
				this.user_id = user.siteId;
				prefService.get(this.user_id).subscribe(
					(data: Genre[]) => {
						this.genres = data;
					}, (err) => console.warn(err)
				);
			}, (err) => console.warn(err));

	}


	onSubmit() {
		if (!this.user_id) {
			return;
		}
		this.prefService.send(this.user_id, this.genres);
	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad PreferencePage');
	}

}
