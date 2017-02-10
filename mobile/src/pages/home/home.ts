import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';
import * as $ from "jquery";
import 'slick-carousel/slick/slick';

/*
  Generated class for the Home page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'page-home',
	templateUrl: 'home.html'
})
export class HomePage {

	constructor(public navCtrl: NavController, public navParams: NavParams) { }

	slides = [
		{
			image: "assets/img/home-slide-1.jpg"
		},
		{
			image: "assets/img/home-slide-2.jpg"
		}
	];

	events = [
		{
			image: "assets/img/event.jpg",
			date: "11 Feb"
		},
		{
			image: "assets/img/event.jpg",
			date: "12 Feb"
		},
		{
			image: "assets/img/event.jpg",
			date: "13 Feb"
		},
		{
			image: "assets/img/event.jpg",
			date: "14 Feb"
		},
		{
			image: "assets/img/event.jpg",
			date: "15 Feb"
		},
		{
			image: "assets/img/event.jpg",
			date: "16 Feb"
		},
		{
			image: "assets/img/event.jpg",
			date: "17 Feb"
		}
	];

	ionViewDidLoad() {
		// Events Slider
		$('.events-slider').slick({
			arrows: false,
			mobileFirst: true,
			centerMode: true,
			centerPadding: '90px',
		});
	}
}
