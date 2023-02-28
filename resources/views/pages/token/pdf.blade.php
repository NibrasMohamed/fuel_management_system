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
        if ($params == "Accepted") {
            return "success";
        }elseif ($params == "Pending") {
            return "primary";
        }else {
            return "danger";
        }
    }

?>
  <h1 class="text-center">Monthly Tokens Report </h1>

  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Customer</th>
        <th>Vehicle No</th>
        <th>Requested Fuel</th>
        <th>Requested Date</th>
        <th>Time</th>
        <th>Status</th>
      </tr>
    </thead>


    <tbody>
      @foreach ($tokens as $token)
      <tr>
        <td> {{ $token->customer->name }} </td>
        <td> {{ $token->vehicle->registration_number }} </td>
        <td class="text-success"> {{ $token->fuel_quantity }} L</td>
        <td class="text-secondary"> {{ $token->date }} </td>
        <td> {{ $token->expected_time }} </td>
        <td><span class="badge badge-{{textColor($token->status)}}">{{ $token->status }}</span></td>
      </tr>    
      @endforeach
     
    </tbody>
  </table>
</body>
</html>