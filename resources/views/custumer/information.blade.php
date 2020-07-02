<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>information</title>
  <link rel="stylesheet" href="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if (isset($_GET['cancel'])) {
	echo "<script> alert('Đã hũy đơn hàng thành công');</script>";
}
if (isset($_GET['confirm'])) {
	echo "<script> alert('Xác Nhận Nhận Hàng Thành Công');</script>";
}
if (isset($_GET['corect'])) {
	echo "<script> alert('Thay Đổi Mật Khẩu Thành Công :) ');</script>";
}
if (isset($_GET['incorect'])) {
	echo "<script> alert('Mật khẩu cũ không chính sát vui lòng thử lại sau ): ');</script>";
}
?>
  <div class="container">

    <h2>Trang Thong Ca Nhan : {{Auth::user()->nameUser}}</h2>
    <h1>Tiền Trong Tài Khoảng: {{Auth::user()->money()}}</h1>
    <br><br>

    <div class="container mt-3" style="width: 1097px;">
      <!-- Nav tabs -->

      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#menu2">Đơn Hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#menu1">Thay Đổi Mật Khẩu</a>
        </li>

<!--         <form class="form-inline navbar-form pull-right">
          <input class="form-control" type="text" placeholder="Search">
          <button class="btn btn-success-outline" type="submit">Tìm Kiếm</button>
        </form> -->

      </ul>
      <div class="tab-content">
        <div id="menu2" class="container tab-pane active"><br>
          @include('custumer\information\order');
        </div>

        <div id="menu1" class="container tab-pane fade"><br>
          @include('custumer\information\account');
        </div>

      </div>


    </div>

</body>
</html>
