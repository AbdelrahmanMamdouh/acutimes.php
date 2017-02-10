import { NgModule, ErrorHandler } from '@angular/core';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';
import { MyApp } from './app.component';

import { LandingPage } from '../pages/landing/landing';
import { HomePage } from '../pages/home/home';
import { AboutPage } from '../pages/about/about';
import { ContactUsPage } from '../pages/contact-us/contact-us';
import { CalendarPage } from '../pages/calendar/calendar';
import { CjcFooter } from '../pages/cjc-footer/cjc-footer';

@NgModule({
	declarations: [
		MyApp,
		LandingPage,
		HomePage,
		AboutPage,
		ContactUsPage,
		CalendarPage,
		CjcFooter
	],
	imports: [
		IonicModule.forRoot(MyApp)
	],
	bootstrap: [IonicApp],
	entryComponents: [
		MyApp,
		LandingPage,
		HomePage,
		AboutPage,
		ContactUsPage,
		CalendarPage
	],
	providers: [{ provide: ErrorHandler, useClass: IonicErrorHandler }]
})
export class AppModule { }
