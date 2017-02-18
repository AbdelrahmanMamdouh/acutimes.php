import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
import CONFIG from '../app/config.json';
import { Observable } from 'rxjs/Observable';
/*
  Generated class for the PrefrenceService provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable()
export class PrefrenceService {

  constructor(public http: Http) {
    console.log('Hello PrefrenceServce Provider');
  }
  //if there is no user id then return all the genrs
  getprefrence(id : string ='all') :Observable<prefrence[]>{
  	if(id !='all'){
  		return this.http.get(`${CONFIG.API_URL}fbr/preference/user/${id}`).map(res => <prefrence[]>res.json());;
  	}else{
  		return this.http.get(`${CONFIG.API_URL}fbr/preference/all`).map(res => <prefrence[]>res.json());;
  	}
  	
  }
  addprefrence(id : string ,prefid: string){
  	var prefs = "prefs="+ prefid;
		return this.http.post('${CONFIG.API_URL}fbr/preference/user/${id}/',prefs)
    .map(res => res.json());
	}


}

export class prefrence{
	id: string;
	name: string;
}
