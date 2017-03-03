import { platformBrowserDynamic } from '@angular/platform-browser-dynamic';
import { enableProdMode } from '@angular/core';
import { AppModule } from './app.module';
import CONFIG from './config.json';

if (CONFIG.RELEASE) { enableProdMode(); }
platformBrowserDynamic().bootstrapModule(AppModule);
