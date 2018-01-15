/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

	'use strict';

	var $preload = $('.preload');
	var $loading = $('#js-loading');
	var $progressBar = $('#js-progress');
	var $container = $('#js-container');
	$container.addClass('is-loading');

	var imgSrcs = [];

	$preload.find('img').each(function () {
	    imgSrcs.push($(this).attr('src'));
	});
	var loader = new $.ImgLoader({
	    srcs: imgSrcs,
	    pipesize: 2,
	    delay: 200,
	    timeout: 500,
	    useXHR2: false
	});

	loader.on('progress', function (progress) {
	    var prog = progress.loadedRatio;
	    TweenMax.to($progressBar, 0.5, {
	        width: progress.loadedRatio * 100 + '%'
	    });
	});

	loader.on('itemload', function ($img) {});

	loader.on('allload', function ($img) {
	    $container.removeClass('is-loading');
	    TweenMax.to($loading, 0.5, {
	        autoAlpha: 0,
	        onComplete: function onComplete() {
	            TweenMax.set($loading, { display: 'none' });
	        },
	        delay: 1
	    });
	});

	loader.load();

/***/ }
/******/ ]);
//# sourceMappingURL=map/app.js.map
