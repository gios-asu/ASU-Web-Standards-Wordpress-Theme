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

        phpcs: {
            core: {
                dir: ['*.php']
            },
            extra: {
                dir: ['inc/*.php']
            },
            options: {
                bin: 'vendor/bin/phpcs',
                standard: './coding_standards/Wordpress',
                ignore: 'header-asu.php'
            }
        }
    });

    // These plugins provide necessary tasks
    grunt.loadNpmTasks('grunt-phpcs');

    // Default task
    grunt.registerTask('default', [
        'phpcs']);
};

