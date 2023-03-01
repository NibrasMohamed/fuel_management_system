<!DOCTYPE html>
<html>
<head>
	<link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

	<title>Payment Receipt</title>
	<style type="text/css">
		table {
		  border-collapse: collapse;
		  width: 100%;
		}

		th, td {
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}

		th {
		  background-color: #4CAF50;
		  color: white;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th colspan="2">Payment Receipt</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Token ID</td>
				<td>{{ $token->id }}</td>
			</tr>
			<tr>
				<td>Customer Name</td>
				<td>{{ $token->customer->name }}</td>
			</tr>
			<tr>
				<td>Vehicle Registration No.</td>
				<td>{{ $token->vehicle->registration_number }}</td>
			</tr>
			<tr>
				<td>Station Name</td>
				<td>{{ $token->station->station_name }}</td>
			</tr>
			<tr>
				<td>Fuel Quantity (in Litres)</td>
				<td class="text-secondary">{{ $token->fuel_quantity }}</td>
			</tr>
			<tr>
				<td>Expected Time</td>
				<td>{{ $token->expected_time }}</td>
			</tr>
			<tr>
				<td>Date</td>
				<td>{{ $token->date }}</td>
			</tr>
			<tr>
				<td>Amount Paid (in Rs.)</td>
				<td class="text-primary">{{ $token->fuel_quantity * 400 }}/=</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>{{ $token->status }}</td>
			</tr>
			<tr>
				<td>Payment</td>
				<td class="text-success">{{ $token->payment == 1 ? 'Done' : 'Pending' }}</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
