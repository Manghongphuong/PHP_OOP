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
                  <form action="index.php?action=store_Product" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Name Products</label>
                        <input type="text" name="name" class="form-control" id="exampleInputPassword1" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Category Products</label>
                        <select name="category_id" class="form-select" aria-label="Default select example">
                          <?php foreach ($categories as $category): ?>
                              <option value="<?php echo $category['id']; ?>">
                                  <?php echo $category['name']; ?>
                              </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Price Product</label>
                        <input type="text" name="price" class="form-control" id="exampleInputPassword1" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Quantity</label>
                        <input type="text" name="quantity" class="form-control" id="exampleInputPassword1" />
                      </div>
                      <div class="input-group mb-3">
                        <input type="file" name="images" class="form-control" id="inputGroupFile02" />
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description	</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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