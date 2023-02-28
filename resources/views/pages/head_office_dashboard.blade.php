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
        <div class="row" style="display: inline-block;">
            <div class="tile_count">
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Registered Users</span>
                    <div class="count">350</div>
                    <span class="count_bottom"><i class="green">4% </i> From last Month</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-database"></i> Fuel Stock</span>
                    <div class="count">123.50L</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-desc"></i> </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-fire"></i> Next Stock</span>
                    <div class="count green">1200L</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-calendar-o"></i>Feb</i> 08 2023</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-usd"></i> Total Sales</span>
                    <div class="count">78,000/=</div>
                    <span class="count_bottom"> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-qrcode"></i> Total Token</span>
                    <div class="count">251</div>
                    <span class="count_bottom"> From Today</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-qrcode"></i> Pending Tokens</span>
                    <div class="count">73</div>
                    <span class="count_bottom"><i class="green"> From Today</span>
                </div>
            </div>
        </div>
        <!-- /top tiles -->

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

        <div class="row">
            <div class="col-md-8 col-sm-1">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Remaing Fuel</h2>
                        {{-- <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul> --}}
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="echart_gauge" style="height:250px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-1">
              <div class="x_panel">
                  <div class="x_title">
                      <h2>Fuel Reqeust Count</h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="tile_count" style="height: 250px; color: #00000080; margin:0%">
                      <div class="tile_stats_count" style="margin: 40px">
                          <span class="count_top"><i class="fa fa-qrcode"></i> Total Token</span>
                          <div class="count">251</div>
                          <span class="count_bottom"> From Today</span>
                      </div>
                    </div>
                      {{-- <div id="echart_gauge" style="height:370px;"></div> --}}
                  </div>
              </div>
          </div>
        </div>

        {{-- <div class="row">


      <div class="col-md-4 col-sm-4 ">
        <div class="x_panel tile fixed_height_320">
          <div class="x_title">
            <h2>App Versions</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
            <h4>App Usage across versions</h4>
            <div class="widget_summary">
              <div class="w_left w_25">
                <span>0.1.5.2</span>
              </div>
              <div class="w_center w_55">
                <div class="progress">
                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
              <div class="w_right w_20">
                <span>123k</span>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="widget_summary">
              <div class="w_left w_25">
                <span>0.1.5.3</span>
              </div>
              <div class="w_center w_55">
                <div class="progress">
                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
              <div class="w_right w_20">
                <span>53k</span>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="widget_summary">
              <div class="w_left w_25">
                <span>0.1.5.4</span>
              </div>
              <div class="w_center w_55">
                <div class="progress">
                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
              <div class="w_right w_20">
                <span>23k</span>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="widget_summary">
              <div class="w_left w_25">
                <span>0.1.5.5</span>
              </div>
              <div class="w_center w_55">
                <div class="progress">
                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
              <div class="w_right w_20">
                <span>3k</span>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="widget_summary">
              <div class="w_left w_25">
                <span>0.1.5.6</span>
              </div>
              <div class="w_center w_55">
                <div class="progress">
                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
              <div class="w_right w_20">
                <span>1k</span>
              </div>
              <div class="clearfix"></div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-4 ">
        <div class="x_panel tile fixed_height_320 overflow_hidden">
          <div class="x_title">
            <h2>Device Usage</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
              <tr>
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
              </tr>
              <tr>
                <td>
                  <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                </td>
                <td>
                  <table class="tile_info">
                    <tr>
                      <td>
                        <p><i class="fa fa-square blue"></i>IOS </p>
                      </td>
                      <td>30%</td>
                    </tr>
                    <tr>
                      <td>
                        <p><i class="fa fa-square green"></i>Android </p>
                      </td>
                      <td>10%</td>
                    </tr>
                    <tr>
                      <td>
                        <p><i class="fa fa-square purple"></i>Blackberry </p>
                      </td>
                      <td>20%</td>
                    </tr>
                    <tr>
                      <td>
                        <p><i class="fa fa-square aero"></i>Symbian </p>
                      </td>
                      <td>15%</td>
                    </tr>
                    <tr>
                      <td>
                        <p><i class="fa fa-square red"></i>Others </p>
                      </td>
                      <td>30%</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>


      <div class="col-md-4 col-sm-4 ">
        <div class="x_panel tile fixed_height_320">
          <div class="x_title">
            <h2>Quick Settings</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
            <div class="dashboard-widget-content">
              <ul class="quick-list">
                <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
                </li>
                <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
                </li>
                <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                </li>
                <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                </li>
                <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
                </li>
              </ul>

              <div class="sidebar-widget">
                  <h4>Profile Completion</h4>
                  <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
                  <div class="goal-wrapper">
                    <span id="gauge-text" class="gauge-value pull-left">0</span>
                    <span class="gauge-value pull-left">%</span>
                    <span id="goal-text" class="goal-value pull-right">100%</span>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div> --}}


        {{-- <div class="row">
      <div class="col-md-4 col-sm-4 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Recent Activities <small>Sessions</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
            <div class="dashboard-widget-content">

              <ul class="list-unstyled timeline widget">
                <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                      <div class="byline">
                        <span>13 hours ago</span> by <a>Jane Smith</a>
                      </div>
                      <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                      <div class="byline">
                        <span>13 hours ago</span> by <a>Jane Smith</a>
                      </div>
                      <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                      <div class="byline">
                        <span>13 hours ago</span> by <a>Jane Smith</a>
                      </div>
                      <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                      <div class="byline">
                        <span>13 hours ago</span> by <a>Jane Smith</a>
                      </div>
                      <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>


      <div class="col-md-8 col-sm-8 ">



        <div class="row">

          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Visitors location <small>geo-presentation</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                <div class="dashboard-widget-content">
                  <div class="col-md-4 hidden-small">
                    <h2 class="line_30">125.7k Views from 60 countries</h2>

                    <table class="countries_list">
                      <tbody>
                        <tr>
                          <td>United States</td>
                          <td class="fs15 fw700 text-right">33%</td>
                        </tr>
                        <tr>
                          <td>France</td>
                          <td class="fs15 fw700 text-right">27%</td>
                        </tr>
                        <tr>
                          <td>Germany</td>
                          <td class="fs15 fw700 text-right">16%</td>
                        </tr>
                        <tr>
                          <td>Spain</td>
                          <td class="fs15 fw700 text-right">11%</td>
                        </tr>
                        <tr>
                          <td>Britain</td>
                          <td class="fs15 fw700 text-right">10%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div id="world-map-gdp" class="col-md-8 col-sm-12 " style="height:230px;"></div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="row">


          <!-- Start to do list -->
          <div class="col-md-6 col-sm-6 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>To Do List <small>Sample tasks</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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

                <div class="">
                  <ul class="to_do">
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Schedule meeting with new client </p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Create email address for new intern</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Create email address for new intern</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- End to do list -->
          
          <!-- start of weather widget -->
          <div class="col-md-6 col-sm-6 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Daily active users <small>Sessions</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                <div class="row">
                  <div class="col-sm-12">
                    <div class="temperature"><b>Monday</b>, 07:30 AM
                      <span>F</span>
                      <span><b>C</b></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="weather-icon">
                      <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="weather-text">
                      <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="weather-text pull-right">
                    <h3 class="degrees">23</h3>
                  </div>
                </div>

                <div class="clearfix"></div>

                <div class="row weather-days">
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Mon</h2>
                      <h3 class="degrees">25</h3>
                      <canvas id="clear-day" width="32" height="32"></canvas>
                      <h5>15 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Tue</h2>
                      <h3 class="degrees">25</h3>
                      <canvas height="32" width="32" id="rain"></canvas>
                      <h5>12 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Wed</h2>
                      <h3 class="degrees">27</h3>
                      <canvas height="32" width="32" id="snow"></canvas>
                      <h5>14 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Thu</h2>
                      <h3 class="degrees">28</h3>
                      <canvas height="32" width="32" id="sleet"></canvas>
                      <h5>15 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Fri</h2>
                      <h3 class="degrees">28</h3>
                      <canvas height="32" width="32" id="wind"></canvas>
                      <h5>11 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Sat</h2>
                      <h3 class="degrees">26</h3>
                      <canvas height="32" width="32" id="cloudy"></canvas>
                      <h5>10 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>

          </div>
          <!-- end of weather widget -->
        </div>
      </div>
    </div> --}}
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
