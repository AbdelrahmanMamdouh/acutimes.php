import { Injectable } from '@angular/core';
import { Http, Response, Headers, RequestOptions } from '@angular/http';

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

	cleanContent(page: StaticPage): string {
		return page.content.rendered.replace(/\[vc_row\]|\[vc_column\]|\[\/vc_row\]|\[\/vc_column\]/g, '');
	}

	/**
	 * get static page about cjc 
	 * @returns Observable StaticPage
	 */
	PageAboutus(): Observable<StaticPage> {

		return this.http.get(CONFIG.API_URL + 'pages/57')
			.map(res => {
				let tempPage = <StaticPage>res.json();
				tempPage.content.clean = this.cleanContent(tempPage);
				return tempPage;
			})
		//.catch(err => {console.log(error)})

	}
}

export interface StaticPage {
	title: {
		rendered: string
	};
	content: {
		rendered: string,
		clean: string
	};
}
