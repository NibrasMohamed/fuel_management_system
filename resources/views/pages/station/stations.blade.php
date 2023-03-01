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
        if ($params == "Open") {
            return "success";
        }else {
            return "danger";
        }
    }

?>
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Stations</h3>
        </div>

        <div class="title_right">
          <div class="  form-group pull-right top_search">
            <a href="/stations?print=true" class="btn btn-success"><i class="fa fa-floppy-o"></i> Print</a>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Stations List</h2>
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
                    <th>Fuel Capacity</th>
                    <th>Fuel Stock</th>
                    <th>Current Status</th>
                  </tr>
                </thead>


                <tbody>
                  @foreach ($stations as $station)
                  <tr>
                    <td class="text-primary"> {{ $station->station_name }} </td>
                    <td> {{ $station->address }} </td>
                    <td> {{ $station->fuel_capacity }} Liters</td>
                    <td class="text-danger"> {{ $station->fuel_stock }} Liters </td>
                    <td><span class="badge badge-{{textColor($station->status)}}">{{ $station->status }}</span>   </td>
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