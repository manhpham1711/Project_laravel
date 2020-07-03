<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top" role="navigation">
		@include('partials\header')
	</nav>

		<div class="container" style="padding-top: 100px; color : black">
        <div class="row">
            <div class="col-xs-4 item-photo">
                <img style="max-width:100%;" src="{{'/storage/'.$infomation->image}}" />
            </div>
            <div class="col-xs-5" style="border:0px solid gray">
                <!-- Datos del vendedor y titulo del producto -->
                <h3 style="color:#337ab7">Tên sản phẩm: <span style="color:#000">{{ $infomation->name}}</span></h3>
                <h6 style="color:#337ab7" class="title-price">Giá: <span style="color:#000">{{ $infomation->getPrice()}}</span></h6>
                <!-- Botones de compra -->
                <div class="section" style="padding-bottom:20px;">
                    <form action="/website/cart/add/{{$infomation->id}}" method="POST" accept-charset="utf-8">
							@csrf
							<button class="btn btn-warning" type="submit">Add Cart</button>
					</form>
                </div>
            </div>
        </div>
	</div>
<br><br><br>
	@include('partials\footer')

</body>
</html>