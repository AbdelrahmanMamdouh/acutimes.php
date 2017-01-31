# Installation

1. Install Ionic 2
	```
	$ npm install -g ionic cordova typescript sass
	```

2. Install package.json dependencies
	```
	$ npm install
	```

3. Install Cordova/PhoneGap plugins (cordovaPlugins pakage.json branch dependencies)
	```
	$ ionic state restore
	```
4. Test your app on multiple screen sizes and platform types by starting a local development server
	```
	$ ionic serve
	or
	$ ionic serve --lab 
	```
5. Build iOS
	```
	$ ionic platform add ios
	$ ionic build ios
	```
6. or Build Android
	```
	$ ionic platform add android
	$ ionic build android
	```