import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import { CachingService } from './caching-service';
import CONFIG from '../app/config.json';

/*
  Generated class for the MetaSliderImagesService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class MetaSliderImagesService {

	constructor(public http: Http, public cachingService: CachingService) {
		console.log('Hello MetaSliderImagesService Provider');
	}

	/**
	  * get all images from the meta slider that match the given id
	  * @returns Observable SliderImage[]
	  */
	getSliderImages(sliderId: number): Observable<SliderImage[]> {
		return this.cachingService.http_get(`${CONFIG.API_URL}cjc/metaslider/images/${sliderId}`)
			.map(res => <SliderImage[]>res.json());
	}

}

export interface SliderImage {
	url: string;
}