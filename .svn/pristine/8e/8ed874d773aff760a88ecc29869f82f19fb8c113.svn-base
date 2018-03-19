

// require
// main
var gulp = require("gulp");

// tool
var plumber = require("gulp-plumber");
var debug = require("gulp-debug");
var notify = require("gulp-notify");

// compile
// var sass = require("gulp-sass");
// var autoprefixer = require("gulp-autoprefixer");
// var browserify = require("gulp-browserify");
// var map = require("gulp-sourcemaps");

// product
var cleancss =  require("gulp-clean-css");
var uglify = require("gulp-uglify");
var imagemin = require("gulp-imagemin");
var cssbase64 = require("gulp-css-base64");
var rev = require("gulp-rev");
var revcollector = require("gulp-rev-collector");
var replace = require("gulp-replace");


// init path
var project = {
	dev : {},
	prd : {}
};
var asset = {
	dev : {},
	prd : {}
};

var assetPath = "Public/";

var devPath = "dev/";
var prdPath = "prd/";

var path = {
	main : "",
	sass : "sass/",
	css : "css/",
	js : "js/",
	img : "img/",
	rev : "rev/",
	lib : "lib/"
};

(function initPath(){
	for(var i in path){
		asset.dev[i] = assetPath + devPath + path[i];
		asset.prd[i] = assetPath + prdPath + path[i];
	}

	project.dev.main = "Dev/";
	project.dev.view = "Dev/Home/View/";
	project.prd.main = "Application/";
	project.prd.view = "Application/Home/View/";
}());


// oporation of gulp
gulp.task("default", function(){
	console.log(
		"\n" +
		"\n" +
		"please input the task name:\n" +
		"\n" +
		"prd : (Front End and Back End). Release a version, compile asset.dev and view.dev to their product-path.\n" +
		"\n" +
		"\n"
	);
});


// product. task of release
gulp.task("prd_css", function(){
	return gulp.src( asset.dev.css + "*.css" )
		.pipe( cleancss({
			compatibility: 'ie7'
		}) )
		.pipe( debug({
			title : "asset.css: "
		}) )
		.pipe( rev() )
		.pipe( gulp.dest( asset.prd.css ) )
		.pipe( rev.manifest("prd_rev_css.json") )
		.pipe( gulp.dest( asset.dev.rev ) );
});

gulp.task("prd_js", function(){
	return gulp.src( asset.dev.js + "*.js")
		.pipe( uglify() )
		.pipe( debug({
			title : "asset.js: "
		}) )
		.pipe( rev() )
		.pipe( gulp.dest( asset.prd.js ) )
		.pipe( rev.manifest("prd_rev_js.json") )
		.pipe( gulp.dest( asset.dev.rev ) );
});

gulp.task("prd_img", function(){
	return gulp.src( asset.dev.img + "**/*.{jpg,png,gif}" )
		.pipe( imagemin() )
		.pipe( debug({
			title : "asset.img: "
		}) )
		.pipe( gulp.dest( asset.prd.img ) );
});

gulp.task("prd_lib", function(){
	return gulp.src( asset.dev.lib + "**/*.{js,css}" )
		.pipe( debug({
			title : "asset.lib: "
		}) )
		.pipe( gulp.dest( asset.prd.lib ) );
});

gulp.task("prd_project", function(){
	return gulp.src( [ project.dev.main + "**/*.*", "!" + project.dev.view + "**/*.*", "!" + project.dev.main + "Runtime/**/*.*"])
		.pipe( debug({
			title : "project: "
		}) )
		.pipe( gulp.dest( project.prd.main ) );
});

gulp.task("prd_base64", ["prd_img", "prd_css"], function(){
	return gulp.src( asset.prd.css + "*.css" )
		.pipe( cssbase64({
			maxWeightResource: 4096
		}) )
		.pipe( debug({
			title : "asset.css.base64: "
		}) )
		.pipe( gulp.dest( asset.prd.css ) );
});

gulp.task("prd_view", ["prd_base64", "prd_js", "prd_project"], function(){
	return gulp.src( [ project.dev.view + "**/*.html", asset.dev.rev + "**/*.json"] )
		.pipe( debug({
			title : "view: "
		}) )
		.pipe( revcollector({
			replaceReved: true
		}) )
		.pipe( replace( "__PUBLIC__/" + devPath, "__PUBLIC__/" + prdPath ) )
		.pipe( gulp.dest( project.prd.view ) );
});

gulp.task("prd", ["prd_view", "prd_lib"]);
