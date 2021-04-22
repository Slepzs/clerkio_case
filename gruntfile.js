module.exports = function(grunt) {

    const sass = require('node-sass');
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            scripts: {
                files: 'js/src/*.js',
                tasks: ['jshint', 'uglify'],
                options: {
                    interrupt: true,
                },
            },
            css: {
                files: 'scss/src/clerk.scss',
                tasks: ['sass'],
                options: {
                    livereload: true,
                },
            },
        },
        jshint: {
            files: [
                'js/src/clerk.js',
            ],
            options: {
                expr: true,
                globals: {
                    jQuery: true,
                    console: true,
                    module: true,
                    document: true
                }
            }
        },
        sass: {
                options: {
                    banner: '/*! <%= pkg.name %> <%= pkg.version %> filename.css <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
                    implementation: sass,
                    sourceMap: true,
                    style: 'expanded'
                },
                files: {
                    src: ['scss/src/clerk.scss'],
                    dest: 'scss/dist/clerk.css'
                }
        },
        uglify: {
                options: {
                    banner: '/*! <%= pkg.name %> <%= pkg.version %> filename.js <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
                    beautify: true,
                    compress: true,
                    mangle: false,
                    sourceMap: true,
                    sourceMapName: 'js/dist/clerk.map'
                },
                files: {
                    src: ['js/src/clerk.js'],
                    dest: 'js/dist/clerk.min.js'
                }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', [
        'jshint',
        'uglify',
        'sass',
    ]);

};