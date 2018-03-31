/**
 * Part of dashboard project.
 *
 * @copyright  Copyright (C) 2018 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

"use strict";

window.NewChart = window.NewChart || {

    /**
     * Init
     *
     * @param selector
     * @param option
     */
    init: function (selector, option) {
        this.selector = selector;
        this.element = $(selector);
        this.option = option;

        this.bindEvents();
    },

    /**
     * BindEvents
     */
    bindEvents: function () {
    },

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
    line: function (element, label, data, title, x_label, y_label) {
        new Chart(element, {
            type: 'line',
            data: {
                labels: label,
                datasets: [
                    {
                        fill: false,
                        lineTension: 0,
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointBorderColor: 'rgba(60,141,188,1)',
                        pointBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(60,141,188,1)',
                        data: data,
                        datalabels: {
                            align: 'top',
                            anchor: 'top',
                        }
                    }
                ]
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
                            labelString: x_label,
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
                            labelString: y_label,
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            padding: 10,
                            beginAtZero: true
                        }
                    }],
                },
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
    bar: function (element, label, data, title, x_label, y_label) {
         new Chart(element, {
            type: 'bar',
            data: {
                labels: label,
                datasets: [{
                    data: data,
                    backgroundColor: 'rgba(60,141,188,0.8)',
                    datalabels: {
                        align: 'top',
                        anchor: 'top',
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
                            labelString: x_label,
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            padding: 10,
                        },
                        barThickness: 50
                    }],
                    yAxes: [{
                        position: "left",
                        scaleLabel: {
                            display: true,
                            labelString: y_label,
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            padding: 10,
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
    }
};
