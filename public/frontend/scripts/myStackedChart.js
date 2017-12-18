'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var myStackedChart = function () {
    function myStackedChart(ctx, data, labels) {
        _classCallCheck(this, myStackedChart);

        this.instance = new Chart(ctx, {
            type: 'line',
            data: {
                xLabels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: '#FF9700',
                    borderWidth: 0,
                    borderColor: 'transparent',
                    pointRadius: 0
                }]
            },
            options: {
                tooltips: {
                    enabled: false
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        stacked: true,
                        gridLines: {
                            color: "#ebebeb",
                            drawBorder: false,
                            zeroLineColor: 'transparent'
                        },
                        ticks: {
                            fontFamily: "PT Sans",
                            fontColor: '#ccced1',
                            fontSize: 14,
                            maxTicksLimit: 5,
                            maxRotation: 0,
                            callback: function callback(value, index, values) {
                                if (value >= 1000) {
                                    if (value >= 1000000) return value / 1000000 + 'M';else {
                                        return value / 1000 + 'K';
                                    }
                                } else return value;
                            }
                        }
                    }],
                    xAxes: [{

                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            fontFamily: "PT Sans",
                            fontColor: '#ccced1',
                            fontSize: 14,
                            maxRotation: 0
                        }
                    }]
                }
            }
        });
    }

    _createClass(myStackedChart, [{
        key: 'update',
        value: function update(data, labels) {
            this.instance.data.datasets.forEach(function (dataset) {
                dataset.data = data;
            });
            this.instance.data.xLabels = labels;

            this.instance.update();
        }
    }]);

    return myStackedChart;
}();