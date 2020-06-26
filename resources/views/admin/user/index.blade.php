<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	@include('admin\index');
	<br><hr>

	<div id="edit" class="container tab-pane active"><br>
		<h1 style="text-align: center;"> List Account</h1>
		<hr>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">UserName</th>
					<th scope="col">Route</th>
					<th colspan="2" scope="col">Function</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($dataUser as $infomation)
				<tr>
					<th scope="row"> {{$infomation->name}} </th>
					<td> {{$infomation->username}} </td>
					@if($infomation->route == 'admin')
						<td style="color: red"> {{$infomation->route}} </td>
					@else
						<td> {{$infomation->route}} </td>
					@endif
					<td>

						<form action="/admin/account/delete/{{$infomation->id}}" method="POST" accept-charset="utf-8">
							@csrf
							@method("DELETE")
							<button type="submit">Delete</button>
						</form>
					</td>
					<td>
						<form action="/admin/account/edit/route/{{$infomation->id}}" method="GET" accept-charset="utf-8">
							@csrf
							<button type="submit">Edit Route</button>
						</form>
					</td>

				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>