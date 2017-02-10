import { Component } from '@angular/core';
import { Facebook } from 'ionic-native';

@Component({
  selector: 'page-landing',
  templateUrl: 'landing.html'
})
export class LandingPage {
  slides = [
    {
      title: "Welcome to the Docs!",
      description: "The <b>Ionic Component Documentation</b> showcases a number of useful components that are included out of the box with Ionic.",
      image: "assets/img/ica-slidebox-img-1.png",
    },
    {
      title: "What is Ionic?",
      description: "<b>Ionic Framework</b> is an open source SDK that enables developers to build high quality mobile apps with web technologies like HTML, CSS, and JavaScript.",
      image: "assets/img/ica-slidebox-img-2.png",
    },
    {
      title: "What is Ionic Cloud?",
      description: "The <b>Ionic Cloud</b> is a cloud platform for managing and scaling Ionic apps with integrated services like push notifications, native builds, user auth, and live updating.",
      image: "assets/img/ica-slidebox-img-3.png",
    }
  ];

onFBLoginClick = function() {
   Facebook.login(['email']).then(data=>{
     this.faceBookToken=data.authResponse.accessToken;
     this.faceBookUserId=data.authResponse.userID;

     //Call getter function
     this.onGetDetailsClick();
   });
 }

 onGetDetailsClick = function() {
   Facebook.api(this.faceBookUserId+"/?fields=name,email,birthday,gender",['public_profile']).then(data=>{
     alert(JSON.stringify(data));
   });
 }//onGetDetailsClick()

}
