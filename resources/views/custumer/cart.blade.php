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
<div>

 <a href="/website/seafood"><h1 style="padding-left: 5%;">back</h1></a><br><hr>

</div>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">STT</th>
				<th scope="col">Name</th>
				<th scope="col">Price</th>
				<th scope="col">Image</th>
				<th scope="col">Quantity</th>
				<th scope="col">Sum Price </th>
				<th scope="col">Function</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php $stt = 1;?>
				@foreach ($dataCart as $infomation)
				<tr>
					<th scope="row"> {{$stt}} </th>
					<td> {{$infomation->name}} </td>
					<td> {{$infomation->price}} </td>
					<td> <img src="/storage/{{$infomation->image}}" alt="" height="80px" width="80px"></td>
					<td>
						<p style="margin-left: 10%;">{{$infomation->quantity}}</p>
						<span>
						<a href="/cart/{{$infomation->id}}/increase"><button class="btn btn-info"><b>+</b></button></a>
						<a href="/cart/{{$infomation->id}}/reduction"><button class="btn btn-info"><b>-</b></button></a>
						</span>

					</td>
					<td>{{$infomation->quantity * $infomation->price}}</td>
					<td>
						<form action="/cart/delete/{{$infomation->id}}" method="POST" accept-charset="utf-8">
							@csrf
							@method("DELETE")
							<button type="submit"> delete</button>
						</form>
					</td>
				</tr>
				<?php $stt++;?>
				@endforeach

			</tr>
		</tbody>
	</table>

	<div>

		<a href="/website/cart/deleteAll"><button type="button" style="margin-left: 85%;"> Delete All</button></a>
		<h1 style="margin-left: 20%;">Your total money is:  <b><span style="color: red">{{$sumSalary}}</span></b></h1>
	</div>

	<div>
		<a href="/website/pay/{{Auth::user()->id}}"><button>Thanh Toán</button></a>
	</div>

</body>
</html>