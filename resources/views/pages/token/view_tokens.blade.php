@extends('layouts.app')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tokens</h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tokens</h2>
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Customer</th>
                    <th>Vehicle No</th>
                    <th>Requested Fuel</th>
                    <th>Requested Date</th>
                    <th>Time</th>
                    <th>Amount</th>
                  </tr>
                </thead>


                <tbody>
                  {{-- @foreach ($tokens as $token)
                  <tr>
                    <td> {{ $token->name }} </td>
                    <td> {{ $token->email }} </td>
                    <td> {{ $token->phone_number }} </td>
                    <td> {{ $token->address }} </td>
                  </tr>    
                  @endforeach --}}
                 
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