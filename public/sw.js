/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
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
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/portal/serviceworker.js":
/*!**********************************************!*\
  !*** ./resources/js/portal/serviceworker.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var VERSION = "lspadmin-sw-v3";
var RUNTIME = "RUNTIME";
var channel = new BroadcastChannel("sw-messages");
var precacheUrls = ["css/app.css", "js/app.js"]; // install handler, precaching resources

self.addEventListener("install", function (event) {
  event.waitUntil(caches.open(VERSION).then(function (cache) {
    return cache.addAll(precacheUrls);
  }).then(self.skipWaiting()));
}); // activate handler, cleaning up old cache

self.addEventListener("activate", function (event) {
  var currentCaches = [VERSION, RUNTIME];
  event.waitUntil(caches.keys().then(function (cacheNames) {
    return cacheNames.filter(function (cacheName) {
      return !currentCaches.includes(cacheName);
    });
  }).then(function (cachesToDelete) {
    return Promise.all(cachesToDelete.map(function (cacheToDelete) {
      return caches["delete"](cacheToDelete);
    }));
  }).then(function () {
    return self.clients.claim();
  }));
}); // fetch handler, handling fetch same-origins resources from a cache.
// if no response, it populate RUNTIME cache with response from network before returning to page

self.addEventListener("fetch", function (event) {
  var destination = event.request.destination;

  if (event.request.url.match("^.*(/admin).*$")) {
    return false;
  }

  if (event.request.method !== "GET") {
    return;
  } // skip cross-origin requests,


  if (event.request.url.startsWith(self.location.origin)) {
    switch (destination) {
      case "style":
      case "font":
      case "script":
        event.respondWith(caches.match(event.request).then(function (cachedResponse) {
          if (cachedResponse) {
            return cachedResponse;
          }

          return caches.open(RUNTIME).then(function (cache) {
            return fetch(event.request).then(function (response) {
              // put copy of response in the runtime cache -> harus clone ya
              return cache.put(event.request, response.clone()).then(function () {
                return response;
              });
            });
          });
        }));
        break;

      default:
        event.respondWith(fetch(event.request).then(function (response) {
          // put copy of response in the runtime cache -> harus clone ya
          return caches.open(RUNTIME).then(function (cache) {
            return cache.put(event.request, response.clone()).then(function () {
              return response;
            });
          });
        })["catch"](function (e) {
          channel.postMessage("offline");
          return caches.match(event.request).then(function (cachedResponse) {
            if (cachedResponse) {
              return cachedResponse;
            } else return e;
          });
        }));
        break;
    }
  }
});

/***/ }),

/***/ 2:
/*!****************************************************!*\
  !*** multi ./resources/js/portal/serviceworker.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\afaiz\Documents\Project\Laravel\lspadminv2\resources\js\portal\serviceworker.js */"./resources/js/portal/serviceworker.js");


/***/ })

/******/ });