import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';

import { StaticPagesService, StaticPage } from '../../providers/static-pages-service';

/*
  Generated class for the About page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'page-about',
	templateUrl: 'about.html',
	providers: [StaticPagesService]
})
export class AboutPage {

	public sections;
	public content;
	public page: StaticPage;

	constructor(public navCtrl: NavController, public navParams: NavParams, public staticPagesService: StaticPagesService) {

		staticPagesService.PageAboutus().subscribe(function (page) {
			this.page = page;
			this.content = page.content.clean;
		}.bind(this), function (err) {
			this.content = "<h1>404</h1> <br> <p>Please check ur internet connection</p>";
			console.log(err);
		}.bind(this));

	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad AboutPage');
	}

}
