@extends('layouts.app')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Fuel Avaialbilty</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        {{-- <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Fuel Availabilty</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                {{-- <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                            <form id="payment-form" data-parsley-validate="" class="form-horizontal form-label-left"
                                novalidate="" action="/make-payment" method="POST">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="user_name">District
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="user_name" name="user_name" required="required"
                                            class="form-control">
                                    </div>
                                    @error('user_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Station<span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select name="" id="" class="form-control">
                                            <option value="">District 1</option>
                                            <option value="">District 1</option>
                                            <option value="">District 1</option>
                                        </select>
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                &nbsp;
                                <div class="ln_solid"></div>
                                <div class="item form-group text-center">
                                    <div class="x_panel tile fixed_height_320 overflow_hidden">
                                        <div class="x_title">
                                            <h2>Device Usage</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                        role="button" aria-expanded="false"><i
                                                            class="fa fa-wrench"></i></a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Settings 1</a>
                                                        <a class="dropdown-item" href="#">Settings 2</a>
                                                    </div>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <table class="" style="width:100%">
                                                <tbody>
                                                    {{-- <tr>
                                                        <th style="width:37%;">
                                                            <p>Top 5</p>
                                                        </th>
                                                        <th>
                                                            <div class="col-lg-7 col-md-7 col-sm-7 ">
                                                                <p class="">Device</p>
                                                            </div>
                                                            <div class="col-lg-5 col-md-5 col-sm-5 ">
                                                                <p class="">Progress</p>
                                                            </div>
                                                        </th>
                                                    </tr> --}}
                                                    <tr>
                                                        <td>
                                                            <iframe class="chartjs-hidden-iframe"
                                                                style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                                                            <canvas class="canvasDoughnut" id="fuel-availablity-chart"
                                                                height="250" width="250"
                                                                style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;"></canvas>
                                                        </td>
                                                        <td>
                                                            <table class="tile_info">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p><i class="fa fa-square blue"></i>Used </p>
                                                                        </td>
                                                                        <td>30%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <p><i class="fa fa-square green"></i>Avaialble
                                                                            </p>
                                                                        </td>
                                                                        <td>10%</td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div> --}}
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // if ($('#canvasDoughnut').length) {

        //     var ctx = document.getElementById("canvasDoughnut");
        //     var data = {
        //         labels: [
        //             "Dark Grey",
        //             "Purple Color",
        //             "Gray Color",
        //             "Green Color",
        //             "Blue Color"
        //         ],
        //         datasets: [{
        //             data: [120, 50, 140, 180, 100],
        //             backgroundColor: [
        //                 "#455C73",
        //                 "#9B59B6",
        //                 "#BDC3C7",
        //                 "#26B99A",
        //                 "#3498DB"
        //             ],
        //             hoverBackgroundColor: [
        //                 "#34495E",
        //                 "#B370CF",
        //                 "#CFD4D8",
        //                 "#36CAAB",
        //                 "#49A9EA"
        //             ]

        //         }]
        //     };

        //     var canvasDoughnut = new Chart(ctx, {
        //         type: 'doughnut',
        //         tooltipFillColor: "rgba(51, 51, 51, 0.55)",
        //         data: data
        //     });

        // }

        function init_chart_doughnut() {

            if (typeof(Chart) === 'undefined') {
                return;
            }

            console.log('init_chart_doughsssnut');

            if ($('#fuel-availablity-chart').length) {

                var chart_doughnut_settings = {
                    type: 'doughnut',
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                    data: {
                        labels: [
                            "Symbian",
                            "Blackberry",

                        ],
                        datasets: [{
                            data: [28, 72],
                            backgroundColor: [
                                "#BDC3C7",
                                "#9B59B6",

                            ],
                            hoverBackgroundColor: [
                                "#CFD4D8",
                                "#B370CF",

                            ]
                        }]
                    },
                    options: {
                        legend: false,
                        responsive: false
                    }
                }

                $('#fuel-availablity-chart').each(function() {

                    var chart_element = $(this);
                    var chart_doughnut = new Chart(chart_element, chart_doughnut_settings);

                });

            }

        }
        $(document).ready(function() {
            // console.log('[in]');
            init_chart_doughnut();



        });
    </script>
@endsection
