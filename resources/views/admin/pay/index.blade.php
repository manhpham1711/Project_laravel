
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<?php
if (isset($_GET['corect'])) {
	echo '<script> alert("Đơn Hàng Đang Dược Giao"); </script>';
}
if (isset($_GET['delete'])) {
	echo '<script> alert("Đã xóa đơn hàng thành công :( "); </script>';
}
?>
	@include('admin\header');

	<div class="container tab-pane active"><br>
		<h1 style="text-align: center;"> List Order</h1>
		<hr>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Name Custumer</th>
					<th scope="col">Address</th>
					<th scope="col">Phone</th>
					<th scope="col">Sale</th>
					<th scope="col">Time</th>
					<th scope="col">Total Money</th>
					<th colspan="2" scope="col" style="text-align: center;">Function</th>
				</tr>
			</thead>
			<tbody>
				<?php $stt = 1;?>
				@foreach ($data as $d)
				@if(! $d->shipping)
				<tr>
					<th scope="row"> {{$d->nameUser}} </th>
					<td> {{$d->address}} </td>
					<td> {{$d->phone}} </td>
					<td> <strong>{{$d->code}}</strong> (<samp style="color: #092BFB;">{{$d->percent}}%</samp>)</td>
					<td>{{$d->created_at}}</td>
					<td> @if ($d->percent == 0)
						<p>{{$d->sumMoney}}</p>
						@else
						<p> {{$d->sumMoney * ((100 - $d->percent)/100)}}  </p>
						@endif
					</td>
					<td>
						<button type="button" data-toggle="modal" data-target="#myModal{{$stt}}">See details</button>

						<!-- Modal -->
						<div class="modal fade" id="myModal{{$stt}}" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Chi tiết đơn hàng</h4>
									</div>
									<div class="modal-body">
										@foreach (json_decode($d->product) as $p)
										<p>Name product: {{$p->name}}</p>
										<p>Quantity: {{$p->quantity}}</p>
										<p>Price: {{$p->price}}</p>
										<br><hr>
										@endforeach
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>

							</div>
						</div>
					</td>
					<td>
						<form action="/admin/seafood/{{$d->id}}/confirm" method="GET" accept-charset="utf-8">
							@csrf
							<button type="submit">Confirm</button>
						</form>
					</td>
					<td>
						<form action="/admin/seafood/{{$d->id}}/delete" method="POST" accept-charset="utf-8">
							@csrf
							@method('DELETE')
							<button type="submit">Delete</button>
						</form>
					</td>
				</tr>
				<?php $stt++;?>
				@else
				<tr style="background-color: #C1F915; color: #000000;">
					<th scope="row"> {{$d->nameUser}} </th>
					<td> {{$d->address}} </td>
					<td> {{$d->phone}} </td>
					<td> <strong>{{$d->code}}</strong> (<samp style="color: #092BFB;">{{$d->percent}}%</samp>)</td>
					<td>{{$d->created_at}}</td>
					<td> @if ($d->percent == 0)
						<p>{{$d->sumMoney}}</p>
						@else
						<p> {{$d->sumMoney * ((100 - $d->percent)/100)}}  </p>
						@endif
					</td>
					<td>
						<button type="button" data-toggle="modal" data-target="#myModal{{$stt}}">See details</button>

						<!-- Modal -->
						<div class="modal fade" id="myModal{{$stt}}" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Chi tiết đơn hàng</h4>
									</div>
									<div class="modal-body">
										@foreach (json_decode($d->product) as $p)
										<p>Name product: {{$p->name}}</p>
										<p>Quantity: {{$p->quantity}}</p>
										<p>Price: {{$p->price}}</p>
										<br><hr>
										@endforeach
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>

							</div>
						</div>
					</td>
					<td>
						<p>Đang chuyển hàng</p>
					</td>
					<td>
						<form action="/admin/seafood/{{$d->id}}/delete" method="POST" accept-charset="utf-8">
							@csrf
							@method('DELETE')
							<button type="submit">Hủy Bỏ</button>
						</form>
					</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div>



</body>
</html>