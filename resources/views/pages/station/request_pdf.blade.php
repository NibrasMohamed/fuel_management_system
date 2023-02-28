<html>
<head>
  <title>Fuelin Reports</title>

   <!-- Bootstrap -->
   <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
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
  <h1 class="text-center">Fuel Requests Report</h1>

  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Station</th>
        <th>District</th>
        <th>Requested Fuel</th>
        <th>Expected Date</th>
        <th>Expected Time</th>
        <th>Current Status</th>
        {{-- <th>Action</th> --}}
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
        {{-- <td> 
            <a href="/update-fuel-request/{{$fuel_request->id}}?status=Canceled" class="btn btn-danger">Decline</a>
            <a href="/update-fuel-request/{{$fuel_request->id}}?status=OnProgress" class="btn btn-warning">On Progress</a>
            <a href="/update-fuel-request/{{$fuel_request->id}}?status=Delivered" class="btn btn-success">Delivered</a>
        </td> --}}
      </tr>    
      @endforeach
      {{-- <tr>
        <td>Tiger Nixon</td>
        <td>System Architect</td>
        <td>Edinburgh</td>
        <td>61</td>
        <td>2011/04/25</td>
        <td>$320,800</td>
      </tr> --}}
     
    </tbody>
  </table>
</body>
</html>