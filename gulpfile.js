"use strict";
const paths = {
  build: {
    html: "./web/build/",
    js: "./web/build/js/",
    css: "./web/build/css/",
    img: "./web/build/img/",
    lib: "./web/build/lib/",
    fonts: "./web/build/fonts/",
  },
  src: {
    html: "resources/src/**/*.html",
    js: ["resources/src/js/main.js", "resources/src/blocks/**/*.js"],
    less: [
      "resources/src/blocks/*",
      "resources/src/blocks/**/*.less",
      "resources/src/less/*.less",
    ],
    style: "resources/scss/main.scss",
    img: "resources/src/img/**/*.*",
    lib: "resources/src/lib/**/*.*",
    fonts: "resources/src/fonts/**/*.*",
    templates: "resources/src/templates/*.jade",
  },
  watch: {
    part: "resources/src/template/*.html",
    html: "resources/src/**/*.html",
    js: "resources/src/js/**/*.js",
    css: "resources/scss/**/*.scss",
    img: "resources/src/img/**/*.*",
    lib: "resources/src/lib/**/*.*",
    fonts: "resources/srs/fonts/**/*.*",
    templates: "resources/src/templates/*.jade",
  },
  clean: "./web/build/*",
};
var postcss = require("gulp-postcss");
const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const browsersync = require("browser-sync"); // server for work and automatic page updates
const plumber = require("gulp-plumber"); // bug tracking module
//rigger = require("gulp-rigger"), // a module to import the contents of one file into another
const concat = require("gulp-concat");
const sourcemaps = require("gulp-sourcemaps"); // module for generating a map of source files
//sass = require("gulp-sass")(require("sass")), // module for compiling SASS (SCSS) to CSS
//const autoprefixer = require("gulp-autoprefixer"); // module for automatic installation of auto-prefixes
const cleanCSS = require("gulp-clean-css"); // CSS minification plugin
const uglify = require("gulp-uglify"); // JavaScript minification module
const cache = require("gulp-cache"); // module for caching
const imagemin = require("gulp-imagemin"); // plugin for compressing PNG, JPEG, GIF and SVG images
const jpegrecompress = require("imagemin-jpeg-recompress"); // jpeg compression plugin
const pngquant = require("imagemin-pngquant"); // png compression plugin
const del = require("del"); // plugin for deleting files and directories
const rename = require("gulp-rename");
const jade = require("gulp-jade");

const config = require("./resources/config.js");

const htmlPartial = require("gulp-html-partial");
const gulpIf = require("gulp-if");
const htmlmin = require("gulp-htmlmin");
const isProd = process.env.NODE_ENV === "prod";
const fs = require("fs");
const browserSync = require("browser-sync").create();
const reload = browserSync.reload;
// Browser definitions for autoprefixer
var AUTOPREFIXER_BROWSERS = [
  "last 3 versions",
  "ie >= 8",
  "ios >= 7",
  "android >= 4.4",
  "bb >= 10",
];
const reloadCb = function (cb) {
  reload();
  return cb();
};

// custom modules
/*
const config  = require( './resources/config.js' ),
	  scripts = require( './resources/js/list_scripts.js' ),
	  flags   = { production: false };
*/
/* настройки сервера */
var serverConfig = {
  server: {
    baseDir: "./web/build",
  },
  notify: false,
  open: false,
};

const htmlFile = ["resources/src/*.html"];
/*
function del() {
  return gulp.src("./web/build/*", { read: false }).pipe(clean());
}*/
/* include gulp and plugins */

gulp.task("clean:css:my", function (cb) {
  //cache.clearAll();
  return del(["web/build/css/custom*.css"], cb);
});

gulp.task(
  "less",
  gulp.series("clean:css:my", function () {
    return (
      gulp
        .src(paths.src.less)
        //.pipe(concat('common.less'))
        /*  .pipe(less({
            paths: ['src/less/bootstrap', paths.resolve(paths.bootstrap, 'less'), paths.resolve(paths.bootstrap, 'less/mixins')]
        }))*/
        .on("error", log)
        //.pipe(sourcemaps.init())
        .pipe(concat("custom.css"))
        /* .pipe(
          autoprefixer({
            browsers: AUTOPREFIXER_BROWSERS,
            cascade: false,
          })
        )*/
        .pipe(
          cleanCSS({ debug: true }, function (details) {
            console.log(details.name + ": " + details.stats.originalSize);
            console.log(details.name + ": " + details.stats.minifiedSize);
          })
        )
        .pipe(rename({ suffix: ".min" }))
        //.pipe(sourcemaps.write())
        .pipe(gulp.dest("./web/build/css"))
        .pipe(reload({ stream: true }))
    );
  })
);

//build partial html files
/*gulp.task("part:build", function () {
  return gulp
    .src(htmlFile)
    .pipe(
      htmlPartial({
        basePath: "resources/src/partials/",
      })
    )
    .pipe(
      gulpIf(
        isProd,
        htmlmin({
          collapseWhitespace: true,
        })
      )
    )
    .pipe(gulp.dest("./web/build/"));
});*/

// compile html
gulp.task("html:build:old", function () {
  return (
    gulp
      .src(paths.src.html) // selection of all html files in the specified path
      .pipe(plumber()) // error tracking
      //.pipe(rigger()) // attachment import
      .pipe(gulp.dest(paths.build.html)) // uploading ready files
      //.pipe(webserver.reload({ stream: true }))
  ); // server reboot
});

// compile styles
gulp.task("css:build", function () {
  return (
    gulp
      .src(paths.src.style) // get main.scss
      .pipe(sourcemaps.init()) // initialize sourcemap
      .pipe(sass()) // scss -> css
      // .pipe(autoprefixer()) // add prefix
      .pipe(gulp.dest(paths.build.css))
      .pipe(rename({ suffix: ".min" }))
      .pipe(cleanCSS()) // minimize CSS
      //.pipe(postcss([autoprefixer()]))
      .pipe(sourcemaps.write("./")) // write sourcemap
      .pipe(gulp.dest(paths.build.css)) // output to build
      .pipe(browsersync.reload({ stream: true }))
  ); // server restart
});
// compile js
gulp.task("js:build", function () {
  return (
    gulp
      .src(paths.src.js) // get file main.js
      .pipe(plumber()) // for bug tracking
      //  .pipe(rigger()) // import all files to main.js
      .pipe(gulp.dest(paths.build.js))
      .pipe(rename({ suffix: ".min" }))
      .pipe(sourcemaps.init()) //initialize sourcemap
      .pipe(uglify()) // minimize js
      .pipe(sourcemaps.write("./")) //  write sourcemap
      .pipe(gulp.dest(paths.build.js)) // put ready file
      .pipe(browsersync.reload({ stream: true }))
  ); 
});

// move fonts
gulp.task("fonts:build", function () {
  return gulp.src(paths.src.fonts).pipe(gulp.dest(paths.build.fonts));
});

// move fonts
gulp.task("lib:build", function () {
  return gulp.src(paths.src.lib).pipe(gulp.dest(paths.build.lib));
});
// image processing
gulp.task("image:build", function () {
  return gulp
    .src(paths.src.img) // path to image source
    .pipe(
      cache(
        imagemin([
          // image compression
          imagemin.gifsicle({ interlaced: true }),
          jpegrecompress({
            progressive: true,
            max: 90,
            min: 80,
          }),
          pngquant(),
          imagemin.svgo({ plugins: [{ removeViewBox: false }] }),
        ])
      )
    )
    .pipe(gulp.dest(paths.build.img)); // output ready files
});

// remove catalog build
gulp.task("clean:build", function () {
  return del(["./web/build/*"]);
});
gulp.task("clean:templates", function (cb) {
 // return del(["build/*.html"], cb);
});

/*
gulp.task("templates:build", function () {
  var YOUR_LOCALS = JSON.parse(
    fs.readFileSync("./template_locals.json", "utf8")
  );
  return gulp
    .src(paths.src.templates)
    .pipe(
      jade({
        locals: YOUR_LOCALS,
        pretty: true,
      })
    )
    .on("error", log)
    .pipe(gulp.dest("./web/build/"));
});
*/
gulp.task("html:build", function () {
  gulp.src([paths.src.html])
      .pipe(htmlPartial({
          basePath: 'resources/src/partials/'
      }))
      .pipe(gulp.dest(paths.build.html));
});
// clear cache
gulp.task("cache:clear", function () {
  cache.clearAll();
});

//gulp.task("html:build", gulp.parallel("html", ()=>browserSync.reload()));
// assembly
gulp.task(
  "build",
  gulp.series(
    "clean:build",
    gulp.parallel(
      "js:build",
      "html:build",
     // "templates:build",
      //"part:build",
      "less",
      "css:build",
      "js:build",
      "fonts:build",
      "lib:build",
      "image:build"
    )
  )
);

gulp.task("serve", function () {
  /*browsersync.init({
    server: "./web/build",
  });*/
  gulp.watch(paths.watch.html, gulp.parallel("html:build"));
  //gulp.watch(paths.watch.html, ["html:build"));
  gulp.watch(paths.watch.css, gulp.parallel("css:build"));
  gulp.watch(paths.watch.js, gulp.parallel("js:build"));
  //gulp.watch( paths.scripts + 'modules/**/*.js', [ 'scripts' ) );
  gulp.watch(paths.watch.img, gulp.parallel("image:build"));
  gulp.watch(paths.watch.fonts, gulp.parallel("fonts:build"));
  gulp.watch(paths.watch.lib, gulp.parallel("lib:build"));
  //gulp.watch(paths.src.scripts.concat('src/blocks/*'), {cwd: '.'}, ['js']);
  
});


gulp.task("default", gulp.parallel("build","serve"));

function log(error) {
  console.log(
    [
      "",
      "----------ERROR MESSAGE START----------",
      "[" + error.name + " in " + error.plugin + "]",
      error.message,
      "----------ERROR MESSAGE END----------",
      "",
    ].join("\n")
  );

  this.emit("end");

}
