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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Part of dashboard project.
 *
 * @copyright  Copyright (C) 2018 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */



window.NewChart = window.NewChart || {

    /**
     * Init
     *
     * @param selector
     * @param option
     */
    init: function init(selector, option) {
        this.selector = selector;
        this.element = $(selector);
        this.option = option;

        this.bindEvents();
    },

    /**
     * BindEvents
     */
    bindEvents: function bindEvents() {},

    /**
     * line
     *
     * @param element
     * @param label
     * @param data
     * @param title
     * @param x_label
     * @param y_label
     */
    line: function line(element, label, data, title, x_label, y_label) {
        new Chart(element, {
            type: 'line',
            data: {
                labels: label,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointBorderColor: 'rgba(60,141,188,1)',
                    pointBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(60,141,188,1)',
                    data: data,
                    datalabels: {
                        align: 'top',
                        anchor: 'top'
                    }
                }]
            },
            options: {
                title: {
                    display: true,
                    padding: 20,
                    responsive: true,
                    text: title
                },
                legend: {
                    display: false
                },
                tooltips: {
                    "enabled": false
                },
                scales: {
                    xAxes: [{
                        position: "bottom",
                        scaleLabel: {
                            display: true,
                            labelString: x_label
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            padding: 10
                        }
                    }],
                    yAxes: [{
                        position: "left",
                        scaleLabel: {
                            display: true,
                            labelString: y_label
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            padding: 10,
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    },

    /**
     * bar
     *
     * @param element
     * @param label
     * @param data
     * @param title
     * @param x_label
     * @param y_label
     */
    bar: function bar(element, label, data, title, x_label, y_label) {
        new Chart(element, {
            type: 'bar',
            data: {
                labels: label,
                datasets: [{
                    data: data,
                    backgroundColor: 'rgba(60,141,188,0.8)',
                    datalabels: {
                        align: 'top',
                        anchor: 'top'
                    }
                }]
            },
            options: {
                title: {
                    display: true,
                    padding: 20,
                    responsive: true,
                    text: title
                },
                legend: {
                    display: false
                },
                tooltips: {
                    "enabled": false
                },
                scales: {
                    xAxes: [{
                        position: "bottom",
                        scaleLabel: {
                            display: true,
                            labelString: x_label
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            padding: 10
                        },
                        barThickness: 50
                    }],
                    yAxes: [{
                        position: "left",
                        scaleLabel: {
                            display: true,
                            labelString: y_label
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            padding: 10,
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
};

/***/ })

/******/ });