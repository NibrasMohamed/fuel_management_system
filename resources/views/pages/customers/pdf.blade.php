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
  <h1 class="text-center">Station Customers Report</h1>

  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Address</th>
      </tr>
    </thead>


    <tbody>
      @foreach ($customers as $customer)
      <tr>
        <td> {{ $customer->name }} </td>
        <td> {{ $customer->email }} </td>
        <td> {{ $customer->phone_number }} </td>
        <td> {{ $customer->address }} </td>
      </tr>    
      @endforeach
     
    </tbody>
  </table>
</body>
</html>