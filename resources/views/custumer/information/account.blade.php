
<div class="container-fluid mt-3">
   <h4 class="mb-2">Change Password</h4><hr>
   <form action='/website/user/changePassword' method="POST" enctype="multipart/form-data">
     @csrf
   <div class="form-row">
      <div class="form-group col-sm-6">
         <label for="password">New Password</label>
         <input type="text" class="form-control"
         id="password" name="newPassword" placeholder="Mật Khẩu Mới">
      </div>
   </div>

   <button type="submit" class="btn btn-primary">Change</button>
</form>
</div>