module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    //Sass Compiling Task
    sass: {
      options: {
        includePaths: ['assets/bower_components/foundation/scss']
      },
      dev: {
        options: {
          style: 'expanded',
          sourceMap: true,
        },
        files: {
          'assets/stylesheets/app.css': 'assets/scss/app.scss'
        }
      },
      dist: {
        options: {
          outputStyle: 'compressed',
          sourceMap: true,
        },
        files: {
          'assets/stylesheets/app.min.css': 'assets/scss/app.scss',
          'assets/stylesheets/app.ie.css': 'assets/scss/app.scss'
        }
      }
    },

    //autoprefixer
    postcss: {
      options: {
        map: true,
        processors: [
          require('autoprefixer-core')({browsers: ['last 2 versions', 'ie 8', 'ie 9', '> 1%']})
        ]
      },
      //prefix all files
      multiple_files: {
        expand: true,
        flatten: true,
        src:'assets/stylesheets/*.css',
        dest:'assets/stylesheets/',
      }
    },

    //imagemin
    imagemin: {
       dist: {
          options: {
            optimizationLevel: 5
          },
          files: [{
             expand: true,
             cwd: 'assets/images',
             src: ['**/*.{png,jpg,gif}'],
             dest: 'assets/images'
          }]
       }
    },
    //browserSync
    browserSync: {
        dev: {
            bsFiles: {
                    src : [
                        'assets/stylesheets/*.css',
                        '**/*.php',
                        'assets/js/vendor/*.js',
                        'assets/js/*.js',
                        'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}'
                    ]
            },
            options: {
                watchTask: true,
                proxy: "bicycle.dev/africana"
            }
        }
    },

    //Copy Font-Awesome
    copy: {
        fontawesome: {
            expand: true,
            flatten: true,
            src: ['assets/bower_components/font-awesome/fonts/*'],
            dest: 'assets/fonts'
        },
        foundation: {
            expand: true,
            flatten: true,
            src: ['assets/bower_components/foundation/js/*'],
            dest: 'assets/js'
        }
    },

    //Watch Task
    watch: {
      grunt: {
        options: {
          reload: true
        },
        files: ['Gruntfile.js']
      },
      sass: {
        files: 'assets/scss/**/*.scss',
        tasks: ['sass', 'postcss', 'imagemin'],
      },
      //livereload: {
       //  options: { livereload: true },
        //  files: ['assets/scss/**/*.scss', 'assets/js/*.js', '**/*.php', 'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
     // }
    }
  });

  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.registerTask('build', ['sass', 'copy']);
  grunt.registerTask('default', ['sass','browserSync','copy','watch']);
}
