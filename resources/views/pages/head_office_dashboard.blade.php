@extends('layouts.app')

@section('custom_css')
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
@endsection

@section('custom_js')
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('vendors/echarts/dist/echarts.min.js') }}"></script>
    <script src="{{ asset('vendors/echarts/map/js/world.js') }}"></script>
@endsection

@section('content')
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" style="display: inline-block; width: 100%;">
            <div class="tile_count" >
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Stations</span>
                    <div class="count">51</div>
                    {{-- <span class="count_bottom"><i class="green">4% </i> From last Month</span> --}}
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-database"></i> Fuel Stock</span>
                    <div class="count">5700L</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-desc"></i> </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-fire"></i> Next Stock</span>
                    <div class="count green">7000L</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-calendar-o"></i>Mar</i> 8 2023</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-usd"></i> Total Sales</span>
                    <div class="count">12800L </div>
                    <span class="count_bottom"> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-qrcode"></i> Total Requests</span>
                    <div class="count">27</div>
                    <span class="count_bottom"> This Month</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-qrcode"></i> Pending Requests</span>
                    <div class="count">2</div>
                    <span class="count_bottom"><i class="green"> From Today</span>
                </div>
            </div>
        </div>
        <!-- /top tiles -->
        <div class="row">
            <div class="col-md-8 col-sm-1">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Remaing Fuel</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="echart_gauge" style="height:250px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-1">
                <div class="x_panel" style="height:100%">
                    <div class="x_title">
                        <h2>Fuel Reqeusts</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <ul class="list-unstyled msg_list">
                            @foreach ($fuel_requests as $fuel_request)
                                <li class="text-secondary">
                                    <a>
                                        <span class="image text-primary"><i class="fa fa-bell"></i></span>
                                        <span>Delivery Status: {{ $fuel_request->status }}</span>
                                        <span class="time">{{ $fuel_request->expected_time }}</span>
                                        </span>
                                        <span class="message text-secondary">
                                          <span class="font-weight-bold">{{$fuel_request->station->station_name}}-{{ $fuel_request->station->location->name }}</span>  Expects <b>{{ $fuel_request->fuel_qty }}</b> Liters on {{ $fuel_request->requested_date }}.
                                        </span>
                                    </a>
                                </li>
                            @endforeach

                        </ul>

                        {{-- <div class="tile_count" style="height: 250px; color: #00000080; margin:0%">
                    <div class="tile_stats_count" style="margin: 40px">
                        <span class="count_top"><i class="fa fa-qrcode"></i> Total Token</span>
                        <div class="count">251</div>
                        <span class="count_bottom"> From Today</span>
                    </div>
                  </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-2">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Fuel Delivery Graph</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            {{-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                  </li> --}}
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div id="mainb" style="height:250px;"></div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-2">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Fuel Supply Graph</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <span">This Week Status</span>
                                {{-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> --}}
                                </li>
                                {{-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li> --}}
                                {{-- <li><a class="close-link"><i class="fa fa-close"></i></a> --}}
                                </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div id="echart_pie" style="height:250px;"></div>

                    </div>
                </div>
            </div>

        </div>
        <br />



    </div>

    <script>
        $(document).ready(function() {
            var theme = {
                color: [
                    '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
                    '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
                ],

                title: {
                    itemGap: 8,
                    textStyle: {
                        fontWeight: 'normal',
                        color: '#408829'
                    }
                },

                dataRange: {
                    color: ['#1f610a', '#97b58d']
                },

                toolbox: {
                    color: ['#408829', '#408829', '#408829', '#408829']
                },

                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.5)',
                    axisPointer: {
                        type: 'line',
                        lineStyle: {
                            color: '#408829',
                            type: 'dashed'
                        },
                        crossStyle: {
                            color: '#408829'
                        },
                        shadowStyle: {
                            color: 'rgba(200,200,200,0.3)'
                        }
                    }
                },

                dataZoom: {
                    dataBackgroundColor: '#eee',
                    fillerColor: 'rgba(64,136,41,0.2)',
                    handleColor: '#408829'
                },
                grid: {
                    borderWidth: 0
                },

                categoryAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#408829'
                        }
                    },
                    splitLine: {
                        lineStyle: {
                            color: ['#eee']
                        }
                    }
                },

                valueAxis: {
                    axisLine: {
                        lineStyle: {
                            color: '#408829'
                        }
                    },
                    splitArea: {
                        show: true,
                        areaStyle: {
                            color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                        }
                    },
                    splitLine: {
                        lineStyle: {
                            color: ['#eee']
                        }
                    }
                },
                timeline: {
                    lineStyle: {
                        color: '#408829'
                    },
                    controlStyle: {
                        normal: {
                            color: '#408829'
                        },
                        emphasis: {
                            color: '#408829'
                        }
                    }
                },

                k: {
                    itemStyle: {
                        normal: {
                            color: '#68a54a',
                            color0: '#a9cba2',
                            lineStyle: {
                                width: 1,
                                color: '#408829',
                                color0: '#86b379'
                            }
                        }
                    }
                },
                map: {
                    itemStyle: {
                        normal: {
                            areaStyle: {
                                color: '#ddd'
                            },
                            label: {
                                textStyle: {
                                    color: '#c12e34'
                                }
                            }
                        },
                        emphasis: {
                            areaStyle: {
                                color: '#99d2dd'
                            },
                            label: {
                                textStyle: {
                                    color: '#c12e34'
                                }
                            }
                        }
                    }
                },
                force: {
                    itemStyle: {
                        normal: {
                            linkStyle: {
                                strokeColor: '#408829'
                            }
                        }
                    }
                },
                chord: {
                    padding: 4,
                    itemStyle: {
                        normal: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            },
                            chordStyle: {
                                lineStyle: {
                                    width: 1,
                                    color: 'rgba(128, 128, 128, 0.5)'
                                }
                            }
                        },
                        emphasis: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            },
                            chordStyle: {
                                lineStyle: {
                                    width: 1,
                                    color: 'rgba(128, 128, 128, 0.5)'
                                }
                            }
                        }
                    }
                },
                gauge: {
                    startAngle: 225,
                    endAngle: -45,
                    axisLine: {
                        show: true,
                        lineStyle: {
                            color: [
                                [0.2, '#86b379'],
                                [0.8, '#68a54a'],
                                [1, '#408829']
                            ],
                            width: 8
                        }
                    },
                    axisTick: {
                        splitNumber: 10,
                        length: 12,
                        lineStyle: {
                            color: 'auto'
                        }
                    },
                    axisLabel: {
                        textStyle: {
                            color: 'auto'
                        }
                    },
                    splitLine: {
                        length: 18,
                        lineStyle: {
                            color: 'auto'
                        }
                    },
                    pointer: {
                        length: '90%',
                        color: 'auto'
                    },
                    title: {
                        textStyle: {
                            color: '#333'
                        }
                    },
                    detail: {
                        textStyle: {
                            color: 'auto'
                        }
                    }
                },
                textStyle: {
                    fontFamily: 'Arial, Verdana, sans-serif'
                }
            };
            if ($('#echart_pie').length) {
                console.log('in');
                var echartPie = echarts.init(document.getElementById('echart_pie'), theme);

                echartPie.setOption({
                    tooltip: {
                        trigger: 'item',
                        formatter: "{a} <br/>{b} : {c} ({d}%)"
                    },
                    legend: {
                        x: 'center',
                        y: 'bottom',
                        data: ['Fuel Supply', 'Fuel Request']
                    },
                    toolbox: {
                        show: true,
                        feature: {
                            magicType: {
                                show: true,
                                type: ['pie', 'funnel'],
                                option: {
                                    funnel: {
                                        x: '25%',
                                        width: '50%',
                                        funnelAlign: 'left',
                                        max: 1548
                                    }
                                }
                            },
                            restore: {
                                show: true,
                                title: "Restore"
                            },
                            saveAsImage: {
                                show: true,
                                title: "Save Image"
                            }
                        }
                    },
                    calculable: true,
                    series: [{
                        name: 'Fuel',
                        type: 'pie',
                        radius: '55%',
                        center: ['50%', '48%'],
                        data: [{
                                value: 310,
                                name: 'Fuel Supply'
                            },
                            {
                                value: 850,
                                name: 'Fuel Request'
                            }
                        ]
                    }]
                });

                var dataStyle = {
                    normal: {
                        label: {
                            show: false
                        },
                        labelLine: {
                            show: false
                        }
                    }
                };

                var placeHolderStyle = {
                    normal: {
                        color: 'rgba(0,0,0,0)',
                        label: {
                            show: false
                        },
                        labelLine: {
                            show: false
                        }
                    },
                    emphasis: {
                        color: 'rgba(0,0,0,0)'
                    }
                };

            }

            //fuel delivery bar


            if ($('#mainb').length) {

                var echartBar = echarts.init(document.getElementById('mainb'), theme);

                echartBar.setOption({
                    title: {
                        text: 'Fuel Request-Supply Gaph',
                        subtext: 'yearly stats'
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data: ['sales', 'purchases']
                    },
                    toolbox: {
                        show: false
                    },
                    calculable: false,
                    xAxis: [{
                        type: 'category',
                        data: ['jan', '2?', 'march', '4?', 'may', '6?', 'july', '8?', 'sep', '10?',
                            'nov', '12?'
                        ]
                    }],
                    yAxis: [{
                        type: 'value'
                    }],
                    series: [{
                        name: 'fuel-request',
                        type: 'bar',
                        data: [8000, 6300, 7000, 8540, 6000, 6584, 7845, 4587, 6014, 4812, 4698,
                            8000
                        ],
                        markPoint: {
                            data: [{
                                type: 'max',
                                name: '???'
                            }, {
                                type: 'min',
                                name: '???'
                            }]
                        },
                        markLine: {
                            data: [{
                                type: 'average',
                                name: '???'
                            }]
                        }
                    }, {
                        name: 'delivered',
                        type: 'bar',
                        data: [6000, 4700, 3900, 5000, 5200, 8000, 7300, 3000, 6475, 4215, 6255,
                            7845
                        ],
                        // markPoint: {
                        //     data: [{
                        //         name: 'sales',
                        //         value: 182.2,
                        //         xAxis: 7,
                        //         yAxis: 183,
                        //     }, {
                        //         name: 'purchases',
                        //         value: 2.3,
                        //         xAxis: 11,
                        //         yAxis: 3
                        //     }]
                        // },
                        markLine: {
                            data: [{
                                type: 'average',
                                name: '???'
                            }]
                        }
                    }]
                });

            }

            if ($('#echart_gauge').length) {

                var echartGauge = echarts.init(document.getElementById('echart_gauge'), theme);

                echartGauge.setOption({
                    tooltip: {
                        formatter: "{a} <br/>{b} : {c}%"
                    },
                    toolbox: {
                        show: true,
                        feature: {
                            restore: {
                                show: true,
                                title: "Restore"
                            },
                            saveAsImage: {
                                show: true,
                                title: "Save Image"
                            }
                        }
                    },
                    series: [{
                        name: 'Fuel',
                        type: 'gauge',
                        center: ['50%', '50%'],
                        startAngle: 140,
                        endAngle: -140,
                        min: 0,
                        max: 100,
                        precision: 0,
                        splitNumber: 10,
                        axisLine: {
                            show: true,
                            lineStyle: {
                                color: [
                                    [0.2, 'lightgreen'],
                                    [0.4, 'orange'],
                                    [0.8, 'skyblue'],
                                    [1, '#ff4500']
                                ],
                                width: 30
                            }
                        },
                        axisTick: {
                            show: true,
                            splitNumber: 5,
                            length: 8,
                            lineStyle: {
                                color: '#eee',
                                width: 1,
                                type: 'solid'
                            }
                        },
                        axisLabel: {
                            show: true,
                            formatter: function(v) {
                                switch (v + '') {
                                    case '10':
                                        return '30000 L';
                                    case '30':
                                        return '20000 L';
                                    case '60':
                                        return '10000 L';
                                    case '90':
                                        return '5000 L';
                                    default:
                                        return '';
                                }
                            },
                            textStyle: {
                                color: '#333'
                            }
                        },
                        splitLine: {
                            show: true,
                            length: 30,
                            lineStyle: {
                                color: '#eee',
                                width: 2,
                                type: 'solid'
                            }
                        },
                        pointer: {
                            length: '80%',
                            width: 8,
                            color: 'auto'
                        },
                        title: {
                            show: true,
                            offsetCenter: ['-65%', -10],
                            textStyle: {
                                color: '#333',
                                fontSize: 15
                            }
                        },
                        detail: {
                            show: true,
                            backgroundColor: 'rgba(0,0,0,0)',
                            borderWidth: 0,
                            borderColor: '#ccc',
                            width: 100,
                            height: 40,
                            offsetCenter: ['-60%', 10],
                            formatter: '{value}%',
                            textStyle: {
                                color: 'auto',
                                fontSize: 30
                            }
                        },
                        data: [{
                            value: 80,
                            name: 'Used Fuel'
                        }]
                    }]
                });

            }
        })
    </script>
@endsection
