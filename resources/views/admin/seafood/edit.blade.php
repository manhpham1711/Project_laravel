<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
	<title>Edit infomation</title>
</head>
<body>

	<div>
		<h1 style="color: #03FD26; margin-left: 85%;"><a href="/admin/seafood">Exit</a></h1>
	</div>
	<div class="container-fluid mt-3">
		<h4 class="mb-2" style="text-align: center">Edit Information</h4>
		<form action="/admin/seafood/update" method="post" enctype="multipart/form-data">
			@csrf
			<input type="text" name="id" hidden value="{{$data->id}}">
			<div class="form-row">
				<label for="name">Name Seafood</label>
				<input type="text" class="form-control"
				id="name" name="nameNew" value="{{$data->name}}">
			</div>
			<div class="form-row">
				<div class="form-group col-sm-6">
					<label for="name">Quantity</label>
					<input type="text" class="form-control"
					id="name" name="quantityNew" value="{{$data->quantity}}">
				</div>
				<div class="form-group col-sm-6">
					<label for="price">Price</label>
					<input type="number" class="form-control"
					id="price" name="priceNew" value="{{$data->price}}">
				</div>

			</div>
			<div class="form-group">
				<label for="inputAddress">Image</label>
				<input type="file" class="form-control"
				id="file" name="photoNew" value="{{$data->image}}">
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</body>
</html>