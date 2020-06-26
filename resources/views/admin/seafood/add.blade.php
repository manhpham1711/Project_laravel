
<div class="container-fluid mt-3">
   <h4 class="mb-2">Add Seafood</h4><hr>
   <form action='/admin/seafood/add' method="POST" enctype="multipart/form-data">
     @csrf
     <div class="form-row">
      <label for="name">Name Seafood</label>
      <input type="text" class="form-control"
      id="name" name="nameseafood" placeholder="Tên Hải Sản">
   </div>
   <div class="form-row">
      <div class="form-group col-sm-6">
         <label for="name">Quantity</label>
         <input type="number" class="form-control"
         id="name" name="quantity" placeholder="Bao nhiêu /KG">
      </div>
      <div class="form-group col-sm-6">
         <label for="price">Price</label>
         <input type="number" class="form-control"
         id="price" name="price" placeholder="Giá">
      </div>
   </div>
   <div class="form-group">
      <label for="inputAddress">Image</label>
      <input type="file" class="form-control"
      id="myAddress" name="photo">
   </div>

   <button type="submit" class="btn btn-primary">Add</button>
</form>
</div>