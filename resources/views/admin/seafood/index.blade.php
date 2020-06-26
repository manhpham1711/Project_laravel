<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	@include('admin\index');
	<div>
		<div class="container mt-3" style="width: 1097px;">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
				<li class="nav-item">

					<a class="nav-link active" data-toggle="tab" href="#menu2">Quản Lý Sản Phẩm</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#menu1">Thêm Sản Phẩm</a>
				</li>

				<form class="form-inline navbar-form pull-right">
					<input class="form-control" type="text" placeholder="Search">
					<button class="btn btn-success-outline" type="submit">Tìm Kiếm</button>
				</form>

			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<div id="menu2" class="container tab-pane active"><br>
					<h1 style="text-align: center;"> List Product</h1>
					<hr>
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">Price</th>
								<th scope="col">Abate</th>
								<th scope="col">Quantity</th>
								<th scope="col">Status</th>
								<th scope="col">Image</th>
								<th colspan="2" scope="col">Function</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $infomation)
							<tr>
								<th scope="row"> {{$infomation->name}} </th>
								<td> {{$infomation->price}} </td>
								<td> {{$infomation->abate}} </td>
								<td> {{$infomation->quantity}} </td>
								<td> {{$infomation->status}} </td>
								<td> <img src="/storage/{{$infomation->image}}" alt="" height="80px" width="80px"></td>

								<td>
									<form action="/admin/seafood/edit/{{$infomation->id}}" method="GET" accept-charset="utf-8">
										@csrf
										<button type="submit"> edit </button>
									</form>
								</td>

								<td> <form action="/admin/seafood/delete/{{$infomation->id}}" method="POST" accept-charset="utf-8">
									@csrf
									@method("DELETE")
									<button type="submit"> delete</button>
								</form></td>
							</tr>
							@endforeach

						</tbody>
					</table>
				</div>

				<div id="menu1" class="container tab-pane fade"><br>
					@include('admin\seafood\add');
				</div>

			</div>
		</div>


		<div id="delete" style="display: none;">

		</div>
		<div id="search" style="display: none;">

		</div>
	</div>







</body>
</html>