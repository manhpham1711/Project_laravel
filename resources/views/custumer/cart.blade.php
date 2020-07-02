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
	<?php
if (isset($_GET['money'])) {
	echo '<script> alert("Không đủ tiền, vui lòng nộp tiền vào tài khoảng để giao dịch");</script>';
}
if (isset($_GET['payment'])) {
	echo '<script> alert("Tiền đang được xử lý vui lòng đợi");</script>';
}

?>

	<div>

		<a href="/website/seafood"><h1 style="padding-left: 5%;">back</h1></a><br><hr>

	</div>
	<div style=" margin-left: 55%;">
		<button type="button" data-toggle="modal" data-target="#money">Nộp Tiền</button>
		<!-- Modal -->
		<div class="modal fade" id="money" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<center><h1> Form Nộp Tiền </h1></center>
					</div>
					<div class="modal-body">
						<form action="/website/payment/{{Auth::user()->id}}" method="post" accept-charset="utf-8">
							@csrf
							<div class="form-group">
								<label for="inputMoney">Number Money</label>
								<input type="number" class="form-control"
								id="myMoney" name="money">
							</div>
							<center>
								<button type="submit" class="btn btn-info">Nộp Tiền</button>
							</center>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<br><br>
		<span style="font-size: 25px; color: #4AF507;">Tiền hiện tại trong tài khoảng của bạn: <span style="color: #F55F0D">{{Auth::user()->money()}} </span></span>
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
		<h1 style="margin-left: 20%;">Total money is:  <b><span style="color: red">{{$sumSalary}}</span> đ</b></h1>

		<h1 style="margin-left: 20%;">Percent discount:
			<b>
				<span style="color: #08A38F;">
					<?php
if (isset($_GET['discount'])) {
	echo $_GET['discount'] . " %";
} else {
	echo "Không có mã giảm giá";
}
if (isset($_GET['NO'])) {
	echo '<script> alert("Mã giảm giá không tồn tại");</script>';
}
?>

				</span>
			</b>
		</h1>
		<br>
		<h1 style="margin-left: 20%;">The amount to be paid is:
			<b>
				<span style="color: red">
					<?php
if (isset($_GET['discount'])) {
	echo $sumSalary * ((100 - $_GET['discount']) / 100);
} else {
	echo $sumSalary;
}
?>
				</span>
				đ
			</b>
		</h1>
	</div>

	<br><hr>
	<div><form action="/website/sale" method="POST" accept-charset="utf-8">
		@csrf
		Mã Giảm Giá: <input type="text" name="code">&emsp;&emsp;
		<button type="submit" class="btn btn-success">Áp dụng</button>
	</form>
	<br><br>
	<form method="POST" action="/website/pay/{{Auth::user()->id}}" accept-charset="utf-8">
		@csrf
		Address: <input type="text" name="address" placeholder="Nhập Địa chỉ"> &emsp;&emsp;&emsp;&emsp;
		Phone: <input type="text" name="phone" placeholder="Nhập Số Điện Thoại của bạn ">
		<?php
if (isset($_GET['discount'])) {
	echo '<input hidden type="text" name="id_sale" value="' . $_GET['id'] . '">';
	echo '<input hidden type="text" name="discount" value="' . $_GET['discount'] . '">';
} else {
	echo '<input hidden type="text" name="id_sale" value="1">';
	echo '<input hidden type="text" name="discount" value="0">';
}
?>
		<br><br>
		<button type="submit">Thanh Toán</button>
	</form>

</div>

</body>
</html>