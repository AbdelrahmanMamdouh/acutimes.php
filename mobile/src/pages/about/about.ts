import { Component } from '@angular/core';
import { NavController, NavParams } from 'ionic-angular';

/*
  Generated class for the About page.

  See http://ionicframework.com/docs/v2/components/#navigation for more info on
  Ionic pages and navigation.
*/
@Component({
	selector: 'page-about',
	templateUrl: 'about.html'
})
export class AboutPage {

	public sections;
	constructor(public navCtrl: NavController, public navParams: NavParams) {
		this.sections = [
			{
				title: "About Cairo Jazz Club",
				img: "http://104.40.211.237/Cairo-Jazz-Club.wp/website/wp-content/uploads/2017/01/about-us.jpg",
				content: "<p>Laid back, hi-energy and fun.</p><p>For well over a decade, Cairo Jazz Club has stood the test of time as Cairo’s ultimate live music hub. The vibe achievedin our venue is a lively and engaging one where people can enjoy live music, delicious food and bar selections, whilefeeling right at home. In the center of it all, the Cairo Jazz Club stage is notoriously established as a portal formanifesting art and expression through music. It has stood witness to the rise of many fresh talents, regularly hostingthe finest live acts in town, as well as exciting international artists. We also make it our mission to tirelessly exposenew talent and present them with the space and opportunity to grow; we have been the starting ground for countless artistsin the independent music scene. Adamant on catering to all tastes while remaining musically objective, Cairo Jazz Clubhosts a different event every day, covering various genres, in addition to the occasional themed nights.</p><p>The philosophy that has kept us going thus far is simpler than you would think, “We serve good moods”. And that is preciselywhat is on the menu every day of the week. So if you enjoy having a good time while feeding your appetite with a delectable,diverse menu and euphorically intoxicating cocktails, then Cairo Jazz Club is the place to be.</p>"

			},
			{
				title: "CJC’s Art",
				img: "http://104.40.211.237/Cairo-Jazz-Club.wp/website/wp-content/uploads/2017/01/CJC-art-pic-web-.jpg",
				content: '<p>Cairo Jazz Club was very lucky to work with different creative artistic talents over the years. Known for our unique drawings, mystical interior design and authentic print work, CJC has to commend the imaginative minds of those who helped inspire our identity and character that followed.</p><p><strong>Amr Qenawi: Current&nbsp;Graphic Designer &amp; Art Director &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></p><p>Although his line of work requires versatility in style, CJC’s resident&nbsp;designer Amr Qenawi’s unique artistic identity is embedded in all aspect&nbsp;of his CJC designs. Creative flyers, posters, graphics and interior themed decoration all show&nbsp;the admirable objectivity in his work. Qenawi has recently taken on the task of art directing CJC’s themed nights, creating different moods using his creativity and props mostly worked on by hand.</p><p>Upon graduating with a BA in applied&nbsp;arts in 2008, Amr launched his career as a painter and computer graphic&nbsp;artist. He draws inspiration from the likes of surrealist giant, H.R&nbsp;Giger; Spanish Fantasy Characters artist, Luis Royo; and the prince of&nbsp;darkness himself, Marilyn Manson. Amr is also one of the very few artists around that are willing to take on the tedious yet beautifully sophisticated art of Rotoscopy, completing Neobyrd’s entire music video ‘My Sweetheartless’ with a whopping 3800 individually coloured frames within months of filming.<strong>&nbsp;</strong><span style="font-size: 1.6rem;">&nbsp;</span><strong style="font-size: 1.6rem;"><a href="https://www.youtube.com/watch?v=FP5ktZWketk">https://www.youtube.com/watch?v=FP5ktZWketk</a></strong></p><p><strong>Karine Ghaly:</strong>&nbsp;<strong>CJC Artist responsible for the unique illustrations</strong><br>If you ever wondered who was the creative mastermind behind the illustrations that inspired everything from our logo to our tables and façade, look no further than artist Karine Ghaly. Born in Alexandria Egypt, Karine graduated from the University of Fine Art Alexandria and went on to attend courses at St Martin’s College of art and design in London. Karine used her love of Egypt and of music to help influence the logo and illustrations for Cairo Jazz Club. By combining her creative imagination with a modern twist she was able to create a feel of freedom and relaxed environment matching CJC’s ambiance. Karine also acknowledges CJC’s owners for having a big impact on the creative process and final designs.<br>Karine has had exhibitions at the Ostia Lido’s Art Gallery in Rome. Waterloo’s Art Gallery in Brussels, the Crédit Mutuel in France, Spanish Cultural Center, and various locations in Cairo such as International Cultural Center for Cooperation.</p><p><strong>Amr Farouk: Interior&nbsp;Paintings (CJC Agouza)&nbsp;</strong><br>Bohemian artist and designer Amr Farouk is the craftsman behind the series of intriguing paintings hanging inside Cairo Jazz Club. Amr Farouk was a painter from his early days as a curious child. Born in Cairo, Amr moved to Sinai from the age of 15 and lived a Bedouin lifestyle over the following 22 years. Moving from one area to another, spending a lot of time in the mountains, Amr’s artistic talents developed at a rapid rate, excelling him to greater spiritual enlightenment. His travels and free living attitude is well represented in his art at Cairo Jazz Club.</p><p><strong>Mahmoud Fahmy: Graphic Designer&nbsp; </strong><br>Cool and collected Egyptian freelance designer Mahmoud Fathy brought the CJC drawings to life in 2010 and was responsible for the first batch of CJC printed materials including the creative and upbeat series of posters and flyers CJC generated for bands and festivals. Mahmoud studied design at faculty of Fine Arts in Cairo and worked for numerous organizations such as Promo 7 and LOWE Egypt. He currently lives in Berlin and works for worldwide advertising agency DDB. <a href="http://www.mahmoud-fathy.com/">http://www.mahmoud-fathy.com/</a></p>'

			},
		]
	}

	ionViewDidLoad() {
		console.log('ionViewDidLoad AboutPage');
	}

}
