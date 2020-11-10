<!DOCTYPE html>
<html>
@include('layouts.app')
<head>
	<title>Vouchers</title>
</head>

<body>

<div class="container">
	
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Company Name</th>
					<th>Title</th>
					<th>Description</th>
					<th>Quantity</th>
					<th>Code</th>
				</tr>

			</thead>

			<tbody>
				@foreach($data as $row)
					<tr>
						<td>{{$row->companyName}}</td>

						<td>{{$row->voucherTitle}}</td>

						<td>{{$row->description}}</td>

						<td>{{$row->quantity}}</td>

						<td>{{$row->voucherCode}}</td>

					</tr>


				@endforeach
			</tbody>

		</table>

	</div>


</div>




</body>
</html>