import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';

import { StaticPagesService, StaticPage, ShortCode } from '../../providers/static-pages-service';

/*
  Generated class for the About page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'page-about',
	templateUrl: 'about.html'
})
export class AboutPage {

	public title: string = "About us";
	public sections: Array<AboutSection>;
	public error;

	constructor(
		public navCtrl: NavController,
		public navParams: NavParams,
		public staticPagesService: StaticPagesService) {

		this.sections = [];
		staticPagesService.PageAboutus().subscribe(
			(page: StaticPage) => {

				for (let i in page.shortcodes) {
					this.sections[i] = this.shortcodeToAboutSection(page.shortcodes[i]);
				}
				this.error = null;

			}, (err) => {
				this.error = err;
				console.warn(err);
			});

	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad AboutPage');
	}

	public shortcodeToAboutSection(scode: ShortCode): AboutSection {
		return <AboutSection>{
			title: scode.atts.title,
			direction: scode.atts.direction,
			content: scode.content,
			img: scode.atts.img,
		}
	}

}

export interface AboutSection {
	title: string;
	direction: string;
	content: string;
	img: string;
}