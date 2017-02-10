import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';

/*
  Generated class for the CjcFooter page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'cjc-footer',
	templateUrl: 'cjc-footer.html'
})
export class CjcFooter {

	public phone = '+201068804764';
	public facebook = 'https://www.facebook.com/CairoJazzClubPage';
	public location = '38.897096,-77.036545';

	constructor(public navCtrl: NavController, public navParams: NavParams) { }

	ionViewDidLoad() {
		console.log('ionViewDidLoad CjcFooter');
	}

	toLocation() {
		document.location.href = 'geo:' + this.location;
	}
}
