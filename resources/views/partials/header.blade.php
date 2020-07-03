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
	<div style="background-color: #55F2E8">
		<div class="header-top" >
			<div class="container">
				<br>
				<div class="header-left col-lg-5 col-md-5 col-sm-6 col-xs-6" style=" margin-top: 15px;">
					<span>
						<i class="glyphicon glyphicon-cloud"></i>
						10°C
					</span>
					<span>
						<i class="glyphicon glyphicon-map-marker"></i>
						180 Điện Biên Phủ Trên Không
					</span>
					<span>
						<i class="glyphicon glyphicon-earphone"></i>
						+84 905 113 113
					</span>
				</div>
				<div class="header-right col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<ul class="nav navbar-nav" id="header-right">
						<li>
							<a href="" data-toggle="modal" data-target="#dangki"><span><i
								class="fa fa-bell-o "></i></span> THÔNG BÁO </a>
							</li>
							<li>
								<a href="" data-toggle="modal" data-target="#dangki">
									<span>
										<i class="fa fa-question-circle  "></i>
									</span>TRỢ GIÚP
								</a>
							</li>
							<li>
								@if(Auth::user())
								@if(Auth::user()->route == "admin")
								<a href="/admin/" data-toggle="modal">
									<span>
										<i class="fa fa-bell-o "></i>
									</span> Go To Admin Page
								</a>
								@else
								<h4>Hello :<i><u><b><a href="/website/user" style="color: #1F1F1C;">{{Auth::user()->nameUser}}</a></b></u></i></h4>
								<a href="/website/logout" data-toggle="modal" style="text-align: center;">
									<span>
										<i class="fa fa-bell-o "></i>
									</span> LOGOUT
								</a>
								@endif
								@else
								<a href="/website/login" data-toggle="modal">
									<span>
										<i class="fa fa-bell-o "></i>
									</span> LOGIN
								</a>
								@endif

							</li>
							<li>
								<a href="/website/cart">
									<span>
										<img src="https://img.icons8.com/nolan/64/favorite-cart.png"
										style=" width: 42px; height: 35px; ">
									</span>

									@if($numberProduct != 0)

									<span style="color: red; font-size: 20px;">
										{{$numberProduct}}
									</span>
									@endif
									GIỎ HÀNG
								</a>

							</li>
						</ul>
					</div>

				</div>
			</div>

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="solugan col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<a href="/website/seafood"><h2 class="tieude">HẢI SẢN BIÊN GIỚI</h2></a>
				</div>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
					<form class="form-inline my-6 my-lg-0" style="margin-left: 70%" action="/website/seafood/search" method="POST">
						@csrf
						<input class="form-control mr-sm-2" type="search" placeholder="Nhập Tên Sản Phẩm Muốn Tìm Kiếm" name="search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</nav>
		</div>
	</body>
	</html>
