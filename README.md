MySQL migration
================
1. import db from 'backups\database'
2. run the following SQL query to set the siteurl & home

	```SQL
	UPDATE `cjc`.`cjc_options` 
	SET `option_value` = 'http://website/'
	WHERE `option_name` in ('siteurl','home');
	```





Plugin List used on server
===========================
* Admin Columns
* Admin Menu Editor Pro
* Advanced Custom Fields PRO
* Custom Post Type UI
* Essential Grid
* Material - White Label WordPress Admin Theme
* Meta Slider
* Ninja Forms
* Ninja Forms Blocks
* WPBakery Visual Composer





Theme
===========================
Start with `npm install`
 * `grunt watch` to keep watching for changes
 * `grunt build` for a 1 time build





Mobile
=======

1. copy the config file under `\mobile\src\app\config.example.json` to `\mobile\src\app\config.json`

2. Install package.json dependencies
	* `$ npm install`

3. Install Cordova/PhoneGap plugins (cordovaPlugins pakage.json branch dependencies)
	* `$ ionic state restore`

4. Test your app on multiple screen sizes and platform types by starting a local development server
	* `$ ionic serve --lab `

5. Build iOS or Android

	```shell
	$ ionic platform add ios
	$ ionic build ios
	```
	```shell
	$ ionic platform add android
	$ ionic build android
	```