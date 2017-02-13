import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import { CustomizerService, Customizer } from '../../providers/customizer-service';

/*
  Generated class for the ContactUs page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'page-contact-us',
	templateUrl: 'contact-us.html'
})
export class ContactUsPage {

	public address: string;
	public email: string;
	public phone: string;

	public error;

	constructor(public navCtrl: NavController, public navParams: NavParams, customizerService: CustomizerService) {

		customizerService.getAll().subscribe(
			function (customizer: Customizer) {

				this.address = customizer.identity.address;
				this.email = customizer.identity.email;
				this.phone = customizer.identity.phone;

			}.bind(this),
			function (err) {

				this.error = err;
				console.warn(err);

			}.bind(this));

	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad ContactUsPage');
	}

}
