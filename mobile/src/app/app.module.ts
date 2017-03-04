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

import { CjcHeader } from '../components/cjc-header/cjc-header';
import { CjcHeaderBasic } from '../components/cjc-header-basic/cjc-header-basic';
import { CjcFooter } from '../components/cjc-footer/cjc-footer';

import { CachingService } from '../providers/caching-service';
import { CustomizerService } from '../providers/customizer-service';
import { FacebookService } from '../providers/facebook-service';
import { StaticPagesService } from '../providers/static-pages-service';
import { NotificationService } from '../providers/notification-service';
import { ReservationService } from '../providers/reservation-service';
import { PreferenceService } from '../providers/preference-service';


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
		CjcHeaderBasic,
		CjcFooter
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
		CjcHeaderBasic,
		CjcFooter
	],
	providers: [
		{ provide: ErrorHandler, useClass: IonicErrorHandler },
		MetaSliderImagesService,
		EventsService,
		CachingService,
		CustomizerService,
		FacebookService,
		StaticPagesService,
		NotificationService,
		ReservationService,
		PreferenceService
	]
})
export class AppModule { }
