@extends('layouts.app')

@section('custom_css')
  <!-- Datatables -->
    
  <link href="{{ asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('custom_js')
        <!-- Datatables -->
    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
@endsection

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <?php 

    function textColor($params)
    {
        if ($params == "Scheduled") {
            return "secondary";
        }elseif ($params == "Delivered") {
            return "success";
        }elseif ($params == "OnProgress") {
            return "primary";
        }else {
            return "danger";
        }
    }

?>
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Fuel Request</h3>
        </div>

        <div class="title_right">
          <div class="  form-group pull-right top_search">
            <a href="/fuel-request?print=true" class="btn btn-success"><i class="fa fa-floppy-o"></i> Print</a>
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
              <h2>Fuel Request List</h2>
              <div class="clearfix"></div>
            </div>
            
            <div class="x_content">
              @if(session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Station</th>
                    <th>District</th>
                    <th>Requested Fuel</th>
                    <th>Expected Date</th>
                    <th>Expected Time</th>
                    <th>Current Status</th>
                    <th>Action</th>
                  </tr>
                </thead>


                <tbody>
                  @foreach ($fuel_requests as $fuel_request)
                  <tr>
                    <td> {{ $fuel_request->station->station_name }} </td>
                    <td> {{ $fuel_request->station->location->name }} </td>
                    <td> {{ $fuel_request->fuel_qty }} Liters</td>
                    <td> {{ $fuel_request->requested_date }} </td>
                    <td> {{ $fuel_request->expected_time }} </td>
                    <td><span class="badge badge-{{textColor($fuel_request->status)}}">{{ $fuel_request->status }}</span>   </td>
                    <td> 
                        <a href="/update-fuel-request/{{$fuel_request->id}}?status=Canceled" class="btn btn-danger">Decline</a>
                        <a href="/update-fuel-request/{{$fuel_request->id}}?status=OnProgress" class="btn btn-warning">On Progress</a>
                        <a href="/update-fuel-request/{{$fuel_request->id}}?status=Delivered" class="btn btn-success">Delivered</a>
                    </td>
                  </tr>    
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
    
@endsection