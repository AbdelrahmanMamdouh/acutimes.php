import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';

/*
  Generated class for the CjcUserCircle page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'cjc-user-circle',
	templateUrl: 'cjc-user-circle.html'
})
export class CjcUserCircle {

	public user: User = {
		name: "Beco G. asdas hgahujfg saldfh asdjf hasldfhdasdlf",
		img: "https://randomuser.me/api/portraits/men/78.jpg"
	};

	constructor(/*public navCtrl: NavController, public navParams: NavParams*/) { }

	ionViewDidLoad() {
		console.log('ionViewDidLoad CjcUserCirclePage');
	}

}

interface User {
	name: string;
	img: string;
}