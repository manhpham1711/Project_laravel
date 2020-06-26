<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Route</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div>
		<h1 style="color: #03FD26; margin-left: 85%;"><a href="/admin/account">Exit</a></h1>
	</div>
	<div class="container">
		<h2 style="text-align: center;">Edit Route</h2>

		<form action="/admin/account/edit/route/{{$data->id}}" method="POST">
			@csrf

			<div class="form-group">
				<label for="email">User Name:  <span>{{$data->name}}</span></label>

			</div>
			<div class="form-group">
				<label for="pwd">Route</label>
				<input type="text" class="form-control" id="name" name="route" value="{{$data->route}}">


			</div>
			<button type="submit" class="btn btn-default">Submit</button>

		</form>

	</div>

</body>
</html>