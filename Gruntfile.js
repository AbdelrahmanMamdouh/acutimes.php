module.exports = function (grunt) {

	'use strict';

	require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		htmlhint: {
			build: {
				options: {
					'tag-pair': true,
					'tagname-lowercase': true,
					'attr-lowercase': true,
					'doctype-first': true,
					'id-unique': true,
					'head-script-disabled': false,
					'style-disabled': true,
					"img-alt-require": true,
					"doctype-html5": true,
					"attr-value-not-empty": false
				},
				src: ['*.html']
			}
		},

		sass: {
			dist: {
				options: {
					style: 'expanded',
				},
				files: {
					'css/main-ltr.css': 'css/main-ltr.scss',
					'css/main-rtl.css': 'css/main-rtl.scss',
					'css/skrollr.css': 'css/skrollr.scss',
				}
			}
		},

		autoprefixer: {
			dist: {
				files: {
					'css/main-ltr.css': 'css/main-ltr.css',
					'css/main-rtl.css': 'css/main-rtl.css',
				}
			}
		},

		uglify: {
			build: {
				files: {
					'js/min/main.min.js': ['js/main.js'],
					'js/min/plugins.min.js': ['js/plugins.js']
				}
			}
		},

		htmlmin: {
			dist: {
				options: {
					removeComments: true,
					collapseWhitespace: true
				},
				files: {
					'minified-html/index.html': 'index.html'
				}
			}
		},

		watch: {
			options: {
				livereload: true
			},
			html: {
				files: ['*.html'],
				tasks: ['htmlhint', 'htmlmin']
			},
			css: {
				files: ['css/**/*.scss'],
				tasks: ['sass', 'autoprefixer'],
				options: {
					spawn: false
				}
			},
			scripts: {
				files: ['js/*.js'],
				tasks: ['uglify'],
				options: {
					spawn: false
				}
			},
			gruntfile: {
				files: ['Gruntfile.js']
			}
		},

		connect: {
			server: {
				options: {
					port: 8000,
					base: '.'
				}
			}
		}

	});

	grunt.registerTask('server', ['connect:server', 'watch']);

};