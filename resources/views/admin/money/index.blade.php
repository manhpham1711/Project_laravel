
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
	echo '<script> alert("Tiền đã chuyển đến tài khoảng khách hàng"); </script>';
}
if (isset($_GET['incorect'])) {
	echo '<script> alert("Yêu cầu nộp tiền đã bị hủy :( "); </script>';
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
					<th scope="col">Money</th>
					<th scope="col">Date</th>
					<th colspan="2" scope="col" style="text-align: center;">Function</th>
				</tr>
			</thead>
			<tbody>
				<?php $stt = 1;?>
				@foreach ($data as $d)
				<tr>
					<th scope="row"> {{$d->nameUser -> nameUser}} </th>
					<td> {{$d->money()}} </td>
					<td> {{$d->created_at}} </td>
					<td>
						<form action="/admin/seafood/money/confirm/{{$d->id}}" method="GET" accept-charset="utf-8">
							@csrf
							<button type="submit" >Confirm</button>
						</form>
					</td>
					<td>
						<form action="/admin/seafood/money/delete/{{$d->id}}" method="post" accept-charset="utf-8">
							@csrf
							@method('DELETE')
							<button type="submit">Delete</button>
						</form>
					</td>

				</tr>
				<?php $stt++;?>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>