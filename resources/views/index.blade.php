<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chào mừng đến với cữa hàng hải sải</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css" media="screen">
		#display{
			display: grid;
			grid-template-columns: 400px 400px 400px 400px;
			grid-gap: 20px;
     }
 </style>

</head>
<body>
    <?php
if (isset($_GET['error'])) {
	echo "<script> alert('" . $_GET['error'] . "'); </script>";
}
if (isset($_GET['cart'])) {
	echo "<script> alert('" . $_GET['cart'] . "'); </script>";
}
if (isset($_GET['pay'])) {
	echo "<script> alert('" . $_GET['pay'] . "'); </script>";
}
?>

    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      @include('partials\header')
    </nav>
    <div style="margin-left: 45%; display: inline-flex;">
        <form action="/website/seafood/up" method="POST">
            @csrf
            <button type="submit" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-arrow-up"></span> Up
            </button>
        </form>
        &emsp;&emsp;&emsp;
        <form action="/website/seafood/down" method="POST">
            @csrf
            <button type="submit" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-arrow-down"></span> Down
            </button>
        </form>
    </div>
<br><br>

<!--  -->
<div id="display">
    @foreach ($data as $infomation)
    <div class="container">
        <div id="products" class="row list-group">
            <div class="item  col-xs-3 col-lg-3">
                <div class="thumbnail">
                    <a href="/website/detail/{{$infomation->id}}"><img class="group list-group-image" src="{{'/storage/'.$infomation->image}}" alt="Card image cap"></a>
                    <div class="caption">
                        <h5 class="card-title"> {{ $infomation->name}} </h5>
                        <h5 class="card-title"> {{ $infomation->getPrice()}} </h5>


                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <form action="/website/cart/add/{{$infomation->id}}" method="POST" accept-charset="utf-8">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">Add Cart</button>
                                </form>

                            </div>
                            <div class="col-xs-12 col-md-6"> <button type="submit"><a href="/website/detail/{{$infomation->id}}" class="btn btn-warning">Chi tiết</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!--  -->

@include('partials\footer')


</body>
</html>