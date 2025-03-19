<!--begin::App Main-->
<main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Add Product</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Products Form</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="row g-4">
              <div class="col-md-12">
                <div class="card card-primary card-outline mb-4">
                  <div class="card-header"><div class="card-title">Add Product</div></div>
                  <form action="index.php?action=update_Product&id=<?php echo $productid['id'];?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $productid['id']; ?>" />
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Name Products</label>
                        <input type="text" name="name" value="<?php echo $productid['name']; ?>" class="form-control" id="exampleInputPassword1" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Category Products</label>
                        <select name="category_id" class="form-select" aria-label="Default select example">
                        <?php foreach ($categories as $cate): ?>
                            <option value="<?php echo $cate['id']; ?>" 
                                <?php echo ($cate['id'] == $productid['category_id']) ? 'selected' : ''; ?>>
                                <?php echo $cate['name']; ?>
                            </option>
                        <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Price Product</label>
                        <input type="text" name="price" value="<?php echo $productid['price']; ?>" class="form-control" id="exampleInputPassword1" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Quantity</label>
                        <input type="text" name="quantity" value="<?php echo $productid['quantity']; ?>" class="form-control" id="exampleInputPassword1" />
                      </div>
                      <div class="input-group mb-3">
                        <input type="file" name="images" class="form-control" id="inputGroupFile02" />
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                      </div>
                      <img src="../uploads/<?php echo $productid['images']; ?>" alt="" width="100px" height="100px" />
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description	</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $productid['description']; ?></textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!--end::App Main-->