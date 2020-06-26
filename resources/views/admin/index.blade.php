<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</style>
</head>
<body>
	<div class="form-row">
		<div class="form-group col-sm-6">
			<h2>
				<a href="/website/seafood" data-toggle="modal">
					<span>
						<i class="fa fa-bell-o "></i>
					</span> Back Home page
				</a>
			</h2>
		</div>


		<div class="form-group col-sm-6" style="padding-left: 37%;">
			@if(Auth::user())
			<h1>
				<a href="/website/logout" data-toggle="modal">
					<span>
						<i class="fa fa-bell-o "></i>
					</span> LOGOUT
				</a>
			</h1>
			@endif
		</div>

	</div>

	<div>
		<h1 style="text-align: center; color: #11F54C"> Hello Admin</h1><br>
	</div>




	<div class="form-row">
		<div class="form-group col-sm-6">
			<form action="/admin/seafood" method="get">
				@csrf
				<button type="submit" class="btn btn-success">Quản Lý Sản Phẩm</button>
			</form>
		</div>
		<div class="form-group col-sm-6">
			<form action="/admin/account" method="get" >
				@csrf
				<button type="submit" class="btn btn-info">Quản Lý Tài Khoản</button>
			</form>
		</div>

	</div><br>



</body>
</html>