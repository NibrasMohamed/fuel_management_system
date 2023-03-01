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
</body>
</html>