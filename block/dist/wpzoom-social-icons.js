(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["style-wpzoom-social-icons"],{

/***/ "./src/block/style.scss":
/*!******************************!*\
  !*** ./src/block/style.scss ***!
  \******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

}]);

/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		"wpzoom-social-icons": 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push(["./src/blocks.js","style-wpzoom-social-icons"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/helpers/defineProperty.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/defineProperty.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

module.exports = _defineProperty;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/extends.js":
/*!********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/extends.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _extends() {
  module.exports = _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _extends.apply(this, arguments);
}

module.exports = _extends;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
  Copyright (c) 2018 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames() {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg)) {
				if (arg.length) {
					var inner = classNames.apply(null, arg);
					if (inner) {
						classes.push(inner);
					}
				}
			} else if (argType === 'object') {
				if (arg.toString === Object.prototype.toString) {
					for (var key in arg) {
						if (hasOwn.call(arg, key) && arg[key]) {
							classes.push(key);
						}
					}
				} else {
					classes.push(arg.toString());
				}
			}
		}

		return classes.join(' ');
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./node_modules/urijs/src/IPv6.js":
/*!****************************************!*\
  !*** ./node_modules/urijs/src/IPv6.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
 * URI.js - Mutating URLs
 * IPv6 Support
 *
 * Version: 1.19.7
 *
 * Author: Rodney Rehm
 * Web: http://medialize.github.io/URI.js/
 *
 * Licensed under
 *   MIT License http://www.opensource.org/licenses/mit-license
 *
 */

(function (root, factory) {
  'use strict';
  // https://github.com/umdjs/umd/blob/master/returnExports.js
  if ( true && module.exports) {
    // Node
    module.exports = factory();
  } else if (true) {
    // AMD. Register as an anonymous module.
    !(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else {}
}(this, function (root) {
  'use strict';

  /*
  var _in = "fe80:0000:0000:0000:0204:61ff:fe9d:f156";
  var _out = IPv6.best(_in);
  var _expected = "fe80::204:61ff:fe9d:f156";

  console.log(_in, _out, _expected, _out === _expected);
  */

  // save current IPv6 variable, if any
  var _IPv6 = root && root.IPv6;

  function bestPresentation(address) {
    // based on:
    // Javascript to test an IPv6 address for proper format, and to
    // present the "best text representation" according to IETF Draft RFC at
    // http://tools.ietf.org/html/draft-ietf-6man-text-addr-representation-04
    // 8 Feb 2010 Rich Brown, Dartware, LLC
    // Please feel free to use this code as long as you provide a link to
    // http://www.intermapper.com
    // http://intermapper.com/support/tools/IPV6-Validator.aspx
    // http://download.dartware.com/thirdparty/ipv6validator.js

    var _address = address.toLowerCase();
    var segments = _address.split(':');
    var length = segments.length;
    var total = 8;

    // trim colons (:: or ::a:b:c… or …a:b:c::)
    if (segments[0] === '' && segments[1] === '' && segments[2] === '') {
      // must have been ::
      // remove first two items
      segments.shift();
      segments.shift();
    } else if (segments[0] === '' && segments[1] === '') {
      // must have been ::xxxx
      // remove the first item
      segments.shift();
    } else if (segments[length - 1] === '' && segments[length - 2] === '') {
      // must have been xxxx::
      segments.pop();
    }

    length = segments.length;

    // adjust total segments for IPv4 trailer
    if (segments[length - 1].indexOf('.') !== -1) {
      // found a "." which means IPv4
      total = 7;
    }

    // fill empty segments them with "0000"
    var pos;
    for (pos = 0; pos < length; pos++) {
      if (segments[pos] === '') {
        break;
      }
    }

    if (pos < total) {
      segments.splice(pos, 1, '0000');
      while (segments.length < total) {
        segments.splice(pos, 0, '0000');
      }
    }

    // strip leading zeros
    var _segments;
    for (var i = 0; i < total; i++) {
      _segments = segments[i].split('');
      for (var j = 0; j < 3 ; j++) {
        if (_segments[0] === '0' && _segments.length > 1) {
          _segments.splice(0,1);
        } else {
          break;
        }
      }

      segments[i] = _segments.join('');
    }

    // find longest sequence of zeroes and coalesce them into one segment
    var best = -1;
    var _best = 0;
    var _current = 0;
    var current = -1;
    var inzeroes = false;
    // i; already declared

    for (i = 0; i < total; i++) {
      if (inzeroes) {
        if (segments[i] === '0') {
          _current += 1;
        } else {
          inzeroes = false;
          if (_current > _best) {
            best = current;
            _best = _current;
          }
        }
      } else {
        if (segments[i] === '0') {
          inzeroes = true;
          current = i;
          _current = 1;
        }
      }
    }

    if (_current > _best) {
      best = current;
      _best = _current;
    }

    if (_best > 1) {
      segments.splice(best, _best, '');
    }

    length = segments.length;

    // assemble remaining segments
    var result = '';
    if (segments[0] === '')  {
      result = ':';
    }

    for (i = 0; i < length; i++) {
      result += segments[i];
      if (i === length - 1) {
        break;
      }

      result += ':';
    }

    if (segments[length - 1] === '') {
      result += ':';
    }

    return result;
  }

  function noConflict() {
    /*jshint validthis: true */
    if (root.IPv6 === this) {
      root.IPv6 = _IPv6;
    }

    return this;
  }

  return {
    best: bestPresentation,
    noConflict: noConflict
  };
}));


/***/ }),

/***/ "./node_modules/urijs/src/SecondLevelDomains.js":
/*!******************************************************!*\
  !*** ./node_modules/urijs/src/SecondLevelDomains.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
 * URI.js - Mutating URLs
 * Second Level Domain (SLD) Support
 *
 * Version: 1.19.7
 *
 * Author: Rodney Rehm
 * Web: http://medialize.github.io/URI.js/
 *
 * Licensed under
 *   MIT License http://www.opensource.org/licenses/mit-license
 *
 */

(function (root, factory) {
  'use strict';
  // https://github.com/umdjs/umd/blob/master/returnExports.js
  if ( true && module.exports) {
    // Node
    module.exports = factory();
  } else if (true) {
    // AMD. Register as an anonymous module.
    !(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else {}
}(this, function (root) {
  'use strict';

  // save current SecondLevelDomains variable, if any
  var _SecondLevelDomains = root && root.SecondLevelDomains;

  var SLD = {
    // list of known Second Level Domains
    // converted list of SLDs from https://github.com/gavingmiller/second-level-domains
    // ----
    // publicsuffix.org is more current and actually used by a couple of browsers internally.
    // downside is it also contains domains like "dyndns.org" - which is fine for the security
    // issues browser have to deal with (SOP for cookies, etc) - but is way overboard for URI.js
    // ----
    list: {
      'ac':' com gov mil net org ',
      'ae':' ac co gov mil name net org pro sch ',
      'af':' com edu gov net org ',
      'al':' com edu gov mil net org ',
      'ao':' co ed gv it og pb ',
      'ar':' com edu gob gov int mil net org tur ',
      'at':' ac co gv or ',
      'au':' asn com csiro edu gov id net org ',
      'ba':' co com edu gov mil net org rs unbi unmo unsa untz unze ',
      'bb':' biz co com edu gov info net org store tv ',
      'bh':' biz cc com edu gov info net org ',
      'bn':' com edu gov net org ',
      'bo':' com edu gob gov int mil net org tv ',
      'br':' adm adv agr am arq art ato b bio blog bmd cim cng cnt com coop ecn edu eng esp etc eti far flog fm fnd fot fst g12 ggf gov imb ind inf jor jus lel mat med mil mus net nom not ntr odo org ppg pro psc psi qsl rec slg srv tmp trd tur tv vet vlog wiki zlg ',
      'bs':' com edu gov net org ',
      'bz':' du et om ov rg ',
      'ca':' ab bc mb nb nf nl ns nt nu on pe qc sk yk ',
      'ck':' biz co edu gen gov info net org ',
      'cn':' ac ah bj com cq edu fj gd gov gs gx gz ha hb he hi hl hn jl js jx ln mil net nm nx org qh sc sd sh sn sx tj tw xj xz yn zj ',
      'co':' com edu gov mil net nom org ',
      'cr':' ac c co ed fi go or sa ',
      'cy':' ac biz com ekloges gov ltd name net org parliament press pro tm ',
      'do':' art com edu gob gov mil net org sld web ',
      'dz':' art asso com edu gov net org pol ',
      'ec':' com edu fin gov info med mil net org pro ',
      'eg':' com edu eun gov mil name net org sci ',
      'er':' com edu gov ind mil net org rochest w ',
      'es':' com edu gob nom org ',
      'et':' biz com edu gov info name net org ',
      'fj':' ac biz com info mil name net org pro ',
      'fk':' ac co gov net nom org ',
      'fr':' asso com f gouv nom prd presse tm ',
      'gg':' co net org ',
      'gh':' com edu gov mil org ',
      'gn':' ac com gov net org ',
      'gr':' com edu gov mil net org ',
      'gt':' com edu gob ind mil net org ',
      'gu':' com edu gov net org ',
      'hk':' com edu gov idv net org ',
      'hu':' 2000 agrar bolt casino city co erotica erotika film forum games hotel info ingatlan jogasz konyvelo lakas media news org priv reklam sex shop sport suli szex tm tozsde utazas video ',
      'id':' ac co go mil net or sch web ',
      'il':' ac co gov idf k12 muni net org ',
      'in':' ac co edu ernet firm gen gov i ind mil net nic org res ',
      'iq':' com edu gov i mil net org ',
      'ir':' ac co dnssec gov i id net org sch ',
      'it':' edu gov ',
      'je':' co net org ',
      'jo':' com edu gov mil name net org sch ',
      'jp':' ac ad co ed go gr lg ne or ',
      'ke':' ac co go info me mobi ne or sc ',
      'kh':' com edu gov mil net org per ',
      'ki':' biz com de edu gov info mob net org tel ',
      'km':' asso com coop edu gouv k medecin mil nom notaires pharmaciens presse tm veterinaire ',
      'kn':' edu gov net org ',
      'kr':' ac busan chungbuk chungnam co daegu daejeon es gangwon go gwangju gyeongbuk gyeonggi gyeongnam hs incheon jeju jeonbuk jeonnam k kg mil ms ne or pe re sc seoul ulsan ',
      'kw':' com edu gov net org ',
      'ky':' com edu gov net org ',
      'kz':' com edu gov mil net org ',
      'lb':' com edu gov net org ',
      'lk':' assn com edu gov grp hotel int ltd net ngo org sch soc web ',
      'lr':' com edu gov net org ',
      'lv':' asn com conf edu gov id mil net org ',
      'ly':' com edu gov id med net org plc sch ',
      'ma':' ac co gov m net org press ',
      'mc':' asso tm ',
      'me':' ac co edu gov its net org priv ',
      'mg':' com edu gov mil nom org prd tm ',
      'mk':' com edu gov inf name net org pro ',
      'ml':' com edu gov net org presse ',
      'mn':' edu gov org ',
      'mo':' com edu gov net org ',
      'mt':' com edu gov net org ',
      'mv':' aero biz com coop edu gov info int mil museum name net org pro ',
      'mw':' ac co com coop edu gov int museum net org ',
      'mx':' com edu gob net org ',
      'my':' com edu gov mil name net org sch ',
      'nf':' arts com firm info net other per rec store web ',
      'ng':' biz com edu gov mil mobi name net org sch ',
      'ni':' ac co com edu gob mil net nom org ',
      'np':' com edu gov mil net org ',
      'nr':' biz com edu gov info net org ',
      'om':' ac biz co com edu gov med mil museum net org pro sch ',
      'pe':' com edu gob mil net nom org sld ',
      'ph':' com edu gov i mil net ngo org ',
      'pk':' biz com edu fam gob gok gon gop gos gov net org web ',
      'pl':' art bialystok biz com edu gda gdansk gorzow gov info katowice krakow lodz lublin mil net ngo olsztyn org poznan pwr radom slupsk szczecin torun warszawa waw wroc wroclaw zgora ',
      'pr':' ac biz com edu est gov info isla name net org pro prof ',
      'ps':' com edu gov net org plo sec ',
      'pw':' belau co ed go ne or ',
      'ro':' arts com firm info nom nt org rec store tm www ',
      'rs':' ac co edu gov in org ',
      'sb':' com edu gov net org ',
      'sc':' com edu gov net org ',
      'sh':' co com edu gov net nom org ',
      'sl':' com edu gov net org ',
      'st':' co com consulado edu embaixada gov mil net org principe saotome store ',
      'sv':' com edu gob org red ',
      'sz':' ac co org ',
      'tr':' av bbs bel biz com dr edu gen gov info k12 name net org pol tel tsk tv web ',
      'tt':' aero biz cat co com coop edu gov info int jobs mil mobi museum name net org pro tel travel ',
      'tw':' club com ebiz edu game gov idv mil net org ',
      'mu':' ac co com gov net or org ',
      'mz':' ac co edu gov org ',
      'na':' co com ',
      'nz':' ac co cri geek gen govt health iwi maori mil net org parliament school ',
      'pa':' abo ac com edu gob ing med net nom org sld ',
      'pt':' com edu gov int net nome org publ ',
      'py':' com edu gov mil net org ',
      'qa':' com edu gov mil net org ',
      're':' asso com nom ',
      'ru':' ac adygeya altai amur arkhangelsk astrakhan bashkiria belgorod bir bryansk buryatia cbg chel chelyabinsk chita chukotka chuvashia com dagestan e-burg edu gov grozny int irkutsk ivanovo izhevsk jar joshkar-ola kalmykia kaluga kamchatka karelia kazan kchr kemerovo khabarovsk khakassia khv kirov koenig komi kostroma kranoyarsk kuban kurgan kursk lipetsk magadan mari mari-el marine mil mordovia mosreg msk murmansk nalchik net nnov nov novosibirsk nsk omsk orenburg org oryol penza perm pp pskov ptz rnd ryazan sakhalin samara saratov simbirsk smolensk spb stavropol stv surgut tambov tatarstan tom tomsk tsaritsyn tsk tula tuva tver tyumen udm udmurtia ulan-ude vladikavkaz vladimir vladivostok volgograd vologda voronezh vrn vyatka yakutia yamal yekaterinburg yuzhno-sakhalinsk ',
      'rw':' ac co com edu gouv gov int mil net ',
      'sa':' com edu gov med net org pub sch ',
      'sd':' com edu gov info med net org tv ',
      'se':' a ac b bd c d e f g h i k l m n o org p parti pp press r s t tm u w x y z ',
      'sg':' com edu gov idn net org per ',
      'sn':' art com edu gouv org perso univ ',
      'sy':' com edu gov mil net news org ',
      'th':' ac co go in mi net or ',
      'tj':' ac biz co com edu go gov info int mil name net nic org test web ',
      'tn':' agrinet com defense edunet ens fin gov ind info intl mincom nat net org perso rnrt rns rnu tourism ',
      'tz':' ac co go ne or ',
      'ua':' biz cherkassy chernigov chernovtsy ck cn co com crimea cv dn dnepropetrovsk donetsk dp edu gov if in ivano-frankivsk kh kharkov kherson khmelnitskiy kiev kirovograd km kr ks kv lg lugansk lutsk lviv me mk net nikolaev od odessa org pl poltava pp rovno rv sebastopol sumy te ternopil uzhgorod vinnica vn zaporizhzhe zhitomir zp zt ',
      'ug':' ac co go ne or org sc ',
      'uk':' ac bl british-library co cym gov govt icnet jet lea ltd me mil mod national-library-scotland nel net nhs nic nls org orgn parliament plc police sch scot soc ',
      'us':' dni fed isa kids nsn ',
      'uy':' com edu gub mil net org ',
      've':' co com edu gob info mil net org web ',
      'vi':' co com k12 net org ',
      'vn':' ac biz com edu gov health info int name net org pro ',
      'ye':' co com gov ltd me net org plc ',
      'yu':' ac co edu gov org ',
      'za':' ac agric alt bourse city co cybernet db edu gov grondar iaccess imt inca landesign law mil net ngo nis nom olivetti org pix school tm web ',
      'zm':' ac co com edu gov net org sch ',
      // https://en.wikipedia.org/wiki/CentralNic#Second-level_domains
      'com': 'ar br cn de eu gb gr hu jpn kr no qc ru sa se uk us uy za ',
      'net': 'gb jp se uk ',
      'org': 'ae',
      'de': 'com '
    },
    // gorhill 2013-10-25: Using indexOf() instead Regexp(). Significant boost
    // in both performance and memory footprint. No initialization required.
    // http://jsperf.com/uri-js-sld-regex-vs-binary-search/4
    // Following methods use lastIndexOf() rather than array.split() in order
    // to avoid any memory allocations.
    has: function(domain) {
      var tldOffset = domain.lastIndexOf('.');
      if (tldOffset <= 0 || tldOffset >= (domain.length-1)) {
        return false;
      }
      var sldOffset = domain.lastIndexOf('.', tldOffset-1);
      if (sldOffset <= 0 || sldOffset >= (tldOffset-1)) {
        return false;
      }
      var sldList = SLD.list[domain.slice(tldOffset+1)];
      if (!sldList) {
        return false;
      }
      return sldList.indexOf(' ' + domain.slice(sldOffset+1, tldOffset) + ' ') >= 0;
    },
    is: function(domain) {
      var tldOffset = domain.lastIndexOf('.');
      if (tldOffset <= 0 || tldOffset >= (domain.length-1)) {
        return false;
      }
      var sldOffset = domain.lastIndexOf('.', tldOffset-1);
      if (sldOffset >= 0) {
        return false;
      }
      var sldList = SLD.list[domain.slice(tldOffset+1)];
      if (!sldList) {
        return false;
      }
      return sldList.indexOf(' ' + domain.slice(0, tldOffset) + ' ') >= 0;
    },
    get: function(domain) {
      var tldOffset = domain.lastIndexOf('.');
      if (tldOffset <= 0 || tldOffset >= (domain.length-1)) {
        return null;
      }
      var sldOffset = domain.lastIndexOf('.', tldOffset-1);
      if (sldOffset <= 0 || sldOffset >= (tldOffset-1)) {
        return null;
      }
      var sldList = SLD.list[domain.slice(tldOffset+1)];
      if (!sldList) {
        return null;
      }
      if (sldList.indexOf(' ' + domain.slice(sldOffset+1, tldOffset) + ' ') < 0) {
        return null;
      }
      return domain.slice(sldOffset+1);
    },
    noConflict: function(){
      if (root.SecondLevelDomains === this) {
        root.SecondLevelDomains = _SecondLevelDomains;
      }
      return this;
    }
  };

  return SLD;
}));


/***/ }),

/***/ "./node_modules/urijs/src/URI.js":
/*!***************************************!*\
  !*** ./node_modules/urijs/src/URI.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
 * URI.js - Mutating URLs
 *
 * Version: 1.19.7
 *
 * Author: Rodney Rehm
 * Web: http://medialize.github.io/URI.js/
 *
 * Licensed under
 *   MIT License http://www.opensource.org/licenses/mit-license
 *
 */
(function (root, factory) {
  'use strict';
  // https://github.com/umdjs/umd/blob/master/returnExports.js
  if ( true && module.exports) {
    // Node
    module.exports = factory(__webpack_require__(/*! ./punycode */ "./node_modules/urijs/src/punycode.js"), __webpack_require__(/*! ./IPv6 */ "./node_modules/urijs/src/IPv6.js"), __webpack_require__(/*! ./SecondLevelDomains */ "./node_modules/urijs/src/SecondLevelDomains.js"));
  } else if (true) {
    // AMD. Register as an anonymous module.
    !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! ./punycode */ "./node_modules/urijs/src/punycode.js"), __webpack_require__(/*! ./IPv6 */ "./node_modules/urijs/src/IPv6.js"), __webpack_require__(/*! ./SecondLevelDomains */ "./node_modules/urijs/src/SecondLevelDomains.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
  } else {}
}(this, function (punycode, IPv6, SLD, root) {
  'use strict';
  /*global location, escape, unescape */
  // FIXME: v2.0.0 renamce non-camelCase properties to uppercase
  /*jshint camelcase: false */

  // save current URI variable, if any
  var _URI = root && root.URI;

  function URI(url, base) {
    var _urlSupplied = arguments.length >= 1;
    var _baseSupplied = arguments.length >= 2;

    // Allow instantiation without the 'new' keyword
    if (!(this instanceof URI)) {
      if (_urlSupplied) {
        if (_baseSupplied) {
          return new URI(url, base);
        }

        return new URI(url);
      }

      return new URI();
    }

    if (url === undefined) {
      if (_urlSupplied) {
        throw new TypeError('undefined is not a valid argument for URI');
      }

      if (typeof location !== 'undefined') {
        url = location.href + '';
      } else {
        url = '';
      }
    }

    if (url === null) {
      if (_urlSupplied) {
        throw new TypeError('null is not a valid argument for URI');
      }
    }

    this.href(url);

    // resolve to base according to http://dvcs.w3.org/hg/url/raw-file/tip/Overview.html#constructor
    if (base !== undefined) {
      return this.absoluteTo(base);
    }

    return this;
  }

  function isInteger(value) {
    return /^[0-9]+$/.test(value);
  }

  URI.version = '1.19.7';

  var p = URI.prototype;
  var hasOwn = Object.prototype.hasOwnProperty;

  function escapeRegEx(string) {
    // https://github.com/medialize/URI.js/commit/85ac21783c11f8ccab06106dba9735a31a86924d#commitcomment-821963
    return string.replace(/([.*+?^=!:${}()|[\]\/\\])/g, '\\$1');
  }

  function getType(value) {
    // IE8 doesn't return [Object Undefined] but [Object Object] for undefined value
    if (value === undefined) {
      return 'Undefined';
    }

    return String(Object.prototype.toString.call(value)).slice(8, -1);
  }

  function isArray(obj) {
    return getType(obj) === 'Array';
  }

  function filterArrayValues(data, value) {
    var lookup = {};
    var i, length;

    if (getType(value) === 'RegExp') {
      lookup = null;
    } else if (isArray(value)) {
      for (i = 0, length = value.length; i < length; i++) {
        lookup[value[i]] = true;
      }
    } else {
      lookup[value] = true;
    }

    for (i = 0, length = data.length; i < length; i++) {
      /*jshint laxbreak: true */
      var _match = lookup && lookup[data[i]] !== undefined
        || !lookup && value.test(data[i]);
      /*jshint laxbreak: false */
      if (_match) {
        data.splice(i, 1);
        length--;
        i--;
      }
    }

    return data;
  }

  function arrayContains(list, value) {
    var i, length;

    // value may be string, number, array, regexp
    if (isArray(value)) {
      // Note: this can be optimized to O(n) (instead of current O(m * n))
      for (i = 0, length = value.length; i < length; i++) {
        if (!arrayContains(list, value[i])) {
          return false;
        }
      }

      return true;
    }

    var _type = getType(value);
    for (i = 0, length = list.length; i < length; i++) {
      if (_type === 'RegExp') {
        if (typeof list[i] === 'string' && list[i].match(value)) {
          return true;
        }
      } else if (list[i] === value) {
        return true;
      }
    }

    return false;
  }

  function arraysEqual(one, two) {
    if (!isArray(one) || !isArray(two)) {
      return false;
    }

    // arrays can't be equal if they have different amount of content
    if (one.length !== two.length) {
      return false;
    }

    one.sort();
    two.sort();

    for (var i = 0, l = one.length; i < l; i++) {
      if (one[i] !== two[i]) {
        return false;
      }
    }

    return true;
  }

  function trimSlashes(text) {
    var trim_expression = /^\/+|\/+$/g;
    return text.replace(trim_expression, '');
  }

  URI._parts = function() {
    return {
      protocol: null,
      username: null,
      password: null,
      hostname: null,
      urn: null,
      port: null,
      path: null,
      query: null,
      fragment: null,
      // state
      preventInvalidHostname: URI.preventInvalidHostname,
      duplicateQueryParameters: URI.duplicateQueryParameters,
      escapeQuerySpace: URI.escapeQuerySpace
    };
  };
  // state: throw on invalid hostname
  // see https://github.com/medialize/URI.js/pull/345
  // and https://github.com/medialize/URI.js/issues/354
  URI.preventInvalidHostname = false;
  // state: allow duplicate query parameters (a=1&a=1)
  URI.duplicateQueryParameters = false;
  // state: replaces + with %20 (space in query strings)
  URI.escapeQuerySpace = true;
  // static properties
  URI.protocol_expression = /^[a-z][a-z0-9.+-]*$/i;
  URI.idn_expression = /[^a-z0-9\._-]/i;
  URI.punycode_expression = /(xn--)/i;
  // well, 333.444.555.666 matches, but it sure ain't no IPv4 - do we care?
  URI.ip4_expression = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;
  // credits to Rich Brown
  // source: http://forums.intermapper.com/viewtopic.php?p=1096#1096
  // specification: http://www.ietf.org/rfc/rfc4291.txt
  URI.ip6_expression = /^\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*$/;
  // expression used is "gruber revised" (@gruber v2) determined to be the
  // best solution in a regex-golf we did a couple of ages ago at
  // * http://mathiasbynens.be/demo/url-regex
  // * http://rodneyrehm.de/t/url-regex.html
  URI.find_uri_expression = /\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?«»“”‘’]))/ig;
  URI.findUri = {
    // valid "scheme://" or "www."
    start: /\b(?:([a-z][a-z0-9.+-]*:\/\/)|www\.)/gi,
    // everything up to the next whitespace
    end: /[\s\r\n]|$/,
    // trim trailing punctuation captured by end RegExp
    trim: /[`!()\[\]{};:'".,<>?«»“”„‘’]+$/,
    // balanced parens inclusion (), [], {}, <>
    parens: /(\([^\)]*\)|\[[^\]]*\]|\{[^}]*\}|<[^>]*>)/g,
  };
  // http://www.iana.org/assignments/uri-schemes.html
  // http://en.wikipedia.org/wiki/List_of_TCP_and_UDP_port_numbers#Well-known_ports
  URI.defaultPorts = {
    http: '80',
    https: '443',
    ftp: '21',
    gopher: '70',
    ws: '80',
    wss: '443'
  };
  // list of protocols which always require a hostname
  URI.hostProtocols = [
    'http',
    'https'
  ];

  // allowed hostname characters according to RFC 3986
  // ALPHA DIGIT "-" "." "_" "~" "!" "$" "&" "'" "(" ")" "*" "+" "," ";" "=" %encoded
  // I've never seen a (non-IDN) hostname other than: ALPHA DIGIT . - _
  URI.invalid_hostname_characters = /[^a-zA-Z0-9\.\-:_]/;
  // map DOM Elements to their URI attribute
  URI.domAttributes = {
    'a': 'href',
    'blockquote': 'cite',
    'link': 'href',
    'base': 'href',
    'script': 'src',
    'form': 'action',
    'img': 'src',
    'area': 'href',
    'iframe': 'src',
    'embed': 'src',
    'source': 'src',
    'track': 'src',
    'input': 'src', // but only if type="image"
    'audio': 'src',
    'video': 'src'
  };
  URI.getDomAttribute = function(node) {
    if (!node || !node.nodeName) {
      return undefined;
    }

    var nodeName = node.nodeName.toLowerCase();
    // <input> should only expose src for type="image"
    if (nodeName === 'input' && node.type !== 'image') {
      return undefined;
    }

    return URI.domAttributes[nodeName];
  };

  function escapeForDumbFirefox36(value) {
    // https://github.com/medialize/URI.js/issues/91
    return escape(value);
  }

  // encoding / decoding according to RFC3986
  function strictEncodeURIComponent(string) {
    // see https://developer.mozilla.org/en-US/docs/JavaScript/Reference/Global_Objects/encodeURIComponent
    return encodeURIComponent(string)
      .replace(/[!'()*]/g, escapeForDumbFirefox36)
      .replace(/\*/g, '%2A');
  }
  URI.encode = strictEncodeURIComponent;
  URI.decode = decodeURIComponent;
  URI.iso8859 = function() {
    URI.encode = escape;
    URI.decode = unescape;
  };
  URI.unicode = function() {
    URI.encode = strictEncodeURIComponent;
    URI.decode = decodeURIComponent;
  };
  URI.characters = {
    pathname: {
      encode: {
        // RFC3986 2.1: For consistency, URI producers and normalizers should
        // use uppercase hexadecimal digits for all percent-encodings.
        expression: /%(24|26|2B|2C|3B|3D|3A|40)/ig,
        map: {
          // -._~!'()*
          '%24': '$',
          '%26': '&',
          '%2B': '+',
          '%2C': ',',
          '%3B': ';',
          '%3D': '=',
          '%3A': ':',
          '%40': '@'
        }
      },
      decode: {
        expression: /[\/\?#]/g,
        map: {
          '/': '%2F',
          '?': '%3F',
          '#': '%23'
        }
      }
    },
    reserved: {
      encode: {
        // RFC3986 2.1: For consistency, URI producers and normalizers should
        // use uppercase hexadecimal digits for all percent-encodings.
        expression: /%(21|23|24|26|27|28|29|2A|2B|2C|2F|3A|3B|3D|3F|40|5B|5D)/ig,
        map: {
          // gen-delims
          '%3A': ':',
          '%2F': '/',
          '%3F': '?',
          '%23': '#',
          '%5B': '[',
          '%5D': ']',
          '%40': '@',
          // sub-delims
          '%21': '!',
          '%24': '$',
          '%26': '&',
          '%27': '\'',
          '%28': '(',
          '%29': ')',
          '%2A': '*',
          '%2B': '+',
          '%2C': ',',
          '%3B': ';',
          '%3D': '='
        }
      }
    },
    urnpath: {
      // The characters under `encode` are the characters called out by RFC 2141 as being acceptable
      // for usage in a URN. RFC2141 also calls out "-", ".", and "_" as acceptable characters, but
      // these aren't encoded by encodeURIComponent, so we don't have to call them out here. Also
      // note that the colon character is not featured in the encoding map; this is because URI.js
      // gives the colons in URNs semantic meaning as the delimiters of path segements, and so it
      // should not appear unencoded in a segment itself.
      // See also the note above about RFC3986 and capitalalized hex digits.
      encode: {
        expression: /%(21|24|27|28|29|2A|2B|2C|3B|3D|40)/ig,
        map: {
          '%21': '!',
          '%24': '$',
          '%27': '\'',
          '%28': '(',
          '%29': ')',
          '%2A': '*',
          '%2B': '+',
          '%2C': ',',
          '%3B': ';',
          '%3D': '=',
          '%40': '@'
        }
      },
      // These characters are the characters called out by RFC2141 as "reserved" characters that
      // should never appear in a URN, plus the colon character (see note above).
      decode: {
        expression: /[\/\?#:]/g,
        map: {
          '/': '%2F',
          '?': '%3F',
          '#': '%23',
          ':': '%3A'
        }
      }
    }
  };
  URI.encodeQuery = function(string, escapeQuerySpace) {
    var escaped = URI.encode(string + '');
    if (escapeQuerySpace === undefined) {
      escapeQuerySpace = URI.escapeQuerySpace;
    }

    return escapeQuerySpace ? escaped.replace(/%20/g, '+') : escaped;
  };
  URI.decodeQuery = function(string, escapeQuerySpace) {
    string += '';
    if (escapeQuerySpace === undefined) {
      escapeQuerySpace = URI.escapeQuerySpace;
    }

    try {
      return URI.decode(escapeQuerySpace ? string.replace(/\+/g, '%20') : string);
    } catch(e) {
      // we're not going to mess with weird encodings,
      // give up and return the undecoded original string
      // see https://github.com/medialize/URI.js/issues/87
      // see https://github.com/medialize/URI.js/issues/92
      return string;
    }
  };
  // generate encode/decode path functions
  var _parts = {'encode':'encode', 'decode':'decode'};
  var _part;
  var generateAccessor = function(_group, _part) {
    return function(string) {
      try {
        return URI[_part](string + '').replace(URI.characters[_group][_part].expression, function(c) {
          return URI.characters[_group][_part].map[c];
        });
      } catch (e) {
        // we're not going to mess with weird encodings,
        // give up and return the undecoded original string
        // see https://github.com/medialize/URI.js/issues/87
        // see https://github.com/medialize/URI.js/issues/92
        return string;
      }
    };
  };

  for (_part in _parts) {
    URI[_part + 'PathSegment'] = generateAccessor('pathname', _parts[_part]);
    URI[_part + 'UrnPathSegment'] = generateAccessor('urnpath', _parts[_part]);
  }

  var generateSegmentedPathFunction = function(_sep, _codingFuncName, _innerCodingFuncName) {
    return function(string) {
      // Why pass in names of functions, rather than the function objects themselves? The
      // definitions of some functions (but in particular, URI.decode) will occasionally change due
      // to URI.js having ISO8859 and Unicode modes. Passing in the name and getting it will ensure
      // that the functions we use here are "fresh".
      var actualCodingFunc;
      if (!_innerCodingFuncName) {
        actualCodingFunc = URI[_codingFuncName];
      } else {
        actualCodingFunc = function(string) {
          return URI[_codingFuncName](URI[_innerCodingFuncName](string));
        };
      }

      var segments = (string + '').split(_sep);

      for (var i = 0, length = segments.length; i < length; i++) {
        segments[i] = actualCodingFunc(segments[i]);
      }

      return segments.join(_sep);
    };
  };

  // This takes place outside the above loop because we don't want, e.g., encodeUrnPath functions.
  URI.decodePath = generateSegmentedPathFunction('/', 'decodePathSegment');
  URI.decodeUrnPath = generateSegmentedPathFunction(':', 'decodeUrnPathSegment');
  URI.recodePath = generateSegmentedPathFunction('/', 'encodePathSegment', 'decode');
  URI.recodeUrnPath = generateSegmentedPathFunction(':', 'encodeUrnPathSegment', 'decode');

  URI.encodeReserved = generateAccessor('reserved', 'encode');

  URI.parse = function(string, parts) {
    var pos;
    if (!parts) {
      parts = {
        preventInvalidHostname: URI.preventInvalidHostname
      };
    }
    // [protocol"://"[username[":"password]"@"]hostname[":"port]"/"?][path]["?"querystring]["#"fragment]

    // extract fragment
    pos = string.indexOf('#');
    if (pos > -1) {
      // escaping?
      parts.fragment = string.substring(pos + 1) || null;
      string = string.substring(0, pos);
    }

    // extract query
    pos = string.indexOf('?');
    if (pos > -1) {
      // escaping?
      parts.query = string.substring(pos + 1) || null;
      string = string.substring(0, pos);
    }

    // slashes and backslashes have lost all meaning for the web protocols (https, http, wss, ws)
    string = string.replace(/^(https?|ftp|wss?)?:[/\\]*/, '$1://');

    // extract protocol
    if (string.substring(0, 2) === '//') {
      // relative-scheme
      parts.protocol = null;
      string = string.substring(2);
      // extract "user:pass@host:port"
      string = URI.parseAuthority(string, parts);
    } else {
      pos = string.indexOf(':');
      if (pos > -1) {
        parts.protocol = string.substring(0, pos) || null;
        if (parts.protocol && !parts.protocol.match(URI.protocol_expression)) {
          // : may be within the path
          parts.protocol = undefined;
        } else if (string.substring(pos + 1, pos + 3).replace(/\\/g, '/') === '//') {
          string = string.substring(pos + 3);

          // extract "user:pass@host:port"
          string = URI.parseAuthority(string, parts);
        } else {
          string = string.substring(pos + 1);
          parts.urn = true;
        }
      }
    }

    // what's left must be the path
    parts.path = string;

    // and we're done
    return parts;
  };
  URI.parseHost = function(string, parts) {
    if (!string) {
      string = '';
    }

    // Copy chrome, IE, opera backslash-handling behavior.
    // Back slashes before the query string get converted to forward slashes
    // See: https://github.com/joyent/node/blob/386fd24f49b0e9d1a8a076592a404168faeecc34/lib/url.js#L115-L124
    // See: https://code.google.com/p/chromium/issues/detail?id=25916
    // https://github.com/medialize/URI.js/pull/233
    string = string.replace(/\\/g, '/');

    // extract host:port
    var pos = string.indexOf('/');
    var bracketPos;
    var t;

    if (pos === -1) {
      pos = string.length;
    }

    if (string.charAt(0) === '[') {
      // IPv6 host - http://tools.ietf.org/html/draft-ietf-6man-text-addr-representation-04#section-6
      // I claim most client software breaks on IPv6 anyways. To simplify things, URI only accepts
      // IPv6+port in the format [2001:db8::1]:80 (for the time being)
      bracketPos = string.indexOf(']');
      parts.hostname = string.substring(1, bracketPos) || null;
      parts.port = string.substring(bracketPos + 2, pos) || null;
      if (parts.port === '/') {
        parts.port = null;
      }
    } else {
      var firstColon = string.indexOf(':');
      var firstSlash = string.indexOf('/');
      var nextColon = string.indexOf(':', firstColon + 1);
      if (nextColon !== -1 && (firstSlash === -1 || nextColon < firstSlash)) {
        // IPv6 host contains multiple colons - but no port
        // this notation is actually not allowed by RFC 3986, but we're a liberal parser
        parts.hostname = string.substring(0, pos) || null;
        parts.port = null;
      } else {
        t = string.substring(0, pos).split(':');
        parts.hostname = t[0] || null;
        parts.port = t[1] || null;
      }
    }

    if (parts.hostname && string.substring(pos).charAt(0) !== '/') {
      pos++;
      string = '/' + string;
    }

    if (parts.preventInvalidHostname) {
      URI.ensureValidHostname(parts.hostname, parts.protocol);
    }

    if (parts.port) {
      URI.ensureValidPort(parts.port);
    }

    return string.substring(pos) || '/';
  };
  URI.parseAuthority = function(string, parts) {
    string = URI.parseUserinfo(string, parts);
    return URI.parseHost(string, parts);
  };
  URI.parseUserinfo = function(string, parts) {
    // extract username:password
    var _string = string
    var firstBackSlash = string.indexOf('\\');
    if (firstBackSlash !== -1) {
      string = string.replace(/\\/g, '/')
    }
    var firstSlash = string.indexOf('/');
    var pos = string.lastIndexOf('@', firstSlash > -1 ? firstSlash : string.length - 1);
    var t;

    // authority@ must come before /path or \path
    if (pos > -1 && (firstSlash === -1 || pos < firstSlash)) {
      t = string.substring(0, pos).split(':');
      parts.username = t[0] ? URI.decode(t[0]) : null;
      t.shift();
      parts.password = t[0] ? URI.decode(t.join(':')) : null;
      string = _string.substring(pos + 1);
    } else {
      parts.username = null;
      parts.password = null;
    }

    return string;
  };
  URI.parseQuery = function(string, escapeQuerySpace) {
    if (!string) {
      return {};
    }

    // throw out the funky business - "?"[name"="value"&"]+
    string = string.replace(/&+/g, '&').replace(/^\?*&*|&+$/g, '');

    if (!string) {
      return {};
    }

    var items = {};
    var splits = string.split('&');
    var length = splits.length;
    var v, name, value;

    for (var i = 0; i < length; i++) {
      v = splits[i].split('=');
      name = URI.decodeQuery(v.shift(), escapeQuerySpace);
      // no "=" is null according to http://dvcs.w3.org/hg/url/raw-file/tip/Overview.html#collect-url-parameters
      value = v.length ? URI.decodeQuery(v.join('='), escapeQuerySpace) : null;

      if (name === '__proto__') {
        // ignore attempt at exploiting JavaScript internals
        continue;
      } else if (hasOwn.call(items, name)) {
        if (typeof items[name] === 'string' || items[name] === null) {
          items[name] = [items[name]];
        }

        items[name].push(value);
      } else {
        items[name] = value;
      }
    }

    return items;
  };

  URI.build = function(parts) {
    var t = '';
    var requireAbsolutePath = false

    if (parts.protocol) {
      t += parts.protocol + ':';
    }

    if (!parts.urn && (t || parts.hostname)) {
      t += '//';
      requireAbsolutePath = true
    }

    t += (URI.buildAuthority(parts) || '');

    if (typeof parts.path === 'string') {
      if (parts.path.charAt(0) !== '/' && requireAbsolutePath) {
        t += '/';
      }

      t += parts.path;
    }

    if (typeof parts.query === 'string' && parts.query) {
      t += '?' + parts.query;
    }

    if (typeof parts.fragment === 'string' && parts.fragment) {
      t += '#' + parts.fragment;
    }
    return t;
  };
  URI.buildHost = function(parts) {
    var t = '';

    if (!parts.hostname) {
      return '';
    } else if (URI.ip6_expression.test(parts.hostname)) {
      t += '[' + parts.hostname + ']';
    } else {
      t += parts.hostname;
    }

    if (parts.port) {
      t += ':' + parts.port;
    }

    return t;
  };
  URI.buildAuthority = function(parts) {
    return URI.buildUserinfo(parts) + URI.buildHost(parts);
  };
  URI.buildUserinfo = function(parts) {
    var t = '';

    if (parts.username) {
      t += URI.encode(parts.username);
    }

    if (parts.password) {
      t += ':' + URI.encode(parts.password);
    }

    if (t) {
      t += '@';
    }

    return t;
  };
  URI.buildQuery = function(data, duplicateQueryParameters, escapeQuerySpace) {
    // according to http://tools.ietf.org/html/rfc3986 or http://labs.apache.org/webarch/uri/rfc/rfc3986.html
    // being »-._~!$&'()*+,;=:@/?« %HEX and alnum are allowed
    // the RFC explicitly states ?/foo being a valid use case, no mention of parameter syntax!
    // URI.js treats the query string as being application/x-www-form-urlencoded
    // see http://www.w3.org/TR/REC-html40/interact/forms.html#form-content-type

    var t = '';
    var unique, key, i, length;
    for (key in data) {
      if (key === '__proto__') {
        // ignore attempt at exploiting JavaScript internals
        continue;
      } else if (hasOwn.call(data, key)) {
        if (isArray(data[key])) {
          unique = {};
          for (i = 0, length = data[key].length; i < length; i++) {
            if (data[key][i] !== undefined && unique[data[key][i] + ''] === undefined) {
              t += '&' + URI.buildQueryParameter(key, data[key][i], escapeQuerySpace);
              if (duplicateQueryParameters !== true) {
                unique[data[key][i] + ''] = true;
              }
            }
          }
        } else if (data[key] !== undefined) {
          t += '&' + URI.buildQueryParameter(key, data[key], escapeQuerySpace);
        }
      }
    }

    return t.substring(1);
  };
  URI.buildQueryParameter = function(name, value, escapeQuerySpace) {
    // http://www.w3.org/TR/REC-html40/interact/forms.html#form-content-type -- application/x-www-form-urlencoded
    // don't append "=" for null values, according to http://dvcs.w3.org/hg/url/raw-file/tip/Overview.html#url-parameter-serialization
    return URI.encodeQuery(name, escapeQuerySpace) + (value !== null ? '=' + URI.encodeQuery(value, escapeQuerySpace) : '');
  };

  URI.addQuery = function(data, name, value) {
    if (typeof name === 'object') {
      for (var key in name) {
        if (hasOwn.call(name, key)) {
          URI.addQuery(data, key, name[key]);
        }
      }
    } else if (typeof name === 'string') {
      if (data[name] === undefined) {
        data[name] = value;
        return;
      } else if (typeof data[name] === 'string') {
        data[name] = [data[name]];
      }

      if (!isArray(value)) {
        value = [value];
      }

      data[name] = (data[name] || []).concat(value);
    } else {
      throw new TypeError('URI.addQuery() accepts an object, string as the name parameter');
    }
  };

  URI.setQuery = function(data, name, value) {
    if (typeof name === 'object') {
      for (var key in name) {
        if (hasOwn.call(name, key)) {
          URI.setQuery(data, key, name[key]);
        }
      }
    } else if (typeof name === 'string') {
      data[name] = value === undefined ? null : value;
    } else {
      throw new TypeError('URI.setQuery() accepts an object, string as the name parameter');
    }
  };

  URI.removeQuery = function(data, name, value) {
    var i, length, key;

    if (isArray(name)) {
      for (i = 0, length = name.length; i < length; i++) {
        data[name[i]] = undefined;
      }
    } else if (getType(name) === 'RegExp') {
      for (key in data) {
        if (name.test(key)) {
          data[key] = undefined;
        }
      }
    } else if (typeof name === 'object') {
      for (key in name) {
        if (hasOwn.call(name, key)) {
          URI.removeQuery(data, key, name[key]);
        }
      }
    } else if (typeof name === 'string') {
      if (value !== undefined) {
        if (getType(value) === 'RegExp') {
          if (!isArray(data[name]) && value.test(data[name])) {
            data[name] = undefined;
          } else {
            data[name] = filterArrayValues(data[name], value);
          }
        } else if (data[name] === String(value) && (!isArray(value) || value.length === 1)) {
          data[name] = undefined;
        } else if (isArray(data[name])) {
          data[name] = filterArrayValues(data[name], value);
        }
      } else {
        data[name] = undefined;
      }
    } else {
      throw new TypeError('URI.removeQuery() accepts an object, string, RegExp as the first parameter');
    }
  };
  URI.hasQuery = function(data, name, value, withinArray) {
    switch (getType(name)) {
      case 'String':
        // Nothing to do here
        break;

      case 'RegExp':
        for (var key in data) {
          if (hasOwn.call(data, key)) {
            if (name.test(key) && (value === undefined || URI.hasQuery(data, key, value))) {
              return true;
            }
          }
        }

        return false;

      case 'Object':
        for (var _key in name) {
          if (hasOwn.call(name, _key)) {
            if (!URI.hasQuery(data, _key, name[_key])) {
              return false;
            }
          }
        }

        return true;

      default:
        throw new TypeError('URI.hasQuery() accepts a string, regular expression or object as the name parameter');
    }

    switch (getType(value)) {
      case 'Undefined':
        // true if exists (but may be empty)
        return name in data; // data[name] !== undefined;

      case 'Boolean':
        // true if exists and non-empty
        var _booly = Boolean(isArray(data[name]) ? data[name].length : data[name]);
        return value === _booly;

      case 'Function':
        // allow complex comparison
        return !!value(data[name], name, data);

      case 'Array':
        if (!isArray(data[name])) {
          return false;
        }

        var op = withinArray ? arrayContains : arraysEqual;
        return op(data[name], value);

      case 'RegExp':
        if (!isArray(data[name])) {
          return Boolean(data[name] && data[name].match(value));
        }

        if (!withinArray) {
          return false;
        }

        return arrayContains(data[name], value);

      case 'Number':
        value = String(value);
        /* falls through */
      case 'String':
        if (!isArray(data[name])) {
          return data[name] === value;
        }

        if (!withinArray) {
          return false;
        }

        return arrayContains(data[name], value);

      default:
        throw new TypeError('URI.hasQuery() accepts undefined, boolean, string, number, RegExp, Function as the value parameter');
    }
  };


  URI.joinPaths = function() {
    var input = [];
    var segments = [];
    var nonEmptySegments = 0;

    for (var i = 0; i < arguments.length; i++) {
      var url = new URI(arguments[i]);
      input.push(url);
      var _segments = url.segment();
      for (var s = 0; s < _segments.length; s++) {
        if (typeof _segments[s] === 'string') {
          segments.push(_segments[s]);
        }

        if (_segments[s]) {
          nonEmptySegments++;
        }
      }
    }

    if (!segments.length || !nonEmptySegments) {
      return new URI('');
    }

    var uri = new URI('').segment(segments);

    if (input[0].path() === '' || input[0].path().slice(0, 1) === '/') {
      uri.path('/' + uri.path());
    }

    return uri.normalize();
  };

  URI.commonPath = function(one, two) {
    var length = Math.min(one.length, two.length);
    var pos;

    // find first non-matching character
    for (pos = 0; pos < length; pos++) {
      if (one.charAt(pos) !== two.charAt(pos)) {
        pos--;
        break;
      }
    }

    if (pos < 1) {
      return one.charAt(0) === two.charAt(0) && one.charAt(0) === '/' ? '/' : '';
    }

    // revert to last /
    if (one.charAt(pos) !== '/' || two.charAt(pos) !== '/') {
      pos = one.substring(0, pos).lastIndexOf('/');
    }

    return one.substring(0, pos + 1);
  };

  URI.withinString = function(string, callback, options) {
    options || (options = {});
    var _start = options.start || URI.findUri.start;
    var _end = options.end || URI.findUri.end;
    var _trim = options.trim || URI.findUri.trim;
    var _parens = options.parens || URI.findUri.parens;
    var _attributeOpen = /[a-z0-9-]=["']?$/i;

    _start.lastIndex = 0;
    while (true) {
      var match = _start.exec(string);
      if (!match) {
        break;
      }

      var start = match.index;
      if (options.ignoreHtml) {
        // attribut(e=["']?$)
        var attributeOpen = string.slice(Math.max(start - 3, 0), start);
        if (attributeOpen && _attributeOpen.test(attributeOpen)) {
          continue;
        }
      }

      var end = start + string.slice(start).search(_end);
      var slice = string.slice(start, end);
      // make sure we include well balanced parens
      var parensEnd = -1;
      while (true) {
        var parensMatch = _parens.exec(slice);
        if (!parensMatch) {
          break;
        }

        var parensMatchEnd = parensMatch.index + parensMatch[0].length;
        parensEnd = Math.max(parensEnd, parensMatchEnd);
      }

      if (parensEnd > -1) {
        slice = slice.slice(0, parensEnd) + slice.slice(parensEnd).replace(_trim, '');
      } else {
        slice = slice.replace(_trim, '');
      }

      if (slice.length <= match[0].length) {
        // the extract only contains the starting marker of a URI,
        // e.g. "www" or "http://"
        continue;
      }

      if (options.ignore && options.ignore.test(slice)) {
        continue;
      }

      end = start + slice.length;
      var result = callback(slice, start, end, string);
      if (result === undefined) {
        _start.lastIndex = end;
        continue;
      }

      result = String(result);
      string = string.slice(0, start) + result + string.slice(end);
      _start.lastIndex = start + result.length;
    }

    _start.lastIndex = 0;
    return string;
  };

  URI.ensureValidHostname = function(v, protocol) {
    // Theoretically URIs allow percent-encoding in Hostnames (according to RFC 3986)
    // they are not part of DNS and therefore ignored by URI.js

    var hasHostname = !!v; // not null and not an empty string
    var hasProtocol = !!protocol;
    var rejectEmptyHostname = false;

    if (hasProtocol) {
      rejectEmptyHostname = arrayContains(URI.hostProtocols, protocol);
    }

    if (rejectEmptyHostname && !hasHostname) {
      throw new TypeError('Hostname cannot be empty, if protocol is ' + protocol);
    } else if (v && v.match(URI.invalid_hostname_characters)) {
      // test punycode
      if (!punycode) {
        throw new TypeError('Hostname "' + v + '" contains characters other than [A-Z0-9.-:_] and Punycode.js is not available');
      }
      if (punycode.toASCII(v).match(URI.invalid_hostname_characters)) {
        throw new TypeError('Hostname "' + v + '" contains characters other than [A-Z0-9.-:_]');
      }
    }
  };

  URI.ensureValidPort = function (v) {
    if (!v) {
      return;
    }

    var port = Number(v);
    if (isInteger(port) && (port > 0) && (port < 65536)) {
      return;
    }

    throw new TypeError('Port "' + v + '" is not a valid port');
  };

  // noConflict
  URI.noConflict = function(removeAll) {
    if (removeAll) {
      var unconflicted = {
        URI: this.noConflict()
      };

      if (root.URITemplate && typeof root.URITemplate.noConflict === 'function') {
        unconflicted.URITemplate = root.URITemplate.noConflict();
      }

      if (root.IPv6 && typeof root.IPv6.noConflict === 'function') {
        unconflicted.IPv6 = root.IPv6.noConflict();
      }

      if (root.SecondLevelDomains && typeof root.SecondLevelDomains.noConflict === 'function') {
        unconflicted.SecondLevelDomains = root.SecondLevelDomains.noConflict();
      }

      return unconflicted;
    } else if (root.URI === this) {
      root.URI = _URI;
    }

    return this;
  };

  p.build = function(deferBuild) {
    if (deferBuild === true) {
      this._deferred_build = true;
    } else if (deferBuild === undefined || this._deferred_build) {
      this._string = URI.build(this._parts);
      this._deferred_build = false;
    }

    return this;
  };

  p.clone = function() {
    return new URI(this);
  };

  p.valueOf = p.toString = function() {
    return this.build(false)._string;
  };


  function generateSimpleAccessor(_part){
    return function(v, build) {
      if (v === undefined) {
        return this._parts[_part] || '';
      } else {
        this._parts[_part] = v || null;
        this.build(!build);
        return this;
      }
    };
  }

  function generatePrefixAccessor(_part, _key){
    return function(v, build) {
      if (v === undefined) {
        return this._parts[_part] || '';
      } else {
        if (v !== null) {
          v = v + '';
          if (v.charAt(0) === _key) {
            v = v.substring(1);
          }
        }

        this._parts[_part] = v;
        this.build(!build);
        return this;
      }
    };
  }

  p.protocol = generateSimpleAccessor('protocol');
  p.username = generateSimpleAccessor('username');
  p.password = generateSimpleAccessor('password');
  p.hostname = generateSimpleAccessor('hostname');
  p.port = generateSimpleAccessor('port');
  p.query = generatePrefixAccessor('query', '?');
  p.fragment = generatePrefixAccessor('fragment', '#');

  p.search = function(v, build) {
    var t = this.query(v, build);
    return typeof t === 'string' && t.length ? ('?' + t) : t;
  };
  p.hash = function(v, build) {
    var t = this.fragment(v, build);
    return typeof t === 'string' && t.length ? ('#' + t) : t;
  };

  p.pathname = function(v, build) {
    if (v === undefined || v === true) {
      var res = this._parts.path || (this._parts.hostname ? '/' : '');
      return v ? (this._parts.urn ? URI.decodeUrnPath : URI.decodePath)(res) : res;
    } else {
      if (this._parts.urn) {
        this._parts.path = v ? URI.recodeUrnPath(v) : '';
      } else {
        this._parts.path = v ? URI.recodePath(v) : '/';
      }
      this.build(!build);
      return this;
    }
  };
  p.path = p.pathname;
  p.href = function(href, build) {
    var key;

    if (href === undefined) {
      return this.toString();
    }

    this._string = '';
    this._parts = URI._parts();

    var _URI = href instanceof URI;
    var _object = typeof href === 'object' && (href.hostname || href.path || href.pathname);
    if (href.nodeName) {
      var attribute = URI.getDomAttribute(href);
      href = href[attribute] || '';
      _object = false;
    }

    // window.location is reported to be an object, but it's not the sort
    // of object we're looking for:
    // * location.protocol ends with a colon
    // * location.query != object.search
    // * location.hash != object.fragment
    // simply serializing the unknown object should do the trick
    // (for location, not for everything...)
    if (!_URI && _object && href.pathname !== undefined) {
      href = href.toString();
    }

    if (typeof href === 'string' || href instanceof String) {
      this._parts = URI.parse(String(href), this._parts);
    } else if (_URI || _object) {
      var src = _URI ? href._parts : href;
      for (key in src) {
        if (key === 'query') { continue; }
        if (hasOwn.call(this._parts, key)) {
          this._parts[key] = src[key];
        }
      }
      if (src.query) {
        this.query(src.query, false);
      }
    } else {
      throw new TypeError('invalid input');
    }

    this.build(!build);
    return this;
  };

  // identification accessors
  p.is = function(what) {
    var ip = false;
    var ip4 = false;
    var ip6 = false;
    var name = false;
    var sld = false;
    var idn = false;
    var punycode = false;
    var relative = !this._parts.urn;

    if (this._parts.hostname) {
      relative = false;
      ip4 = URI.ip4_expression.test(this._parts.hostname);
      ip6 = URI.ip6_expression.test(this._parts.hostname);
      ip = ip4 || ip6;
      name = !ip;
      sld = name && SLD && SLD.has(this._parts.hostname);
      idn = name && URI.idn_expression.test(this._parts.hostname);
      punycode = name && URI.punycode_expression.test(this._parts.hostname);
    }

    switch (what.toLowerCase()) {
      case 'relative':
        return relative;

      case 'absolute':
        return !relative;

      // hostname identification
      case 'domain':
      case 'name':
        return name;

      case 'sld':
        return sld;

      case 'ip':
        return ip;

      case 'ip4':
      case 'ipv4':
      case 'inet4':
        return ip4;

      case 'ip6':
      case 'ipv6':
      case 'inet6':
        return ip6;

      case 'idn':
        return idn;

      case 'url':
        return !this._parts.urn;

      case 'urn':
        return !!this._parts.urn;

      case 'punycode':
        return punycode;
    }

    return null;
  };

  // component specific input validation
  var _protocol = p.protocol;
  var _port = p.port;
  var _hostname = p.hostname;

  p.protocol = function(v, build) {
    if (v) {
      // accept trailing ://
      v = v.replace(/:(\/\/)?$/, '');

      if (!v.match(URI.protocol_expression)) {
        throw new TypeError('Protocol "' + v + '" contains characters other than [A-Z0-9.+-] or doesn\'t start with [A-Z]');
      }
    }

    return _protocol.call(this, v, build);
  };
  p.scheme = p.protocol;
  p.port = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    if (v !== undefined) {
      if (v === 0) {
        v = null;
      }

      if (v) {
        v += '';
        if (v.charAt(0) === ':') {
          v = v.substring(1);
        }

        URI.ensureValidPort(v);
      }
    }
    return _port.call(this, v, build);
  };
  p.hostname = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    if (v !== undefined) {
      var x = { preventInvalidHostname: this._parts.preventInvalidHostname };
      var res = URI.parseHost(v, x);
      if (res !== '/') {
        throw new TypeError('Hostname "' + v + '" contains characters other than [A-Z0-9.-]');
      }

      v = x.hostname;
      if (this._parts.preventInvalidHostname) {
        URI.ensureValidHostname(v, this._parts.protocol);
      }
    }

    return _hostname.call(this, v, build);
  };

  // compound accessors
  p.origin = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    if (v === undefined) {
      var protocol = this.protocol();
      var authority = this.authority();
      if (!authority) {
        return '';
      }

      return (protocol ? protocol + '://' : '') + this.authority();
    } else {
      var origin = URI(v);
      this
        .protocol(origin.protocol())
        .authority(origin.authority())
        .build(!build);
      return this;
    }
  };
  p.host = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    if (v === undefined) {
      return this._parts.hostname ? URI.buildHost(this._parts) : '';
    } else {
      var res = URI.parseHost(v, this._parts);
      if (res !== '/') {
        throw new TypeError('Hostname "' + v + '" contains characters other than [A-Z0-9.-]');
      }

      this.build(!build);
      return this;
    }
  };
  p.authority = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    if (v === undefined) {
      return this._parts.hostname ? URI.buildAuthority(this._parts) : '';
    } else {
      var res = URI.parseAuthority(v, this._parts);
      if (res !== '/') {
        throw new TypeError('Hostname "' + v + '" contains characters other than [A-Z0-9.-]');
      }

      this.build(!build);
      return this;
    }
  };
  p.userinfo = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    if (v === undefined) {
      var t = URI.buildUserinfo(this._parts);
      return t ? t.substring(0, t.length -1) : t;
    } else {
      if (v[v.length-1] !== '@') {
        v += '@';
      }

      URI.parseUserinfo(v, this._parts);
      this.build(!build);
      return this;
    }
  };
  p.resource = function(v, build) {
    var parts;

    if (v === undefined) {
      return this.path() + this.search() + this.hash();
    }

    parts = URI.parse(v);
    this._parts.path = parts.path;
    this._parts.query = parts.query;
    this._parts.fragment = parts.fragment;
    this.build(!build);
    return this;
  };

  // fraction accessors
  p.subdomain = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    // convenience, return "www" from "www.example.org"
    if (v === undefined) {
      if (!this._parts.hostname || this.is('IP')) {
        return '';
      }

      // grab domain and add another segment
      var end = this._parts.hostname.length - this.domain().length - 1;
      return this._parts.hostname.substring(0, end) || '';
    } else {
      var e = this._parts.hostname.length - this.domain().length;
      var sub = this._parts.hostname.substring(0, e);
      var replace = new RegExp('^' + escapeRegEx(sub));

      if (v && v.charAt(v.length - 1) !== '.') {
        v += '.';
      }

      if (v.indexOf(':') !== -1) {
        throw new TypeError('Domains cannot contain colons');
      }

      if (v) {
        URI.ensureValidHostname(v, this._parts.protocol);
      }

      this._parts.hostname = this._parts.hostname.replace(replace, v);
      this.build(!build);
      return this;
    }
  };
  p.domain = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    if (typeof v === 'boolean') {
      build = v;
      v = undefined;
    }

    // convenience, return "example.org" from "www.example.org"
    if (v === undefined) {
      if (!this._parts.hostname || this.is('IP')) {
        return '';
      }

      // if hostname consists of 1 or 2 segments, it must be the domain
      var t = this._parts.hostname.match(/\./g);
      if (t && t.length < 2) {
        return this._parts.hostname;
      }

      // grab tld and add another segment
      var end = this._parts.hostname.length - this.tld(build).length - 1;
      end = this._parts.hostname.lastIndexOf('.', end -1) + 1;
      return this._parts.hostname.substring(end) || '';
    } else {
      if (!v) {
        throw new TypeError('cannot set domain empty');
      }

      if (v.indexOf(':') !== -1) {
        throw new TypeError('Domains cannot contain colons');
      }

      URI.ensureValidHostname(v, this._parts.protocol);

      if (!this._parts.hostname || this.is('IP')) {
        this._parts.hostname = v;
      } else {
        var replace = new RegExp(escapeRegEx(this.domain()) + '$');
        this._parts.hostname = this._parts.hostname.replace(replace, v);
      }

      this.build(!build);
      return this;
    }
  };
  p.tld = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    if (typeof v === 'boolean') {
      build = v;
      v = undefined;
    }

    // return "org" from "www.example.org"
    if (v === undefined) {
      if (!this._parts.hostname || this.is('IP')) {
        return '';
      }

      var pos = this._parts.hostname.lastIndexOf('.');
      var tld = this._parts.hostname.substring(pos + 1);

      if (build !== true && SLD && SLD.list[tld.toLowerCase()]) {
        return SLD.get(this._parts.hostname) || tld;
      }

      return tld;
    } else {
      var replace;

      if (!v) {
        throw new TypeError('cannot set TLD empty');
      } else if (v.match(/[^a-zA-Z0-9-]/)) {
        if (SLD && SLD.is(v)) {
          replace = new RegExp(escapeRegEx(this.tld()) + '$');
          this._parts.hostname = this._parts.hostname.replace(replace, v);
        } else {
          throw new TypeError('TLD "' + v + '" contains characters other than [A-Z0-9]');
        }
      } else if (!this._parts.hostname || this.is('IP')) {
        throw new ReferenceError('cannot set TLD on non-domain host');
      } else {
        replace = new RegExp(escapeRegEx(this.tld()) + '$');
        this._parts.hostname = this._parts.hostname.replace(replace, v);
      }

      this.build(!build);
      return this;
    }
  };
  p.directory = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    if (v === undefined || v === true) {
      if (!this._parts.path && !this._parts.hostname) {
        return '';
      }

      if (this._parts.path === '/') {
        return '/';
      }

      var end = this._parts.path.length - this.filename().length - 1;
      var res = this._parts.path.substring(0, end) || (this._parts.hostname ? '/' : '');

      return v ? URI.decodePath(res) : res;

    } else {
      var e = this._parts.path.length - this.filename().length;
      var directory = this._parts.path.substring(0, e);
      var replace = new RegExp('^' + escapeRegEx(directory));

      // fully qualifier directories begin with a slash
      if (!this.is('relative')) {
        if (!v) {
          v = '/';
        }

        if (v.charAt(0) !== '/') {
          v = '/' + v;
        }
      }

      // directories always end with a slash
      if (v && v.charAt(v.length - 1) !== '/') {
        v += '/';
      }

      v = URI.recodePath(v);
      this._parts.path = this._parts.path.replace(replace, v);
      this.build(!build);
      return this;
    }
  };
  p.filename = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    if (typeof v !== 'string') {
      if (!this._parts.path || this._parts.path === '/') {
        return '';
      }

      var pos = this._parts.path.lastIndexOf('/');
      var res = this._parts.path.substring(pos+1);

      return v ? URI.decodePathSegment(res) : res;
    } else {
      var mutatedDirectory = false;

      if (v.charAt(0) === '/') {
        v = v.substring(1);
      }

      if (v.match(/\.?\//)) {
        mutatedDirectory = true;
      }

      var replace = new RegExp(escapeRegEx(this.filename()) + '$');
      v = URI.recodePath(v);
      this._parts.path = this._parts.path.replace(replace, v);

      if (mutatedDirectory) {
        this.normalizePath(build);
      } else {
        this.build(!build);
      }

      return this;
    }
  };
  p.suffix = function(v, build) {
    if (this._parts.urn) {
      return v === undefined ? '' : this;
    }

    if (v === undefined || v === true) {
      if (!this._parts.path || this._parts.path === '/') {
        return '';
      }

      var filename = this.filename();
      var pos = filename.lastIndexOf('.');
      var s, res;

      if (pos === -1) {
        return '';
      }

      // suffix may only contain alnum characters (yup, I made this up.)
      s = filename.substring(pos+1);
      res = (/^[a-z0-9%]+$/i).test(s) ? s : '';
      return v ? URI.decodePathSegment(res) : res;
    } else {
      if (v.charAt(0) === '.') {
        v = v.substring(1);
      }

      var suffix = this.suffix();
      var replace;

      if (!suffix) {
        if (!v) {
          return this;
        }

        this._parts.path += '.' + URI.recodePath(v);
      } else if (!v) {
        replace = new RegExp(escapeRegEx('.' + suffix) + '$');
      } else {
        replace = new RegExp(escapeRegEx(suffix) + '$');
      }

      if (replace) {
        v = URI.recodePath(v);
        this._parts.path = this._parts.path.replace(replace, v);
      }

      this.build(!build);
      return this;
    }
  };
  p.segment = function(segment, v, build) {
    var separator = this._parts.urn ? ':' : '/';
    var path = this.path();
    var absolute = path.substring(0, 1) === '/';
    var segments = path.split(separator);

    if (segment !== undefined && typeof segment !== 'number') {
      build = v;
      v = segment;
      segment = undefined;
    }

    if (segment !== undefined && typeof segment !== 'number') {
      throw new Error('Bad segment "' + segment + '", must be 0-based integer');
    }

    if (absolute) {
      segments.shift();
    }

    if (segment < 0) {
      // allow negative indexes to address from the end
      segment = Math.max(segments.length + segment, 0);
    }

    if (v === undefined) {
      /*jshint laxbreak: true */
      return segment === undefined
        ? segments
        : segments[segment];
      /*jshint laxbreak: false */
    } else if (segment === null || segments[segment] === undefined) {
      if (isArray(v)) {
        segments = [];
        // collapse empty elements within array
        for (var i=0, l=v.length; i < l; i++) {
          if (!v[i].length && (!segments.length || !segments[segments.length -1].length)) {
            continue;
          }

          if (segments.length && !segments[segments.length -1].length) {
            segments.pop();
          }

          segments.push(trimSlashes(v[i]));
        }
      } else if (v || typeof v === 'string') {
        v = trimSlashes(v);
        if (segments[segments.length -1] === '') {
          // empty trailing elements have to be overwritten
          // to prevent results such as /foo//bar
          segments[segments.length -1] = v;
        } else {
          segments.push(v);
        }
      }
    } else {
      if (v) {
        segments[segment] = trimSlashes(v);
      } else {
        segments.splice(segment, 1);
      }
    }

    if (absolute) {
      segments.unshift('');
    }

    return this.path(segments.join(separator), build);
  };
  p.segmentCoded = function(segment, v, build) {
    var segments, i, l;

    if (typeof segment !== 'number') {
      build = v;
      v = segment;
      segment = undefined;
    }

    if (v === undefined) {
      segments = this.segment(segment, v, build);
      if (!isArray(segments)) {
        segments = segments !== undefined ? URI.decode(segments) : undefined;
      } else {
        for (i = 0, l = segments.length; i < l; i++) {
          segments[i] = URI.decode(segments[i]);
        }
      }

      return segments;
    }

    if (!isArray(v)) {
      v = (typeof v === 'string' || v instanceof String) ? URI.encode(v) : v;
    } else {
      for (i = 0, l = v.length; i < l; i++) {
        v[i] = URI.encode(v[i]);
      }
    }

    return this.segment(segment, v, build);
  };

  // mutating query string
  var q = p.query;
  p.query = function(v, build) {
    if (v === true) {
      return URI.parseQuery(this._parts.query, this._parts.escapeQuerySpace);
    } else if (typeof v === 'function') {
      var data = URI.parseQuery(this._parts.query, this._parts.escapeQuerySpace);
      var result = v.call(this, data);
      this._parts.query = URI.buildQuery(result || data, this._parts.duplicateQueryParameters, this._parts.escapeQuerySpace);
      this.build(!build);
      return this;
    } else if (v !== undefined && typeof v !== 'string') {
      this._parts.query = URI.buildQuery(v, this._parts.duplicateQueryParameters, this._parts.escapeQuerySpace);
      this.build(!build);
      return this;
    } else {
      return q.call(this, v, build);
    }
  };
  p.setQuery = function(name, value, build) {
    var data = URI.parseQuery(this._parts.query, this._parts.escapeQuerySpace);

    if (typeof name === 'string' || name instanceof String) {
      data[name] = value !== undefined ? value : null;
    } else if (typeof name === 'object') {
      for (var key in name) {
        if (hasOwn.call(name, key)) {
          data[key] = name[key];
        }
      }
    } else {
      throw new TypeError('URI.addQuery() accepts an object, string as the name parameter');
    }

    this._parts.query = URI.buildQuery(data, this._parts.duplicateQueryParameters, this._parts.escapeQuerySpace);
    if (typeof name !== 'string') {
      build = value;
    }

    this.build(!build);
    return this;
  };
  p.addQuery = function(name, value, build) {
    var data = URI.parseQuery(this._parts.query, this._parts.escapeQuerySpace);
    URI.addQuery(data, name, value === undefined ? null : value);
    this._parts.query = URI.buildQuery(data, this._parts.duplicateQueryParameters, this._parts.escapeQuerySpace);
    if (typeof name !== 'string') {
      build = value;
    }

    this.build(!build);
    return this;
  };
  p.removeQuery = function(name, value, build) {
    var data = URI.parseQuery(this._parts.query, this._parts.escapeQuerySpace);
    URI.removeQuery(data, name, value);
    this._parts.query = URI.buildQuery(data, this._parts.duplicateQueryParameters, this._parts.escapeQuerySpace);
    if (typeof name !== 'string') {
      build = value;
    }

    this.build(!build);
    return this;
  };
  p.hasQuery = function(name, value, withinArray) {
    var data = URI.parseQuery(this._parts.query, this._parts.escapeQuerySpace);
    return URI.hasQuery(data, name, value, withinArray);
  };
  p.setSearch = p.setQuery;
  p.addSearch = p.addQuery;
  p.removeSearch = p.removeQuery;
  p.hasSearch = p.hasQuery;

  // sanitizing URLs
  p.normalize = function() {
    if (this._parts.urn) {
      return this
        .normalizeProtocol(false)
        .normalizePath(false)
        .normalizeQuery(false)
        .normalizeFragment(false)
        .build();
    }

    return this
      .normalizeProtocol(false)
      .normalizeHostname(false)
      .normalizePort(false)
      .normalizePath(false)
      .normalizeQuery(false)
      .normalizeFragment(false)
      .build();
  };
  p.normalizeProtocol = function(build) {
    if (typeof this._parts.protocol === 'string') {
      this._parts.protocol = this._parts.protocol.toLowerCase();
      this.build(!build);
    }

    return this;
  };
  p.normalizeHostname = function(build) {
    if (this._parts.hostname) {
      if (this.is('IDN') && punycode) {
        this._parts.hostname = punycode.toASCII(this._parts.hostname);
      } else if (this.is('IPv6') && IPv6) {
        this._parts.hostname = IPv6.best(this._parts.hostname);
      }

      this._parts.hostname = this._parts.hostname.toLowerCase();
      this.build(!build);
    }

    return this;
  };
  p.normalizePort = function(build) {
    // remove port of it's the protocol's default
    if (typeof this._parts.protocol === 'string' && this._parts.port === URI.defaultPorts[this._parts.protocol]) {
      this._parts.port = null;
      this.build(!build);
    }

    return this;
  };
  p.normalizePath = function(build) {
    var _path = this._parts.path;
    if (!_path) {
      return this;
    }

    if (this._parts.urn) {
      this._parts.path = URI.recodeUrnPath(this._parts.path);
      this.build(!build);
      return this;
    }

    if (this._parts.path === '/') {
      return this;
    }

    _path = URI.recodePath(_path);

    var _was_relative;
    var _leadingParents = '';
    var _parent, _pos;

    // handle relative paths
    if (_path.charAt(0) !== '/') {
      _was_relative = true;
      _path = '/' + _path;
    }

    // handle relative files (as opposed to directories)
    if (_path.slice(-3) === '/..' || _path.slice(-2) === '/.') {
      _path += '/';
    }

    // resolve simples
    _path = _path
      .replace(/(\/(\.\/)+)|(\/\.$)/g, '/')
      .replace(/\/{2,}/g, '/');

    // remember leading parents
    if (_was_relative) {
      _leadingParents = _path.substring(1).match(/^(\.\.\/)+/) || '';
      if (_leadingParents) {
        _leadingParents = _leadingParents[0];
      }
    }

    // resolve parents
    while (true) {
      _parent = _path.search(/\/\.\.(\/|$)/);
      if (_parent === -1) {
        // no more ../ to resolve
        break;
      } else if (_parent === 0) {
        // top level cannot be relative, skip it
        _path = _path.substring(3);
        continue;
      }

      _pos = _path.substring(0, _parent).lastIndexOf('/');
      if (_pos === -1) {
        _pos = _parent;
      }
      _path = _path.substring(0, _pos) + _path.substring(_parent + 3);
    }

    // revert to relative
    if (_was_relative && this.is('relative')) {
      _path = _leadingParents + _path.substring(1);
    }

    this._parts.path = _path;
    this.build(!build);
    return this;
  };
  p.normalizePathname = p.normalizePath;
  p.normalizeQuery = function(build) {
    if (typeof this._parts.query === 'string') {
      if (!this._parts.query.length) {
        this._parts.query = null;
      } else {
        this.query(URI.parseQuery(this._parts.query, this._parts.escapeQuerySpace));
      }

      this.build(!build);
    }

    return this;
  };
  p.normalizeFragment = function(build) {
    if (!this._parts.fragment) {
      this._parts.fragment = null;
      this.build(!build);
    }

    return this;
  };
  p.normalizeSearch = p.normalizeQuery;
  p.normalizeHash = p.normalizeFragment;

  p.iso8859 = function() {
    // expect unicode input, iso8859 output
    var e = URI.encode;
    var d = URI.decode;

    URI.encode = escape;
    URI.decode = decodeURIComponent;
    try {
      this.normalize();
    } finally {
      URI.encode = e;
      URI.decode = d;
    }
    return this;
  };

  p.unicode = function() {
    // expect iso8859 input, unicode output
    var e = URI.encode;
    var d = URI.decode;

    URI.encode = strictEncodeURIComponent;
    URI.decode = unescape;
    try {
      this.normalize();
    } finally {
      URI.encode = e;
      URI.decode = d;
    }
    return this;
  };

  p.readable = function() {
    var uri = this.clone();
    // removing username, password, because they shouldn't be displayed according to RFC 3986
    uri.username('').password('').normalize();
    var t = '';
    if (uri._parts.protocol) {
      t += uri._parts.protocol + '://';
    }

    if (uri._parts.hostname) {
      if (uri.is('punycode') && punycode) {
        t += punycode.toUnicode(uri._parts.hostname);
        if (uri._parts.port) {
          t += ':' + uri._parts.port;
        }
      } else {
        t += uri.host();
      }
    }

    if (uri._parts.hostname && uri._parts.path && uri._parts.path.charAt(0) !== '/') {
      t += '/';
    }

    t += uri.path(true);
    if (uri._parts.query) {
      var q = '';
      for (var i = 0, qp = uri._parts.query.split('&'), l = qp.length; i < l; i++) {
        var kv = (qp[i] || '').split('=');
        q += '&' + URI.decodeQuery(kv[0], this._parts.escapeQuerySpace)
          .replace(/&/g, '%26');

        if (kv[1] !== undefined) {
          q += '=' + URI.decodeQuery(kv[1], this._parts.escapeQuerySpace)
            .replace(/&/g, '%26');
        }
      }
      t += '?' + q.substring(1);
    }

    t += URI.decodeQuery(uri.hash(), true);
    return t;
  };

  // resolving relative and absolute URLs
  p.absoluteTo = function(base) {
    var resolved = this.clone();
    var properties = ['protocol', 'username', 'password', 'hostname', 'port'];
    var basedir, i, p;

    if (this._parts.urn) {
      throw new Error('URNs do not have any generally defined hierarchical components');
    }

    if (!(base instanceof URI)) {
      base = new URI(base);
    }

    if (resolved._parts.protocol) {
      // Directly returns even if this._parts.hostname is empty.
      return resolved;
    } else {
      resolved._parts.protocol = base._parts.protocol;
    }

    if (this._parts.hostname) {
      return resolved;
    }

    for (i = 0; (p = properties[i]); i++) {
      resolved._parts[p] = base._parts[p];
    }

    if (!resolved._parts.path) {
      resolved._parts.path = base._parts.path;
      if (!resolved._parts.query) {
        resolved._parts.query = base._parts.query;
      }
    } else {
      if (resolved._parts.path.substring(-2) === '..') {
        resolved._parts.path += '/';
      }

      if (resolved.path().charAt(0) !== '/') {
        basedir = base.directory();
        basedir = basedir ? basedir : base.path().indexOf('/') === 0 ? '/' : '';
        resolved._parts.path = (basedir ? (basedir + '/') : '') + resolved._parts.path;
        resolved.normalizePath();
      }
    }

    resolved.build();
    return resolved;
  };
  p.relativeTo = function(base) {
    var relative = this.clone().normalize();
    var relativeParts, baseParts, common, relativePath, basePath;

    if (relative._parts.urn) {
      throw new Error('URNs do not have any generally defined hierarchical components');
    }

    base = new URI(base).normalize();
    relativeParts = relative._parts;
    baseParts = base._parts;
    relativePath = relative.path();
    basePath = base.path();

    if (relativePath.charAt(0) !== '/') {
      throw new Error('URI is already relative');
    }

    if (basePath.charAt(0) !== '/') {
      throw new Error('Cannot calculate a URI relative to another relative URI');
    }

    if (relativeParts.protocol === baseParts.protocol) {
      relativeParts.protocol = null;
    }

    if (relativeParts.username !== baseParts.username || relativeParts.password !== baseParts.password) {
      return relative.build();
    }

    if (relativeParts.protocol !== null || relativeParts.username !== null || relativeParts.password !== null) {
      return relative.build();
    }

    if (relativeParts.hostname === baseParts.hostname && relativeParts.port === baseParts.port) {
      relativeParts.hostname = null;
      relativeParts.port = null;
    } else {
      return relative.build();
    }

    if (relativePath === basePath) {
      relativeParts.path = '';
      return relative.build();
    }

    // determine common sub path
    common = URI.commonPath(relativePath, basePath);

    // If the paths have nothing in common, return a relative URL with the absolute path.
    if (!common) {
      return relative.build();
    }

    var parents = baseParts.path
      .substring(common.length)
      .replace(/[^\/]*$/, '')
      .replace(/.*?\//g, '../');

    relativeParts.path = (parents + relativeParts.path.substring(common.length)) || './';

    return relative.build();
  };

  // comparing URIs
  p.equals = function(uri) {
    var one = this.clone();
    var two = new URI(uri);
    var one_map = {};
    var two_map = {};
    var checked = {};
    var one_query, two_query, key;

    one.normalize();
    two.normalize();

    // exact match
    if (one.toString() === two.toString()) {
      return true;
    }

    // extract query string
    one_query = one.query();
    two_query = two.query();
    one.query('');
    two.query('');

    // definitely not equal if not even non-query parts match
    if (one.toString() !== two.toString()) {
      return false;
    }

    // query parameters have the same length, even if they're permuted
    if (one_query.length !== two_query.length) {
      return false;
    }

    one_map = URI.parseQuery(one_query, this._parts.escapeQuerySpace);
    two_map = URI.parseQuery(two_query, this._parts.escapeQuerySpace);

    for (key in one_map) {
      if (hasOwn.call(one_map, key)) {
        if (!isArray(one_map[key])) {
          if (one_map[key] !== two_map[key]) {
            return false;
          }
        } else if (!arraysEqual(one_map[key], two_map[key])) {
          return false;
        }

        checked[key] = true;
      }
    }

    for (key in two_map) {
      if (hasOwn.call(two_map, key)) {
        if (!checked[key]) {
          // two contains a parameter not present in one
          return false;
        }
      }
    }

    return true;
  };

  // state
  p.preventInvalidHostname = function(v) {
    this._parts.preventInvalidHostname = !!v;
    return this;
  };

  p.duplicateQueryParameters = function(v) {
    this._parts.duplicateQueryParameters = !!v;
    return this;
  };

  p.escapeQuerySpace = function(v) {
    this._parts.escapeQuerySpace = !!v;
    return this;
  };

  return URI;
}));


/***/ }),

/***/ "./node_modules/urijs/src/punycode.js":
/*!********************************************!*\
  !*** ./node_modules/urijs/src/punycode.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(module, global) {var __WEBPACK_AMD_DEFINE_RESULT__;/*! https://mths.be/punycode v1.4.0 by @mathias */
;(function(root) {

	/** Detect free variables */
	var freeExports =  true && exports &&
		!exports.nodeType && exports;
	var freeModule =  true && module &&
		!module.nodeType && module;
	var freeGlobal = typeof global == 'object' && global;
	if (
		freeGlobal.global === freeGlobal ||
		freeGlobal.window === freeGlobal ||
		freeGlobal.self === freeGlobal
	) {
		root = freeGlobal;
	}

	/**
	 * The `punycode` object.
	 * @name punycode
	 * @type Object
	 */
	var punycode,

	/** Highest positive signed 32-bit float value */
	maxInt = 2147483647, // aka. 0x7FFFFFFF or 2^31-1

	/** Bootstring parameters */
	base = 36,
	tMin = 1,
	tMax = 26,
	skew = 38,
	damp = 700,
	initialBias = 72,
	initialN = 128, // 0x80
	delimiter = '-', // '\x2D'

	/** Regular expressions */
	regexPunycode = /^xn--/,
	regexNonASCII = /[^\x20-\x7E]/, // unprintable ASCII chars + non-ASCII chars
	regexSeparators = /[\x2E\u3002\uFF0E\uFF61]/g, // RFC 3490 separators

	/** Error messages */
	errors = {
		'overflow': 'Overflow: input needs wider integers to process',
		'not-basic': 'Illegal input >= 0x80 (not a basic code point)',
		'invalid-input': 'Invalid input'
	},

	/** Convenience shortcuts */
	baseMinusTMin = base - tMin,
	floor = Math.floor,
	stringFromCharCode = String.fromCharCode,

	/** Temporary variable */
	key;

	/*--------------------------------------------------------------------------*/

	/**
	 * A generic error utility function.
	 * @private
	 * @param {String} type The error type.
	 * @returns {Error} Throws a `RangeError` with the applicable error message.
	 */
	function error(type) {
		throw new RangeError(errors[type]);
	}

	/**
	 * A generic `Array#map` utility function.
	 * @private
	 * @param {Array} array The array to iterate over.
	 * @param {Function} callback The function that gets called for every array
	 * item.
	 * @returns {Array} A new array of values returned by the callback function.
	 */
	function map(array, fn) {
		var length = array.length;
		var result = [];
		while (length--) {
			result[length] = fn(array[length]);
		}
		return result;
	}

	/**
	 * A simple `Array#map`-like wrapper to work with domain name strings or email
	 * addresses.
	 * @private
	 * @param {String} domain The domain name or email address.
	 * @param {Function} callback The function that gets called for every
	 * character.
	 * @returns {Array} A new string of characters returned by the callback
	 * function.
	 */
	function mapDomain(string, fn) {
		var parts = string.split('@');
		var result = '';
		if (parts.length > 1) {
			// In email addresses, only the domain name should be punycoded. Leave
			// the local part (i.e. everything up to `@`) intact.
			result = parts[0] + '@';
			string = parts[1];
		}
		// Avoid `split(regex)` for IE8 compatibility. See #17.
		string = string.replace(regexSeparators, '\x2E');
		var labels = string.split('.');
		var encoded = map(labels, fn).join('.');
		return result + encoded;
	}

	/**
	 * Creates an array containing the numeric code points of each Unicode
	 * character in the string. While JavaScript uses UCS-2 internally,
	 * this function will convert a pair of surrogate halves (each of which
	 * UCS-2 exposes as separate characters) into a single code point,
	 * matching UTF-16.
	 * @see `punycode.ucs2.encode`
	 * @see <https://mathiasbynens.be/notes/javascript-encoding>
	 * @memberOf punycode.ucs2
	 * @name decode
	 * @param {String} string The Unicode input string (UCS-2).
	 * @returns {Array} The new array of code points.
	 */
	function ucs2decode(string) {
		var output = [],
		    counter = 0,
		    length = string.length,
		    value,
		    extra;
		while (counter < length) {
			value = string.charCodeAt(counter++);
			if (value >= 0xD800 && value <= 0xDBFF && counter < length) {
				// high surrogate, and there is a next character
				extra = string.charCodeAt(counter++);
				if ((extra & 0xFC00) == 0xDC00) { // low surrogate
					output.push(((value & 0x3FF) << 10) + (extra & 0x3FF) + 0x10000);
				} else {
					// unmatched surrogate; only append this code unit, in case the next
					// code unit is the high surrogate of a surrogate pair
					output.push(value);
					counter--;
				}
			} else {
				output.push(value);
			}
		}
		return output;
	}

	/**
	 * Creates a string based on an array of numeric code points.
	 * @see `punycode.ucs2.decode`
	 * @memberOf punycode.ucs2
	 * @name encode
	 * @param {Array} codePoints The array of numeric code points.
	 * @returns {String} The new Unicode string (UCS-2).
	 */
	function ucs2encode(array) {
		return map(array, function(value) {
			var output = '';
			if (value > 0xFFFF) {
				value -= 0x10000;
				output += stringFromCharCode(value >>> 10 & 0x3FF | 0xD800);
				value = 0xDC00 | value & 0x3FF;
			}
			output += stringFromCharCode(value);
			return output;
		}).join('');
	}

	/**
	 * Converts a basic code point into a digit/integer.
	 * @see `digitToBasic()`
	 * @private
	 * @param {Number} codePoint The basic numeric code point value.
	 * @returns {Number} The numeric value of a basic code point (for use in
	 * representing integers) in the range `0` to `base - 1`, or `base` if
	 * the code point does not represent a value.
	 */
	function basicToDigit(codePoint) {
		if (codePoint - 48 < 10) {
			return codePoint - 22;
		}
		if (codePoint - 65 < 26) {
			return codePoint - 65;
		}
		if (codePoint - 97 < 26) {
			return codePoint - 97;
		}
		return base;
	}

	/**
	 * Converts a digit/integer into a basic code point.
	 * @see `basicToDigit()`
	 * @private
	 * @param {Number} digit The numeric value of a basic code point.
	 * @returns {Number} The basic code point whose value (when used for
	 * representing integers) is `digit`, which needs to be in the range
	 * `0` to `base - 1`. If `flag` is non-zero, the uppercase form is
	 * used; else, the lowercase form is used. The behavior is undefined
	 * if `flag` is non-zero and `digit` has no uppercase form.
	 */
	function digitToBasic(digit, flag) {
		//  0..25 map to ASCII a..z or A..Z
		// 26..35 map to ASCII 0..9
		return digit + 22 + 75 * (digit < 26) - ((flag != 0) << 5);
	}

	/**
	 * Bias adaptation function as per section 3.4 of RFC 3492.
	 * https://tools.ietf.org/html/rfc3492#section-3.4
	 * @private
	 */
	function adapt(delta, numPoints, firstTime) {
		var k = 0;
		delta = firstTime ? floor(delta / damp) : delta >> 1;
		delta += floor(delta / numPoints);
		for (/* no initialization */; delta > baseMinusTMin * tMax >> 1; k += base) {
			delta = floor(delta / baseMinusTMin);
		}
		return floor(k + (baseMinusTMin + 1) * delta / (delta + skew));
	}

	/**
	 * Converts a Punycode string of ASCII-only symbols to a string of Unicode
	 * symbols.
	 * @memberOf punycode
	 * @param {String} input The Punycode string of ASCII-only symbols.
	 * @returns {String} The resulting string of Unicode symbols.
	 */
	function decode(input) {
		// Don't use UCS-2
		var output = [],
		    inputLength = input.length,
		    out,
		    i = 0,
		    n = initialN,
		    bias = initialBias,
		    basic,
		    j,
		    index,
		    oldi,
		    w,
		    k,
		    digit,
		    t,
		    /** Cached calculation results */
		    baseMinusT;

		// Handle the basic code points: let `basic` be the number of input code
		// points before the last delimiter, or `0` if there is none, then copy
		// the first basic code points to the output.

		basic = input.lastIndexOf(delimiter);
		if (basic < 0) {
			basic = 0;
		}

		for (j = 0; j < basic; ++j) {
			// if it's not a basic code point
			if (input.charCodeAt(j) >= 0x80) {
				error('not-basic');
			}
			output.push(input.charCodeAt(j));
		}

		// Main decoding loop: start just after the last delimiter if any basic code
		// points were copied; start at the beginning otherwise.

		for (index = basic > 0 ? basic + 1 : 0; index < inputLength; /* no final expression */) {

			// `index` is the index of the next character to be consumed.
			// Decode a generalized variable-length integer into `delta`,
			// which gets added to `i`. The overflow checking is easier
			// if we increase `i` as we go, then subtract off its starting
			// value at the end to obtain `delta`.
			for (oldi = i, w = 1, k = base; /* no condition */; k += base) {

				if (index >= inputLength) {
					error('invalid-input');
				}

				digit = basicToDigit(input.charCodeAt(index++));

				if (digit >= base || digit > floor((maxInt - i) / w)) {
					error('overflow');
				}

				i += digit * w;
				t = k <= bias ? tMin : (k >= bias + tMax ? tMax : k - bias);

				if (digit < t) {
					break;
				}

				baseMinusT = base - t;
				if (w > floor(maxInt / baseMinusT)) {
					error('overflow');
				}

				w *= baseMinusT;

			}

			out = output.length + 1;
			bias = adapt(i - oldi, out, oldi == 0);

			// `i` was supposed to wrap around from `out` to `0`,
			// incrementing `n` each time, so we'll fix that now:
			if (floor(i / out) > maxInt - n) {
				error('overflow');
			}

			n += floor(i / out);
			i %= out;

			// Insert `n` at position `i` of the output
			output.splice(i++, 0, n);

		}

		return ucs2encode(output);
	}

	/**
	 * Converts a string of Unicode symbols (e.g. a domain name label) to a
	 * Punycode string of ASCII-only symbols.
	 * @memberOf punycode
	 * @param {String} input The string of Unicode symbols.
	 * @returns {String} The resulting Punycode string of ASCII-only symbols.
	 */
	function encode(input) {
		var n,
		    delta,
		    handledCPCount,
		    basicLength,
		    bias,
		    j,
		    m,
		    q,
		    k,
		    t,
		    currentValue,
		    output = [],
		    /** `inputLength` will hold the number of code points in `input`. */
		    inputLength,
		    /** Cached calculation results */
		    handledCPCountPlusOne,
		    baseMinusT,
		    qMinusT;

		// Convert the input in UCS-2 to Unicode
		input = ucs2decode(input);

		// Cache the length
		inputLength = input.length;

		// Initialize the state
		n = initialN;
		delta = 0;
		bias = initialBias;

		// Handle the basic code points
		for (j = 0; j < inputLength; ++j) {
			currentValue = input[j];
			if (currentValue < 0x80) {
				output.push(stringFromCharCode(currentValue));
			}
		}

		handledCPCount = basicLength = output.length;

		// `handledCPCount` is the number of code points that have been handled;
		// `basicLength` is the number of basic code points.

		// Finish the basic string - if it is not empty - with a delimiter
		if (basicLength) {
			output.push(delimiter);
		}

		// Main encoding loop:
		while (handledCPCount < inputLength) {

			// All non-basic code points < n have been handled already. Find the next
			// larger one:
			for (m = maxInt, j = 0; j < inputLength; ++j) {
				currentValue = input[j];
				if (currentValue >= n && currentValue < m) {
					m = currentValue;
				}
			}

			// Increase `delta` enough to advance the decoder's <n,i> state to <m,0>,
			// but guard against overflow
			handledCPCountPlusOne = handledCPCount + 1;
			if (m - n > floor((maxInt - delta) / handledCPCountPlusOne)) {
				error('overflow');
			}

			delta += (m - n) * handledCPCountPlusOne;
			n = m;

			for (j = 0; j < inputLength; ++j) {
				currentValue = input[j];

				if (currentValue < n && ++delta > maxInt) {
					error('overflow');
				}

				if (currentValue == n) {
					// Represent delta as a generalized variable-length integer
					for (q = delta, k = base; /* no condition */; k += base) {
						t = k <= bias ? tMin : (k >= bias + tMax ? tMax : k - bias);
						if (q < t) {
							break;
						}
						qMinusT = q - t;
						baseMinusT = base - t;
						output.push(
							stringFromCharCode(digitToBasic(t + qMinusT % baseMinusT, 0))
						);
						q = floor(qMinusT / baseMinusT);
					}

					output.push(stringFromCharCode(digitToBasic(q, 0)));
					bias = adapt(delta, handledCPCountPlusOne, handledCPCount == basicLength);
					delta = 0;
					++handledCPCount;
				}
			}

			++delta;
			++n;

		}
		return output.join('');
	}

	/**
	 * Converts a Punycode string representing a domain name or an email address
	 * to Unicode. Only the Punycoded parts of the input will be converted, i.e.
	 * it doesn't matter if you call it on a string that has already been
	 * converted to Unicode.
	 * @memberOf punycode
	 * @param {String} input The Punycoded domain name or email address to
	 * convert to Unicode.
	 * @returns {String} The Unicode representation of the given Punycode
	 * string.
	 */
	function toUnicode(input) {
		return mapDomain(input, function(string) {
			return regexPunycode.test(string)
				? decode(string.slice(4).toLowerCase())
				: string;
		});
	}

	/**
	 * Converts a Unicode string representing a domain name or an email address to
	 * Punycode. Only the non-ASCII parts of the domain name will be converted,
	 * i.e. it doesn't matter if you call it with a domain that's already in
	 * ASCII.
	 * @memberOf punycode
	 * @param {String} input The domain name or email address to convert, as a
	 * Unicode string.
	 * @returns {String} The Punycode representation of the given domain name or
	 * email address.
	 */
	function toASCII(input) {
		return mapDomain(input, function(string) {
			return regexNonASCII.test(string)
				? 'xn--' + encode(string)
				: string;
		});
	}

	/*--------------------------------------------------------------------------*/

	/** Define the public API */
	punycode = {
		/**
		 * A string representing the current Punycode.js version number.
		 * @memberOf punycode
		 * @type String
		 */
		'version': '1.3.2',
		/**
		 * An object of methods to convert from JavaScript's internal character
		 * representation (UCS-2) to Unicode code points, and back.
		 * @see <https://mathiasbynens.be/notes/javascript-encoding>
		 * @memberOf punycode
		 * @type Object
		 */
		'ucs2': {
			'decode': ucs2decode,
			'encode': ucs2encode
		},
		'decode': decode,
		'encode': encode,
		'toASCII': toASCII,
		'toUnicode': toUnicode
	};

	/** Expose `punycode` */
	// Some AMD build optimizers, like r.js, check for specific condition patterns
	// like the following:
	if (
		true
	) {
		!(__WEBPACK_AMD_DEFINE_RESULT__ = (function() {
			return punycode;
		}).call(exports, __webpack_require__, exports, module),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}

}(this));

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../webpack/buildin/module.js */ "./node_modules/webpack/buildin/module.js")(module), __webpack_require__(/*! ./../../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./node_modules/webpack/buildin/module.js":
/*!***********************************!*\
  !*** (webpack)/buildin/module.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(module) {
	if (!module.webpackPolyfill) {
		module.deprecate = function() {};
		module.paths = [];
		// module.parent = undefined by default
		if (!module.children) module.children = [];
		Object.defineProperty(module, "loaded", {
			enumerable: true,
			get: function() {
				return module.l;
			}
		});
		Object.defineProperty(module, "id", {
			enumerable: true,
			get: function() {
				return module.i;
			}
		});
		module.webpackPolyfill = 1;
	}
	return module;
};


/***/ }),

/***/ "./src/block/block.js":
/*!****************************!*\
  !*** ./src/block/block.js ***!
  \****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./editor.scss */ "./src/block/editor.scss");
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./style.scss */ "./src/block/style.scss");
/* harmony import */ var _blockIcon__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./blockIcon */ "./src/block/blockIcon.js");
/* harmony import */ var _previewImage__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./previewImage */ "./src/block/previewImage.js");
/* harmony import */ var _components_Edit__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./components/Edit */ "./src/block/components/Edit.js");
/* harmony import */ var _components_Save__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./components/Save */ "./src/block/components/Save.js");
/* harmony import */ var _legacy_widget_transform_transform_to_block__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./legacy-widget-transform/transform-to-block */ "./src/block/legacy-widget-transform/transform-to-block.js");
/* harmony import */ var _legacy_widget_transform_widget_attributes_transform__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./legacy-widget-transform/widget-attributes-transform */ "./src/block/legacy-widget-transform/widget-attributes-transform.js");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! @wordpress/hooks */ "@wordpress/hooks");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_15__);



/**
 * BLOCK: wpzoom-social-icons-block
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */
 //  Import CSS.



/**
 * Internal dependencies
 */







/**
 * WordPress dependencies
 */







const parentContainer = document.getElementById('customize-theme-controls');
/**
 * Filters registered block attributes, extending attributes to include `selectedIcons` & `showModal`.
 *
 * @param {Object} attributes Original block attributes.
 * @return {Object} Filtered block attributes.
 */

function addAttributes(attributes) {
  if (!(undefined === attributes.selectedIcons)) {
    const selectedIconsClone = [...attributes.selectedIcons];
    selectedIconsClone.map(item => {
      item.isActive = false;
      return item;
    });
    attributes.selectedIcons = selectedIconsClone;
    attributes.showModal = false;
  }

  return attributes;
}

function addBlockClassNameSupport(settings, name) {
  if (name !== 'core/heading' || name !== 'core/paragraph') {
    return settings;
  }

  return Object(lodash__WEBPACK_IMPORTED_MODULE_2__["assign"])({}, settings, {
    supports: Object(lodash__WEBPACK_IMPORTED_MODULE_2__["assign"])({}, settings.supports, {
      className: true
    })
  });
}
/**
 * Override the default edit UI of legacy widget to replace with grouped inner blocks.
 *
 * @param {Function} BlockEdit Original component.
 * @return {Function} Wrapped component.
 */


const withGroupedBlocks = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_14__["createHigherOrderComponent"])(BlockEdit => props => {
  const {
    attributes,
    name: legacyBlockName
  } = props;
  const {
    id,
    idBase,
    instance,
    __internalWidgetId: widgetId
  } = attributes;
  const widgetTypeId = id !== null && id !== void 0 ? id : idBase;

  if (legacyBlockName === 'core/legacy-widget' && widgetTypeId === 'zoom-social-icons-widget') {
    const {
      widgetType,
      hasResolvedWidgetType
    } = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_15__["useSelect"])(select => {
      return {
        widgetType: select('core').getWidgetType(widgetTypeId),
        hasResolvedWidgetType: select('core').hasFinishedResolution('getWidgetType', [widgetTypeId])
      };
    }, [id, idBase]);
    const blockAttributes = Object(_legacy_widget_transform_widget_attributes_transform__WEBPACK_IMPORTED_MODULE_10__["default"])(instance.raw);
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(BlockEdit, props), widgetType && hasResolvedWidgetType && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_legacy_widget_transform_transform_to_block__WEBPACK_IMPORTED_MODULE_9__["default"], _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, props, {
      attributes: blockAttributes,
      widgetId: widgetId
    })));
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(BlockEdit, props));
}, 'withGroupedBlock');
Object(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_11__["addFilter"])('blocks.registerBlockType', 'wpzoom-blocks/social-icons/class-names/heading-paragraph-block', addBlockClassNameSupport);
Object(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_11__["addFilter"])('blocks.getBlockAttributes', 'wpzoom-blocks/social-icons', addAttributes);
/**
 * Don't display convert notice in Customizer.
 */
// if ( ! parentContainer ) {
// 	addFilter(
// 		'editor.BlockEdit',
// 		'wpzoom-blocks/social-icons/wrap-group-blocks',
// 		withGroupedBlocks
// 	);
// }

/**
 * Register: WPZOOM Social Icons Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param {string} name     Block name.
 * @param {Object} settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */

Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_13__["registerBlockType"])('wpzoom-blocks/social-icons', {
  // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
  title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Social Icons Block', 'social-icons-widget-by-wpzoom'),
  // Block title.
  description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Display icons with links to social media platforms.', 'social-icons-widget-by-wpzoom'),
  icon: {
    foreground: '#274474',
    src: _blockIcon__WEBPACK_IMPORTED_MODULE_5__["default"]
  },
  example: {
    attributes: {
      cover: _previewImage__WEBPACK_IMPORTED_MODULE_6__["default"],
      author: 'WPZOOM'
    }
  },
  category: 'wpzoom-blocks',
  // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
  keywords: [Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Social Icons', 'social-icons-widget-by-wpzoom'), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Dashicons', 'social-icons-widget-by-wpzoom'), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Socicons', 'social-icons-widget-by-wpzoom'), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Fontawesome', 'social-icons-widget-by-wpzoom'), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Academic Icons', 'social-icons-widget-by-wpzoom')],
  attributes: {
    wasStyled: {
      type: 'boolean',
      default: false
    },
    canvasType: {
      type: 'string',
      default: 'with-canvas'
    },
    showIconsLabel: {
      type: 'boolean',
      default: false
    },
    showModal: {
      type: 'boolean',
      default: false
    },
    openLinkInNewTab: {
      type: 'boolean',
      default: false
    },
    nofollow: {
      type: 'boolean',
      default: false
    },
    noreferrer: {
      type: 'boolean',
      default: false
    },
    noopener: {
      type: 'boolean',
      default: false
    },
    relme: {
      type: 'boolean',
      default: false
    },
    iconsAlignment: {
      type: 'string',
      default: 'left'
    },
    iconsColor: {
      type: 'string',
      default: '#f1f1f1'
    },
    iconsLabelColor: {
      type: 'string',
      default: 'inherit'
    },
    iconsHoverColor: {
      type: 'string',
      default: '#f1f1f1'
    },
    iconsLabelHoverColor: {
      type: 'string',
      default: '#f1f1f1'
    },
    iconsFontSize: {
      type: 'number',
      default: 20
    },
    iconsLabelFontSize: {
      type: 'number',
      default: 20
    },
    iconsPaddingVertical: {
      type: 'number',
      default: 10
    },
    iconsPaddingHorizontal: {
      type: 'number',
      default: 10
    },
    iconsMarginVertical: {
      type: 'number',
      default: 5
    },
    iconsMarginHorizontal: {
      type: 'number',
      default: 5
    },
    iconsBorderRadius: {
      type: 'number',
      default: 0
    },
    iconsBackgroundStyle: {
      type: 'string',
      default: 'round'
    },
    iconsHasBorder: {
      type: 'boolean',
      default: false
    },
    activeIconIndex: {
      type: 'integer',
      default: 0
    },
    defaultIcon: {
      type: 'object',
      default: {
        icon: 'facebook',
        color: '#f89406',
        hoverColor: '#f89406'
      }
    },
    selectedIcons: {
      type: 'array',
      default: [{
        url: 'https://facebook.com',
        icon: 'facebook',
        iconKit: 'socicon',
        color: '#0866FF',
        hoverColor: '#0866FF',
        label: 'Facebook',
        showPopover: false,
        isActive: false,
        customSvg: null
      }, {
        url: 'https://x.com',
        icon: 'x',
        iconKit: 'socicon',
        color: '#000000',
        hoverColor: '#000000',
        label: 'X',
        showPopover: false,
        isActive: false,
        customSvg: null
      }, {
        url: 'https://instagram.com',
        icon: 'instagram',
        iconKit: 'socicon',
        color: '#E4405F',
        hoverColor: '#E4405F',
        label: 'Instagram',
        showPopover: false,
        isActive: false,
        customSvg: null
      }]
    }
  },
  styles: [{
    name: 'with-canvas-round',
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Color Background / Round White Icon', 'social-icons-widget-by-wpzoom'),
    isDefault: true
  }, {
    name: 'with-canvas-rounded',
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Color Background / Rounded White Icon', 'social-icons-widget-by-wpzoom')
  }, {
    name: 'with-canvas-squared',
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Color Background / Squared White Icon', 'social-icons-widget-by-wpzoom')
  }, {
    name: 'without-canvas',
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Color Icon / No Background', 'social-icons-widget-by-wpzoom')
  }, {
    name: 'without-canvas-with-border',
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Color Icon / No Background with border', 'social-icons-widget-by-wpzoom')
  }, {
    name: 'with-label-canvas-rounded',
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Color Background / Rounded White Icon with label', 'social-icons-widget-by-wpzoom')
  }, {
    name: 'without-canvas-with-label',
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_12__["__"])('Color Icon / No Background with label', 'social-icons-widget-by-wpzoom')
  }],
  transforms: {
    from: [{
      type: 'block',
      blocks: ['core/legacy-widget'],
      transform: ({
        instance
      }) => {
        return Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_13__["createBlock"])('wpzoom-blocks/social-icons', Object(_legacy_widget_transform_widget_attributes_transform__WEBPACK_IMPORTED_MODULE_10__["default"])(instance.raw));
      }
    }]
  },

  /**
   * The edit function describes the structure of your block in the context of the editor.
   * This represents what the editor will render when the block is used.
   *
   * The "edit" property must be a valid function.
   *
   * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
   * @param {Object} props Props.
   * @return {Mixed} JSX Component.
   */
  edit: _components_Edit__WEBPACK_IMPORTED_MODULE_7__["default"],

  /**
   * The save function defines the way in which the different attributes should be combined
   * into the final markup, which is then serialized by Gutenberg into post_content.
   *
   * The "save" property must be specified and must be a valid function.
   *
   * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
   * @param {Object} props Props.
   * @return {Mixed} JSX Frontend HTML.
   */
  save: _components_Save__WEBPACK_IMPORTED_MODULE_8__["default"]
});

/***/ }),

/***/ "./src/block/blockIcon.js":
/*!********************************!*\
  !*** ./src/block/blockIcon.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 225.43 225.56"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M947.67,465.69h72a18,18,0,0,0,18-18v-72a18,18,0,0,0-18-18h-72a18,18,0,0,0-18,18v12a6,6,0,0,0,12,0v-12a6,6,0,0,1,6-6h72a6,6,0,0,1,6,6v72a6,6,0,0,1-6,6h-72a6,6,0,0,1-6-6v-36a6,6,0,1,0-12,0v36A18,18,0,0,0,947.67,465.69Z",
  transform: "translate(-812.57 -357.69)"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M984,505a24,24,0,1,0,22.17,14.82A24,24,0,0,0,984,505Zm4.59,35.09A12,12,0,1,1,996,529,12,12,0,0,1,988.59,540.09Z",
  transform: "translate(-812.57 -357.69)"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M1032,535a6,6,0,0,0,6-6V493a18,18,0,0,0-18-18H948a18,18,0,0,0-18,18v72a18,18,0,0,0,18,18h72a18,18,0,0,0,18-18V553a6,6,0,0,0-12,0v12a6,6,0,0,1-6,6H948a6,6,0,0,1-6-6V493a6,6,0,0,1,6-6h72a6,6,0,0,1,6,6v36A6,6,0,0,0,1032,535Z",
  transform: "translate(-812.57 -357.69)"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M902.57,475.25h-72a18,18,0,0,0-18,18v12a6,6,0,1,0,12,0v-12a6,6,0,0,1,6-6h72a6,6,0,0,1,6,6v72a6,6,0,0,1-6,6h-72a6,6,0,0,1-6-6v-36a6,6,0,0,0-12,0v36a18,18,0,0,0,18,18h72a18,18,0,0,0,18-18v-72A18,18,0,0,0,902.57,475.25Z",
  transform: "translate(-812.57 -357.69)"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M893.7,406.66l-36-18A6,6,0,0,0,849,394v36a6,6,0,0,0,6,6,5.92,5.92,0,0,0,2.7-.66l36-18a6,6,0,0,0,0-10.68ZM861,420.28V403.72L877.56,412Z",
  transform: "translate(-812.57 -357.69)"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M846.34,362.11a54,54,0,1,0,58.84,11.71A54,54,0,0,0,846.34,362.11ZM896.7,441.7a42,42,0,1,1,9.1-45.77A42,42,0,0,1,896.7,441.7Z",
  transform: "translate(-812.57 -357.69)"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M859.91,504.71v4.5c0,3.24-2.14,5.7-6.59,5.7h-2.13v9.36h7.52v15c0,7,5.38,11.26,14.19,11.26a18.45,18.45,0,0,0,6.75-1v-8.87a19.38,19.38,0,0,1-3.42.35c-2.82,0-4.7-.77-4.7-3.66V524.27h8.29v-9.36h-8.29v-10.2Z",
  transform: "translate(-812.57 -357.69)"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  d: "M994.39,395.08a17.74,17.74,0,0,1,3.85.35v-8.72a18.83,18.83,0,0,0-6.16-.78c-10.34,0-16.23,5.49-16.23,13.52v3h-6.76v9h6.76v26h13v-26h9.23v-9h-9.23V399.8C988.84,395.93,992.08,395.08,994.39,395.08Z",
  transform: "translate(-812.57 -357.69)"
})));

/***/ }),

/***/ "./src/block/components/Edit.js":
/*!**************************************!*\
  !*** ./src/block/components/Edit.js ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var urijs__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! urijs */ "./node_modules/urijs/src/URI.js");
/* harmony import */ var urijs__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(urijs__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _utils_helper__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../utils/helper */ "./src/block/utils/helper.js");
/* harmony import */ var _SocialIconsModal__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./SocialIconsModal */ "./src/block/components/SocialIconsModal.js");
/* harmony import */ var _Inspector__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./Inspector */ "./src/block/components/Inspector.js");
/* harmony import */ var _PopoverSearch__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./PopoverSearch */ "./src/block/components/PopoverSearch.js");
/* harmony import */ var _SortableArrows__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./SortableArrows */ "./src/block/components/SortableArrows.js");
/* harmony import */ var _ModalColorPicker__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./ModalColorPicker */ "./src/block/components/ModalColorPicker.js");



/* eslint-disable react/jsx-no-target-blank */

/**
 * External dependencies
 */



/**
 * WordPress dependencies
 */







/**
 * Internal dependencies
 */








class Edit extends _wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Component"] {
  constructor() {
    super(...arguments);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "closeModal", () => {
      this.props.setAttributes({
        showModal: false
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "getIconsAlignmentStyle", alignment => {
      const styles = {
        left: 'flex-start',
        right: 'flex-end',
        center: 'center'
      };
      return styles[alignment];
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "setAlignment", alignment => {
      this.props.setAttributes({
        iconsAlignment: alignment
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "saveModalHandler", iconObject => {
      const selectedIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));
      const currentIcon = selectedIconsClone[this.props.attributes.activeIconIndex];
      const updatedIcon = {
        url: iconObject.modalUrl,
        label: iconObject.modalLabel,
        icon: iconObject.modalIcon,
        iconKit: iconObject.modalIconKit,
        color: iconObject.modalColor,
        hoverColor: iconObject.modalHoverColor
      };
      selectedIconsClone[this.props.attributes.activeIconIndex] = { ...currentIcon,
        ...updatedIcon
      };
      this.props.setAttributes({
        selectedIcons: selectedIconsClone,
        showModal: false
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "insertIcon", e => {
      e.preventDefault();
      e.stopPropagation();

      if (e.detail === 0) {
        return;
      }

      const styleVariation = this.getStyleVariations(_utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].getBlockStyle(this.props.className));
      const defaultIcon = {
        url: '',
        icon: 'wordpress',
        iconKit: 'socicon',
        color: '#444140',
        hoverColor: '#444140',
        label: 'WordPress',
        showPopover: true,
        isActive: true,
        customSvg: null
      };

      if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(styleVariation.defaultIcon.color)) {
        defaultIcon.color = styleVariation.defaultIcon.color;
      }

      if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(styleVariation.defaultIcon.hoverColor)) {
        defaultIcon.hoverColor = styleVariation.defaultIcon.hoverColor;
      }

      const selectedIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));
      selectedIconsClone.map(item => item.isActive = false);
      const key = selectedIconsClone.push(defaultIcon);
      this.props.setAttributes({
        selectedIcons: selectedIconsClone,
        activeIconIndex: key - 1
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "onClickIconHandler", (e, key, iconObject) => {
      e.preventDefault();
      const selectedIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));
      selectedIconsClone.map(item => item.isActive = false);
      selectedIconsClone[key].showPopover = true;
      selectedIconsClone[key].isActive = true;
      this.props.setAttributes({
        activeIconIndex: key,
        selectedIcons: selectedIconsClone
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "popoverCloseHandler", key => {
      const selectedIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));
      selectedIconsClone[key].showPopover = false;
      this.props.setAttributes({
        selectedIcons: selectedIconsClone
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "deleteIconHandler", () => {
      const selectedIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));
      selectedIconsClone.splice(this.props.attributes.activeIconIndex, 1);
      this.props.setAttributes({
        selectedIcons: selectedIconsClone,
        showModal: false,
        activeIconIndex: 0
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "popoverDeleteIconHandler", (e, key) => {
      e.stopPropagation();
      const selectedIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));
      selectedIconsClone.splice(key, 1);
      this.props.setAttributes({
        selectedIcons: selectedIconsClone,
        activeIconIndex: 0
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "popoverEditSettingsHandler", (e, key) => {
      e.stopPropagation();
      const selectedIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));
      selectedIconsClone[key].showPopover = false;
      this.props.setAttributes({
        showModal: true,
        selectedIcons: selectedIconsClone
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "popoverSearchHandler", (key, newUrl) => {
      newUrl = Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(new urijs__WEBPACK_IMPORTED_MODULE_3___default.a(newUrl).protocol()) ? `https://${newUrl}` : newUrl;
      const selectedIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons)); // Direct WordPress URL detection

      const isWordPressUrl = newUrl.includes('wordpress.org') || newUrl.includes('wordpress.com') || newUrl.includes('wp.org');
      const iconFromUrl = isWordPressUrl ? 'wordpress' : _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].filterUrlScheme(newUrl);
      let iconDetected = false; // Set WordPress icon directly if it's a WordPress URL

      if (isWordPressUrl) {
        selectedIconsClone[key].iconKit = 'dashicons';
        selectedIconsClone[key].icon = 'wordpress';
        iconDetected = true;
        selectedIconsClone[key].label = 'WordPress'; // Let's set WordPress blue color as default

        selectedIconsClone[key].color = '#0866FF';
        selectedIconsClone[key].hoverColor = '#0866FF';
      } // Otherwise proceed with normal icon detection
      else if (iconFromUrl) {
        const filteredIcons = _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].filterIcons(iconFromUrl);
        Object(lodash__WEBPACK_IMPORTED_MODULE_2__["map"])(filteredIcons, (icon, iconKit) => {
          if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(icon)) {
            Object(lodash__WEBPACK_IMPORTED_MODULE_2__["filter"])(icon, function (o) {
              if (o.icon === iconFromUrl && selectedIconsClone[key].icon !== o.icon) {
                selectedIconsClone[key].iconKit = iconKit;
                selectedIconsClone[key].icon = o.icon;
                iconDetected = true;

                if (o.color) {
                  selectedIconsClone[key].color = o.color;
                  selectedIconsClone[key].hoverColor = o.color;
                }

                selectedIconsClone[key].label = _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].humanizeIconLabel(iconFromUrl);
              }
            });
          }
        });
      }

      selectedIconsClone[key].url = newUrl;
      selectedIconsClone[key].showPopover = true;
      selectedIconsClone[key].iconDetected = iconDetected;
      selectedIconsClone[key].justUpdated = true;
      this.props.setAttributes({
        selectedIcons: selectedIconsClone
      }); // Reset the justUpdated flag after a short delay

      setTimeout(() => {
        const resetIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));

        if (resetIconsClone[key]) {
          resetIconsClone[key].justUpdated = false;
          this.props.setAttributes({
            selectedIcons: resetIconsClone
          });
        }
      }, 2000);
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "moveLeftHandler", (e, key) => {
      let selectedIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));
      selectedIconsClone = _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].arrayMove(selectedIconsClone, key, key - 1);
      this.props.setAttributes({
        selectedIcons: selectedIconsClone,
        activeIconIndex: key - 1
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "moveRightHandler", (e, key) => {
      let selectedIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));
      selectedIconsClone = _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].arrayMove(selectedIconsClone, key, key + 1);
      this.props.setAttributes({
        selectedIcons: selectedIconsClone,
        activeIconIndex: key + 1
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "getRelAttr", () => {
      let relAttr = [];

      if (this.props.attributes.nofollow) {
        relAttr.push('nofollow');
      }

      if (this.props.attributes.noreferrer) {
        relAttr.push('noreferrer');
      }

      if (this.props.attributes.noopener) {
        relAttr.push('noopener');
      }

      if (this.props.attributes.relme) {
        relAttr.push('me');
      }

      if (this.props.attributes.openLinkInNewTab) {
        relAttr = ['noopener'];
      }

      return relAttr;
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "getTarget", () => {
      if (this.props.attributes.openLinkInNewTab) {
        return '_blank';
      }

      return undefined;
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "openCustomSvgModal", key => {
      this.setState({
        isCustomSvgModalOpen: true,
        activeIconKey: key,
        customSvgCode: ''
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "closeCustomSvgModal", () => {
      this.setState({
        isCustomSvgModalOpen: false,
        customSvgCode: '',
        activeIconKey: null
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "updateCustomSvgCode", value => {
      this.setState({
        customSvgCode: value
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "applySvgIcon", () => {
      const {
        customSvgCode,
        activeIconKey
      } = this.state;

      if (!customSvgCode || customSvgCode.trim() === '') {
        return;
      }

      if (activeIconKey === null) {
        return;
      } // Create a sanitized SVG code (basic sanitization, may need enhancement)


      const sanitizedSvg = customSvgCode.replace(/javascript:/gi, '').replace(/on\w+=/gi, '').replace(/data:/gi, '');
      const selectedIconsClone = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons)); // Set the custom SVG for the selected icon

      selectedIconsClone[activeIconKey].iconKit = 'svg';
      selectedIconsClone[activeIconKey].icon = 'custom-svg';
      selectedIconsClone[activeIconKey].customSvg = sanitizedSvg;
      selectedIconsClone[activeIconKey].showPopover = false; // Update the label if it's empty

      if (!selectedIconsClone[activeIconKey].label || selectedIconsClone[activeIconKey].label === '') {
        selectedIconsClone[activeIconKey].label = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Custom Icon', 'social-icons-widget-by-wpzoom');
      }

      this.props.setAttributes({
        selectedIcons: selectedIconsClone
      });
      this.closeCustomSvgModal();
    });

    this.state = {
      isCustomSvgModalOpen: false,
      customSvgCode: '',
      activeIconKey: null
    };
  }

  getStyleVariations(styleType) {
    const styleVariations = {
      'with-label-canvas-rounded': {
        canvasType: 'with-label-canvas',
        showIconsLabel: true,
        iconsColor: null,
        iconsLabelColor: '#fff',
        iconsHoverColor: null,
        iconsLabelHoverColor: '#fff',
        iconsFontSize: 18,
        iconsLabelFontSize: 15,
        iconsPaddingHorizontal: 5,
        iconsPaddingVertical: 5,
        iconsMarginHorizontal: 5,
        iconsMarginVertical: 5,
        iconsHasBorder: true,
        iconsBorderRadius: 50,
        wasStyled: true,
        defaultIcon: {
          icon: 'facebook',
          color: null,
          hoverColor: null
        }
      },
      'with-canvas-rounded': {
        canvasType: 'with-canvas',
        showIconsLabel: false,
        iconsColor: null,
        iconsLabelColor: '#2e3131',
        iconsHoverColor: null,
        iconsLabelHoverColor: '#2e3131',
        iconsFontSize: 18,
        iconsLabelFontSize: 16,
        iconsPaddingHorizontal: 6,
        iconsPaddingVertical: 6,
        iconsMarginHorizontal: 5,
        iconsMarginVertical: 5,
        iconsHasBorder: true,
        iconsBorderRadius: 5,
        wasStyled: true,
        defaultIcon: {
          icon: 'facebook',
          color: '#0866FF',
          hoverColor: '#0866FF'
        },
        selectedIcons: [{
          icon: 'facebook',
          color: '#0866FF',
          hoverColor: '#0866FF'
        }, {
          icon: 'x',
          color: '#000000',
          hoverColor: '#000000'
        }, {
          icon: 'instagram',
          color: '#E4405F',
          hoverColor: '#E4405F'
        }]
      },
      'with-canvas-round': {
        canvasType: 'with-canvas',
        showIconsLabel: false,
        iconsColor: null,
        iconsLabelColor: '#2e3131',
        iconsHoverColor: null,
        iconsLabelHoverColor: '#2e3131',
        iconsFontSize: 18,
        iconsLabelFontSize: 16,
        iconsPaddingHorizontal: 6,
        iconsPaddingVertical: 6,
        iconsMarginHorizontal: 5,
        iconsMarginVertical: 5,
        iconsHasBorder: true,
        iconsBorderRadius: 50,
        wasStyled: true,
        defaultIcon: {
          icon: 'facebook',
          color: '#0866FF',
          hoverColor: '#0866FF'
        },
        selectedIcons: [{
          icon: 'facebook',
          color: '#0866FF',
          hoverColor: '#0866FF'
        }, {
          icon: 'x',
          color: '#000000',
          hoverColor: '#000000'
        }, {
          icon: 'instagram',
          color: '#E4405F',
          hoverColor: '#E4405F'
        }]
      },
      'with-canvas-squared': {
        canvasType: 'with-canvas',
        showIconsLabel: false,
        iconsColor: null,
        iconsLabelColor: '#2e3131',
        iconsHoverColor: null,
        iconsLabelHoverColor: '#2e3131',
        iconsFontSize: 18,
        iconsLabelFontSize: 16,
        iconsPaddingHorizontal: 6,
        iconsPaddingVertical: 6,
        iconsMarginHorizontal: 5,
        iconsMarginVertical: 5,
        iconsBorderRadius: 0,
        iconsHasBorder: true,
        wasStyled: true,
        defaultIcon: {
          icon: 'facebook',
          color: '#0866FF',
          hoverColor: '#0866FF'
        },
        selectedIcons: [{
          icon: 'facebook',
          color: '#0866FF',
          hoverColor: '#0866FF'
        }, {
          icon: 'x',
          color: '#000000',
          hoverColor: '#000000'
        }, {
          icon: 'instagram',
          color: '#E4405F',
          hoverColor: '#E4405F'
        }]
      },
      'without-canvas': {
        canvasType: 'without-canvas',
        showIconsLabel: false,
        iconsColor: null,
        iconsLabelColor: '#2e3131',
        iconsHoverColor: null,
        iconsLabelHoverColor: '#2e3131',
        iconsFontSize: 18,
        iconsLabelFontSize: 16,
        iconsPaddingHorizontal: 6,
        iconsPaddingVertical: 6,
        iconsMarginHorizontal: 5,
        iconsMarginVertical: 5,
        iconsHasBorder: false,
        wasStyled: true,
        defaultIcon: {
          icon: 'facebook',
          color: '#0866FF',
          hoverColor: '#0866FF'
        },
        selectedIcons: [{
          icon: 'facebook',
          color: '#0866FF',
          hoverColor: '#0866FF'
        }, {
          icon: 'x',
          color: '#000000',
          hoverColor: '#000000'
        }, {
          icon: 'instagram',
          color: '#E4405F',
          hoverColor: '#E4405F'
        }]
      },
      'without-canvas-with-border': {
        canvasType: 'without-canvas',
        showIconsLabel: false,
        iconsColor: null,
        iconsLabelColor: 'inherit',
        iconsHoverColor: null,
        iconsLabelHoverColor: '#f1f1f1',
        iconsFontSize: 18,
        iconsLabelFontSize: 16,
        iconsPaddingHorizontal: 6,
        iconsPaddingVertical: 6,
        iconsMarginHorizontal: 5,
        iconsMarginVertical: 5,
        iconsHasBorder: true,
        iconsBorderRadius: 0,
        wasStyled: true,
        defaultIcon: {
          icon: 'facebook',
          color: null,
          hoverColor: null
        }
      },
      'without-canvas-with-label': {
        canvasType: 'without-canvas',
        showIconsLabel: true,
        iconsColor: null,
        iconsLabelColor: 'inherit',
        iconsHoverColor: null,
        iconsLabelHoverColor: '#f1f1f1',
        iconsFontSize: 40,
        iconsLabelFontSize: 15,
        iconsPaddingHorizontal: 10,
        iconsPaddingVertical: 10,
        iconsMarginHorizontal: 0,
        iconsMarginVertical: 0,
        iconsHasBorder: false,
        wasStyled: true,
        defaultIcon: {
          icon: 'facebook',
          color: null,
          hoverColor: null
        }
      }
    };
    return Object(lodash__WEBPACK_IMPORTED_MODULE_2__["get"])(styleVariations, styleType, false) ? Object(lodash__WEBPACK_IMPORTED_MODULE_2__["get"])(styleVariations, styleType, false) : Object(lodash__WEBPACK_IMPORTED_MODULE_2__["get"])(styleVariations, this.getActiveStyle());
  }

  getActiveStyle() {
    const {
      blockStyles
    } = this.props;
    const blockStyle = _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].getActiveStyle(blockStyles, this.props.className);
    return blockStyle && blockStyle.name || '';
  } // eslint-disable-next-line no-unused-vars


  componentDidUpdate(prevProps, prevState) {
    if (_utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].getBlockStyle(prevProps.className) !== _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].getBlockStyle(this.props.className)) {
      const styleVariation = this.getStyleVariations(this.getActiveStyle());

      if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(styleVariation)) {
        this.props.setAttributes(Object(lodash__WEBPACK_IMPORTED_MODULE_2__["omit"])(styleVariation, ['selectedIcons']));
        const clonedSelectedIcons = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));

        if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(styleVariation.selectedIcons)) {
          clonedSelectedIcons.map(item => {
            if (Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(item.color)) {
              item.color = styleVariation.defaultIcon.color;
            }

            if (Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(item.hoverColor)) {
              item.hoverColor = styleVariation.defaultIcon.hoverColor;
            }

            return item;
          });
        }

        if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(styleVariation.iconsColor)) {
          clonedSelectedIcons.map(item => {
            item.color = styleVariation.iconsColor;
            return item;
          });
        }

        if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(styleVariation.iconsHoverColor)) {
          clonedSelectedIcons.map(item => {
            item.hoverColor = styleVariation.iconsHoverColor;
            return item;
          });
        }

        this.props.setAttributes({
          selectedIcons: clonedSelectedIcons
        });
      }
    }
  }

  componentDidMount() {
    if (this.props.attributes.wasStyled === true) {
      return;
    }

    const styleVariation = this.getStyleVariations(this.getActiveStyle());

    if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(styleVariation)) {
      styleVariation.wasStyled = true;
      this.props.setAttributes(Object(lodash__WEBPACK_IMPORTED_MODULE_2__["omit"])(styleVariation, ['selectedIcons']));
      const clonedSelectedIcons = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));

      if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(styleVariation.selectedIcons)) {
        clonedSelectedIcons.map(item => {
          const current = Object(lodash__WEBPACK_IMPORTED_MODULE_2__["find"])(styleVariation.selectedIcons, ['icon', item.icon]);
          item.color = Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(current) ? styleVariation.defaultIcon.color : current.color;
          item.hoverColor = Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(current) ? styleVariation.defaultIcon.hoverColor : current.hoverColor;
          return item;
        });
      }

      if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(styleVariation.iconsColor)) {
        clonedSelectedIcons.map(item => {
          item.color = styleVariation.iconsColor;
          return item;
        });
      }

      if (!Object(lodash__WEBPACK_IMPORTED_MODULE_2__["isEmpty"])(styleVariation.iconsHoverColor)) {
        clonedSelectedIcons.map(item => {
          item.hoverColor = styleVariation.iconsHoverColor;
          return item;
        });
      }

      this.props.setAttributes({
        selectedIcons: clonedSelectedIcons
      });
    }
  }

  render() {
    const {
      attributes,
      setAttributes,
      isSelected
    } = this.props;
    const {
      isCustomSvgModalOpen,
      customSvgCode
    } = this.state;
    let {
      className
    } = this.props;

    if (_utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].getBlockStyle(className) === null) {
      className = classnames__WEBPACK_IMPORTED_MODULE_4___default()(className, 'is-style-with-canvas-round');
    }

    if (attributes.showIconsLabel) {
      className = classnames__WEBPACK_IMPORTED_MODULE_4___default()(className, 'show-icon-labels-style');
    }

    const IconsList = attributes.selectedIcons.map((list, key) => {
      const showIconsLabel = attributes.showIconsLabel ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
        className: classnames__WEBPACK_IMPORTED_MODULE_4___default()('icon-label')
      }, list.label) : '';
      const relAttr = this.getRelAttr();
      const getTarget = this.getTarget();
      let iconContent;

      if (list.iconKit === 'svg' && list.customSvg) {
        // Render the custom SVG icon
        iconContent = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
          className: classnames__WEBPACK_IMPORTED_MODULE_4___default()('social-icon', 'social-icon-svg'),
          dangerouslySetInnerHTML: {
            __html: list.customSvg
          }
        });
      } else {
        // Render the standard icon font
        iconContent = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
          className: classnames__WEBPACK_IMPORTED_MODULE_4___default()(_utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].getIconClassList(list.iconKit, list.icon))
        });
      }

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], {
        key: key
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("a", {
        onClick: e => this.onClickIconHandler(e, key, list),
        href: list.url,
        className: classnames__WEBPACK_IMPORTED_MODULE_4___default()('social-icon-link', {
          selected: list.isActive
        }),
        target: getTarget,
        rel: relAttr.length ? relAttr.join(' ') : undefined,
        title: list.label,
        style: {
          '--wpz-social-icons-block-item-color': list.color,
          '--wpz-social-icons-block-item-color-hover': list.hoverColor
        }
      }, iconContent, showIconsLabel, list.showPopover && isSelected && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Popover"], {
        className: classnames__WEBPACK_IMPORTED_MODULE_4___default()('wpzoom-social-icons-popover'),
        key: key,
        position: 'bottom center',
        onClose: () => this.popoverCloseHandler(key)
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: classnames__WEBPACK_IMPORTED_MODULE_4___default()('popover-content')
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "popover-header"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
        className: "popover-title"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Social Icon Settings', 'social-icons-widget-by-wpzoom'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: classnames__WEBPACK_IMPORTED_MODULE_4___default()('popover-url-wrapper')
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "popover-section-title"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Icon"], {
        icon: "admin-links"
      }), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('URL & ICON', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "popover-description"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Enter a website URL to automatically detect its icon', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "popover-url-input-container"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_PopoverSearch__WEBPACK_IMPORTED_MODULE_13__["default"], {
        key: key,
        value: list.url,
        save: url => this.popoverSearchHandler(key, url)
      })), list.justUpdated && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: `icon-status-message ${list.iconDetected ? 'success' : 'notice'}`
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Icon"], {
        icon: list.iconDetected ? 'yes-alt' : 'info-outline'
      }), list.iconDetected ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Icon detected and applied!', 'social-icons-widget-by-wpzoom') : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('No matching icon found. Choose manually below.', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "popover-alternate-options"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Or', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Button"], {
        isPrimary: true,
        onClick: e => this.popoverEditSettingsHandler(e, key),
        className: "popover-edit-details-button"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Icon"], {
        icon: "edit"
      }), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Choose Icon & Edit Details', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "popover-section-divider"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Or', 'social-icons-widget-by-wpzoom'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Button"], {
        className: "popover-custom-svg-button",
        onClick: () => this.openCustomSvgModal(key)
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Icon"], {
        icon: "editor-code"
      }), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Insert Custom SVG Icon', 'social-icons-widget-by-wpzoom')))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "popover-colors-section"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "popover-section-title"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Icon"], {
        icon: "art"
      }), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('COLORS', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "color-pickers-container"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "color-picker-option",
        "data-tooltip": Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Change color', 'social-icons-widget-by-wpzoom')
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
        className: "color-label"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Normal:', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_ModalColorPicker__WEBPACK_IMPORTED_MODULE_15__["default"], {
        title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Icon Color', 'social-icons-widget-by-wpzoom'),
        className: classnames__WEBPACK_IMPORTED_MODULE_4___default()('popover-color-picker'),
        save: arg => {
          const selectedIconsClone = [...attributes.selectedIcons];
          selectedIconsClone[attributes.activeIconIndex].color = arg.color;
          setAttributes({
            selectedIcons: selectedIconsClone
          });
        },
        color: list.color
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "color-picker-option",
        "data-tooltip": Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Change color', 'social-icons-widget-by-wpzoom')
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
        className: "color-label"
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Hover:', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_ModalColorPicker__WEBPACK_IMPORTED_MODULE_15__["default"], {
        title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Hover Color', 'social-icons-widget-by-wpzoom'),
        className: classnames__WEBPACK_IMPORTED_MODULE_4___default()('popover-color-picker'),
        save: arg => {
          const selectedIconsClone = [...attributes.selectedIcons];
          selectedIconsClone[attributes.activeIconIndex].hoverColor = arg.color;
          setAttributes({
            selectedIcons: selectedIconsClone
          });
        },
        color: list.hoverColor
      })))), attributes.selectedIcons.length > 1 && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: "popover-footer"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Button"], {
        isDestructive: true,
        onClick: e => this.popoverDeleteIconHandler(e, key),
        className: "delete-icon-button"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Icon"], {
        icon: "trash"
      }), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Delete Icon', 'social-icons-widget-by-wpzoom')))))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_SortableArrows__WEBPACK_IMPORTED_MODULE_14__["default"], {
        left: this.moveLeftHandler,
        right: this.moveRightHandler,
        length: attributes.selectedIcons.length,
        isActive: list.isActive && isSelected,
        itemKey: key
      }));
    });
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_Inspector__WEBPACK_IMPORTED_MODULE_12__["default"], this.props), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_8__["BlockControls"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_8__["AlignmentToolbar"], {
      value: attributes.iconsAlignment,
      onChange: iconsAlignment => this.setAlignment(iconsAlignment)
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: className,
      style: {
        '--wpz-social-icons-block-item-font-size': _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].addPixelsPipe(attributes.iconsFontSize),
        '--wpz-social-icons-block-item-padding-horizontal': _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].addPixelsPipe(attributes.iconsPaddingHorizontal),
        '--wpz-social-icons-block-item-padding-vertical': _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].addPixelsPipe(attributes.iconsPaddingVertical),
        '--wpz-social-icons-block-item-margin-horizontal': _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].addPixelsPipe(attributes.iconsMarginHorizontal),
        '--wpz-social-icons-block-item-margin-vertical': _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].addPixelsPipe(attributes.iconsMarginVertical),
        '--wpz-social-icons-block-item-border-radius': _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].addPixelsPipe(attributes.iconsBorderRadius),
        '--wpz-social-icons-block-label-font-size': _utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].addPixelsPipe(attributes.iconsLabelFontSize),
        '--wpz-social-icons-block-label-color': attributes.iconsLabelColor,
        '--wpz-social-icons-block-label-color-hover': attributes.iconsLabelHoverColor,
        '--wpz-social-icons-alignment': this.getIconsAlignmentStyle(attributes.iconsAlignment)
      }
    }, IconsList, isSelected && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Button"], {
      type: 'button',
      onClick: this.insertIcon,
      style: {
        padding: attributes.iconsPadding
      },
      className: 'insert-icon'
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Icon"], {
      icon: 'insert',
      size: '20'
    })), attributes.selectedIcons[attributes.activeIconIndex] && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_SocialIconsModal__WEBPACK_IMPORTED_MODULE_11__["default"], {
      className: classnames__WEBPACK_IMPORTED_MODULE_4___default()(_utils_helper__WEBPACK_IMPORTED_MODULE_10__["default"].getBlockStyle(className)),
      showIconsLabel: attributes.showIconsLabel,
      iconsBorderRadius: attributes.iconsBorderRadius,
      show: attributes.showModal,
      url: attributes.selectedIcons[attributes.activeIconIndex].url,
      label: attributes.selectedIcons[attributes.activeIconIndex].label,
      icon: attributes.selectedIcons[attributes.activeIconIndex].icon,
      iconKit: attributes.selectedIcons[attributes.activeIconIndex].iconKit,
      color: attributes.selectedIcons[attributes.activeIconIndex].color,
      hoverColor: attributes.selectedIcons[attributes.activeIconIndex].hoverColor,
      save: this.saveModalHandler,
      delete: this.deleteIconHandler,
      showDeleteBtn: attributes.selectedIcons.length > 1,
      onClose: this.closeModal
    }), isCustomSvgModalOpen && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Modal"], {
      title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Insert Custom SVG Icon', 'social-icons-widget-by-wpzoom'),
      onRequestClose: this.closeCustomSvgModal,
      className: "wpzoom-custom-svg-modal"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "wpzoom-custom-svg-modal-content"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("p", {
      className: "wpzoom-custom-svg-modal-description"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])("Paste your SVG code below. Make sure it's clean and valid SVG code for security reasons.", 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["TextareaControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('SVG Code', 'social-icons-widget-by-wpzoom'),
      help: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Paste SVG code here. For security reasons, scripts and event handlers will be removed.', 'social-icons-widget-by-wpzoom'),
      value: customSvgCode,
      onChange: this.updateCustomSvgCode,
      rows: 10,
      className: "wpzoom-custom-svg-textarea"
    }), customSvgCode && customSvgCode.trim() !== '' && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "wpzoom-custom-svg-preview"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("p", {
      className: "wpzoom-custom-svg-preview-title"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Preview:', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "wpzoom-custom-svg-preview-box",
      dangerouslySetInnerHTML: {
        __html: customSvgCode
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "wpzoom-custom-svg-modal-buttons"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Button"], {
      isPrimary: true,
      onClick: this.applySvgIcon,
      disabled: !customSvgCode || customSvgCode.trim() === ''
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Apply SVG Icon', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Button"], {
      isSecondary: true,
      onClick: this.closeCustomSvgModal
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__["__"])('Cancel', 'social-icons-widget-by-wpzoom')))))));
  }

}

const applyWithSelect = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_6__["withSelect"])((select, props) => {
  const {
    getBlockStyles
  } = select('core/blocks');
  return {
    blockStyles: getBlockStyles(props.name)
  };
});
/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_9__["compose"])(applyWithSelect)(Edit));

/***/ }),

/***/ "./src/block/components/Inspector.js":
/*!*******************************************!*\
  !*** ./src/block/components/Inspector.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Inspector; });
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _utils_helper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/helper */ "./src/block/utils/helper.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);



/**
 * Inspector Controls
 */





/**
 * Create an Inspector Controls wrapper Component
 */

class Inspector extends _wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Component"] {
  constructor(props) {
    super(...arguments);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "state", {
      selectedIcons: JSON.parse(JSON.stringify(this.props.attributes.selectedIcons))
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "setAlignment", alignment => {
      this.props.setAttributes({
        iconsAlignment: alignment
      });
    });
  }

  static getDerivedStateFromProps(props, state) {
    if (state.selectedIcons.length !== props.attributes.selectedIcons.length) {
      return {
        selectedIcons: JSON.parse(JSON.stringify(props.attributes.selectedIcons))
      };
    }

    return null;
  }

  getBlockStyle(classname) {
    const blockStyle = _utils_helper__WEBPACK_IMPORTED_MODULE_2__["default"].getBlockStyle(classname);
    return null === blockStyle ? 'with-canvas-round' : blockStyle;
  }

  render() {
    const colors = [{
      name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Turquoise', 'social-icons-widget-by-wpzoom'),
      color: '#4ECDC4'
    }, {
      name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Charcoal', 'social-icons-widget-by-wpzoom'),
      color: '#2E3131'
    }, {
      name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('White', 'social-icons-widget-by-wpzoom'),
      color: '#fff'
    }, {
      name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Dodger blue', 'social-icons-widget-by-wpzoom'),
      color: '#22A7F0'
    }, {
      name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Red', 'social-icons-widget-by-wpzoom'),
      color: '#D91E18'
    }, {
      name: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Orange', 'social-icons-widget-by-wpzoom'),
      color: '#F89406'
    }];
    const {
      setAttributes
    } = this.props;
    const isLeftAlignment = 'left' === this.props.attributes.iconsAlignment;
    const isCenterAlignment = 'center' === this.props.attributes.iconsAlignment;
    const isRightAlignment = 'right' === this.props.attributes.iconsAlignment;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["InspectorControls"], {
      group: "settings"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icon Labels Settings', 'social-icons-widget-by-wpzoom')
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "show-icon-labels"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])(' Show icon labels?', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["FormToggle"], {
      id: "show-icon-labels",
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])(' Show icon labels?', 'social-icons-widget-by-wpzoom'),
      checked: this.props.attributes.showIconsLabel,
      onChange: () => {
        setAttributes({
          showIconsLabel: !this.props.attributes.showIconsLabel
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "open-link-in-new-tab"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Open links in new tab?', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["FormToggle"], {
      id: "open-link-in-new-tab",
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Open links in new tab?', 'social-icons-widget-by-wpzoom'),
      checked: this.props.attributes.openLinkInNewTab,
      onChange: () => {
        setAttributes({
          openLinkInNewTab: !this.props.attributes.openLinkInNewTab,
          noopener: !this.props.attributes.noopener
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "add-nofollow-to-links"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Add rel="nofollow" to links', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["FormToggle"], {
      id: "add-nofollow-to-links",
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Add rel="nofollow" to links', 'social-icons-widget-by-wpzoom'),
      checked: this.props.attributes.nofollow,
      onChange: () => {
        setAttributes({
          nofollow: !this.props.attributes.nofollow
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "add-noreferrer-to-links"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Add rel="noreferrer" to links', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["FormToggle"], {
      id: "add-noreferrer-to-links",
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Add rel="noreferrer" to links', 'social-icons-widget-by-wpzoom'),
      checked: this.props.attributes.noreferrer,
      onChange: () => {
        setAttributes({
          noreferrer: !this.props.attributes.noreferrer
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "add-noopener-to-links"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Add rel="noopener" to links', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["FormToggle"], {
      id: "add-noopener-to-links",
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Add rel="noopener" to links', 'social-icons-widget-by-wpzoom'),
      checked: this.props.attributes.noopener,
      onChange: () => {
        setAttributes({
          noopener: !this.props.attributes.noopener
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "add-noopener-to-links"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Add rel="me" to links', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["FormToggle"], {
      id: "add-noopener-to-links",
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Add rel="me" to links', 'social-icons-widget-by-wpzoom'),
      checked: this.props.attributes.relme,
      onChange: () => {
        setAttributes({
          relme: !this.props.attributes.relme
        });
      }
    }))))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__["InspectorControls"], {
      group: "styles"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icon Styling Settings', 'social-icons-widget-by-wpzoom')
    }, this.props.attributes.iconsHasBorder ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "icons-border-radius"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icons Border Radius:', 'social-icons-widget-by-wpzoom'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["RangeControl"], {
      id: 'icons-border-radius',
      min: 0,
      max: 55,
      value: this.props.attributes.iconsBorderRadius,
      onChange: newFontSize => {
        setAttributes({
          iconsBorderRadius: newFontSize
        });
      }
    }))) : null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "add-noopener-to-links"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icons Alignment:', 'social-icons-widget-by-wpzoom'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ButtonGroup"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
      onClick: () => this.setAlignment('left'),
      isPrimary: isLeftAlignment,
      isSecondary: !isLeftAlignment
    }, "Left"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
      onClick: () => this.setAlignment('center'),
      isPrimary: isCenterAlignment,
      isSecondary: !isCenterAlignment
    }, "Center"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Button"], {
      onClick: () => this.setAlignment('right'),
      isPrimary: isRightAlignment,
      isSecondary: !isRightAlignment
    }, "Right"))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "icons-font-size"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icons Font Size:', 'social-icons-widget-by-wpzoom'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["RangeControl"], {
      id: "icons-font-size",
      min: 0,
      max: 200,
      value: this.props.attributes.iconsFontSize,
      onChange: newFontSize => {
        setAttributes({
          iconsFontSize: newFontSize
        });
      }
    })), this.props.attributes.showIconsLabel ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "icons-label-font-size"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icons Label Font Size:', 'social-icons-widget-by-wpzoom'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["RangeControl"], {
      id: "icons-label-font-size",
      min: 0,
      max: 200,
      value: this.props.attributes.iconsLabelFontSize,
      onChange: newFontSize => {
        setAttributes({
          iconsLabelFontSize: newFontSize
        });
      }
    }))) : null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "icons-padding"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icons Padding Horizontal:', 'social-icons-widget-by-wpzoom'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["RangeControl"], {
      id: "icons-padding-horizontal",
      beforeIcon: 'image-flip-horizontal',
      value: this.props.attributes.iconsPaddingHorizontal,
      onChange: padding => setAttributes({
        iconsPaddingHorizontal: padding
      }),
      min: 0,
      max: 200
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "icons-padding"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icons Padding Vertical:', 'social-icons-widget-by-wpzoom'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["RangeControl"], {
      id: "icons-padding-vertical",
      beforeIcon: 'image-flip-vertical',
      value: this.props.attributes.iconsPaddingVertical,
      onChange: padding => setAttributes({
        iconsPaddingVertical: padding
      }),
      min: 0,
      max: 200
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "icons-margin-horizontal"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icons Margin Horizontal:', 'social-icons-widget-by-wpzoom'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["RangeControl"], {
      id: "icons-margin-horizontal",
      beforeIcon: 'image-flip-horizontal',
      value: this.props.attributes.iconsMarginHorizontal,
      onChange: margin => setAttributes({
        iconsMarginHorizontal: margin
      }),
      min: 0,
      max: 200
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "icons-margin-vertical"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icons Margin Vertical:', 'social-icons-widget-by-wpzoom'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["RangeControl"], {
      id: "icons-margin-vertical",
      beforeIcon: 'image-flip-vertical',
      value: this.props.attributes.iconsMarginVertical,
      onChange: margin => setAttributes({
        iconsMarginVertical: margin
      }),
      min: 0,
      max: 200
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelBody"], {
      title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Icon Color Settings', 'social-icons-widget-by-wpzoom')
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "icon-color"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Set color for all icons', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorIndicator"], {
      colorValue: this.props.attributes.iconsColor
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPalette"], {
      id: 'icon-color',
      colors: colors,
      value: this.props.attributes.iconsColor,
      onChange: color => {
        const clonedSelectedIcons = JSON.parse(JSON.stringify(this.props.attributes.selectedIcons));
        clonedSelectedIcons.map((item, key) => {
          item.color = undefined === color ? this.state.selectedIcons[key].color : color;
          return item;
        });
        setAttributes({
          iconsColor: color,
          selectedIcons: clonedSelectedIcons
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "icon-hover-color"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Set hover color for all icons', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorIndicator"], {
      colorValue: this.props.attributes.iconsHoverColor
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPalette"], {
      id: 'icon-hover-color',
      colors: colors,
      value: this.props.attributes.iconsHoverColor,
      onChange: color => {
        const clonedSelectedIcons = [...this.props.attributes.selectedIcons];
        clonedSelectedIcons.map((item, key) => {
          item.hoverColor = undefined === color ? this.state.selectedIcons[key].hoverColor : color;
          return item;
        });
        setAttributes({
          iconsHoverColor: color,
          selectedIcons: clonedSelectedIcons
        });
      }
    })), this.props.attributes.showIconsLabel ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "icon-label-color"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Set color for all label icons', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorIndicator"], {
      colorValue: this.props.attributes.iconsLabelColor
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPalette"], {
      id: 'icon-label-color',
      colors: colors,
      value: this.props.attributes.iconsLabelColor,
      onChange: color => {
        setAttributes({
          iconsLabelColor: color
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
      htmlFor: "icon-hover-label-color"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Set hover color for all label icons', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorIndicator"], {
      colorValue: this.props.attributes.iconsLabelHoverColor
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["PanelRow"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["ColorPalette"], {
      id: 'icon-hover-label-color',
      colors: colors,
      value: this.props.attributes.iconsLabelHoverColor,
      onChange: color => {
        setAttributes({
          iconsLabelHoverColor: color
        });
      }
    }))) : null)));
  }

}

/***/ }),

/***/ "./src/block/components/ModalColorPicker.js":
/*!**************************************************!*\
  !*** ./src/block/components/ModalColorPicker.js ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);





class ModalColorPicker extends _wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Component"] {
  constructor(...args) {
    super(...args);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "state", {
      color: this.props.color,
      showColorPicker: false
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "onClickColorIndicatorHandler", () => {
      this.setState({
        showColorPicker: true
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "setColorPickerHandler", color => {
      this.setState({
        color: color.hex
      }, () => {
        this.props.save(this.state);
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "focusOutsideHandler", () => {
      this.setState({
        showColorPicker: false
      });
    });
  }

  render() {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorIndicator"], {
      title: this.props.title,
      className: this.props.className,
      colorValue: this.state.color,
      onClick: this.onClickColorIndicatorHandler
    }, this.state.showColorPicker && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Popover"], {
      position: 'middle right',
      onFocusOutside: this.focusOutsideHandler
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: 'popover-content'
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ColorPicker"], {
      className: 'wpzoom-color-picker',
      disableAlpha: true,
      color: this.state.color,
      onChangeComplete: this.setColorPickerHandler
    }))));
  }

}

/* harmony default export */ __webpack_exports__["default"] = (ModalColorPicker);

/***/ }),

/***/ "./src/block/components/PopoverSearch.js":
/*!***********************************************!*\
  !*** ./src/block/components/PopoverSearch.js ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return PopoverSearch; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);


/**
 * WordPress dependencies
 */



function PopoverSearch({
  value,
  save
}) {
  const [search, setSearch] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(value);

  const onKeyDownHandler = e => {
    e.stopPropagation();

    if (e.key === 'Enter') {
      save(search);
    }
  };

  const onClickHandler = e => {
    e.stopPropagation();
    save(search);
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "url-input-wrapper"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Icon"], {
    icon: "admin-site",
    className: "url-input-icon"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["TextControl"], {
    className: "url-input",
    type: "text",
    value: search,
    onChange: setSearch,
    onKeyDown: onKeyDownHandler,
    onFocus: e => e.target.select(),
    placeholder: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('https://example.com', 'social-icons-widget-by-wpzoom')
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Button"], {
    icon: "update",
    isPrimary: true,
    onClick: onClickHandler,
    className: "url-apply-button"
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])('Detect Icon', 'social-icons-widget-by-wpzoom')));
}

/***/ }),

/***/ "./src/block/components/Save.js":
/*!**************************************!*\
  !*** ./src/block/components/Save.js ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _utils_helper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../utils/helper */ "./src/block/utils/helper.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_3__);






class Save extends _wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Component"] {
  constructor(props) {
    super(...arguments);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "getIconsAlignmentStyle", alignment => {
      const styles = {
        left: 'flex-start',
        right: 'flex-end',
        center: 'center'
      };
      return styles[alignment];
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "getRelAttr", () => {
      let relAttr = [];

      if (this.props.attributes.nofollow) {
        relAttr.push('nofollow');
      }

      if (this.props.attributes.noreferrer) {
        relAttr.push('noreferrer');
      }

      if (this.props.attributes.noopener) {
        relAttr.push('noopener');
      }

      if (this.props.attributes.relme) {
        relAttr.push('me');
      }

      if (this.props.attributes.openLinkInNewTab) {
        relAttr = ['noopener'];
      }

      return relAttr;
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "getTarget", () => {
      if (this.props.attributes.openLinkInNewTab) {
        return '_blank';
      }

      return undefined;
    });
  }

  render() {
    const {
      attributes
    } = this.props;
    let {
      className
    } = attributes;

    if (_utils_helper__WEBPACK_IMPORTED_MODULE_2__["default"].getBlockStyle(className) == null) {
      className = classnames__WEBPACK_IMPORTED_MODULE_3___default()(className, 'is-style-with-canvas-round');
    }

    if (attributes.showIconsLabel) {
      className = classnames__WEBPACK_IMPORTED_MODULE_3___default()(className, 'show-icon-labels-style');
    }

    const IconsList = attributes.selectedIcons.map((list, key) => {
      const showIconsLabel = attributes.showIconsLabel ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
        className: classnames__WEBPACK_IMPORTED_MODULE_3___default()('icon-label')
      }, list.label) : '';
      const relAttr = this.getRelAttr();
      const getTarget = this.getTarget(); // Determine if this is a custom SVG icon

      const isCustomSvg = list.iconKit === 'svg' && list.customSvg; // Prepare the icon content (either SVG or icon font)

      let iconContent;

      if (isCustomSvg) {
        iconContent = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
          className: classnames__WEBPACK_IMPORTED_MODULE_3___default()('social-icon', 'social-icon-svg'),
          dangerouslySetInnerHTML: {
            __html: list.customSvg
          }
        });
      } else {
        iconContent = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
          className: classnames__WEBPACK_IMPORTED_MODULE_3___default()(_utils_helper__WEBPACK_IMPORTED_MODULE_2__["default"].getIconClassList(list.iconKit, list.icon))
        });
      }

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("a", {
        key: key,
        href: list.url,
        className: 'social-icon-link',
        target: getTarget,
        rel: relAttr.length ? relAttr.join(' ') : undefined,
        title: list.label,
        style: {
          '--wpz-social-icons-block-item-color': list.color,
          '--wpz-social-icons-block-item-color-hover': list.hoverColor
        }
      }, iconContent, showIconsLabel);
    });
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: className,
      style: {
        '--wpz-social-icons-block-item-font-size': _utils_helper__WEBPACK_IMPORTED_MODULE_2__["default"].addPixelsPipe(attributes.iconsFontSize),
        '--wpz-social-icons-block-item-padding-horizontal': _utils_helper__WEBPACK_IMPORTED_MODULE_2__["default"].addPixelsPipe(attributes.iconsPaddingHorizontal),
        '--wpz-social-icons-block-item-padding-vertical': _utils_helper__WEBPACK_IMPORTED_MODULE_2__["default"].addPixelsPipe(attributes.iconsPaddingVertical),
        '--wpz-social-icons-block-item-margin-horizontal': _utils_helper__WEBPACK_IMPORTED_MODULE_2__["default"].addPixelsPipe(attributes.iconsMarginHorizontal),
        '--wpz-social-icons-block-item-margin-vertical': _utils_helper__WEBPACK_IMPORTED_MODULE_2__["default"].addPixelsPipe(attributes.iconsMarginVertical),
        '--wpz-social-icons-block-item-border-radius': _utils_helper__WEBPACK_IMPORTED_MODULE_2__["default"].addPixelsPipe(attributes.iconsBorderRadius),
        '--wpz-social-icons-block-label-font-size': _utils_helper__WEBPACK_IMPORTED_MODULE_2__["default"].addPixelsPipe(attributes.iconsLabelFontSize),
        '--wpz-social-icons-block-label-color': attributes.iconsLabelColor,
        '--wpz-social-icons-block-label-color-hover': attributes.iconsLabelHoverColor,
        '--wpz-social-icons-alignment': this.getIconsAlignmentStyle(attributes.iconsAlignment)
      }
    }, IconsList);
  }

}

/* harmony default export */ __webpack_exports__["default"] = (Save);

/***/ }),

/***/ "./src/block/components/SocialIcon.js":
/*!********************************************!*\
  !*** ./src/block/components/SocialIcon.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _utils_helper__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../utils/helper */ "./src/block/utils/helper.js");






class SocialIcon extends _wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Component"] {
  constructor(...args) {
    super(...args);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "state", {
      isHover: false
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "onMouseEnterCallback", () => {
      this.setState({
        isHover: true
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "onMouseLeaveCallback", () => {
      this.setState({
        isHover: false
      });
    });
  }

  render() {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      ref: this.props.setRef,
      onClick: () => this.props.click(this.props.icon),
      className: classnames__WEBPACK_IMPORTED_MODULE_2___default()(_utils_helper__WEBPACK_IMPORTED_MODULE_3__["default"].getIconClassList(this.props.iconKit, this.props.icon), {
        selected: this.props.isSelected
      }),
      style: {
        backgroundColor: this.state.isHover ? this.props.hoverColor : this.props.color
      },
      onMouseEnter: this.onMouseEnterCallback,
      onMouseLeave: this.onMouseLeaveCallback
    });
  }

}

/* harmony default export */ __webpack_exports__["default"] = (SocialIcon);

/***/ }),

/***/ "./src/block/components/SocialIconsModal.js":
/*!**************************************************!*\
  !*** ./src/block/components/SocialIconsModal.js ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _ModalColorPicker__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ModalColorPicker */ "./src/block/components/ModalColorPicker.js");
/* harmony import */ var _SocialIcon__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./SocialIcon */ "./src/block/components/SocialIcon.js");
/* harmony import */ var _utils_helper__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../utils/helper */ "./src/block/utils/helper.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var urijs__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! urijs */ "./node_modules/urijs/src/URI.js");
/* harmony import */ var urijs__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(urijs__WEBPACK_IMPORTED_MODULE_10__);



/* global wpzSocialIconsBlock */










const {
  iconKitsCategories
} = wpzSocialIconsBlock;

class SocialIconsModal extends _wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Component"] {
  constructor(props) {
    super(props);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "state", {
      modalShow: this.props.show,
      modalUrl: this.props.url,
      modalLabel: this.props.label,
      modalIcon: this.props.icon,
      modalIconKit: this.props.iconKit,
      modalColor: this.props.color,
      modalHoverColor: this.props.hoverColor,
      modalSearch: ''
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "urlTextControlHandler", value => {
      value = Object(lodash__WEBPACK_IMPORTED_MODULE_7__["isEmpty"])(new urijs__WEBPACK_IMPORTED_MODULE_10___default.a(value).protocol()) ? `https://${value}` : value;
      const newState = {
        modalUrl: value
      };
      const iconFromUrl = _utils_helper__WEBPACK_IMPORTED_MODULE_4__["default"].filterUrlScheme(value);

      if (iconFromUrl) {
        const filteredIcons = _utils_helper__WEBPACK_IMPORTED_MODULE_4__["default"].filterIcons(iconFromUrl);

        if (filteredIcons[this.state.modalIconKit].length) {
          newState.modalIcon = filteredIcons[this.state.modalIconKit][0].icon;
        }
      }

      this.setState(newState);
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "labelTextControlHandler", value => {
      this.setState({
        modalLabel: value
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "searchTextControlHandler", value => {
      this.setState({
        modalSearch: value
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "saveColorPickerHandler", arg => {
      this.setState({
        modalColor: arg.color
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "saveHoverColorPickerHandler", arg => {
      this.setState({
        modalHoverColor: arg.color
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "onClickIconHandler", icon => {
      this.setState({
        modalIcon: icon,
        modalLabel: _utils_helper__WEBPACK_IMPORTED_MODULE_4__["default"].humanizeIconLabel(icon)
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(this, "scrollMe", () => {
      const node = this.myRef.current;

      if (!(null === node)) {
        node.scrollIntoView(true);
      }
    });

    this.myRef = react__WEBPACK_IMPORTED_MODULE_5___default.a.createRef();
    this.scrollMeDebounced = Object(lodash__WEBPACK_IMPORTED_MODULE_7__["debounce"])(this.scrollMe, 1000);
  }

  static getDerivedStateFromProps(props, state) {
    if (props.show !== state.modalShow) {
      return {
        modalShow: props.show,
        modalUrl: props.url,
        modalLabel: props.label,
        modalIcon: props.icon,
        modalIconKit: props.iconKit,
        modalColor: props.color,
        modalHoverColor: props.hoverColor,
        modalSearch: ''
      };
    }

    return null;
  }

  componentDidUpdate() {
    this.scrollMeDebounced();
  }

  render() {
    if (!this.state.modalShow) {
      return null;
    }

    const iconElements = Object.keys(_utils_helper__WEBPACK_IMPORTED_MODULE_4__["default"].filterIcons(this.state.modalSearch)).map((iconKit, iconKey) => Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      key: iconKey,
      className: classnames__WEBPACK_IMPORTED_MODULE_6___default()('option-item', 'icon-kit', `${iconKit}-wrapper`),
      style: {
        display: this.state.modalIconKit === iconKit ? 'block' : 'none'
      }
    }, _utils_helper__WEBPACK_IMPORTED_MODULE_4__["default"].filterIcons(this.state.modalSearch)[iconKit].map((element, key) => Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_SocialIcon__WEBPACK_IMPORTED_MODULE_3__["default"], {
      key: key,
      setRef: this.state.modalIcon === element.icon && this.state.modalIconKit === iconKit ? this.myRef : null,
      color: this.state.modalColor,
      hoverColor: this.state.modalHoverColor,
      icon: element.icon,
      click: this.onClickIconHandler,
      isSelected: this.state.modalIcon === element.icon,
      iconKit: iconKit
    }))));
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["Modal"], {
      className: classnames__WEBPACK_IMPORTED_MODULE_6___default()('wpzoom-social-icons-modal', this.props.className),
      style: {
        '--wpz-social-icons-block-modal-item-border-radius': _utils_helper__WEBPACK_IMPORTED_MODULE_4__["default"].addPixelsPipe(this.props.iconsBorderRadius)
      },
      title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Select Icon', 'social-icons-widget-by-wpzoom'),
      shouldCloseOnClickOutside: false,
      onRequestClose: () => this.props.onClose(this.state)
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: 'modal-content'
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: 'option-item'
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "label"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('URL', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "option-wrapper"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["TextControl"], {
      value: this.state.modalUrl,
      onChange: this.urlTextControlHandler
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "option-item"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "label"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Label', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "option-wrapper"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["TextControl"], {
      value: this.state.modalLabel,
      onChange: this.labelTextControlHandler
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "option-item"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "label"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Pick icon color', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "option-wrapper"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_ModalColorPicker__WEBPACK_IMPORTED_MODULE_2__["default"], {
      save: this.saveColorPickerHandler,
      color: this.state.modalColor
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "option-item"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "label"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Pick hover color', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "option-wrapper"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_ModalColorPicker__WEBPACK_IMPORTED_MODULE_2__["default"], {
      save: this.saveHoverColorPickerHandler,
      color: this.state.modalHoverColor
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "option-item"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "label"
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Select Icon Kit', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "option-wrapper"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["SelectControl"], {
      value: this.state.modalIconKit,
      onChange: currentIconKit => {
        this.setState({
          modalIconKit: currentIconKit
        });
      },
      options: Object.values(iconKitsCategories)
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: 'option-item icon-kits-wrapper'
    }, iconElements)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "modal-controls"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "modal-search"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["TextControl"], {
      placeholder: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Type to search icon', 'social-icons-widget-by-wpzoom'),
      value: this.state.modalSearch,
      onChange: this.searchTextControlHandler
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
      className: "modal-buttons"
    }, this.props.showDeleteBtn && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["Button"], {
      className: 'button-link-delete is-button',
      onClick: () => this.props.delete()
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Delete Icon', 'social-icons-widget-by-wpzoom')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["Button"], {
      isPrimary: true,
      onClick: () => this.props.save(this.state)
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Save', 'social-icons-widget-by-wpzoom')))));
  }

}

/* harmony default export */ __webpack_exports__["default"] = (SocialIconsModal);

/***/ }),

/***/ "./src/block/components/SortableArrows.js":
/*!************************************************!*\
  !*** ./src/block/components/SortableArrows.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);




const SortableArrows = props => {
  return props.isActive && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["ButtonGroup"], {
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('sortable-arrows')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Button"], {
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('arrow-btn'),
    isSmall: true,
    disabled: props.itemKey === 0,
    onClick: e => props.left(e, props.itemKey)
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Icon"], {
    icon: "arrow-left-alt2",
    label: "Move Left",
    size: 14,
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('arrow-icon')
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Button"], {
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('arrow-btn'),
    isSmall: true,
    disabled: props.itemKey === props.length - 1,
    onClick: e => props.right(e, props.itemKey)
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Icon"], {
    icon: "arrow-right-alt2",
    label: "Move Right",
    size: 14,
    className: classnames__WEBPACK_IMPORTED_MODULE_1___default()('arrow-icon')
  })));
};

/* harmony default export */ __webpack_exports__["default"] = (SortableArrows);

/***/ }),

/***/ "./src/block/editor.scss":
/*!*******************************!*\
  !*** ./src/block/editor.scss ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/block/hooks/use-insertion-point.js":
/*!************************************************!*\
  !*** ./src/block/hooks/use-insertion-point.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_a11y__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/a11y */ "@wordpress/a11y");
/* harmony import */ var _wordpress_a11y__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_a11y__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__);
/**
 * External dependencies
 */

/**
 * WordPress dependencies
 */





/**
 * @typedef WPInserterConfig
 * @property {string=}   rootClientId   If set, insertion will be into the
 *                                      block with this ID.
 * @property {number=}   insertionIndex If set, insertion will be into this
 *                                      explicit position.
 * @property {string=}   clientId       If set, insertion will be after the
 *                                      block with this ID.
 * @property {boolean=}  isAppender     Whether the inserter is an appender
 *                                      or not.
 * @property {Function=} onSelect       Called after insertion.
 */

/**
 * Returns the insertion point state given the inserter config.
 *
 * @param {WPInserterConfig} config Inserter Config.
 * @return {Array} Insertion Point State (onInsertBlocks and replaceIndex).
 */

function useInsertionPoint({
  rootClientId = '',
  insertionIndex,
  clientId,
  shouldFocusBlock = true
}) {
  const {
    sidebar,
    destinationRootClientId,
    destinationIndex
  } = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["useSelect"])(select => {
    const {
      getBlockIndex,
      getBlockOrder,
      getBlock
    } = select('core/block-editor');
    const _destinationRootClientId = rootClientId;

    let _destinationIndex;

    if (insertionIndex !== undefined) {
      // Insert into a specific index.
      _destinationIndex = insertionIndex;
    } else if (clientId) {
      // Insert after a specific client ID.
      _destinationIndex = getBlockIndex(clientId, _destinationRootClientId);
    } else if (_destinationRootClientId !== '') {
      // Insert in place of root client ID.
      _destinationIndex = getBlockIndex(rootClientId);
    } else {
      // Insert at the end of the list.
      _destinationIndex = getBlockOrder(_destinationRootClientId).length;
    }

    return {
      sidebar: getBlock(_destinationRootClientId),
      destinationRootClientId: _destinationRootClientId,
      destinationIndex: _destinationIndex
    };
  }, [rootClientId, insertionIndex, clientId]);
  const {
    replaceBlock
  } = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_1__["useDispatch"])('core/block-editor');
  const onReplaceBlock = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__["useCallback"])((blocks, meta, shouldForceFocusBlock = false) => {
    const {
      attributes: {
        name: sidebarName
      }
    } = sidebar;
    replaceBlock(clientId, blocks, destinationIndex, shouldFocusBlock || shouldForceFocusBlock ? 0 : null, meta);
    const message = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["sprintf"])( // translators: %d: the name of the block that has been added %s: sidebar name.
    Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["_n"])('%1$d group block added in the sidebar: %2$s.', '%1$d group blocks added in the sidebar: %2$s.', Object(lodash__WEBPACK_IMPORTED_MODULE_0__["castArray"])(blocks).length), Object(lodash__WEBPACK_IMPORTED_MODULE_0__["castArray"])(blocks).length, sidebarName);
    Object(_wordpress_a11y__WEBPACK_IMPORTED_MODULE_3__["speak"])(message);
  }, [replaceBlock, sidebar, clientId, destinationRootClientId, destinationIndex, shouldFocusBlock]);
  return [onReplaceBlock, destinationIndex];
}

/* harmony default export */ __webpack_exports__["default"] = (useInsertionPoint);

/***/ }),

/***/ "./src/block/legacy-widget-transform/transform-to-block.js":
/*!*****************************************************************!*\
  !*** ./src/block/legacy-widget-transform/transform-to-block.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/hooks */ "@wordpress/hooks");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/url */ "@wordpress/url");
/* harmony import */ var _wordpress_url__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_url__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _hooks_use_insertion_point__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../hooks/use-insertion-point */ "./src/block/hooks/use-insertion-point.js");


/**
 * External dependencies
 */


/**
 * WordPress dependencies
 */








/**
 * Internal dependencies
 */


const replacementData = {};

const TransformToBlock = ({
  clientId,
  attributes,
  widgetId
}) => {
  const [isConvertRun, setButtonClick] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(false);
  const {
    createInfoNotice,
    createWarningNotice,
    createSuccessNotice
  } = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__["useDispatch"])('core/notices'); // store client id and social icons block attributes.

  replacementData[widgetId] = {};
  replacementData[widgetId].clientId = clientId;
  replacementData[widgetId].attributes = attributes;

  const warningMessage = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Legacy Social Icons Widget has been detected on this page. Since our plugin includes a Social Icons Block, supported by WordPress 5.8, we highly recommend transforming legacy widgets to blocks. You can do that by clicking on the "Convert to block" button. You can also disable the new block-based widget screen by installing the Classic Widgets plugin.', 'social-icons-widget-by-wpzoom');

  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useEffect"])(() => {
    createWarningNotice(warningMessage, {
      id: 'wpzoom-social-icons-notice',
      isDismissible: true,
      actions: [{
        url: Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_8__["addQueryArgs"])('customize.php', {
          'autofocus[panel]': 'widgets',
          return: window.location.pathname
        }),
        label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Manage in Customizer', 'social-icons-widget-by-wpzoom')
      }, {
        url: Object(_wordpress_url__WEBPACK_IMPORTED_MODULE_8__["addQueryArgs"])('plugin-install.php', {
          s: 'classic%20widgets',
          tab: 'search',
          type: 'term'
        }),
        label: 'Install Classic Widgets'
      }, {
        label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Convert to block', 'social-icons-widget-by-wpzoom'),
        onClick: () => setButtonClick(!isConvertRun)
      }]
    });
  }, [createWarningNotice, isConvertRun]);
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useEffect"])(() => {
    if (isConvertRun) {
      createInfoNotice(Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Converting process is starting. Please wait…', 'social-icons-widget-by-wpzoom'), {
        type: 'snackbar',
        id: 'wpzoom-social-icons-notice'
      });
    }
  }, [isConvertRun, createInfoNotice]);
  Object(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_6__["addAction"])('converter.isConvertDone', 'wpzoom-blocks/social-icons/convert-legacy-widget', ({
    message
  }) => {
    createSuccessNotice(message, {
      type: 'snackbar',
      id: 'wpzoom-social-icons-notice'
    });
  });

  if (!clientId || !isConvertRun) {
    return null;
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ConvertToSocialIconsBlock, {
    replacementData: replacementData,
    isConvertRun: isConvertRun
  }));
};

function convertWidgetToBlock(clientData) {
  return new Promise(function (resolve) {
    let replaced = 0;
    Object(lodash__WEBPACK_IMPORTED_MODULE_1__["map"])(clientData, client => {
      const {
        clientId,
        attributes
      } = client;
      const {
        title: widgetTitle,
        description: widgetDescription,
        iconsAlignment: alignment
      } = attributes;
      const {
        rootClientId
      } = Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__["useSelect"])(select => {
        return {
          rootClientId: select('core/block-editor').getBlockRootClientId(clientId)
        };
      });
      const innerBlocks = [Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__["createBlock"])('core/heading', {
        content: widgetTitle,
        level: 3,
        placeholder: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Title', 'social-icons-widget-by-wpzoom'),
        className: 'zoom-social-icons-legacy-widget-title widget-title title heading-size-3'
      }), Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__["createBlock"])('core/paragraph', {
        content: widgetDescription,
        placeholder: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Text above icons', 'social-icons-widget-by-wpzoom'),
        className: classnames__WEBPACK_IMPORTED_MODULE_2___default()('zoom-social-icons-legacy-widget-description', {
          [`zoom-social-icons-list--align-${alignment}`]: alignment !== undefined && alignment !== 'none'
        })
      }), Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__["createBlock"])('wpzoom-blocks/social-icons', attributes)];
      const [onReplaceBlock] = Object(_hooks_use_insertion_point__WEBPACK_IMPORTED_MODULE_9__["default"])({
        rootClientId,
        clientId
      });
      const blocks = Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_4__["createBlock"])('core/group', {
        tagName: 'div',
        className: 'zoom-social-icons-widget zoom-social-icons-legacy-widget-group',
        layout: {
          inherit: true
        }
      }, innerBlocks);
      onReplaceBlock(blocks);
      replaced++;

      if (Object(lodash__WEBPACK_IMPORTED_MODULE_1__["size"])(clientData) === replaced) {
        const message = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["sprintf"])( // translators: %d: the number of the block that has been converted
        Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["_n"])('%d legacy widget "Social Icons" successfully converted to block', '%d legacy widgets "Social Icons" successfully converted to block', replaced, 'social-icons-widget-by-wpzoom'), replaced); // call resolve if the method succeeds

        resolve(message);
      }
    });
  });
}

const ConvertToSocialIconsBlock = ({
  replacementData: clientData,
  isConvertRun
}) => {
  const [isConvertDone, setConvertDone] = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["useState"])(false);
  const shouldReplaceBlock = isConvertRun && !isConvertDone;

  if (!shouldReplaceBlock) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Placeholder"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Spinner"], null));
  }

  convertWidgetToBlock(clientData).then(message => {
    // Set state convert done
    setConvertDone(true); // Call action after convert isDone

    Object(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_6__["doAction"])('converter.isConvertDone', {
      message
    });
  });
  return null;
};

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["memo"])(TransformToBlock));

/***/ }),

/***/ "./src/block/legacy-widget-transform/widget-attributes-transform.js":
/*!**************************************************************************!*\
  !*** ./src/block/legacy-widget-transform/widget-attributes-transform.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);

/**
 * WordPress dependencies
 */



function convertIconProps(props) {
  return {
    url: props.url,
    icon: props.icon,
    iconKit: props.icon_kit,
    color: props.color_picker,
    hoverColor: props.color_picker_hover,
    label: props.label,
    showPopover: false,
    isActive: false
  };
}
/**
 * Set global transforms that every block uses.
 *
 * @param {Object} props The passed props.
 * @return {Object} The transforms.
 */


function widgetAttributesTransform(props) {
  const blockType = Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["getBlockTypes"])().filter(block => {
    return block.name.indexOf('wpzoom-blocks/social-icons') !== -1;
  })[0];
  const {
    attributes: defaultAttributes
  } = blockType;
  const defaults = Object(lodash__WEBPACK_IMPORTED_MODULE_0__["mapValues"])(defaultAttributes, attr => {
    return attr.default;
  });
  const converted = {
    wasStyled: true,
    canvasType: props.icon_style,
    showIconsLabel: props.show_icon_labels === 'true',
    openLinkInNewTab: props.open_new_tab === 'true',
    nofollow: props.no_follow === 'true',
    noreferrer: props.no_referrer === 'true',
    noopener: props.no_opener === 'true',
    iconsAlignment: props.icon_alignment,
    iconsColor: props.global_color_picker,
    iconsHoverColor: props.global_color_picker_hover,
    iconsLabelHoverColor: 'inherit',
    iconsFontSize: props.icon_font_size,
    iconsPaddingVertical: props.icon_padding_size,
    iconsPaddingHorizontal: props.icon_padding_size,
    iconsBackgroundStyle: props.icon_canvas_style || 'round',
    selectedIcons: props.fields.map(item => {
      return convertIconProps(item);
    }),
    title: props.title,
    description: props.description
  };
  const transforms = Object(lodash__WEBPACK_IMPORTED_MODULE_0__["assign"])(defaults, converted); // Icons border radius.

  if (transforms.iconsBackgroundStyle === 'rounded') {
    transforms.iconsBorderRadius = 3;
  } else if (transforms.iconsBackgroundStyle === 'round') {
    transforms.iconsBorderRadius = 50;
  } else {
    transforms.iconsBorderRadius = 0;
  }
  /**
   * Add className depending on selected style.
   */


  if (transforms.canvasType === 'without-canvas') {
    transforms.className = `is-style-${transforms.canvasType}`;
  } else if (transforms.canvasType === 'with-canvas') {
    transforms.className = 'is-style-with-canvas-round';
  }
  /**
   * Re-register block styles to set the style given from props.
   */


  const blockStyles = [{
    name: 'without-canvas',
    label: 'Color Icon / No Background',
    isDefault: transforms.canvasType === 'without-canvas'
  }, {
    name: 'with-canvas-round',
    label: 'Color Background / Round White Icon',
    isDefault: transforms.canvasType === 'with-canvas'
  }];

  for (let i = 0; i < blockStyles.length; i++) {
    const blockStyle = blockStyles[i];
    Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["unregisterBlockStyle"])('wpzoom-blocks/social-icons', blockStyle.name);
    Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockStyle"])('wpzoom-blocks/social-icons', blockStyle);
  }

  return transforms;
}

/* harmony default export */ __webpack_exports__["default"] = (widgetAttributesTransform);

/***/ }),

/***/ "./src/block/previewImage.js":
/*!***********************************!*\
  !*** ./src/block/previewImage.js ***!
  \***********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ('data:image/png;base64,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');

/***/ }),

/***/ "./src/block/utils/helper.js":
/*!***********************************!*\
  !*** ./src/block/utils/helper.js ***!
  \***********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var urijs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! urijs */ "./node_modules/urijs/src/URI.js");
/* harmony import */ var urijs__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(urijs__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/token-list */ "@wordpress/token-list");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__);
/* global wpzSocialIconsBlock */


const {
  icons
} = wpzSocialIconsBlock;


class Helper {
  static filterIcons(searchIcon) {
    const collector = {};

    if (searchIcon === '') {
      return icons;
    } // Special case for WordPress - add both dashicons and genericon variants


    if (searchIcon.toLowerCase() === 'wordpress') {
      const wordpressCollector = {}; // Look for wordpress icons in different icon sets

      Object(lodash__WEBPACK_IMPORTED_MODULE_1__["forEach"])(icons, (iconsArray, key) => {
        wordpressCollector[key] = iconsArray.filter(item => {
          if (Object(lodash__WEBPACK_IMPORTED_MODULE_1__["isObject"])(item)) {
            return item.icon === 'wordpress' || item.icon === 'wordpress-alt';
          }

          return item === 'wordpress' || item === 'wordpress-alt';
        });
      });
      return wordpressCollector;
    }

    Object(lodash__WEBPACK_IMPORTED_MODULE_1__["forEach"])(icons, (iconsArray, key) => {
      collector[key] = iconsArray.filter(item => {
        if (Object(lodash__WEBPACK_IMPORTED_MODULE_1__["isObject"])(item)) {
          return item.icon.indexOf(searchIcon) > -1; // && category;
        }

        return item.indexOf(searchIcon) > -1;
      });
    });
    return collector;
  }

  static filterUrlScheme(url) {
    const schemas = {
      mailto: 'mail',
      viber: 'viber',
      skype: 'skype',
      tg: 'tg',
      tel: 'mobile',
      sms: 'comments',
      fax: 'fax',
      news: 'newspaper-o',
      feed: 'rss'
    };
    const domains = {
      'feedburner.google.com': 'rss',
      'ok.ru': 'odnoklassniki',
      'yt.com': 'youtube',
      'fb.com': 'facebook',
      't.me': 'telegram',
      'm.me': 'messenger',
      'wa.me': 'whatsapp',
      'zen.yandex.com': 'zen-yandex',
      'zen.yandex.ru': 'zen-yandex',
      'bsky.app': 'bluesky',
      'wordpress.org': 'wordpress',
      'wordpress.com': 'wordpress'
    }; // Common domain name mappings

    const commonDomains = {
      'wordpress': 'wordpress',
      'twitter': 'twitter',
      'x': 'x',
      'facebook': 'facebook',
      'instagram': 'instagram',
      'linkedin': 'linkedin',
      'youtube': 'youtube',
      'pinterest': 'pinterest',
      'github': 'github',
      'spotify': 'spotify',
      'tiktok': 'tiktok'
    };
    const uri = new urijs__WEBPACK_IMPORTED_MODULE_0___default.a(url); // First check if the full hostname is in our domains list

    const fullHostname = uri.hostname();

    if (domains[fullHostname]) {
      return domains[fullHostname];
    } // Then try to extract the domain name without TLD


    let domainParts = fullHostname ? fullHostname.split('.') : [];
    let domain = '';

    if (domainParts.length >= 2) {
      // Check for subdomains like shop.example.com
      // First try the subdomain
      domain = domainParts[0];
      let mainDomain = domainParts[domainParts.length - 2]; // Get the main domain name
      // Check if the subdomain or main domain is in our common domains list

      if (commonDomains[domain]) {
        return commonDomains[domain];
      }

      if (commonDomains[mainDomain]) {
        return commonDomains[mainDomain];
      }
    } // Fall back to the first part of the domain or the scheme


    domain = uri.domain() !== undefined ? uri.domain().split('.').shift() : uri.scheme();
    const schemaHasIcon = Object(lodash__WEBPACK_IMPORTED_MODULE_1__["findKey"])(schemas, (val, key) => {
      return key === uri.scheme();
    });
    domain = schemaHasIcon !== undefined ? schemas[schemaHasIcon] : domain;
    const domainHasIcon = Object(lodash__WEBPACK_IMPORTED_MODULE_1__["findKey"])(domains, (val, key) => {
      return key === uri.hostname();
    });
    return domainHasIcon !== undefined ? domains[domainHasIcon] : domain;
  }

  static hyphensToSpaces(s) {
    return s.replace(/-/g, ' ');
  }

  static capitalize(s) {
    if (typeof s !== 'string') {
      return '';
    }

    return s.charAt(0).toUpperCase() + s.slice(1);
  }

  static humanizeIconLabel(s) {
    return this.hyphensToSpaces(this.capitalize(s));
  }

  static getBlockStyle(className) {
    const regex = /is-style-(\S*)/g;
    const m = regex.exec(className);
    return m !== null ? m[1] : null;
  }

  static getIconClassList(iconKit, icon) {
    const classes = {
      'social-icon': true
    };
    classes[iconKit] = true;

    if (['fab', 'fas', 'far'].includes(iconKit)) {
      classes['fa-' + icon] = true;
    } else {
      classes[iconKit + '-' + icon] = true;
    }

    return classes;
  }

  static addPercentagePipe(value) {
    return `${value}%`;
  }

  static addPercentageHalfPipe(value) {
    return `${0.5 * value}%/${value}%`;
  }

  static addPixelsPipe(value) {
    return `${value}px`;
  }

  static arrayMoveMutate(array, from, to) {
    array.splice(to < 0 ? array.length + to : to, 0, array.splice(from, 1)[0]);
  }

  static arrayMove(array, from, to) {
    array = array.slice();
    this.arrayMoveMutate(array, from, to);
    return array;
  }

  static getActiveStyle(styles, className) {
    for (const style of new _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default.a(className).values()) {
      if (style.indexOf('is-style-') === -1) {
        continue;
      }

      const potentialStyleName = style.substring(9);
      const activeStyle = Object(lodash__WEBPACK_IMPORTED_MODULE_1__["find"])(styles, {
        name: potentialStyleName
      });

      if (activeStyle) {
        return activeStyle;
      }
    }

    return Object(lodash__WEBPACK_IMPORTED_MODULE_1__["find"])(styles, ['isDefault', true]);
  }

}

/* harmony default export */ __webpack_exports__["default"] = (Helper);

/***/ }),

/***/ "./src/block/wpzoomCategoryIcon.js":
/*!*****************************************!*\
  !*** ./src/block/wpzoomCategoryIcon.js ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

/* harmony default export */ __webpack_exports__["default"] = (Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["SVG"], {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 64 1024 1024"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__["Path"], {
  fill: "#08618a",
  transform: "scale(1,-1) translate(0,-1024)",
  d: "M581.456 542.931h-31.41v-102.1c6.669-0.4 12.537-0.867 31.877-0.867 35.745 0 57.085 21.207 57.085 54.018 0 29.009-23.541 48.949-57.552 48.949zM512.033 956.666c-280.958 0-508.699-227.741-508.699-508.699s227.741-508.699 508.699-508.699 508.699 227.741 508.699 508.699-227.807 508.699-508.699 508.699zM450.013 542.931h-32.010l-74.358-240.078h-26.475l-73.957 170.189-74.358-170.189h-26.475l-75.625 240.078h-30.21v40.013h120.039v-40.013h-38.146l44.948-146.448 68.489 159.785h25.208l68.489-159.785 42.014 146.448h-37.612v40.013h120.039v-40.013zM577.721 398.417c-13.004 0-21.007 0-27.676 0.4v-49.283h33.344v-40.013h-113.37v40.013h33.344v193.396h-33.344v40.013h113.97c59.219 0 104.234-33.878 104.234-90.163-0.067-63.487-45.415-94.364-110.503-94.364zM925.101 309.522h-213.003l-4.201 25.342 202.066 208.068h-105.901l-10.537-46.682h-43.281l20.14 86.695h206.734l4.201-25.342-202.066-208.068h112.17l10.537 46.682h43.281l-20.14-86.695z"
})));

/***/ }),

/***/ "./src/blocks.js":
/*!***********************!*\
  !*** ./src/blocks.js ***!
  \***********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _block_block_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./block/block.js */ "./src/block/block.js");
/* harmony import */ var _block_wpzoomCategoryIcon__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./block/wpzoomCategoryIcon */ "./src/block/wpzoomCategoryIcon.js");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__);
/**
 * Gutenberg Blocks
 *
 * All blocks related JavaScript files should be imported here.
 * You can create a new block folder in this dir and include code
 * for that block here as well.
 *
 * All blocks should be included here since this is the file that
 * Webpack is compiling as the input file.
 */




(function () {
  Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["updateCategory"])('wpzoom-blocks', {
    icon: _block_wpzoomCategoryIcon__WEBPACK_IMPORTED_MODULE_1__["default"]
  });
})();

/***/ }),

/***/ "@wordpress/a11y":
/*!******************************!*\
  !*** external ["wp","a11y"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["a11y"]; }());

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blockEditor"]; }());

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["blocks"]; }());

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/compose":
/*!*********************************!*\
  !*** external ["wp","compose"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["compose"]; }());

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["data"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/hooks":
/*!*******************************!*\
  !*** external ["wp","hooks"] ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["hooks"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["i18n"]; }());

/***/ }),

/***/ "@wordpress/primitives":
/*!************************************!*\
  !*** external ["wp","primitives"] ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["primitives"]; }());

/***/ }),

/***/ "@wordpress/token-list":
/*!***********************************!*\
  !*** external ["wp","tokenList"] ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["tokenList"]; }());

/***/ }),

/***/ "@wordpress/url":
/*!*****************************!*\
  !*** external ["wp","url"] ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["url"]; }());

/***/ }),

/***/ "lodash":
/*!*************************!*\
  !*** external "lodash" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["lodash"]; }());

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["React"]; }());

/***/ })

/******/ });
//# sourceMappingURL=wpzoom-social-icons.js.map