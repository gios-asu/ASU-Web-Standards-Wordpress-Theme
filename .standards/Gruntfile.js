/**
 *  
 * @see  https://github.com/squizlabs/PHP_CodeSniffer
 */
module.exports = function (grunt) {
  'use strict';
  // Project configuration
  grunt.initConfig({
    // Metadata
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - ' +
        '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
        '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
        '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
        ' Licensed <%= props.license %> */\n',
    // PHP Coding Standards
    // ====================
    phpcs: {
      core: {
        dir: ['../*.php'],
      },
      extra: {
        dir: [
          '../inc/*.php',
          '../inc/shortcodes/*.php',
          '../helpers/*.php',
        ],
      },
      options: {
        bin: 'vendor/bin/phpcs',
        // bin: 'vendor/bin/phpcbf',
        standard: 'Wordpress',
        ignore: [ ],
      }
    },
    // CSS Lint
    // ========
    csslint: {
      options: {
        csslintrc: '.csslintrc'
      },
      core: [
        '../*.css'
      ],
      layouts: [
        '../layouts/*.css'
      ]
    },
    // PHPUnit
    // =======
    phpunit: {
      configuration: 'phpunit.xml',
      options: {
        bin: './vendor/bin/phpunit',
        color: true
      }
    },
    // CSS Minify
    // ==========
    cssmin: {
        target: {
            files: [{
                expand: true,
                cwd: '../stylesheets/',
                src: ['*.css', '!*.min.css'],
                dest: '../stylesheets/',
                ext: '.min.css'
            }]
        }
    }
  });

  // These plugins provide necessary tasks
  grunt.loadNpmTasks('grunt-phpcs');
  grunt.loadNpmTasks('grunt-contrib-csslint');
  grunt.loadNpmTasks('grunt-phpunit');

  // Default task
  grunt.registerTask('default', [
      'phpcs',
      'phpunit',
  ]);
};

