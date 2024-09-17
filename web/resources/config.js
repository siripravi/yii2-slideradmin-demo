const fs = require( 'fs' );

/* paths to source files (src), to ready files (build), as well as to those whose changes need to be monitored (watch) */

// PATH for folder/files - relative to gulpfile.js
/*const paths = {
	scss: 'assets/scss/',
	css: 'assets/css/',
	scripts: './build/js/',
	html: '',
	domain: 'http://luyacore.local' // your local domain, e.g. http://local.mysite; required for local development (browserSync) and for generate critical CSS
}*/

// browserSync

// autoprefixer
const settingsAutoprefixer = {
	browsers: [ 'last 2 versions' ]
}

// critical css
const sourceCssForCritical = [];//array of css files which used for create critical css
const mainCssFile = 'assets/css/starter.css';//main css file
const advancedWooSearch = '../../plugins/advanced-woo-search/assets/css/common.css';//search css plugin's file

sourceCssForCritical.push( mainCssFile );
if ( fs.existsSync( advancedWooSearch ) ) {//add search file if plugin exist
	sourceCssForCritical.push( advancedWooSearch );
}
const critical = {
	base: 'assets/',
	ignore: [ '@font-face',/url\(/ ],
	css: sourceCssForCritical,
	penthouse: {
		timeout: 1000000000,
		renderWaitTime: 500
	},
	dimensions: [{
		height: 812,
		width: 375
	}, {
		height: 5000,
		width: 5000
	}]
}
