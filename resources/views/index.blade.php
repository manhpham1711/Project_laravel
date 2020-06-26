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
?>


   <nav class="navbar navbar-default navbar-static-top" role="navigation">
      @include('partials\header')
  </nav>


  <!--  -->
  <div id="display">
    @foreach ($data as $infomation)
    <div class="container">
        <div id="products" class="row list-group">
            <div class="item  col-xs-3 col-lg-3">
                <div class="thumbnail">
                    <img class="group list-group-image" src="{{'/storage/'.$infomation->image}}" alt="Card image cap">
                    <div class="caption">
                        <h5 class="card-title"> {{ $infomation->name}} </h5>
                        <h5 class="card-title"> {{ $infomation->price}} </h5>


                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <form action="/website/cart/add/{{$infomation->id}}" method="POST" accept-charset="utf-8">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">Add Cart</button>
                                </form>

                            </div>
                            <div class="col-xs-12 col-md-6"> <button type="submit"><a href="#" class="btn btn-warning">Chi tiết</a></button>
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