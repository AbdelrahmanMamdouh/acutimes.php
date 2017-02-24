import { Component } from '@angular/core';
import { NavController , NavParams } from 'ionic-angular';
import { NativeStorage } from 'ionic-native';

import CONFIG from '../../app/config.json';
import { HomePage } from '../home/home';

import { FacebookService } from '../../providers/facebook-service';
import { User } from '../../providers/facebook-service';

//for testing 
//import {testuser} from '../home/home';


@Component({
	selector: 'page-landing',
	templateUrl: 'landing.html'
})
export class LandingPage {
	//user :testuser ={id:"1",siteId:10,email:"mohammed.magdy.ali.96@gmail.com",name:"mohammed" ,pref:["Arabic"]};
	logo = "assets/img/logo.png";

	slides = [
		{ image: "assets/img/landing-slide-1.png" },
		{ image: "assets/img/landing-slide-1.png" },
		{ image: "assets/img/landing-slide-1.png" }
	];
	constructor(public navCtrl: NavController, public navParams: NavParams, private facebookService: FacebookService) {
		//test data
		//console.log(this.user);
		//this.navCtrl.setRoot(HomePage, { username: this.user.name, userid: this.user.siteId , userprefs : this.user.pref }, { animate: true, direction: 'forward' });
	 	//////////////////////////////////////////////////////////////////////////////////
	 }

	onFBLoginClick(): void {
		this.facebookService.doFbLogin().subscribe(user => {
			this.navCtrl.setRoot(HomePage, {username: user.name, userid: user.siteId , userprefs : user.pref}, { animate: true, direction: 'forward' });
		})
	}
}
