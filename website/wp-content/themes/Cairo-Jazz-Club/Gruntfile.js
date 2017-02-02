module.exports = function (grunt) {

	'use strict';

	require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		sass: {
			dist: {
				options: {
					style: 'expanded',
				},
				files: {
					'css/main-ltr.css': 'sass/main-ltr.scss',
					'css/main-rtl.css': 'sass/main-rtl.scss',
					'css/skrollr.css': 'sass/skrollr.scss',
					'css/underscore.css': 'sass/underscore/style.scss',
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
					'js/main-v2.min.js': ['js/main-v2.js']
				}
			}
		},

		watch: {
			css: {
				files: ['sass/**/*.scss'],
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

	});

	grunt.registerTask('watch', ['watch']);
	grunt.registerTask('build', ['sass', 'autoprefixer', 'uglify']);
};