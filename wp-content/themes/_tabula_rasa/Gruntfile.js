// get the grunt class
const grunt = require('grunt');
const sass = require("sass");
const Fiber = require("fibers");
sass.render({
  file: "__pre/_sass/main.scss",
  importer: function (url, prev, done) {
    // ...
  },
  fiber: Fiber
}, function (err, result) {
  // ...
});

// auto-load all the grunt tasks passed into the initConfig func
require('load-grunt-tasks')(grunt);

// pass settings into grunt
grunt.initConfig({
  sass: {
    options: {
      implementation: sass,
      sourceMap: true,
    },
    main: {
      files: {
        '__build/_css/main.css': '__pre/_sass/main.scss',
      },
    }
  },
  watch: {
    sass: {
      files: ['__pre/_sass/**/*.scss'],
      tasks: ['sass'],
      options: {
        livereload: 35729
      },
    },
    js: {
      files: ['__pre/_js/**/*.js'],
      tasks: ['browserify'],
      options: {
        livereload: 35729
      },
    },
    php: {
      files: ['**/*.php'],
      options: {
        livereload: 35729
      },
    },
    options: {
      style: 'expanded',
      compass: true,
    },
  },
  browserify: {
    main: {
      files: {
        '__build/_js/main.js': ['__pre/_js/main.js']
      },
      options: {
        transform: [
          [
            "babelify", {
              presets: ["@babel/env"]
            }
          ]
        ],
        browserifyOptions: {
          // Embed source map for tests
          debug: true
        },
        sourceMaps: true
      }
    }
  },
  exorcise: {
    bundle: {
      options: {},
      files: {
        '__build/_js/main.js.map': ['__build/_js/main.js'],
      }
    }
  }
});
// register the default task
grunt.registerTask('default', ['sass', 'browserify', 'exorcise', 'watch']);