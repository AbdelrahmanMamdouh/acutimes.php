import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';

import CONFIG from '../app/config.json';
/*
  Generated class for the StaticPagesService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class StaticPagesService {

	constructor(public http: Http) {
		console.log('Hello StaticPagesService Provider');
	}

	/**
	 * remove some short shortcodes
	 * @param {StaticPage} page the static page
	 * @returns the content whiout the shortcodes
	 */
	cleanContent(page: StaticPage): string {
		return page.content.rendered.replace(/\[vc_row\]|\[vc_column\]|\[\/vc_row\]|\[\/vc_column\]/g, '');
	}
	a
	/**
	 * get static page about cjc 
	 * @returns Observable StaticPage
	 */
	PageAboutus(): Observable<StaticPage> {

		return this.http.get(CONFIG.API_URL + 'wp/v2/pages/57')
			.map(res => {
				return <StaticPage>res.json();
			})
		//.catch(err => {console.log(error)})

	}
}

export interface StaticPage {

	id: number;
	date: any;
	date_gmt: any;

	guid: {
		rendered: string
	};

	modified: any;
	modified_gmt: any;

	slug: string;
	type: string;
	link: string,

	title: {
		rendered: string
	};

	content: {
		rendered: string,
		protected: boolean
	};

	excerpt: {
		rendered: string,
		protected: boolean
	};

	author: number,
	featured_media: number,
	parent: number,
	menu_order: number,
	comment_status: string,
	ping_status: string,
	template: string,
	meta: Array<string>,

	shortcodes: Array<ShortCode>;

	_links: any;
}

export interface ShortCode {
	tag: string;
	atts: any;
	content: string;
}
