import { NgModule, ErrorHandler } from '@angular/core';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';

import { MetaSliderImagesService } from '../providers/meta-slider-images-service';
import { EventsService } from '../providers/events-service';

import { LandingPage } from '../pages/landing/landing';
import { HomePage } from '../pages/home/home';
import { AboutPage } from '../pages/about/about';
import { ContactUsPage } from '../pages/contact-us/contact-us';
import { CalendarPage } from '../pages/calendar/calendar';

import { PreferencePage } from '../pages/preference/preference';
import { ReservationPage } from '../pages/reservation/reservation';

import { CjcFooter } from '../components/cjc-footer/cjc-footer';
import { CjcHeader } from '../components/cjc-header/cjc-header';
import { CjcUserCircle } from '../components/cjc-user-circle/cjc-user-circle';
import { CachingService } from '../providers/caching-service';
import { CustomizerService } from '../providers/customizer-service';
import { FacebookService } from '../providers/facebook-service';
import { StaticPagesService } from '../providers/static-pages-service';


@NgModule({
	declarations: [
		MyApp,
		LandingPage,
		HomePage,
		AboutPage,
		ContactUsPage,
		CalendarPage,

		PreferencePage,
		ReservationPage,

		CjcHeader,
		CjcFooter,
		CjcUserCircle
	],
	imports: [
		IonicModule.forRoot(MyApp)
	],
	bootstrap: [
		IonicApp
	],
	entryComponents: [
		MyApp,
		LandingPage,
		HomePage,
		AboutPage,
		ContactUsPage,
		CalendarPage,

		PreferencePage,
		ReservationPage,

		CjcHeader,
		CjcFooter,
		CjcUserCircle
	],
	providers: [
		{ provide: ErrorHandler, useClass: IonicErrorHandler },
		MetaSliderImagesService,
		EventsService,
		CachingService,
		CustomizerService,
		FacebookService,
		StaticPagesService
	]
})
export class AppModule { }
